<?php

class UserModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS);
    }

    public function getByUserName($user_name) {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE user_name = ?');  //Busca y devuelve el nombre de usuario deseado
        $query->execute([$user_name]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}

?>