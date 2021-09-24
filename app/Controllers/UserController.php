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

            $_SESSION['auth'] = (int) $user->admin;

            return header('location: /admin/posts');

        } else {

            die('Pas ok');

        }

    }

}

