<?php
namespace App\Controllers;
use App\Models\UserModel;

class AuthController {
    private $model;

    public function __construct($db) {
        $this->model = new UserModel($db);
    }

    public function mostrarLogin() {
        require_once '../app/views/auth/login.php';
    }

    public function registrar() {

        require_once '../app/views/auth/registro.php';
    }

    public function guardarUsuario() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirm = $_POST['confirm_password'] ?? '';


            if ($password !== $confirm) {
                $error = "Las contraseñas no coinciden.";
                require_once '../app/views/auth/registro.php';
                return;
            }


            $usuarioExistente = $this->model->buscarPorCorreo($email);

            if ($usuarioExistente) {

                $error = "Este usuario ya es existente";

                require_once '../app/views/auth/registro.php';
                return;
            }


            if ($this->model->registrar($nombre, $email, $password)) {
                header("Location: index.php?url=login&status=success");
                exit();
            } else {
                $error = "Error al crear la cuenta.";
                require_once '../app/views/auth/registro.php';
            }
        }
    }

    public function autenticar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $usuario = $this->model->buscarPorCorreo($email);

            if ($usuario && password_verify($password, $usuario['password'])) {

                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nombre'] = $usuario['nombre'];
                header("Location: index.php?url=dashboard");
                exit();
            } else {
                $error = "Correo o contraseña incorrectos.";
                require_once '../app/views/auth/login.php';
            }
        }
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header("Location: index.php?url=login");
        exit();
    }
}