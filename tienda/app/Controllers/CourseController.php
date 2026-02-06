<?php
namespace App\Controllers;

use App\Models\CourseModel;
use App\Models\UserModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class CourseController {
    private $courseModel;
    private $userModel;
    private $db;

    public function __construct($db) {
        $this->db = $db;
        $this->courseModel = new CourseModel($db);
        $this->userModel = new UserModel($db);
    }

    // 1. Muestra el catálogo de cursos con detección de inscripciones
    public function index() {
        if (session_status() === PHP_SESSION_NONE) { session_start(); }
        $usuario_id = $_SESSION['usuario_id'] ?? null;

        // Obtener todos los cursos disponibles
        $cursos = $this->courseModel->obtenerTodos();

        // Obtener lista de IDs de cursos en los que el usuario ya está inscrito
        $inscritos = [];
        if ($usuario_id) {
            $query = "SELECT curso_id FROM inscripciones WHERE usuario_id = :uid";
            $stmt = $this->db->prepare($query);
            $stmt->execute(['uid' => $usuario_id]);
            $inscritos = $stmt->fetchAll(\PDO::FETCH_COLUMN); 
        }

        require_once APP_PATH . 'views/cursos/catalogo.php';
    }

    // 2. Muestra el contenido detallado (Temario)
    public function verCurso() {
        if (session_status() === PHP_SESSION_NONE) { session_start(); }

        if (!isset($_SESSION['usuario_id'])) {
            header("Location: index.php?url=login");
            exit();
        }

        $curso_id = $_GET['id'] ?? 1;
        $curso = $this->courseModel->obtenerPorId($curso_id);
        
        if (!$curso) {
            die("Error: El curso solicitado no existe.");
        }

        $modulos = $this->courseModel->obtenerModulosConTexto($curso_id);

        $queryInscripcion = "SELECT id FROM inscripciones WHERE usuario_id = :uid AND curso_id = :cid";
        $stmt = $this->db->prepare($queryInscripcion);
        $stmt->execute([
            'uid' => $_SESSION['usuario_id'],
            'cid' => $curso_id
        ]);
        $estaInscrito = $stmt->fetch();

        if ($estaInscrito) {
            require_once APP_PATH . 'views/course/ver-curso.php';
        } else {
            require_once APP_PATH . 'views/cursos/detalles.php';
        }
    }

    // 3. Proceso de Inscripción con validación de duplicados
    public function comprarSimulado() {
        if (session_status() === PHP_SESSION_NONE) { session_start(); }

        $curso_id = $_GET['id'] ?? null;
        $usuario_id = $_SESSION['usuario_id'] ?? null;

        if ($curso_id && $usuario_id) {
            try {
                $check = "SELECT id FROM inscripciones WHERE usuario_id = :uid AND curso_id = :cid";
                $stmtCheck = $this->db->prepare($check);
                $stmtCheck->execute(['uid' => $usuario_id, 'cid' => $curso_id]);
                
                if ($stmtCheck->fetch()) {
                    header("Location: index.php?url=ver-curso&id=" . $curso_id);
                    exit();
                }

                $query = "INSERT INTO inscripciones (usuario_id, curso_id) VALUES (:uid, :cid)";
                $stmt = $this->db->prepare($query);
                $stmt->execute(['uid' => $usuario_id, 'cid' => $curso_id]);

                header("Location: index.php?url=ver-curso&id=" . $curso_id);
                exit();
            } catch (\PDOException $e) {
                die("Error al procesar la inscripción: " . $e->getMessage());
            }
        }
        header("Location: index.php?url=cursos");
    }

    // 4. Reporte en Excel
    public function reporteExcel() {
        $query = "SELECT u.nombre, u.email, c.titulo as curso, i.fecha_inscripcion
        FROM inscripciones i
        JOIN usuarios u ON i.usuario_id = u.id
        JOIN cursos c ON i.curso_id = c.id";
        $stmt = $this->db->query($query);
        $datos = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        header("Content-Type: application/vnd.ms-excel; charset=utf-8");
        header("Content-Disposition: attachment; filename=reporte_inscritos.xls");

        echo "Nombre\tEmail\tCurso\tFecha de Inscripción\n";
        foreach ($datos as $fila) {
            echo implode("\t", array_values($fila)) . "\n";
        }
        exit();
    }

    // 5. Reporte en PDF
    public function reportePDF() {
        $query = "SELECT u.nombre, u.email, c.titulo as curso, i.fecha_inscripcion
        FROM inscripciones i
        JOIN usuarios u ON i.usuario_id = u.id
        JOIN cursos c ON i.curso_id = c.id";
        $reporte = $this->db->query($query)->fetchAll(\PDO::FETCH_ASSOC);

        ob_start();
        require_once APP_PATH . 'views/reportes/pdf_template.php';
        $html = ob_get_clean();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('defaultFont', 'Helvetica');

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();
        $dompdf->stream("reporte_academia.pdf", ["Attachment" => true]);
        exit();
    }
}