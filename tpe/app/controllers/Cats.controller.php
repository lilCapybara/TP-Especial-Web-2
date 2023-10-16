<?php

require_once './app/views/cats.view.php';
require_once './app/models/cat.model.php';

class  CatsController{

    private $view;
    private $model;

    function __construct() {
        AuthHelper::verify(); //Verifica que el usuario este logueado 
                              //(evito que cualquier persona entre colocando manualmente la URL)

        $this->model = new catModel();
        $this->view = new catsView();
    }


    public function showCats() {
        // obtengo las categorias (champs) del controlador
        $cats = $this->model->getCats();
        
        // muestro las categorias desde la vista
        $this->view->showCats($cats);
    }
    
    public function addCats() {

        // obtengo los datos del usuario
        $nombre = $_POST['nombre'];
        $rol = $_POST['rol'];
        $precio = $_POST['Precio'];
        

        // validaciones
        if (empty($nombre) || empty($rol)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }
        $id = $this->model->insertCats($nombre, $rol,$precio);
        if ($id) {
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showError("Error al insertar la tarea");
        }
    }

        function removeCat($Champion_id) {
            $this->model->deleteCats($Champion_id);
            header('Location: ' . BASE_URL);
        }
      

        function editCat($Champion_id) {
 
            $nombre = $_POST['nombre'];
            $rol = $_POST['rol'];
            $Precio = $_POST['Precio'];
     
            $this->model->updateCats($nombre,$rol,$Precio,$Champion_id);
            header('Location: ' . BASE_URL);
        }
}
