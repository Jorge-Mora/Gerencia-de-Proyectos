<?php
if(isset($_GET["Admin"])){
    include "View/Administrador/footer.php";
}elseif(isset($_GET["User"])){
    include "View/Estudiante/footer.php";
}