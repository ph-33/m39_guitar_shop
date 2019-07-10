<?php
/**
 * Created by PhpStorm.
 * User: DaiDV
 * Date: 7/9/2019
 * Time: 7:08 PM
 */

namespace Controller;

use Model\CustomerDB;

class Auth
{
    /**
     * Check customer has login
     * @return bool
     */
    private function check_login()
    {
        return isset($_SESSION['customer']);
    }

    public function show_form_login()
    {
        if ($this->check_login()) {
            header('Location: index.php');
            exit;
        }
        include 'view/login.php';
    }

    public function login()
    {
        if ($this->check_login()) {
            header('Location: index.php');
            exit;
        }
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $errors = array();
        if ($email === null || $email === '') {
            $errors['email'] = 'Email is required.';
        } elseif (filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) === false) {
            $errors['email'] = 'Invalid email';
        }
        if ($password === null || $password === '') {
            $errors['password'] = 'Password is required.';
        } elseif (strlen($password) < 6) {
            $errors['password'] = 'Password is short.';
        }

        if (empty($errors)) {
            if (!CustomerDB::is_valid_user($email, sha1($password))) {
                $errors['login'] = 'Email or password invalid.';
            } else {
                $customer = CustomerDB::get_customer_by_email($email);
                $_SESSION['customer'] = $customer;
                header('Location: index.php');
                exit;
            }
        }

        include 'view/login.php';
    }

    public function logout()
    {
        unset($_SESSION['customer']);
        header('Location: index.php?action=login');
        exit;
    }
}
