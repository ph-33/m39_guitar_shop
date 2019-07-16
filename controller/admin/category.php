<?php
/**
 * Created by PhpStorm.
 * User: DaiDV
 * Date: 7/9/2019
 * Time: 7:08 PM
 */

namespace Controller\Admin;

use Model\CategoryDB;

class Category extends Base
{
    public function index()
    {
        $categories = CategoryDB::get_categories();
        include 'view/admin/category.php';
    }

    public function add()
    {
        $name = filter_input(INPUT_POST, 'name');

        // Validate inputs
        if ($name === null || $name === '') {
            display_error("You must include a name for the category.\nPlease try again.");
        } else {
            CategoryDB::add_category($name);
        }
        redirect('/admin?action=category');
    }

    public function update()
    {
        $category_id = filter_input(INPUT_POST, 'category_id',
            FILTER_VALIDATE_INT);
        $name = filter_input(INPUT_POST, 'name');

        // Validate inputs
        if ($name === null || $name === '') {
            display_error("You must include a name for the category.\nPlease try again.");
        } else {
            CategoryDB::update_category($category_id, $name);
        }
        redirect('/admin?action=category');
    }

    public function delete()
    {
        $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
        CategoryDB::delete_category($category_id);
        redirect('/admin?action=category');
    }
}
