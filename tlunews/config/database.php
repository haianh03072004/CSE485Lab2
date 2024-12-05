<?php

class DatabaseConfig {
    private static $host = 'localhost:3306';
    private static $dbname = 'tintuc';
    private static $username = 'root';
    private static $password = '';

    public static function getConnection() {
        try {
            $conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$username, self::$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}

?>