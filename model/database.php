<?php
class Database {
    private static $dsn = 'mysql:host=localhost;dbname=m39_guitar_shop';
    private static $username = 'root';
    private static $password = '12345678';
    private static $db;

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('view/errors/database.php');
                exit();
            }
        }
        return self::$db;
    }
}