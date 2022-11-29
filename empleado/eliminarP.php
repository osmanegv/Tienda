<?php
session_start();
require "../sesion/conexion.php";


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