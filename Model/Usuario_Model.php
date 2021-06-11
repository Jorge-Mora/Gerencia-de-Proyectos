<?php
include "Model/connection.php";
class usuario {
  public $id;
  public $Usuario;
  public $Contraseña;
  public $Rol;
  
  
  public function __construct($pUsuario = "", $pContraseña = "",$pRol=0 ,$pid = 0) {
    $this->id = $pid;
    $this->Usuario = $pUsuario;
    $this->Contraseña = $pContraseña;
    $this->Rol = $pRol;
  }
  /**
   * 
   * Valida los datos de iniciar sesion para ver si el usuario ingresado existe.
   * 
   */
  public function Iniciar_Sesion(){
    $rows = [];
    try {
      $sql = "SELECT * FROM usuarios where Usuario ='$this->Usuario' and Contrasena = '$this->Contraseña'";
      $pdo = new connection();
      $pdo = $pdo->connect();
      $result = $pdo->query($sql);
      foreach ($result->fetchAll() as $value){
        $rows [] = new usuario($value['Usuario'],$value['Contrasena'],$value['Administrador'],$value['id']);
      }
    } catch (PDOException $exc) {
      die($ex->getMessage());
    }
    return $rows;
  }
/**
   * @param $name nombre de la variable de la clase
   * devuelve el attributo de la clase usuario.
   * 
   */
  public function get_attribute($name){
    try {
      return $this->$name;
    } catch (Exception $ex) {
      return NULL;
    }
  }

}


