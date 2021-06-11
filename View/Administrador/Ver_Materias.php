<span class="ir-arriba"><img src="imagenes\Icono-scroll-up.png" width="50" height="50" title="Subir" alt="subir"></span>
<?php if(isset($Confirmar_Accion)){?>
<div style="text-align:center;">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>¿Desea eliminar registros?</strong>
        <div style="margin-top:20px; text-align:center;">
            <a class="btn btn-outline-success" style="margin-right:20px;" href="?c=Seleccionar_Materias&Admin=true&Page=3&Eliminados=true" title="Confirmar Eliminación">Confirmar</a>
            <a class="btn btn-outline-secondary" href="?c=Seleccionar_Materias&Admin=true&Page=3" title="Cancelar Acción">Cancelar</a>
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
<?php  } ?>
<h2 class="h2" style="margin-top:10px; min-width:550px; text-align:center">Materias Ingresadas</h2>
<?php if(isset($resultado)) { ?>
<div class="container main-container ">
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col" style="width: 160px;">Nombre</th>
      <th scope="col">Horario</th>
      <th scope="col" style="width: 100px;">Número grupo</th>
      <th scope="col">Código Teams</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($Registros as $resultados){ ?>
    <tr <?php if($i % 2 == 0){ ?>class="color-primario-columna" <?php }else { ?> class="color-secundario-columna" <?php } ?>>
      <td scope="row" style="text-transform: uppercase;"><?php echo $resultados->Codigo_Curso; ?></td>
      <td style=" text-transform: capitalize;"><?php echo $resultados->Nombre_Curso; ?></td>
      <td><?php echo $resultados->Horario; ?></td>
      <td><?php echo $resultados->Numero_grupo; ?></td>
      <td style="font-size: 16px;"><?php echo $resultados->Codigo_Teams; ?></td>
    </tr>
    <?php $i++; } ?>
  </tbody>
</table>
</div>
<div class="Contenedor-boton-eliminar">
    <a href="?c=Seleccionar_Materias&Admin=true&Page=3&Confirmar=true" class="boton-eliminar-registros" title="Eliminar Registros Actuales">Eliminar Registros</a>
</div>
<?php }else{ ?>
   <p class="lead" style="text-align:center; min-width:550px;">No existen registros actuales.</p>
<?php }?>