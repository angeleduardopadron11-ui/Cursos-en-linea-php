<?php
// Usamos el autoload de la raíz para que Dotenv funcione
require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

use Dotenv\Dotenv;

// Cargamos el .env que está en la raíz del proyecto
$dotenv = Dotenv::createImmutable(dirname(__DIR__, 2));
$dotenv->load();

// Definimos las constantes que usará la clase Database
define('DB_HOST', $_ENV['DB_HOST'] ?? 'localhost');
define('DB_NAME', $_ENV['DB_NAME'] ?? '');
define('DB_USER', $_ENV['DB_USER'] ?? 'root');
define('DB_PASS', $_ENV['DB_PASSWORD'] ?? '');

// Opcional: URL base del proyecto
define('BASE_URL', 'http://localhost/sistema_servicios/public/');