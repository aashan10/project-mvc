<?php

namespace App\Model;

class Contact
{

    const DATABASE_FILE = __DIR__ . '/contacts.json';
    protected $data = [];

    public function __construct()
    {

        if (file_exists(self::DATABASE_FILE)) {
            $string  = file_get_contents(self::DATABASE_FILE);
            $this->data = json_decode($string, true);
        } else {
            file_put_contents(self::DATABASE_FILE, json_encode([], true));
        }
    }

    public function getById(string $id) {

        $data = array_filter($this->data, function ($item) use($id) {
            return $item['id'] === $id;
        });

        if(count($data) > 0) {
            return $data[array_key_first($data)];
        }

        return false;
    }

    public function all ()
    {
        return $this->data;
    }

    public function save() {
        file_put_contents(self::DATABASE_FILE, json_encode($this->data));
    }

    public function create(array $data) {

        $data['id'] = md5(microtime());
        $this->data[] = $data;
        $this->save();
    }
}