<?php
include_once "Model/connection.php";

class matricula {
  public $id_Estudiante;
  public $id_Materia;
  
  
  public function __construct($pid_Estudiante = "", $pid_Materia = "") {
    $this->id_Estudiante = $pid_Estudiante;
    $this->id_Materia = $pid_Materia;
  }
/**
 * @param $id_Estudiante
 * 
 * busca los ids de las materias matriculadas por el estudiante con el $id_Estudiante
 * pasado por parametros y las devuelve.
 *  */  
public function BuscarMaterias($id_Estudiante){
    $rows_Matricula = [];
    try {
      $sql = "SELECT * FROM matricula where id_Estudiante = $id_Estudiante  ";
      $pdo = new connection();
      $pdo = $pdo->connect();
      $result = $pdo->query($sql);
      foreach ($result->fetchAll() as $value){
        $rows_Matricula [] = new matricula ("",$value['id_Materia']);
      }
    } catch (PDOException $exc) {
      die($ex->getMessage());
    }
    return $rows_Matricula;

}

}