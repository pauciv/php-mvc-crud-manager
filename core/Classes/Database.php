<?php

// Create connection
class Database
{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;
    private $error;
    
    public function __construct()
    {
        // echo "Database __construct() | ";

        $this->host = HOST;
        $this->db = DB;
        $this->user = USER;
        $this->password = PASSWORD;
        $this->charset = CHARSET;
    }

    function connect()  //se ejecuta en el member o sport model
    {
        // echo "Database connect() | ";

        try {
            $connection = "mysql:host=" . HOST . ";"
                . "dbname=" . DB . ";"
                . "user=" . USER . ";"
                . "password=" . PASSWORD . ";"
                . "charset=" . CHARSET;

            $options = [
                PDO::ATTR_ERRMODE           =>  PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES  => FALSE,
            ];

            $pdo = new PDO($connection, USER, PASSWORD, $options);

            return $pdo;
        } catch (PDOException $e) {
            require_once(VIEWS . "/error/error.php");
            
        }
    }
}
