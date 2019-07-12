<?php

set_include_path('..');

require 'util/common.php';

require 'controller/admin/base.php';
require 'controller/admin/home.php';
require 'controller/admin/auth.php';
require 'controller/admin/category.php';

require 'model/database.php';
require 'model/administrator_db.php';
require 'model/category_db.php';
require 'model/product_db.php';

session_start();

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'index';

switch ($action) {
    case 'index':
        $controller = new Controller\Admin\Home();
        $controller->index();
        break;
    case 'login':
        $controller = new Controller\Admin\Auth();
        if (empty($_POST)) {
            $controller->show_form_login();
        } else {
            $controller->login();
        }
        break;
    case 'logout':
        $controller = new Controller\Admin\Auth();
        $controller->logout();
        break;
    default:
        throw new Exception('Bad action!');
        break;
}
