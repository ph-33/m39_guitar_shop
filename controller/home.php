<?php
/**
 * Created by PhpStorm.
 * User: DaiDV
 * Date: 7/9/2019
 * Time: 7:08 PM
 */

namespace Controller;

use Model\ProductDB;

class Home
{
    public function index(){
        $category_id = filter_input(INPUT_GET, 'category_id');
        $products = ProductDB::get_products_by_category($category_id);
        include 'view/home.php';
    }
}
