<?php

namespace App\Database;


class Connection {

    protected \PDO $db;
    protected static ?Connection $instance = null;

    protected function __construct()
    {
        $dsn = 'mysql:dbname=project;host=192.168.0.105;port=3306;';
        $this->db = new \PDO($dsn, 'root', 'ROOT', [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ]);
    }

    public static function getInstance(): self
    {
        if(!self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;

    }

    public function getPdo () : \PDO 
    {
        return $this->db;
    }
}