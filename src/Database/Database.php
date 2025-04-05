<?php

namespace Blog\Database;

use App\Config\Config;
use Exception;
use PDO;
use PDOException;


class Database
{
    private $pdo;
    private static $instance = null;

    public function __construct()
    {
        try {
            $dsn = "mysql:host=" . Config::get('DB_HOST') . ";dbname=" . Config::get('DB_NAME') . ";charset=" . Config::get('DB_CHARSET');
            $this->pdo = new PDO($dsn, Config::get('DB_USER'), Config::get('DB_PASS'), [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->pdo;
    }
  
}
