<?php

 class SkinsModel{


    private $db;

    public  function __construct() {
            $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS);
        }

        public   function getSkins() {
            $query = $this->db->prepare('SELECT * FROM `Skins`');
            $query->execute();

            
            $Skins = $query->fetchAll(PDO::FETCH_OBJ);

            return $Skins;
        }
        

        public function getNamesByIds() {
            $query = $this->db->prepare("SELECT *, campeones.Nombre AS ChampionName, skins.Nombre AS SkinName FROM skins JOIN campeones ON campeones.Champion_id = skins.Champion_id");
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
        
            return $result;
        }

        public function getDetailedSkin($Skin_id) {
            $query = $this->db->prepare('SELECT *, campeones.Nombre AS ChampionName, skins.Nombre AS SkinName FROM skins JOIN campeones ON campeones.Champion_id = skins.Champion_id WHERE skins.Skin_id = ?');
            $query->execute([$Skin_id]);

        
            $Skins = $query->fetchAll(PDO::FETCH_OBJ);

            return $Skins;
        }
        

        public   function getSkinsXId($Champion_id) {
            $query = $this->db->prepare('SELECT *, campeones.Nombre AS ChampionName, skins.Nombre AS SkinName FROM skins JOIN campeones ON campeones.Champion_id = skins.Champion_id WHERE skins.Champion_id = ?');
            $query->execute([$Champion_id]);

        
            $Skins = $query->fetchAll(PDO::FETCH_OBJ);

            return $Skins;
        }

        public  function insertSkins($Champion_id,$nombre,$precio) {
            $query = $this->db->prepare('INSERT INTO skins (Champion_id, Nombre, Precio) VALUES(?,?,?)');
            $query->execute([$Champion_id,$nombre,$precio]);

            return $this->db->lastInsertId();
        }

        
        public function deleteSkins($Skin_id) {
            $query = $this->db->prepare('DELETE FROM Skins WHERE Skin_id = ?');
            $query->execute([$Skin_id]);
        }

        public function updateSkins($Skin_id, $nombre, $Precio) {
            $query = $this->db->prepare('UPDATE skins SET Nombre = ?, Precio = ? WHERE Skin_id = ?');
            $query->execute([$nombre, $Precio, $Skin_id]);
        }
        
        

}