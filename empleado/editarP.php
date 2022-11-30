<?php

include('../hf/imagenes.php');

session_start();
require "../sesion/conexion.php";

if (
    !empty($_POST["nombre"]) && !empty($_POST["descripcion"]) && !empty($_POST["stock"]) && !empty($_POST["precio"])
    && !empty($_POST["categoria"])
) {
    if ($upload == 1) {
        $sql = "update producto set 
    nombre_producto = :nombre_producto, 
    desc_producto = :desc_producto,
    stock_producto = :stock_producto,
    precio_producto = :precio,
    imagen_producto = :img_producto,
    categoria_producto = :categoria
    WHERE `producto`.`id_producto` = :ide";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':ide', $_POST['buscar']);
        $stmt->bindParam(':nombre_producto', $_POST['nombre']);
        $stmt->bindParam(':desc_producto', $_POST['descripcion']);
        $stmt->bindParam(':stock_producto', $_POST['stock']);
        $stmt->bindParam(':precio', $_POST['precio']);
        $stmt->bindParam(':img_producto', $Filename);
        $stmt->bindParam(':categoria', $_POST['categoria']);

        if ($stmt->execute()) {
            echo "<script> 
alert ('Successfully updated');
window.location = 'empleado.php';
</script>";

        } else {
            echo "<script> 
    alert ('Ha occurrido un error al actualizar el producto');
    window.location = 'empleado.php';
    </script>";
        }
    } else {
        echo "<script> 
alert ('Por favor complete todo el formulario');
window.location = 'empleado.php';
</script>";
    }
} else {
    echo "<script> 
alert ('Por favor complete todo el formulario');
window.location = 'empleado.php';
</script>";
}
?>