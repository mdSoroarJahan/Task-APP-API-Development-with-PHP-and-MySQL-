<?php

namespace Config;

use mysqli;

class Database{
    private $host = "localhost";
    private $db = "task_api";
    private $user = "root";
    private $password = "";
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->db, $this->user, $this->password);
        if($this->conn->connect_error){
            die(json_encode(
                ["error" => "Connection Failed"]
            ));
        }
    }

    public function getFunction(){
        return $this->conn;
    }
}




?>