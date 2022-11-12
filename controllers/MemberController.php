<?php

class MemberController {

    use Controller;
    
    public function getAllMembers() {
        // require_once("models/MemberModel.php"); // AHORA EN EL CONSTRUCT
        // $model = new MemberModel(); // AHORA EN EL CONSTRUCT
        $members = $this->model->get();
        
        //me traigo la view/member/membersDashboard, se lee aki
        #require_once("views/member/membersDashboard.php");

        if (isset($members)) {
            require_once("views/member/membersDashboard.php");
        }
    }
    
    function getMember($request) {
        // este método se usa en update para seleccionar el Member que hemos clicado según el id (el método se ejecuta en Query Param al clicar el link edit)
        //echos
            // echo " getMember( ";
            // print_r($request);
            // echo " ) | ";

        $member = null;
        if (isset($request["id"])) {
            $member = $this->model->getById($request["id"]);
        }


        // $sports = $this->model->getAllSports();

        $this->view->action = $request["action"]; // = getMember
        $this->view->data = $member;
        // $this->view->sports = $sports;
        $this->view->render("member/member");
    }

    function updateMember($request) { 
        // este método se ejecuta según el action Query Param (cuando está seteado el id al enviar el form de member.php)
        //echos
            //echo " updateMember( ";
           // echo "<pre>";
            //print_r($request);
            //echo "</pre>";
            //echo " ) | ";

        if (count($_POST) > 0) {
            //print_r($_POST);
            //echo " | ";

            $member = $this->model->update($_POST); // los datos de $_POST vienen del form de member.php
            // $member recibe un true o false del return del método update de MemberModal.php

            if ($member[0]) { // si update return true
                // echo $member[0];
                header("Location: index.php?controller=Member&action=getAllMembers");
            } else {
                // echo "Incorrect data";
                // estas propiedades se utilizan para validar el update en membersDashboard.php
                $this->action = $request["action"];
                $this->error = "The data entered is incorrect, check that there is no other employee with that email.";
                $this->view->render("member/member");
            }

        } else {
            $this->view->render("member/member");
        }
    }

    function createMember($request) {
        if (sizeof($_POST) > 0) {
            $member = $this->model->create($_POST);

            if ($member[0]) {
                header("Location: index.php?controller=Member&action=getAllMembers");
            } else {
                echo $member[1];
            }
        } else {
            $this->view->action = $request["action"];
            $this->view->render("member/member");
        }
    }

    public function deleteMember($request)
    {
        $action = $request["action"];
        $member = null;
        if (isset($request["id"])) {
            $member = $this->model->delete($request["id"]);
            header("Location: index.php?controller=Member&action=getAllMembers");
        }

    }
    
}
