<?php

namespace app\controllers;

use app\core\Request;
use app\models\Staff;
use app\core\Response;
use app\models\Client;
use app\models\Service;
use app\core\Controller;
use app\core\Application;
use app\models\Appointments;
use app\core\middlewares\AuthMiddleware;
use app\models\AdminLoginForm;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['dashboard', 'clients', 'staff', 'appointments', 'services']));
    }
    
    public function login(Request $request, Response $response)
    {
        $AdminLoginForm = new AdminLoginForm();

        if ($request->isPost()) {
            $AdminLoginForm->loadData($request->getBody());

            if ($AdminLoginForm->validate() && $AdminLoginForm->login()) {
                $response->redirect('/dashboard');
                return;
            }
        }
        
        $this->setLayout('auth');
        return $this->render('admin/auth/login', [
            'model' => $AdminLoginForm
        ]);
    }

    public function dashboard()
    {

        $client = new Client();
        $appointments = new Appointments;
        $staff = new Staff();
        $service = new Service();

        $params = [
            'clients' => $client->getClients(),
            'staff' => $staff->getStaff(),
            'services' => $service->getServices(),
            'appointments' => $appointments->getLimited(),
            'pendingAppointments' => $appointments->getPendingAppointments(),
        ];

        Application::$app->view->title = "Dashboard";

        $this->setLayout('admin');
        return $this->render('admin/dashboard', $params);
    }

    public function clients($request)
    {

        $client = new Client();

        if ($request->isPost()) {
            if (isset($request->getBody()['id'])) {

                $client->id = $request->getBody()['id'];
                $client->deleteClient();
            }
        }

        $params = [
            'clients' => $client->getClients(),
        ];

        Application::$app->view->title = "Clients";
        $this->setLayout('admin');
        return $this->render('admin/clients', $params);
    }

    public function staff($request)
    {

        $staff = new Staff();

        if ($request->isPost()) {

            $data = $request->getBody();

            switch ($data['action']) {

                case 'add':
                    $staff->firstname = $data['firstname'];
                    $staff->lastname = $data['lastname'];
                    $staff->email = $data['email'];
                    $staff->password = password_hash($data['password'], PASSWORD_DEFAULT);
                    $staff->add();
                    break;

                case 'update':
                    # code...
                    break;
                case 'delete':
                    $staff->id = $data['id'];

                    $staff->deleteMember();
                    break;
            }
        }

        $params = [
            'staff' => $staff->getStaff(),
        ];

        Application::$app->view->title = "Staff";
        $this->setLayout('admin');
        return $this->render('admin/staff', $params);
    }

    public function appointments($request)
    {
        $appointments = new Appointments;

        if($request->isPost()){

            $data = $request->getBody();

            switch ($data['action']) {
                case 'accept':
                    $appointments->id = $data['id'];

                    $appointments->acceptAppointment();
                    break;
                case 'denie':
                    $appointments->id = $data['id'];

                    $appointments->deniedAppointment();
                    break;
                case 'delete':
                    $appointments->id = $data['id'];

                    $appointments->deleteAppointment();
                    break;
            }


        }



        $params = [
            'appointments' => $appointments->getAll(),
        ];

        Application::$app->view->title = "Appointments";

        $this->setLayout('admin');
        return $this->render('admin/appointments', $params);
    }


    public function services(Request $request, Response $response)
    {

        $service = new Service();

        if ($request->isPost()) {

            $data = $request->getBody();

            switch ($data['action']) {
                case 'add':
                    $data = $request->getBody();

                    $service->name = $data['name'];
                    $service->description = $data['description'];
                    $service->price = $data['price'];

                    $service->add();
                    break;
                
                case 'delete':
                    $service->id = $data['id'];
                    $service->deleteService();
                    break;

                case 'update':
                    $service->id = $data['id'];
                    $service->name = $data['name'];
                    $service->price = $data['price'];
                    $service->description = $data['description'];
                    $service->update();
                    break;

            }

            Application::$app->response->redirect('/services');
        }

        if(isset($request->getBody()['id'])){

            Application::$app->view->title = "Services";
            $this->setLayout('admin');
            return $this->render('admin/updateService', $request->getBody());
        } else {
            $params = [
                'services' => $service->getServices(),
            ];
    
            Application::$app->view->title = "Services";
            $this->setLayout('admin');
            return $this->render('admin/services', $params);
        }

        
    }

    public function signout(Request $request, Response $response)
    {
        Application::$app->AdminLogout();
        $response->redirect('/');
    }
}
