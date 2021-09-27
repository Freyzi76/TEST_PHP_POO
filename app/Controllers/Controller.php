<?php

namespace App\Controllers;

use Database\DBConnection;


abstract class Controller {

    protected $db;

    public function __construct(DBConnection $db)
    {

        if(session_status() === PHP_SESSION_NONE)
        {

            session_start();

        }

        $this->db = $db;
    }

    public function view(string $path, array $params = null) {

        ob_start();

        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);

        require VIEWS . $path . '.php';

        $content = ob_get_clean();

        require VIEWS . 'layout.php';

    }


    public function viewArticleIndex(string $path, array $params = null) {

        ob_start();

        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);

        require VIEWS . $path . '.php';

        $content = ob_get_clean();

        require VIEWS . 'HomeArticle.php';

    }





    protected function getDB() 
    {

        return $this->db;

    }


    protected function isAdmin()
    {

        if(isset($_SESSION['id']) && $_SESSION['admin'] === 1)
        {

            return true;

        } else {

            return header('location: /');

        }

    }


    protected function isConnected()
    {

        if(isset($_SESSION['id'])) 
        {

            return true;

        } else {

            return header('location: /');

        }

    }



}