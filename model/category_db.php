<?php

namespace Model;

class CategoryDB
{
    public static function get_categories()
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

    public static function get_category($category_id)
    {
        $db = \Database::getDB();
        $query = '
        SELECT *
        FROM categories
        WHERE categoryID = :category_id';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $category_id);
            $statement->execute();
            $result = $statement->fetch();
            $statement->closeCursor();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

    public static function add_category($name)
    {
        $db = \Database::getDB();
        $query = 'INSERT INTO categories
                 (categoryName)
              VALUES
                 (:name)';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':name', $name);
            $statement->execute();
            $statement->closeCursor();

            // Get the last product ID that was automatically generated
            $category_id = $db->lastInsertId();
            return $category_id;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

    public static function update_category($category_id, $name)
    {
        $db = \Database::getDB();
        $query = '
        UPDATE categories
        SET categoryName = :name
        WHERE categoryID = :category_id';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':category_id', $category_id);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

    public static function delete_category($category_id)
    {
        $db = \Database::getDB();
        $query = 'DELETE FROM categories WHERE categoryID = :category_id';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $category_id);
            $statement->execute();
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
}