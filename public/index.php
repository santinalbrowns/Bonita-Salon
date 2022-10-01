<?php

if(phpversion() < '7.4'){
    die('To run the project please use PHP version 7.4 or newer');
}

use app\models\User;
use app\controllers\AuthController;
use app\controllers\SiteController;
use app\controllers\AccountController;
use app\core\Application; // using namespaces to call the class application
use app\models\Admin;

require "../vendor/autoload.php";

$config = [
    'userClass' => User::class,
    'adminClass' => Admin::class,
    'db' => [
        'dsn' => 'mysql:host=localhost;dbname=bonita;port=3308',
        'user' => 'root',
        'password' => ''
    ]
];

$app = new Application(dirname(__DIR__), $config);


// the / is the page url the user goes to and the ones in quotes holds the 'class name then the method' or what the page contains.
// the AccountController is a class that holds the methods for Accounts, these methods are also the main pages

$app->router->get('/', [AccountController::class, 'home']);
$app->router->post('/', [AccountController::class, 'home']);


$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/dashboard', [SiteController::class, 'dashboard']);

$app->router->get('/clients', [SiteController::class, 'clients']);
$app->router->post('/clients', [SiteController::class, 'clients']);


$app->router->get('/profile', [AuthController::class, 'profile']);
$app->router->get('/logout', [AuthController::class, 'logout']);

$app->router->get('/staff', [SiteController::class, 'staff']);
$app->router->post('/staff', [SiteController::class, 'staff']);

$app->router->get('/appointments', [SiteController::class, 'appointments']);
$app->router->post('/appointments', [SiteController::class, 'appointments']);

$app->router->get('/services', [SiteController::class, 'services']);
$app->router->post('/services', [SiteController::class, 'services']); 

$app->router->get('/admin', [SiteController::class, 'login']); // Rendering admin login form
$app->router->post('/admin', [SiteController::class, 'login']); // Rendering admin submited form
$app->router->get('/signout', [SiteController::class, 'signout']); // Loggin out the admin to the signed in staff member


$app->run();