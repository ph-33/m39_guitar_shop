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
    public function index()
    {
        $product_id = filter_input(INPUT_GET, 'product_id');
        if ($product_id !== null) {
            $product = ProductDB::get_product($product_id);
            include 'view/product.php';
            exit;
        }

        $category_id = filter_input(INPUT_GET, 'category_id');
        if ($category_id !== null) {
            $products = ProductDB::get_products_by_category($category_id);
        } else  else {
            $products = ProductDB::get_feature_products();
        }
        include 'view/home.php';
    }
}
