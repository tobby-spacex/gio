<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\App;
use App\View;
use App\Model\User;
use App\Model\Invoice;
use App\Model\SignUp;

class HomeController
{
    public function index(): View
    {
        $email = 'jone12.done@.com';
        $name  = 'Jone Doe';
        $is_active = 'true';
        $created_at = '1/08/1987';

        $amount = 10;
        $user_number = 100087;

        $userModel = new User();
        $invoiceModel = new Invoice();

        $invoiceId = (new SignUp($userModel, $invoiceModel))->register(
            [
                'email' => $email,
                'name'  => $name,
                'is_active'=> $is_active
            ],
            [
                'amount' => $amount,
            ]
        );
        
        return View::make('index', ['invoice' => $userModel->find()]);
    }
}