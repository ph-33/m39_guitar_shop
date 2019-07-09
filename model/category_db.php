<?php

namespace Model;

class CategoryDB
{
    public function get_categories()
    {
        try {
            $db = \Database::getDB();
            $query = 'SELECT *,
                (SELECT COUNT(*)
                 FROM products
                 WHERE Products.categoryID = Categories.categoryID)
                 AS productCount
              FROM categories
              ORDER BY categoryID';
            $statement = $db->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            $statement->closeCursor();
            return $result;
        } catch (\PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
}