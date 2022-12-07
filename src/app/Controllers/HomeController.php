<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\View;
use PDO;

class HomeController
{
    public function index(): View
    {
        try {
            $db = new PDO('mysql:host=' .$_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_DATABASE'], 
            $_ENV['DB_USER'], $_ENV['DB_PASS']
        );
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), $e->getCode());
        }

        var_dump($db);
        return View::make('index');
    }
}