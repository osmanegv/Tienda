<?php
session_start();
require "../sesion/conexion.php";


$resultado = $conex->query("select * from producto where id_producto=" . $_POST['buscar'] . "") or die($conex->error);
$fila = mysqli_fetch_array($resultado);

$imagen = '../archivos/img_productos/' . $fila['imagen_producto'];
unlink($imagen);

$sql = "DELETE FROM `producto` WHERE `producto`.`id_producto` = :ide";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':ide', $_POST['buscar']);

if ($stmt->execute()) {
    $message = 'Successfully deleted';
    echo "<script> 
    alert ('Successfully deleted');
    window.location = 'empleado.php';
    </script>";

} else {
    $message = 'Error';
    echo "<script> 
        alert ('Error');
        </script>";
}
?>