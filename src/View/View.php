<?php

namespace App\View;

class View
{
    const VIEW_DIRECTORY = __DIR__ . '/../../resources/views';

    public static function make(string $view, array $args = [])
    {
        extract($args);
        return include self::VIEW_DIRECTORY . '/' . $view . '.php';
    }
}

