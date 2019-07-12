<?php

namespace Model;

class ProductDB
{
    public static function get_products_by_category($category_id)
    {
        $db = \Database::getDB();
        $query = '
        SELECT *
        FROM products p
           INNER JOIN categories c
           ON p.categoryID = c.categoryID
        WHERE p.categoryID = :category_id';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $category_id);
            $statement->execute();
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            $statement->closeCursor();
            return $result;
        } catch (\PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

    public static function get_feature_products()
    {
        $db = \Database::getDB();
        $query = <<<SQL
        SELECT * FROM
            (
                SELECT * FROM products
                ORDER BY dateAdded DESC
                LIMIT 18446744073709551615
            ) AS sub
        GROUP BY
            categoryID
        ORDER BY NULL
        LIMIT 5
SQL;
        try {
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

    public static function get_product($product_id){
        $db = \Database::getDB();
        $query = <<<SQL
        SELECT * FROM products
        INNER JOIN categories
        ON products.categoryID = categories.categoryID
        WHERE productID = :product_id
SQL;
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':product_id', $product_id);
            $statement->execute();
            $result = $statement->fetch(\PDO::FETCH_ASSOC);
            $statement->closeCursor();
            return $result;
        } catch (\PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
}