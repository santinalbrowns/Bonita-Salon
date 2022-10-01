<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Application;
use app\core\Request;
use app\models\Appointments;
use app\models\Service;
use DateTime;

class AccountController extends Controller //is inherting from controller
{
    public function home ($request){

        $appointments = new Appointments();

        

        if(Application::isGuest()){ // if user not logged in

            return $this->render('account/home');

        } else { // if user logged in

            $appointments->user_id = Application::$app->user->getId();
            $services = new Service();

            if($request->isPost()){

                $data = $request->getBody();             

                $now = date('Y-m-d');

                switch ($data['action']) {
                    case 'book':
                        if($data['date'] >= $now){
                            $appointments->date = $data['date'];
                            $appointments->service_id = $data['service_id'];
                            $appointments->status = 'pending';

                            $appointments->bookAppointment();
                        } else {
                            Application::$app->session->setFlash('error', 'You cannot add appointment to the days pasted!');
                        }

                        break;
                    
                    case 'delete':
                        $appointments->id = $data['id'];
                        $appointments->deleteAppointment();
                        break;

                    case 'reschedule':

                        if($data['date'] >= $now){
                            $appointments->id = $data['id'];
                            $appointments->date = $data['date'];
                            $appointments->status = 'pending';
                            $appointments->reschedule();
                        }
                        else {
                            Application::$app->session->setFlash('error', 'You cannot add appointment to the days pasted!');
                        }
                        break;
                }

                Application::$app->response->redirect('/');
            }

            $params = [
                'appointments' => $appointments->getUserAppointments(),
                'pending' => $appointments->getUserAppointmentsByStatus('pending'),
                'accepted' => $appointments->getUserAppointmentsByStatus('accepted'),
                'denied' => $appointments->getUserAppointmentsByStatus('denied'),
                'services' => $services->getServices()
            ];
    
            return $this->render('account/home', $params); //$this-> references to the class and its methods. whats held in the () is the path of the files you want to use
        } 

    }

    public function stylist (){

        $params = [
            'firstname' => "Vanessa",
            'lastname' => "Narciso"
        ];

        return $this->render('account/stylist', $params); //$this-> references to the class and its methods. whats held in the () is the path of the files you want to use

    }

    public function services (){

        $params = [
            'firstname' => "Vanessa",
            'lastname' => "Narciso"
        ];

        return $this->render('account/services', $params); //$this-> references to the class and its methods. whats held in the () is the path of the files you want to use

    }

    public function contact (){

        $params = [
            'firstname' => "Vanessa",
            'lastname' => "Narciso"
        ];

        return $this->render('account/contact', $params); //$this-> references to the class and its methods. whats held in the () is the path of the files you want to use

    }
}