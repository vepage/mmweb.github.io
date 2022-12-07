<!DOCTYPE html>
<?php $ran = rand(22,99999) ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="imagenes/disenoInicioSesion.css?=<?php $ran ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body>
    <section class="split">
      <div class="login">
        <form action="validarNoAdmin.php" method="post" class="login-div">

          <h1>INICIAR</h1>

          <div class="textbox">
            <i class="fa fa-user" aria-hidden="true"></i>
            <input type="text" name="usuario" value="" placeholder="Nombre de Usuario" required>
          </div>

          <div class="textbox">
            <i class="fa fa-lock"></i>
            <input type="password" name="password" value="" placeholder="Contraseña" required>
          </div>

          <button type="submit" name="entrar" class="btn">Ingresar</button>
          <button type="submit" name="entrarAdmin" class="btn" id="btn-c">Ingresar como administrador</button>

          <div id="volver">

            <br><a class="adm" href="InfoContacto.php">Regresar</a>

          </div>

      </form>
  </div> <!-- WARNING: NTC 1 -->
  <div class="login"></div>
</section>

  </body>
</html>
