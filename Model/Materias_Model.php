<?php
include "Model/connection.php";
include "Model/Matricula_Model.php";
class materia {
  private $id;
  public $Codigo_Curso;
  public $Nombre_Curso;
  public $Horario;
  public $Numero_grupo;
  public $Codigo_Teams;
  public $Docente;
  public $Estado;
  
  
  public function __construct($pCodigo_Curso = "", $pNombre_Curso = "",$pHorario="",$pNumero_grupo="" ,$pCodigo_Teams = "", $pDocente = "",$pEstado ="" ,$pid = 0) {
    $this->id = $pid;
    $this->Codigo_Curso = $pCodigo_Curso;
    $this->Nombre_Curso = $pNombre_Curso;
    $this->Horario = $pHorario;
    $this->Numero_grupo = $pNumero_grupo;
    $this->Codigo_Teams = $pCodigo_Teams;
    $this->Docente = $pDocente;
    $this->Estado = $pEstado;
  }
/**
 * @param $Archivo el archivo excel que se ingreso.
 * Genera el proceso para guardar el archivo en el almacenamiento local del sistema.
 * return del resultado de dicha accion.
 * 
 */
  public function Guardar_Archivo($Archivo){
    $rutaDeSubidas = "Excel_Oficial";

    if (!is_dir($rutaDeSubidas)) {
         mkdir($rutaDeSubidas, 0777, true);
    }

    $informacionDelArchivo = $Archivo;
    $ubicacionTemporal = $informacionDelArchivo["tmp_name"];
if($informacionDelArchivo["name"] != "Excel_Materias.xlsx"){
  $resultado = false;
}else{
    $nombreArchivo = "Informacion_Oficial_Materias.xlsx";
    $nuevaUbicacion = $rutaDeSubidas . "/" . $nombreArchivo;
    $resultado = move_uploaded_file($ubicacionTemporal, $nuevaUbicacion);
}
  return $resultado;
}
/**
 * Ingresa las materias de la clase creada a la base de datos.
 * 
 */
  public function Ingresar_Materia(){
    try{
        $sql = "INSERT INTO materias(Codigo_Curso, Nombre_Curso, Horario, Numero_grupo,Codigo_Teams,Docente,Estado) "
          . "VALUES ('$this->Codigo_Curso' , '$this->Nombre_Curso', '$this->Horario', '$this->Numero_grupo', '$this->Codigo_Teams','$this->Docente','$this->Estado')";
      $pdo = new connection();
      $pdo = $pdo->connect();
      return $pdo->query($sql);
      } catch (PDOException $ex) {
        echo $ex->getMessage();
      }
  }
/**
 * Selecciona las materias de la base de datos.
 * 
 */
public function Seleccionar_materias(){
    $rows = [];
    try{
      $sql = "SELECT Codigo_Curso, Nombre_Curso, Horario, Numero_Grupo, Codigo_Teams FROM materias";
      $pdo = new connection();
      $pdo = $pdo->connect();
      $result = $pdo->query($sql);
      foreach ($result->fetchAll() as $value){
        $rows [] = new materia($value['Codigo_Curso'], $value['Nombre_Curso'],$value['Horario'], $value['Numero_Grupo'], $value['Codigo_Teams']);
      }
    } catch (PDOException $ex) {
      die($ex->getMessage());
    }
    return $rows;
}
/**
 * Selecciona una materia basandonos en su Codigo.
 * 
 */
public function Buscar_materia(){
  $rows = [];
  try{
    $sql = "SELECT Nombre_Curso FROM materias where Codigo_Curso ='$this->Codigo_Curso' and Horario = '$this->Horario' and Docente = '$this->Docente'";
    $pdo = new connection();
    $pdo = $pdo->connect();
    $result = $pdo->query($sql);
    foreach ($result->fetchAll() as $value){
      $rows [] = new materia(" ", $value['Nombre_Curso']);
    }
  } catch (PDOException $ex) {
    die($ex->getMessage());
  }
  return $rows;
}
/**
 * @param $id_Estudiante el identificador del estudiante.
 * Selecciona la informacion de una materia en especifico que este en la tabla de matriculas.
 * return la informacion de esas materias.
 * 
 */
public function Mostrar_Datos($id_Estudiante){
  $row = [];
  $Matricula = new matricula();
  $Rows_Matricula = $Matricula->BuscarMaterias($id_Estudiante);   
 foreach($Rows_Matricula as $Valor){
   try {
    $sql = "SELECT * FROM materias where id='$Valor->id_Materia'";
    $pdo = new connection();
    $pdo = $pdo->connect();
    $result = $pdo->query($sql);
    foreach ($result->fetchAll() as $value){
      $row [] = new materia($value['Codigo_Curso'],$value['Nombre_Curso'],$value['Horario'],$value['Numero_Grupo'],$value['Codigo_Teams'],$value['Docente'],$value['Estado'],$value['id']);
    }
  } catch (PDOException $exc) {
    die($ex->getMessage());
  }
}
  return $row;
}
/**
 * Actualiza la informacion de la materia en la base de datos.
 * 
 *  */
public function Actualizar_Materia(){
  $sql = "UPDATE materias SET Nombre_Curso = '$this->Nombre_Curso', Horario = '$this->Horario', Numero_Grupo = '$this->Numero_grupo', Codigo_Teams = '$this->Codigo_Teams' , Docente = '$this->Docente', Estado = '$this->Estado' where Codigo_Curso = '$this->Codigo_Curso'";
  $pdo = new connection();
  $pdo = $pdo->connect();
  return $pdo->query($sql);
}
/**
 * Elimina las materias de la tabla materias en la base de datos.
 * 
 */
  public function Eliminar_Materias(){
    $sql = "DELETE from materias where id NOT in(select id_Materia from matricula)";
    $pdo = new connection();
    $pdo = $pdo->connect();
    return $pdo->query($sql);
  }
/**
   * @param $name nombre de la variable de la clase
   * devuelve el attributo de la clase materias.
   * 
   */
  public function get_attribute($name){
    try {
      return $this->$name;
    } catch (Exception $ex) {
      return NULL;
    }
  }
/**
   * @param $name nombre de la variable de la clase
   * @param $valor el valor que se le quiere asignar a esa variable
   * Asigna el valor deseado a la variable de la clase materia.
   * 
   */
public function set_attribute($name, $valor){
    try {
        $this->$name = $valor;
    } catch (Exception $ex) {
      return NULL;
    }
  }

}



