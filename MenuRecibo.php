<!DOCTYPE html>
<?php $ran = rand(22,99999) ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="imagenes/disenoMenuAdmin.css?t=<?php $ran ?>">
  </head>
  <body>

    <div class="general">

        <div class="contenedorOpciones">

          <h1>ADMINISTRAR RECIBOS</h1>
            <div class="opcion">
              <a href="recibo.php">
                <input class="btn" type="button" name="agregar" value="AGREGAR">
              </a>
            </div>

            <div class="opcion">
              <a href="recibos.php">
                <input class="btn" type="button" name="modificar" value="MODIFICAR">
              </a>
            </div>

            <div class="opcion">
                <a href="recibos.php">
                  <input  class="btn" type="button" name="eliminar" value="ELIMINAR">
                </a>
            </div>

            <a href="menuAdmin.php">Volver</a>

        </div>

    </div>

    </body>
</html>
