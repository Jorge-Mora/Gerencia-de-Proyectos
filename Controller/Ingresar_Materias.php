<?php
//evita redireccion por URL
if(!isset($_SERVER['HTTP_REFERER'])){
    header('Refresh:0; url=index.php');
    exit;
}
   require_once "vendor/autoload.php";
    use PhpOffice\PhpSpreadsheet\IOFactory;
if($_FILES){
 include "Model/Materias_Model.php";
/*Guardando materias en la app*/
 $materias = new materia();
 $err = false;
 if($materias->Guardar_Archivo($_FILES["archivo"])== false){
     $err = true;
 }else{
/*Guardando materias en la BD */
$rutaArchivo = "Excel_Oficial/Informacion_Oficial_Materias.xlsx";
$documento = IOFactory::load($rutaArchivo);

$totalDeHojas = $documento->getSheetCount();

   $hojaActual = $documento->getSheet(0);
   $materia = new materia();
   $Primera_fila = true;
   foreach($hojaActual->getRowIterator() as $fila){
       foreach($fila->getCellIterator() as $celda){
            $valor = $celda->getValue();
            $fila = $celda->getRow();
            $columna = $celda->getColumn();
          
            if($valor != "" && $fila != 1){
                $Primera_fila = false;
                if($columna == "A"){
                    $materia->set_attribute('Codigo_Curso', $valor);
                }elseif($columna == "B"){
                    $materia->set_attribute('Nombre_Curso', $valor);
                }elseif($columna == "C"){
                    $materia->set_attribute('Horario', $valor);
                }elseif($columna == "D"){
                    $materia->set_attribute('Numero_grupo', $valor);
                }elseif($columna == "E"){
                    $materia->set_attribute('Codigo_Teams', $valor);
                }elseif($columna == "F"){
                    $materia->set_attribute('Docente', $valor);
                }else{
                    $materia->set_attribute('Estado', $valor);
                }
            }
       }
       if($Primera_fila == false){
        if(empty($materia->Buscar_materia()[0])){
            $materia->Ingresar_Materia();
        }else{
            $materia->Actualizar_Materia();
        }
       }
       
   }
 } 
/*----------------------------------------------------------------- */

 include "View/Administrador/Gestionar_Materias.php";
   
}else{
    include "View/Administrador/Gestionar_Materias.php";
 }
