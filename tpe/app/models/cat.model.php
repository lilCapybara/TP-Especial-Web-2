<?php
include 'config.php';

class catModel{
private $db;

public  function __construct() {
    $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS);
    }

    public   function getCats() {
        $query = $this->db->prepare('SELECT * FROM `campeones` ');
        $query->execute();

        $cats = $query->fetchAll(PDO::FETCH_OBJ);

        return $cats;
    }

    
    /**Inserta el campeon en la base de datos */
    public  function insertCats($nombre, $rol,$precio) {
        $query = $this->db->prepare('INSERT INTO campeones (nombre, rol,precio) VALUES(?,?,?)');
        $query->execute([$nombre, $rol,$precio]);

        return $this->db->lastInsertId();
    }

    
    public function deleteCats($Champion_id) {
        $query = $this->db->prepare('DELETE FROM campeones WHERE Champion_id = ?');
        $query->execute([$Champion_id]);
    }

    public function updateCats($nombre, $rol, $Precio, $Champion_id) {

        $query = $this->db->prepare('UPDATE campeones SET nombre = ?, rol = ?, precio = ? WHERE Champion_id = ?');
        $query->execute([$nombre, $rol, $Precio, $Champion_id]);
    }



}