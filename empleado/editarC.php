
<?php 
session_start();
require "conexione.php";
$message='';
if(!empty($_POST["nombre"]) && !empty($_POST["email"]) && !empty($_POST["pass"])){

    $sql="update clientes set 
    nombre_cliente = :nombre, 
    email_cliente = :email,
    pass_cliente = :pass
    WHERE `clientes`.`id_cliente` = :ide";
    $stmt = $conn ->prepare($sql);
    $stmt->bindParam(':ide',$_POST['buscar']);
    $stmt->bindParam(':nombre',$_POST['nombre']);
    $stmt->bindParam(':email',$_POST['email']);
    $stmt->bindParam(':pass',$_POST['pass']);

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
