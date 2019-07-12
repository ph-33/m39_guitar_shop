<?php
/**
 * Created by PhpStorm.
 * User: DaiDV
 * Date: 7/9/2019
 * Time: 7:08 PM
 */

namespace Controller\Admin;

class Home extends Base
{
    public function index()
    {
         include 'view/admin/home.php';
    }
}
