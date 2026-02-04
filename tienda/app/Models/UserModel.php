<?php
namespace App\Models;
use PDO;

class UserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function registrar($nombre, $email, $password) {
        // ERROR CORREGIDO: $password es un string, no un array. 
        // Se usa la variable directamente.
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        return $stmt->execute();
    }

    public function buscarPorCorreo($email) {
        $query = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}