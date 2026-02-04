<?php
require_once __DIR__ . '/../vendor/autoload.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once dirname(__DIR__) . '/app/config/config.php';
use App\Models\Database;
use App\Controllers\AuthController;
use App\Controllers\ServicioController;
use App\Controllers\DashboardController;
use App\Controllers\ReporteController;

$database = new Database();
$db = $database->getConnection();

$authController = new AuthController($db);
$servicioController = new ServicioController($db);
$dashboardController = new DashboardController();
$reporteController = new ReporteController($db);

$url = $_GET['url'] ?? 'login';
$id = $_GET['id'] ?? null;

$rutasPublicas = ['login', 'autenticar', 'registrar', 'guardar-usuario'];

if (!isset($_SESSION['usuario_id']) && !in_array($url, $rutasPublicas)) {
    header("Location: index.php?url=login");
    exit();
}

if (isset($_SESSION['usuario_id'])) {
    if ($url === 'login' || $url === 'dashboard') {
        require_once '../app/views/dashboard/index.php';
    } elseif ($url === 'servicios') {
        $servicioController->index();
    } elseif ($url === 'crear') {
        $servicioController->create();
    } elseif ($url === 'guardar') {
        $servicioController->store();
    } elseif ($url === 'editar') {
        $servicioController->edit($id);
    } elseif ($url === 'actualizar') { // <-- RUTA PARA GUARDAR CAMBIOS
        $servicioController->update();
    } elseif ($url === 'eliminar') {
        $servicioController->delete($id);
    } elseif ($url === 'reporte-pdf') {
        $reporteController->imprimirGeneral();
    } elseif ($url === 'reporte-excel') {
        $reporteController->exportarExcel();
    } elseif ($url === 'logout') {
        session_destroy();
        header("Location: index.php?url=login");
    } else {
        require_once '../app/views/dashboard/index.php';
    }
    exit();
} else {
    // Manejo de rutas públicas
    if ($url === 'autenticar') { $authController->autenticar(); }
    elseif ($url === 'registrar') { require_once '../app/views/auth/registro.php'; }
    elseif ($url === 'guardar-usuario') { $authController->guardarUsuario(); }
    else { require_once '../app/views/auth/login.php'; }
    exit();
}