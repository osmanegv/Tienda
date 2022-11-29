
<?php 
session_start();
require "conexione.php";
$message='';
if(!empty($_POST["nombre"]) && !empty($_POST["descripcion"]) && !empty($_POST["stock"]) && !empty($_POST["precio"])
&& !empty($_POST["codigo"]) && !empty($_POST["categoria"])){

    $sql="update producto set 
    nombre_producto = :nombre_producto, 
    desc_producto = :desc_producto,
    stock_producto = :stock_producto,
    precio_producto = :precio,
    imagen_producto = :img_producto,
    categoria_producto = :categoria
    WHERE `producto`.`id_producto` = :ide";
    $stmt = $conn ->prepare($sql);
    $stmt->bindParam(':ide',$_POST['buscar']);
    $stmt->bindParam(':nombre_producto',$_POST['nombre']);
    $stmt->bindParam(':desc_producto',$_POST['descripcion']);
    $stmt->bindParam(':stock_producto',$_POST['stock']);
    $stmt->bindParam(':precio',$_POST['precio']);
    $stmt->bindParam(':img_producto',$_POST['codigo']);
    $stmt->bindParam(':categoria',$_POST['categoria']);

    if($stmt->execute()){
        $message= 'Successfully updated';
        echo "<script> 
    alert ('Successfully updated');
    window.location = '../empleado.php';
    </script>";

    }else {
        $message='Error';
        echo "<script> 
        alert ('Error');
        </script>";
    }
}
?>
