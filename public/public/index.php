<?php


use Router\Router;

require '../vendor/autoload.php';

define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);
define('DB_NAME', 'phppoo');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PWD', '');

$router = new Router($_GET['url']);




$router->get('/', 'App\Controllers\ArticleController@index');
$router->get('/posts/:id', 'App\Controllers\ArticleController@show');
$router->get('/tags/:id', 'App\Controllers\ArticleController@tag');

$router->get('/login', 'App\Controllers\UserController@login');
$router->post('/login', 'App\Controllers\UserController@loginPost');

$router->get('/logout', 'App\Controllers\UserController@logout');


$router->get('/admin/article', 'App\Controllers\Admin\ArticleModifyController@index');
$router->get('/admin/article/create', 'App\Controllers\Admin\ArticleModifyController@create');
$router->post('/admin/article/create', 'App\Controllers\Admin\ArticleModifyController@createPost');
$router->post('/admin/article/delete/:id', 'App\Controllers\Admin\ArticleModifyController@destroy');
$router->get('/admin/article/form/:id', 'App\Controllers\Admin\ArticleModifyController@form');
$router->post('/admin/article/update/:id', 'App\Controllers\Admin\ArticleModifyController@update');



$router->get('/admin/tag', 'App\Controllers\Admin\TagModifyController@tagIndex');




$result = $router->run();
    
  
    if ($result == null) {
        
        header('Location: ../'); 
    
    } 
