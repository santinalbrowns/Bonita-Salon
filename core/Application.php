<?php

namespace app\core;

use app\core\database\Database;

use Exception;

class Application
{
    public static string $ROOT_DIR;

    public string $layout = 'main';

    public string $userClass;
    public string $adminClass;
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public Database $db;
    public static Application $app;

    public View $view;
    public ?Controller $controller = null;
    public ?UserModel $user;
    public ?AdminModel $admin;
    
    public function __construct($rootPath, array $config)
    {
        $this->userClass = $config['userClass'];
        $this->adminClass = $config['adminClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;

        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);

        $this->view = new View();
        $this->db = new Database($config['db']);

        $primaryValue = $this->session->get('user');

        if ($primaryValue) {
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
        } else {
            $this->user = null;
        }

        $primaryValueAdmin = $this->session->get('admin');

        if ($primaryValueAdmin) {
            $primaryKey = $this->adminClass::primaryKey();
            $this->admin = $this->adminClass::findOne([$primaryKey => $primaryValueAdmin]);
        } else {
            $this->admin = null;
        }
    }


    public static function isGuest()
    {
        return !self::$app->user;
    }

    public static function isAdmin()
    {
        return !self::$app->admin;
    }

    public function run()
    {
        try {
            echo $this->router->resolve();
        } catch (Exception $e) {
            $this->response->setStatusCode($e->getCode());
            echo $this->view->renderView('_error', [
                'exception' => $e
            ]);

            return;
        }
    }

    public function getController()
    {
        return $this->controller;
    }

    public function setController(Controller $controller)
    {
        $this->controller = $controller;
    }

    public function login(UserModel $user) : bool
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        return true;
    }

    public function adminLogin(AdminModel $admin)
    {
        $this->admin = $admin;
        $primaryKey = $admin->primaryKey();
        $primaryValue = $admin->{$primaryKey};
        $this->session->set('admin', $primaryValue);
        return true;
    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }

    public function AdminLogout()
    {
        $this->admin = null;
        $this->session->remove('admin');
    }
}