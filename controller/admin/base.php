<?php
/**
 * Created by PhpStorm.
 * User: DaiDV
 * Date: 7/9/2019
 * Time: 7:08 PM
 */

namespace Controller\Admin;


class Base
{
    public function __construct()
    {
        if (!isset($_SESSION['admin'])) {
            redirect('/admin?action=login');
        }
    }
}
