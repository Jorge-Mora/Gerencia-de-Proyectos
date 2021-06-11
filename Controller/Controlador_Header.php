<?php
    if(isset($_GET["Admin"])){
        include "View/Administrador/header.php";
    }elseif(isset($_GET["User"])){
        include "View/Estudiante/header.php";
    }