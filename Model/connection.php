<?php
include "Model/database.php";
class connection { 
  private $std;
  
  public function __construct() { 
    $this->std = "mysql:dbname=".DB_NAME; 
  }
  public function connect(){ 
    try{
      return new PDO($this->std, DB_USER, DB_PASSWORD); 
    } catch (PDOException $ex) {
      echo("Error en la funcion ". __FUNCTION__." del archivo ".__FILE__." el error es: ". $ex->getMessage());
    }
    return null; 
  }
}