<?php

use App\App;
use App\Router;
use App\Config;
use App\Controllers\HomeController;
use App\Controllers\InvoiceController;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEW_PATH', __DIR__ . '/../views');

$router = new Router();

$router
    ->get('/', [HomeController::class, 'index'])
    ->get('/download', [HomeController::class, 'download'])
    ->post('/upload', [HomeController::class, 'upload'])
    ->get('/invoices', [InvoiceController::class, 'index'])
    ->get('/invoices/create', [InvoiceController::class, 'create'])
    ->post('/invoices/create', [InvoiceController::class, 'store']);

(new App($router, 
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']],

    new Config($_ENV)
))->run();
