<?php

include('../hf/imagenes.php');

session_start();
require "../sesion/conexion.php";
if (
    !empty($_POST["nombre"]) && !empty($_POST["descripcion"]) && !empty($_POST["stock"]) && !empty($_POST["precio"])
    && !empty($_POST["categoria"])
) {

    if ($upload == 1) {
        $sql = "insert into producto VALUES (null,:nombre_producto,:desc_producto,:stock_producto,:precio, :img_producto, :categoria )";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre_producto', $_POST['nombre']);
        $stmt->bindParam(':desc_producto', $_POST['descripcion']);
        $stmt->bindParam(':stock_producto', $_POST['stock']);
        $stmt->bindParam(':precio', $_POST['precio']);
        $stmt->bindParam(':img_producto', $Filename);
        $stmt->bindParam(':categoria', $_POST['categoria']);

        if ($stmt->execute()) {
            echo "<script> 
    alert ('Successfully added');
    window.location = 'empleado.php';
    </script>";

        } else {
            echo "<script> 
        alert ('Ha occurrido un error al agregar el producto');
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