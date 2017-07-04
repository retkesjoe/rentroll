<?php
require 'vendor/autoload.php';

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Medoo\Medoo;

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

session_start();

$db = null;
$conf = null;
$slimConf = array(
    'settings' => array(
        'displayErrorDetails' => true,
    )
);

$c = new \Slim\Container($slimConf);
$c['notFoundHandler'] = function ($c) {
    return function ($request, $response)  use ($c) {
        return $c['view']
            ->render($response->withStatus(404), "404.php");
    };
};

$c = [
    "userView" => function ($c) {
        $userView = new \Slim\Views\phpRenderer('views/user');
        return $userView;
    },
    "adminView" => function ($c) {
        $adminView = new \Slim\Views\phpRenderer('views/admin');
        return $adminView;
    }
];

$app = new \Slim\App($c);

$init = function (Request $request, Response $response, $next) {
    //////////////////////////////////////////////////////////
    ///////////////////////CHECK CONFIG///////////////////////
    //////////////////////////////////////////////////////////
    if (!file_exists("config.php")) {
        return $response = $response->withRedirect("/config_error.php");
    } else {
        include "config.php";
    }

    //////////////////////////////////////////////////////////
    ////////////////////////DB_CONNECT////////////////////////
    //////////////////////////////////////////////////////////
    try {
        global $db;
        $db = new Medoo([
            'server'        => $config->dbprofile['server'],
            'username'      => $config->dbprofile['username'],
            'password'      => $config->dbprofile['password'],
            'database_name' => $config->dbprofile['database_name'],
            'database_type' => $config->dbprofile['database_type'],
            'charset'       => $config->dbprofile['charset']
        ]);
    } catch (Exception $e) {
        return $response = $response->withRedirect("/db_error.php");
    }

    return $next($request, $response);
};

$login = function (Request $request, Response $response, $next) {
    $user      = new \Admin\ControllerUser();
    $loginPost = $request->getParsedBody();

    if (!empty($loginPost)) {
        $user->login($loginPost);
    }

    if ($user->userInstance->isLoggedIn == false) {
        $response->withRedirect("login");
        $response = $this->adminView->render($response, "/login.php");
        return $response;
    }
    return $next($request, $response);
};

function getControllerObject($params)
{
    $page = false;
    $task = false;

    if (isset($params[0])) {
        $page = array_shift($params);
    }
    if ($page != "video") {
        if (isset($params[0])) {
            $task = array_shift($params);
        }
    }

    $c = false;
    $controllerClass = "Controller" . ucfirst($page);

    if (class_exists($controllerClass)) {
        $c = new $controllerClass($task, $params);
    } else {
        $c = new Controller($page);
    }
    return $c;
}

$app->get('/', function(Request $request, Response $response, $args) {
    return $response = $response->withRedirect("/admin/login");
})->add($login)->add($init);

// $app->any('/admin/login', function(Request $request, Response $response) {

//     $response = $this->adminView->render($response, "/login.php");
//     return $response;
// })->add($init);

$app->group('/admin', function() use ($app) {
    $app->map(["GET", "POST"], '/{page}[/{task}]', function(Request $request, Response $response, $args) {
        $adminRoot = "views/admin/";

        if (isset($args["page"]) && $args["page"] == "logout") {
            $user      = new \Admin\ControllerUser();
            $user->logout();
        }
        // if (isset($args["page"])) {
        //     $page = $args["page"];
        //     if (!file_exists($adminRoot."template_".$page.".php")) {
        //         $response = $this->adminView->render($response, "404.php");
        //         return $response;
        //     }
        // }
        $page = $args["page"];
        if (isset($args["task"])) {
            $task = $args["task"];
            if (!file_exists($adminRoot."template_".$page.".php") && !file_exists($adminRoot."template_".$page."_".$task.".php")) {
                $response = $this->adminView->render($response, "404.php");
                return $response;
            }
        }

        $response = $this->adminView->render($response, "index.php", [
            "page" => $args["page"],
            "task" => $args["task"]
        ]);
        return $response;

    });
})->add($login)->add($init);

$app->run();
