<?php
namespace App\Controllers;

use App\Models\UserModel;

class AuthController {
    private $userModel;
    private $db;

    public function __construct($db) {
        $this->db = $db;
        $this->userModel = new UserModel($db);
    }

    // Muestra el formulario de login
    public function mostrarLogin() {
        require_once APP_PATH . 'views/auth/login.php';
    }

    // Procesa el inicio de sesión con manejo de errores descriptivos
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $usuario = $this->userModel->buscarPorEmail($email);

            // LA CLAVE ESTÁ AQUÍ: password_verify para comparar texto plano vs hash
            if ($usuario && password_verify($password, $usuario['password'])) {
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nombre'] = $usuario['nombre'];
                header("Location: index.php?url=cursos");
                exit();
            } else {
                // Si falla, mandamos un error específico para capturarlo en la vista
                header("Location: index.php?url=login&error=credenciales_incorrectas");
                exit();
            }
        }
    }

    // Muestra el formulario de registro
    public function registrar() {
        require_once APP_PATH . 'views/auth/registro.php';
    }

    // Procesa el registro con manejo de errores duplicados
    public function guardarUsuario() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if (!empty($nombre) && !empty($email) && !empty($password)) {
                try {
                    // Encriptamos la contraseña para que password_verify funcione después
                    $passHash = password_hash($password, PASSWORD_DEFAULT);
                    $exito = $this->userModel->crear($nombre, $email, $passHash);

                    if ($exito) {
                        header("Location: index.php?url=login&registro=success");
                        exit();
                    }
                } catch (\PDOException $e) {
                    if ($e->getCode() == 23000) {
                        header("Location: index.php?url=registro&error=duplicate");
                        exit();
                    } else {
                        die("Error técnico en la base de datos: " . $e->getMessage());
                    }
                }
            }
            header("Location: index.php?url=registro&error=fields");
            exit();
        }
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) { session_start(); }
        session_destroy();
        header("Location: index.php?url=login");
        exit();
    }
}
