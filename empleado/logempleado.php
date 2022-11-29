<?php
$id = null;
$contador = 0;
include("../sesion/conexion.php");
$resultado = $conex->query("select * from clientes WHERE email_cliente='" . $_POST['email'] . "' 
    AND pass_cliente = '" . $_POST['password'] . "' AND tipo_usuario=1") or die($conex->error);
while ($fila = mysqli_fetch_array($resultado)) {
    $id = $fila['id_cliente'];
    $tp = $fila['tipo_usuario'];
    $contador++;
}

if ($contador > 0) {
    echo "<script> 
        alert ('Successfully login');
        window.location = 'empleado.php';
        </script>";
    session_start();
    $_SESSION['log'] = $id;
    $_SESSION['tp'] = $tp;
} else {
    echo "<script> 
        alert ('Not login');
        window.location = 'logine.php';
        </script>";
}
?>