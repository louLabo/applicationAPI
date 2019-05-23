<?php

class Database{
  // specify your own database credentials

  private $host;
  private $db_name ;
  private $username;
  private $password;
  public $conn;

  public function __construct(){

      // Configurez votre database ici
      // Ne touchez à rien d'autre sur ce fichier.
//***********************************************************
      $this->host = "localhost";
      $this->db_name = "dump";
      $this->username = "root";
      $this->password = "";
//***********************************************************

    }


    // get the database connection
    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>