<?php
namespace App\Controllers;

use App\Models\ServicioModel;

class ServicioController {
    private $model;
    private $db;

    public function __construct($db) {
        $this->db = $db;
        $this->model = new ServicioModel($db);
        
        // Iniciamos sesión si no está iniciada
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // 1. LISTAR: Muestra la tabla principal (URL: servicios)
    public function index() {
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: index.php?url=login");
            exit();
        }
        // Usamos leer() que es como está en tu modelo
        $servicios = $this->model->leer(); 
        require_once '../app/views/servicios/index.php';
    }

    // 2. MOSTRAR FORMULARIO CREAR (URL: crear)
    public function create() {
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: index.php?url=login");
            exit();
        }
        require_once '../app/views/servicios/crear.php';
    }

    // 3. GUARDAR NUEVO (URL: guardar)
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [
                'nombre' => $_POST['nombre'],
                'descripcion' => $_POST['descripcion'],
                'precio' => $_POST['precio'],
                'tiempo_entrega' => $_POST['tiempo_entrega'] ?? '24h'
            ];

            if ($this->model->crear($datos)) {
                header("Location: index.php?url=servicios");
                exit();
            }
        }
    }

    // 4. MOSTRAR FORMULARIO EDITAR (URL: editar)
    public function edit($id) {
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: index.php?url=login");
            exit();
        }

        $servicio = $this->model->buscarPorId($id);

        if (!$servicio) {
            header("Location: index.php?url=servicios");
            exit();
        }

        require_once '../app/views/servicios/edit.php';
    }

    // 5. ACTUALIZAR CAMBIOS (URL: actualizar)
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $datos = [
                'id' => $_POST['id'],
                'nombre' => $_POST['nombre'],
                'descripcion' => $_POST['descripcion'],
                'precio' => $_POST['precio'],
                'tiempo_entrega' => $_POST['tiempo_entrega'] ?? '24h'
            ];

            if ($this->model->actualizar($datos)) {
                header("Location: index.php?url=servicios");
                exit();
            }
        }
    }

    // 6. ELIMINAR (URL: eliminar)
    public function delete($id) {
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: index.php?url=login");
            exit();
        }

        if ($this->model->eliminar($id)) {
            header("Location: index.php?url=servicios");
            exit();
        }
    }
}