<?php

function get_categories()
{
    $category = new \Model\CategoryDb();
    return $category->get_categories();
}

function display_db_error($error_message)
{
    ob_clean();
    include 'view/errors/database.php';
    exit;
}

function display_error($error_message)
{
    ob_clean();
    include 'view/errors/error.php';
    exit;
}

function redirect($url)
{
    session_write_close();
    header("Location: $url");
    exit;
}
