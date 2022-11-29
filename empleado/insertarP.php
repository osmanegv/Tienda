<?php
session_start();
require "../sesion/conexion.php";
$message = '';
if (
    !empty($_POST["nombre"]) && !empty($_POST["descripcion"]) && !empty($_POST["stock"]) && !empty($_POST["precio"])
    && !empty($_POST["codigo"]) && !empty($_POST["categoria"])
) {
    $sql = "insert into producto VALUES (null,:nombre_producto,:desc_producto,:stock_producto,:precio, :img_producto, :categoria )";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre_producto', $_POST['nombre']);
    $stmt->bindParam(':desc_producto', $_POST['descripcion']);
    $stmt->bindParam(':stock_producto', $_POST['stock']);
    $stmt->bindParam(':precio', $_POST['precio']);
    $stmt->bindParam(':img_producto', $_POST['codigo']);
    $stmt->bindParam(':categoria', $_POST['categoria']);

    if ($stmt->execute()) {
        $message = 'Successfully added';
        echo "<script> 
    alert ('Successfully added');
    window.location = 'empleado.php';
    </script>";

    } else {
        $message = 'Ha occurrido un error al agregar el producto';
        echo "<script> 
        alert ('Ha occurrido un error al agregar el producto');
        window.location = 'empleado.php';
        </script>";
    }
}
?>