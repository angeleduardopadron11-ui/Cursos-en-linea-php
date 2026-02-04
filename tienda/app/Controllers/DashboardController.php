<?php
namespace App\Controllers;

class DashboardController {
    public function index() {
        // La seguridad ya la manejó el index.php
        require_once '../app/views/dashboard/index.php';
    }
}