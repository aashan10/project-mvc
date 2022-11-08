<?php

namespace App\Controllers;

class PageController
{
    public function home()
    {
        echo "This is home page!";
    }

    public function features()
    {
        echo "This is features page!";
    }

    public function about()
    {
        echo "This is about page!";
    }

    public function contact()
    {
        echo "This is contact page!";
    }

    public function saveContact()
    {
        echo "The contact has been saved!";
    }

    public function notFound()
    {
        http_response_code(404);
        echo "The page you are looking for could not be found!";
    }

}