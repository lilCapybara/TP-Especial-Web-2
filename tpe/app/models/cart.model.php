<?php


class CartModel{
private $db;

public  function __construct() {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS);
    }

    public   function getTransactions() {
        $query = $this->db->prepare('SELECT t.Transaction_id, u.user_id, u.user_name, c.Champion_id, s.Skin_id, c.Nombre AS ChampionName, s.Nombre AS SkinName, t.Monto FROM transacciones t JOIN usuarios u ON t.User_id = u.user_id LEFT JOIN campeones c ON t.Champion_id = c.Champion_id LEFT JOIN skins s ON t.Skin_id = s.Skin_id');
        $query->execute();

        $cart = $query->fetchAll(PDO::FETCH_OBJ);

        return $cart;
    }

    public  function insertTransactions($user_id,$champion_id,$skin_id,$precio) {
        $query = $this->db->prepare('INSERT INTO `transacciones` (`User_id`, `Champion_id`, `Skin_id`, `Monto`) VALUES (?,?,?,?)');
        $query->execute([$user_id, $champion_id,$skin_id,$precio]);

        return $this->db->lastInsertId();
    }

    
    public function deleteTransaction($transaction_id) {
        $query = $this->db->prepare('DELETE FROM transacciones WHERE transaction_id = ?');
        $query->execute([$transaction_id]);
    }
    
    

}