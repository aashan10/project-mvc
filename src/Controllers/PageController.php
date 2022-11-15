<?php

namespace App\Controllers;


use App\Model\Contact;
use App\View\View;

class PageController
{

    public function index () {
        return View::make('home');
    }

    public function contact()
    {
        return View::make('contact');
    }

    public function contactPost()
    {
        $model = new Contact();

        $model->create($_POST);

        return View::make('contact');
    }

    public function contactList()
    {
        $model = new Contact();
        return View::make('contact/list', [
            'contacts' => $model->all()
        ]);
    }

    public function contactView()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            throw new \Exception('404 Not found!');
        }
        $model = new Contact();
        $data = $model->getById($id);

        if (!$data) {
            throw new \Exception('404 Not found!');
        }

        return View::make('contact/view', [
            'contact' => $data
        ]);

    }
}