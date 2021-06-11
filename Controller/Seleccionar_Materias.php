<?php
//evita redireccion por URL
if(!isset($_SERVER['HTTP_REFERER'])){
    header('Refresh:0; url=index.php');
    exit;
}

include "Model/Materias_Model.php";
$materias = new materia();
if(isset($_GET["Confirmar"])){
    $Confirmar_Accion = true;
}
if(isset($_GET["Eliminados"])){
    $materias->Eliminar_Materias();
}
$Registros = $materias->Seleccionar_materias();
$i = 0;
if(empty($Registros)){
    $resultado;
}else{
    $resultado = true;
}
include "View/Administrador/Ver_Materias.php";