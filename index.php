<?php

require 'util/common.php';
require 'controller/home.php';
require 'model/database.php';
require 'model/category_db.php';
require 'model/product_db.php';

$controller = new Controller\home();
$controller->index();