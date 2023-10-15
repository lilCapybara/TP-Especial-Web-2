<?php

require_once './app/views/cart.view.php';
require_once './app/models/cart.model.php';

class  CartController{

    private $view;
    private $model;

    function __construct() {
        AuthHelper::verify(); //Verifica que el usuario este logueado 
                              //(evito que cualquier persona entre colocando manualmente la URL)

        $this->model = new CartModel();
        $this->view = new CartView();
    }


    public function showTransactions() {
        $cart = $this->model->getTransactions();    //Obtengo las transacciones de la base de datos

        $this->view->showCart($cart);
    }
    
    public function addTransactionChamp($champion_id,$precio) {

        $user_id=$_SESSION['user_id'];   
        // validaciones
        if (empty($user_id) || empty($champion_id) || empty($precio)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }
        $id = $this->model->insertTransactions($user_id, $champion_id,null,$precio);
        if ($id) {
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showError("Error al insertar la tarea");
        }
    }

    public function addTransactionSkin($skin_id,$precio) {

        $user_id=$_SESSION['user_id'];   
        // validaciones
        if (empty($user_id) || empty($skin_id) || empty($precio)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }
        $id = $this->model->insertTransactions($user_id, null,$skin_id,$precio);
        if ($id) {
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showError("Error al insertar la tarea");
        }
    }

    function removeTransaction($transaction_id) {
        $this->model->deleteTransaction($transaction_id);
        header('Location: ' . BASE_URL . 'listarTransacciones');
    }

    public function emptyCart(){
        $this->model->emptyCart();
    }
      
}
