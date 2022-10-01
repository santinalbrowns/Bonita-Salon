<?php

namespace app\models;

use app\core\Model;
use app\core\Application;

class AdminLoginForm extends Model
{
    public string $email = '';
    public string $password = ''; 

    public function rules() : array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED],
        ];
    }

    public function labels() : array
    {
        return [
            'email' => 'Email',
            'password' => 'Password',
        ];
    }

    public function login()
    {
        $admin = Admin::findOne(['email' => $this->email]);

        if (!$admin) {
            $this->addError('email', 'User does not exist with this email');
            return false;
        }

        if (!password_verify($this->password, $admin->password)) {
            $this->addError('password', 'Password is incorrect');
            return false;
        }

        return Application::$app->adminLogin($admin);
    }
}