<?php

class LoginController {

    use Controller;

    function validLogin() {  
        //echo " validLogin() | ";

        if (isset($_POST["login"])) {      
            $emailInput = $_POST["user-email"];
            $pwdInput = $_POST["user-password"];

            $loginData = $this->model->get($emailInput); // get(): returns the array with the DB data

            //echo 'loginData = ';
            //echo "<pre>";
            //print_r($loginData);
            //echo "</pre>";
        }
        
        if (count($loginData) > 0) { // (sizeof($loginData) > 0)
            //echo "count: ".count($loginData). " | " ;

            $pwdHashedInDb = $loginData[0]["password"];
            $pwdVerify = password_verify($pwdInput, $pwdHashedInDb);

            //echo 'password_verify( '." $pwdHashedInDb, $pwdInput ) -> $pwdVerify <- | ";

            if ($pwdVerify) {
                $_SESSION['email'] = $emailInput;
                $this->view->data = $loginData[0]["name"]; // assignamos el name de la DB data a la propiedad data de la class View
                $this->view->render("main/main");
                
                //echo '$_SESSION = ';
                //print_r($_SESSION);
            } else {
                $errorMsg = "Incorrect password";
                header("Location: index.php?error=2");
                // $this->view->render("login/login"); 
                // require_once VIEWS . "login/login.php?error=2";
                //echo " $errorMsg | ";
            }

        } else {
            $errorMsg = "Email not registered";
            header("Location: index.php?error=1");
            // $this->view->render("login/login");
            // require_once VIEWS . "login/login.php?error=1";
            //echo " $errorMsg | ";
        }
    }

    function closeSession() {
        session_destroy();
        header("Location: index.php");
    }

}
