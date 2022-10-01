<?php

namespace app\controllers;

use app\models\User;
use app\core\Request;
use app\core\Response;
use app\core\Controller;
use app\core\Application;
use app\models\LoginForm;
use app\core\middlewares\AuthMiddleware;
use app\models\Appointments;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();

        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());

            if ($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/');
                return;
            }
        }
        
        $this->setLayout('auth');
        return $this->render('auth/login', [
            'model' => $loginForm
        ]);
    }

    public function register($request)
    {
        $user = new User();

        if ($request->isPost()) {

            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/login');
                exit;
            }
        }

        $this->setLayout('auth');
        return $this->render('auth/register', [
            'model' => $user
        ]);
    }

    public function profile()
    {
        $appointments = new Appointments();

        $appointments->user_id = Application::$app->user->getId();

        $params = [
            'appointments' => $appointments->getUserAppointments(),
            'pending' => [],
            'accepted' => [],
            'denied' => []
        ];

        return $this->render('account/profile', $params);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }
}