<?php
namespace App\Models;

use PDO;

class UserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * Busca un usuario por su correo electrónico (Columna: email)
     */
    public function buscarPorEmail($email) {
        $query = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Inserta un nuevo usuario en la base de datos
     * Versión optimizada con array en execute
     */
    public function crear($nombre, $email, $password) {
        $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)";
        $stmt = $this->db->prepare($sql);

        // Ejecutamos pasando los valores directamente en un array asociativo
        return $stmt->execute([
            ':nombre'   => $nombre,
            ':email'    => $email,
            ':password' => $password
        ]);
    }
}
