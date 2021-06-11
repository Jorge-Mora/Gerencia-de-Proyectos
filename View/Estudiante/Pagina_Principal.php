<?php if(empty($Registro_Materias)) {  ?>
    <h2 class="h2" style="text-align:center; margin-top:20px; min-width:550px;">No Posees Materias Matriculadas Actualmente.</h2>
  <?php } ?>
<div class="container h-100">
  <div class="card-group" style="align-self-center">
<?php
    
      foreach($Registro_Materias as $res){ ?>
        <div class="card" title="<?php echo $res->Nombre_Curso; ?>">
          <div class="card-body">
            <h2 class="card-title"><?php echo $res->Nombre_Curso;?></h2> <br>
            <p class="card-text">Código del curso : <?php echo $res->Codigo_Curso;?> </p> <br>
            <p class="card-text">Número de grupo : <?php echo $res->Numero_grupo;?> </p> <br>
            <p class="card-text">Código de Teams  : <strong><?php echo $res->Codigo_Teams;?></strong> </p><br>
            <p class="card-text">Docente  : <?php echo $res->Docente;?> </p>
          </div>
          <h4 class="card-title" style="text-align:center;" > Horario <?php echo "<p>".$res->Horario."</p>";?></h5>
        </div>
        <?php } ?>
</div>
</div>
<script src="javascript/No_Back_Buttom.js"></script>