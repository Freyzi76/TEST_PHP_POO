<?php

namespace App\Controllers;

use App\Models\User;


class UserController extends Controller {

    public function login()
    {

        return $this->view('auth.login');

    }


    public function loginPost()
    {

        $user = (new User($this->getDB()))->getByUsername($_POST['username']);

        var_dump(password_verify($_POST['password'], $user->password));

        if(password_verify($_POST['password'], $user->password)) 
        {

            $_SESSION['username'] = (string) $user->username;

            $_SESSION['id'] = (int) $user->id;

            $_SESSION['admin'] = (int) $user->admin;


            return header('location: /admin/article');

        } else {

            return header('location: /');

        }

    }


    public function logout()
    {

        session_destroy();

        return header('location: /');

    }

}

