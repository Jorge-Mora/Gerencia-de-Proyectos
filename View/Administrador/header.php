<header class="container-fluid">
        <nav class="navbar navbar-expand-sm navbar-expand-md navbar-expand-xl-12" >
            <div class="navbar-brand">
                <img src="imagenes\Logo_Universidad.png" width="197" height="41" alt="Logo" loading="lazy">
            </div>
            <a class="navbar-brand" href="?c=Iniciar_Sesion&Admin=true&Page=1" <?php if($_GET["Page"] == 1){echo "style='font-size:24px;text-decoration-line: underline;' title='Estas en el Inicio'";}else{ echo "title='Volver al Incio'";} ?> >Inicio</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="btn btn-outline-info">...Mas</span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link"  href="?c=Ingresar_Materias&Admin=true&Page=2" <?php if($_GET["Page"] == 2){echo "style='font-size:18px; text-decoration-line: underline;' title='Estas en Gestionar Materias'";}else{ echo "title='Ir a Gestionar Materias'";} ?>>Gestionar Materias<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"  href="?c=Seleccionar_Materias&Admin=true&Page=3" <?php if($_GET["Page"] == 3){echo "style='font-size:18px; text-decoration-line: underline;' title='Estas Viendo Materias Actuales'";}else{ echo "title='Ver Materias Actuales'";} ?>>Ver Materias Ingresadas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"  href="index.php" title="Cerrar Sesion">Cerrar Sesión</a>
                </li>
              </ul>
            </div>
          </nav>
   </header>