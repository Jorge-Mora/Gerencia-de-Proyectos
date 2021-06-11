<script src="javascript/No_Back_Buttom.js"></script>
<link rel = 'stylesheet' href='CSS/style_Login.css'>
<body   background="Imagenes\Logo_Login.png" >

<div class="wrapper fadeInDown">
<img src="Imagenes\logo_ulatina_1.png" alt="Logo" />
  <div id="formContent">
    

    <!-- Login Form -->
<form method="POST" action="?c=Iniciar_Sesion">
<label> Correo electrónico </label>
<input type="text" name="Usuario"  placeholder="Usuario" required>
<br>
<label>Contraseña </label>
<input type="password" name="Contraseña"  placeholder="Contraseña" required>
<br>
<input type="submit" value="Ingresar">
</form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="https://campus.ulatina.ac.cr/Login/Paginas/login.aspx#no-back-button">Olvidó su Contraseña?</a>
    </div>

  </div>
</div>
