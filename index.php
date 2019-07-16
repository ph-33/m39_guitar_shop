<?php

require 'util/common.php';
require 'util/cart.php';

require 'controller/home.php';
require 'controller/auth.php';
require 'controller/cart.php';

require 'model/database.php';
require 'model/customer_db.php';
require 'model/category_db.php';
require 'model/product_db.php';

session_start();

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'index';

switch ($action) {
    case 'index':
        $controller = new Controller\Home();
        $controller->index();
        break;
    case 'login':
        $controller = new Controller\Auth();
        if (empty($_POST)) {
            $controller->show_form_login();
        } else {
            $controller->login();
        }
        break;
    case 'logout':
        $controller = new Controller\Auth();
        $controller->logout();
        break;
    case 'cart':
        $method = filter_input(INPUT_POST, 'method');
        if ($method === null) {
            $method = 'index';
        }
        $controller = new Controller\Cart();
        switch ($method) {
            case 'index':
                $controller->index();
                break;
            case 'add':
                $controller->add();
                break;
            case 'update':
                $controller->update();
                break;
            case 'remove':
                $controller->remove();
                break;
            case 'destroy':
                $controller->destroy();
                break;
            default:
                throw new Exception('Bad Cart method!');
                break;
        }
        break;
    default:
        throw new Exception('Bad action!');
        break;
}
