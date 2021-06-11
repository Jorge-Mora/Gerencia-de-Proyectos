<?php 
if(isset($err) && $err == false){ ?>
<div style="text-align:center;">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Exito!</strong> Archivo subido correctamente
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
<?php }elseif(isset($err) && $err == true){ ?>
<div style="text-align:center;">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Archivo no subido!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
<?php } ?>
<h2 class="h2" style="margin-top:10px; min-width:550px; text-align:center">Ingresar Materias</h2>

<div class="container main-container contenedor-pagina-secundaria" >
    <form method="POST" action="?c=Ingresar_Materias&Admin=true&Page=2" style="margin-top:80px" enctype="multipart/form-data">
        <div class="form-group row" style="margin-bottom: 80px">
            <label for="Archivo" class="col-sm-5 col-12 text-center text-sm-right" style="color:white;"><strong>Busque su Archivo <i class="d-none d-sm-inline">→</i></strong></label>
            <input type="file" name="archivo" class="form-control-file col-sm-7 col-12" style="margin: 0 auto;" id="Archivo" accept=".xlsx, .xlsm, .xls, .xlt, .xls, .xml" required title="Seleccione el archivo">
        </div>
        <div class="form-group row">
            <div class="col-6 d-flex justify-content-end">
                 <input type="submit" value="Ingresar" class="botones-principales botones-formulario" title="Subir información">
            </div>
            <div class="col-6 d-flex justify-content-start">
                <input type="reset" value="Borrar" class="botones-principales botones-formulario" title="Quitar Archivo">
            </div>
        </div>
    </form>
</div>