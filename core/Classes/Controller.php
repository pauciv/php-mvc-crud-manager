<?php

trait Controller {

    public $view;
    public $model; // = new LoginModel; | esta propiedad instancia la clase Model correspondiente

    function __construct() {
        // echo "LoginController __construct() | ";

        $this->view = new View();
        $this->model = $this->loadModel(substr(__CLASS__,0,-10));

        $action = "";

        if (isset($_REQUEST["action"])) {
            $action = $_REQUEST["action"]; // ej: = validLogin
        }

        // ejecuta el método que haya en el action
        if (method_exists(__CLASS__, $action)) {
            call_user_func([__CLASS__, $action], $_REQUEST);
        } else {
            // echo " Controller Error | "; //TODO: require_once VIEWS . "/error/error.php";
            #$this->error("Invalid user action");
        }
    }

    // requiere e instancia el Model correspondiente
    function loadModel($model) {
        // echo " loadModel( $model ) | ";
        $url = MODELS . $model . 'Model.php';

        if (file_exists($url)) {
            // echo " ".$url." | ";
            
            require_once $url;
            $modelName = $model . "Model";
            return new $modelName(); // new LoginModel()
        }
    }

    function error($errorMsg) {
        require_once VIEWS . "/error/error.php";
    }

}

// esto hace exactamente lo mismo pero directamente en un controller concreto, sin aprovechar el mismo código para otros controllers ni comprovar cosas con conficionales 
    
// public $model; // declarada como propiedad para redefinirla a acceder a ella en los métodos.
// public $view;

// public function __construct() {
//     require_once("models/MemberModel.php");
//     $this->model = new MemberModel();

//     $this->view = new View();

//     $action = $_GET["action"];
//     $this->$action($_REQUEST); // he añadido el parámetro $_REQUEST, que es un array de los Query Params.      
// }