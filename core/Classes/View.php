<?php

class View {
    public $data;

    function render($name) {
        //echos
            // echo "render( $name ) | ";
            // echo "<br> data = ";
            // echo "<pre>";
            // print_r($this->data);
            // echo "</pre>";

            // if (isset($this->action)) {
            //     echo '$this->action = '.$this->action." | ";
            // }

        require_once VIEWS . $name . ".php";
    }
}
