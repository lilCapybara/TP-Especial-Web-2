<?php
require_once './app/controllers/Cats.controller.php';
require_once './app/controllers/Skins.controller.php';
require_once './app/controllers/auth.controller.php';
require_once './app/controllers/cart.controller.php';



define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


$action = 'listar'; //Accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// listar        ->     CatsController->showCats();
// agregar       ->     CatsController->addCats();
// eliminar/:ID  ->     CatsController->removeCat($id); 
// login         ->     AuthController->showLogin();
// auth          ->     AuthController->auth();
// logout        ->     AuthController->logout();


$params = explode('/', $action);

switch ($params[0]) {

    case 'listar':

            $controller = new CatsController();
            $control = new SkinsController();
            $controller->showCats();
            $control->showSkins();
            break;

    case 'agregar':

            $controller = new CatsController();
            $controller->addCats();
            break;

	case 'agregarSkin':
			$controller = new SkinsController();
			$controller->addSkins();
			break;

    case 'eliminar':
            
            $controller = new CatsController();
            $controller->removeCat($params[1]);
            break;

	case 'eliminarSkin':
            
		$controller = new SkinsController();
		$controller->removeSkins($params[1]);
		break;	

    case 'editar':
            $controller = new CatsController();
            $controller->editCat($params[1]);
            break;

	case 'editarSkin':
		$controller = new SkinsController();
		$controller->editSkins($params[1]);
		break;

    case 'mostrar':     //Corresponde al boton mostrar que muestra los skins de un determinado campeon

        if (isset($params[1])){
        $controller = new SkinsController();
        $controller->showSkinsXid($params[1]);}
        break;

    case 'verDetalleSkin':
        $controller=new SkinsController;
        $controller->showDetailedSkin($params[1]);
        break;
   
    case 'login':

        $controller = new AuthController();
        $controller->showLogin(); 
        break;
            
    case 'auth':
        $controller = new AuthController;
        $controller->auth();
    	break;

    case 'logout':

        $controller = new AuthController();
        $controller->logout();
        break;

    case 'listarTransacciones':
        $controller=new CartController;
        $controller->showTransactions();
        break;

    case 'agregarTransaccionCampeon':
        $controller=new CartController;
        $controller->addTransactionChamp($params[1],$params[2]); //Pasa la champion_id y el precio por parametro
        break;
    
    case 'agregarTransaccionSkin':
        $controller=new CartController;
        $controller->addTransactionSkin($params[1],$params[2]); //Pasa la champion_id y el precio por parametro
        break;
    
    case 'eliminarTransaccion':
        
        $controller = new CartController();
        $controller->removeTransaction($params[1]);
        break;	
 
    default: 
        echo "404 Page Not Found";
        break;
}