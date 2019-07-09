<?php

namespace Model;

class CategoryDB
{
    function get_categories()
    {
        $db = \Database::getDB();
        $query = 'SELECT *,
                (SELECT COUNT(*)
                 FROM products
                 WHERE Products.categoryID = Categories.categoryID)
                 AS productCount
              FROM categories
              ORDER BY categoryID';
        try {
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            $statement->closeCursor();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
}