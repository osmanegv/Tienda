<?php
$id = null;
$tp = null;
$contador = 0;
include("../sesion/conexion.php");
$resultado = $conex->query("select * from clientes WHERE email_cliente='" . $_POST['email'] . "' 
    AND pass_cliente = '" . $_POST['password'] . "' AND tipo_usuario=2") or die($conex->error);
while ($fila = mysqli_fetch_array($resultado)) {
    $id = $fila['id_cliente'];
    $tp = $fila['tipo_usuario'];
    $contador++;
}

if ($contador > 0) {
    echo "<script> 
        alert ('Successfully login');
        window.location = '/Tienda/index.php';
        </script>";
    session_start();
    $_SESSION['log'] = $id;
    $_SESSION['tp'] = $tp;
} else {
    echo "<script> 
        alert ('Not login');
        window.location = '/Tienda/registro/login.php';
        </script>";
}
?>