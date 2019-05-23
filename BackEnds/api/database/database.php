<?php
class Database{
  private $servername = "sql3.freemysqlhosting.net";
  private $username = "sql3292759";
  private $password = "PclrmNIUKB";
  private $databaseName = "sql3292759";

  public $conn;

  public function getConnection(){
    $this->conn = null;
    try{
      $this->conn = mysqli_connect($this->servername,$this->username, $this->password,$this->databaseName);
    } catch(Exception $e){
      echo "Connection Failed";
    }


  return $this->conn;
}
}
  ?>
