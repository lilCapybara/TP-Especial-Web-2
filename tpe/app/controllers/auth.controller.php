<?php
require_once './app/views/auth.view.php';
require_once './app/models/user.model.php';
require_once './app/helpers/auth.helper.php';

class AuthController {
    private $view;
    private $model;

    function __construct() {
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin() {
        $this->view->showLogin();
    }

    public function auth() {
        $user_name = $_POST['user_name'];   //Obtengo el nombre de usuario y la
        $password = $_POST['password'];     //contraseña del formulario del login

        if (empty($user_name) || empty($password)) {
            $this->view->showLogin('Faltan completar datos');
            return;
        }

        $user = $this->model->getByUserName($user_name);            //Busco al usuario en la base de datos
        
        if ($user && password_verify($password, $user->password)) { //Verifico que el usuario y la contraseña sean las correctas
            
            AuthHelper::login($user);          //Si todo esta bien se inicia la sesion
            
            header("Location: " . BASE_URL);        //y envio al usuario a la base del sitio
        } else {
            $this->view->showLogin('Usuario o contraseña inválido');
        }
    }

    public function logout() {
        AuthHelper::logout();
        header('Location: ' . BASE_URL);    
    }
}