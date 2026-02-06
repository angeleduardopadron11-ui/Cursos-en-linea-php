<?php
namespace App\Models;

use PDO;

class CourseModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * Obtiene todos los cursos para el catálogo.
     */
    public function obtenerTodos() {
        try {
            // Ordenamos por ID descendente para ver los últimos creados primero
            $query = "SELECT * FROM cursos ORDER BY id DESC";
            return $this->db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            // Respaldo por si falla el ordenamiento
            return $this->db->query("SELECT * FROM cursos")->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    /**
     * Busca los datos principales de un curso por su ID.
     */
    public function obtenerPorId($id) {
        $query = "SELECT * FROM cursos WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * UNIFICADO: Obtiene módulos y lecciones mediante un LEFT JOIN.
     * Esta función alimenta el temario lateral en el aula virtual.
     */
    public function obtenerModulosConTexto($curso_id) {
        try {
            // Usamos m.id para el orden y traemos texto/video de la tabla lecciones
            $query = "SELECT m.id, m.titulo, l.texto, l.video
            FROM modulos m
            LEFT JOIN lecciones l ON m.id = l.modulo_id
            WHERE m.curso_id = :cid
            ORDER BY m.orden ASC, m.id ASC";

            $stmt = $this->db->prepare($query);
            $stmt->execute(['cid' => $curso_id]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            // Si algo falla (como que la tabla no exista), devolvemos un array vacío para no romper la vista
            return [];
        }
    }
}
