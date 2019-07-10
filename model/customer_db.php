<?php

namespace Model;

class CustomerDB
{
    public static function is_valid_user($email, $password)
    {
        $db = \Database::getDB();
        $query = <<<SQL
        SELECT *
        FROM customers
        WHERE emailAddress = :email
        AND password = :password
SQL;
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':password', $password);
            $statement->execute();
            $is_valid = $statement->rowCount() > 0;
            $statement->closeCursor();
            return $is_valid;
        } catch (\PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

    public static function get_customer_by_email($email)
    {
        $db = \Database::getDB();
        $query = <<<SQL
        SELECT * FROM customers
        WHERE emailAddress = :email
SQL;
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':email', $email);
            $statement->execute();
            $customer = $statement->fetch(\PDO::FETCH_ASSOC);
            $statement->closeCursor();
            return $customer;
        } catch (\PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
}