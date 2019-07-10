<?php

require 'util/common.php';
require 'controller/home.php';
require 'controller/auth.php';
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
        $controller = new Controller\Auth();
        $controller->logout();
        break;
}
