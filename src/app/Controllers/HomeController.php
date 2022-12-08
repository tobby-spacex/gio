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

        $email = 'jone.done@.com';
        $name  = 'Jone Doe';
        $is_active = 'true';
        $created_at = '1/08/1987';

        // $query = 'INSERT INTO users (email, full_name, is_active, created_at)
        //            VALUES (?, ?, ?, ?)';
        
        $query = 'INSERT INTO users (email, full_name, is_active, created_at)
        VALUES (:email, :name, :active, :date)';

        $stmt = $db->prepare($query);

        $stmt->execute(
            [
               'name' => $email,
               'email'=> $name,
               'active' => $is_active, 
               'date' => $created_at
            ]
        );

        $id = (int) $db->lastInsertId();

        $user = $db->query('SELECT *FROM users WHERE id=' . $id)->fetch();

        echo '<pre>';
        var_dump($user);
        echo '</pre>';

        var_dump($db);
        return View::make('index');
    }
}