<?php
/**
 * Created by PhpStorm.
 * User: DaiDV
 * Date: 7/9/2019
 * Time: 7:08 PM
 */

namespace Controller;

class Home
{
    public function index(){
        $category = new \Model\CategoryDb();
        $categories = $category->get_categories();
//        var_dump($categories);
        include 'view/home.php';
    }
}
