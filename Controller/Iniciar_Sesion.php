<?php
//evita redireccion por URL
if(!isset($_SERVER['HTTP_REFERER'])){
    header('Refresh:0; url=index.php');
    exit;
}
    if(isset($_GET["Admin"]) || isset($_GET["User"])){
        if(isset($_GET["Admin"])){
            include "View/Administrador/Pagina_Principal.php";
        }else{
            include "Model/Materias_Model.php";
            $Materia = new materia();
            $Registro_Materias = $Materia->Mostrar_Datos($_GET["User"]);
            include "View/Estudiante/Pagina_Principal.php";
        }
    }else{
        if($_POST){
            include "Model/Usuario_Model.php";
    
            $Usuario = new usuario($_POST["Usuario"],$_POST["Contraseña"],0,0);
            $Row = $Usuario->Iniciar_Sesion();
    
        if(empty($Row[0])){
            header("Refresh:0; url=index.php");
        }else{
           if($Row[0]->Rol == 1){
                    header("Location: http://localhost:80/Codigoteams/?c=Iniciar_Sesion&Admin=true&Page=1");
                }else{
                    header("Location: http://localhost:80/Codigoteams/?c=Iniciar_Sesion&User=".$Row[0]->id);
                }
            }
        }else{
            header("Refresh:0; url=index.php");
        } 
    }



