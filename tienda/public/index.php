<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// 1. Carga del Autoload de Composer (NECESARIO PARA DOMPDF)
// Asegúrate de que esta línea apunte correctamente a tu carpeta vendor
require_once __DIR__ . '/../vendor/autoload.php';

// 2. Ruta raíz a la carpeta app
define('APP_PATH', dirname(__DIR__) . '/app/');

// 3. CARGAR CONFIGURACIÓN Y MODELOS
require_once APP_PATH . 'config/config.php';
require_once APP_PATH . 'Models/Database.php';
require_once APP_PATH . 'Models/UserModel.php';
require_once APP_PATH . 'Models/CourseModel.php';
require_once APP_PATH . 'Controllers/AuthController.php';
require_once APP_PATH . 'Controllers/CourseController.php';

use App\Models\Database;
use App\Controllers\AuthController;
use App\Controllers\CourseController;

if (session_status() === PHP_SESSION_NONE) { session_start(); }

// 4. Conexión a la DB
try {
    $db = (new Database())->getConnection();
} catch (\Exception $e) {
    die("Error de conexión: " . $e->getMessage());
}

// 5. Instanciar Controladores
$courseController = new CourseController($db);
$authController = new AuthController($db);

// 6. Enrutador Principal
$url = $_GET['url'] ?? 'login';

// --- LISTA BLANCA DE RUTAS PÚBLICAS ---
$rutas_publicas = ['login', 'autenticar', 'registro', 'registrar', 'guardarUsuario', 'guardar-usuario'];

// SI la ruta no es pública Y NO existe sesión, mandamos al login inmediatamente
if (!in_array($url, $rutas_publicas) && !isset($_SESSION['usuario_id'])) {
    header("Location: index.php?url=login");
    exit();
}

switch ($url) {
    // --- RUTAS DE AUTENTICACIÓN ---
    case 'login':
        $authController->mostrarLogin();
        break;

    case 'autenticar':
        $authController->login();
        break;

    case 'logout':
        $authController->logout();
        break;

    case 'registro':
    case 'registrar':
        $authController->registrar();
        break;

    case 'guardarUsuario':
    case 'guardar-usuario':
        $authController->guardarUsuario();
        break;

    // --- RUTAS DE CURSOS Y PROCESOS ---
    case 'cursos':
        $courseController->index();
        break;

    case 'ver-curso':
        $courseController->verCurso();
        break;

    // CORRECCIÓN: Esta ruta ahora coincide con el botón de tu catálogo
    case 'comprar':
    case 'comprar-simulado':
        $courseController->comprarSimulado();
        break;

    case 'reporte-excel':
        $courseController->reporteExcel();
        break;

    case 'reporte-pdf':
        $courseController->reportePDF();
        break;

    case 'dashboard':
        require_once APP_PATH . 'views/dashboard/index.php';
        break;

    default:
        echo "<div style='color:white; background:#1e293b; padding:20px; border-radius:10px; font-family:sans-serif;'>";
        echo "<h1>404</h1> Ruta no encontrada: " . htmlspecialchars($url);
        echo "<br><a href='index.php?url=cursos' style='color:#38bdf8;'>Volver al catálogo</a>";
        echo "</div>";
        break;
}