<?php

class Router {
    function __construct() {   
        session_start();

        if (isset($_GET['controller'])) {
            //controller=member
            $controllerName = $_GET['controller'] . "Controller";
            $controllerPath = CONTROLLERS . $controllerName . ".php";
            $fileExists = file_exists($controllerPath);

            if ($controllerName === "LoginController" && !isset($_SESSION["email"])) {
                if ($fileExists) {
                    require_once $controllerPath;
                    $controller = new $controllerName();
                } /* else {
                    $errorMsg = "The session is not started";
                    require_once VIEWS . "error/error.php";
                } */
            } else if (isset($_SESSION["email"])) {
                if ($fileExists) {
                    require_once $controllerPath;
                    $controller = new $controllerName(); // será cualquier controller menos el LoginController, es decir que se saltará la página del login
                } else {
                    $errorMsg = "The page you are trying to access does not exist.";
                    require_once VIEWS . "error/error.php";
                }
            }

        } else if (isset($_SESSION["email"])) {
            require_once VIEWS . "main/main.php";

        } else {
            require_once VIEWS . "login/login.php";
        }
    }
}
