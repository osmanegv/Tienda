<?php
session_start();
require "../sesion/conexion.php";
$message = '';
$ide = $_SESSION['log'];
if (!empty($_POST["ciudad"]) && !empty($_POST["direccion2"]) && !empty($_POST["municipio"]) && !empty($_POST["postal"])) {
    $sql = "insert into direccion VALUES (null,:id,:direccion,:municipio,:ciudad, :postal )";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $ide);
    $dir = $_POST['direccion1'] . " " . $_POST['direccion2'];
    $stmt->bindParam(':direccion', $dir);
    $stmt->bindParam(':municipio', $_POST['municipio']);
    $stmt->bindParam(':ciudad', $_POST['ciudad']);
    $stmt->bindParam(':postal', $_POST['postal']);

    if ($stmt->execute()) {
        $message = 'Successfully added';
        echo "<script> 
    alert ('Successfully added');
    window.location = '/Tienda/sesion/cliente.php';
    </script>";

    } else {
        $message = 'Sorry thre must have been an issue creating your address';
        echo "<script> 
        alert ('Sorry thre must have been an issue creating your address');
        </script>";
    }
}
?>