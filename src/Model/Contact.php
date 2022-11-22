<?php

namespace App\Model;

use App\Database\Connection;

class Contact
{

    protected Connection $conenction;

    public function __construct()
    {
        $this->connection = Connection::getInstance();
    }

    public function getById(string $id) {

        $query = 'SELECT * FROM `contacts` WHERE `id` = ' . $id;
        return $this->connection->getPdo()->query($query)->fetch();
    }

    public function all ()
    {
        $query = 'SELECT * FROM `contacts`';
        return $this->connection->getPdo()->query($query)->fetchAll();
    }

    public function save() {
        
    }

    public function create(array $data) {
        $name = $data['name'] ?? '';
        $email = $data['email'] ?? '';
        $subject = $data['subject'] ?? '';
        $message = $data['message'] ?? '';

        $query = "INSERT INTO `contacts` (`name`, `email`, `subject`, `message`) VALUES ('$name', '$email', '$message', '$subject');";

        $this->connection->getPdo()->query($query)->execute();
    }
}