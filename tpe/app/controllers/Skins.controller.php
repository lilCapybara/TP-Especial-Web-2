<?php

require_once './app/views/Skins.view.php';
require_once './app/models/skins.model.php';

class  SkinsController{

    private $view;
    private $model;

    public function __construct() {
        $this->view = new SkinsView();
        $this->model = new SkinsModel();
   
    }

       
    public function showSkins() {
        $Skins = $this->model->getNamesByIds();
        $this->view->showSkins($Skins);
    }

                                                             
    public function showSkinsXid($Champion_id) {    //Obtengo los skins segun su Champion_id       
        $Skins = $this->model->getSkinsXId($Champion_id);
        $this->view->showSkinsXid($Skins);
    }

    public function showDetailedSkin($Skin_id) {
        $Skins = $this->model->getDetailedSkin($Skin_id);
        $this->view->showDetailedSkin($Skins);
    }

    
    public function addSkins() {

        $Champion_id=$_POST['Champion_id'];
        $nombreSkin = $_POST['nombreSkin'];
        $precio = $_POST['Precio'];
        

        if (empty($nombreSkin) || empty($precio)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }

        $id = $this->model->insertSkins($Champion_id,$nombreSkin,$precio);
        if ($id) {
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showError("Error al insertar la tarea");
        }
    }

    function removeSkins($Skin_id) {
        $this->model->deleteSkins($Skin_id);
        header('Location: ' . BASE_URL);
    }

    function editSkins($Skin_id) {
        $this->model->getSkins();
 
        $nombre = $_POST['nombre'];
           
        $Precio = $_POST['Precio'];

        $this->model->updateSkins($Skin_id,$nombre,$Precio);

        if ($Skin_id) {
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showError("Error al insertar la tarea");
        }
    }



}
