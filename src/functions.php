<?php

use App\View\View;

function view(string $name, array $args = [])
{
    return View::make($name, $args);
}