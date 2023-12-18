<?php

namespace Database;

use \PDO;
use Config\config;

class database {
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO(
                "mysql:host=" . config::$host . ";dbname=" . config::$db_name,
                config::$username,
                config::$password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function get_connection() {
        return $this->conn;
    }
}
