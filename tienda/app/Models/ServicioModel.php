<?php
namespace App\Models;

use PDO;

class ServicioModel {
    private $conn;
    private $table_name = "servicios";

    public function __construct($db) {
        $this->conn = $db;
    }

    // LISTAR TODO (Usado por el Controlador y el Reporte)
    public function leer() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método extra para que el ReporteController funcione sin errores
    public function listarTodos() {
        return $this->leer();
    }

    // BUSCAR POR ID
    public function buscarPorId($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // CREAR
    public function crear($datos) {
        $query = "INSERT INTO " . $this->table_name . " (nombre, descripcion, precio, tiempo_entrega) 
                  VALUES (:nombre, :descripcion, :precio, :tiempo_entrega)";
        
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($datos);
    }

    // ACTUALIZAR
    public function actualizar($datos) {
        $query = "UPDATE " . $this->table_name . " 
                SET nombre = :nombre, descripcion = :descripcion, precio = :precio, tiempo_entrega = :tiempo_entrega 
                WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($datos);
    }

    // ELIMINAR
    public function eliminar($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}