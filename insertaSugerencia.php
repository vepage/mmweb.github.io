<?php
include 'idSugerencia.php';
if (isset($_POST['submit'])) {
    if ($_POST['accion']=='insert') {
        $idSugerencia = $_POST['textSugerencia'];
        $idEvento = $_POST['idEvento'];
        $idCl = $_POST['idCliente'];
        if (empty($_POST['textSugerencia'])||empty($_POST['idEvento'])) {
            header('location:index.php');
            echo "Completa los campos";
        }else{
            $pruebas = new Pruebas($idSugerencia,$idEvento,$idCl);
        $pruebas->insert();
        }

    }
}

?>
