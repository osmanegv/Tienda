
<?php
    $id=null;
    $contador=0;
    include("conexione.php");
    $resultado=$conex -> query("select * from empleados WHERE email_empleado='".$_POST['email']."' 
    AND pass_empleado = '".$_POST['password']."'" ) or die($conex ->error);
    while($fila = mysqli_fetch_array($resultado)){
        $id=$fila['id_empleado'];
        $contador++;}

    if($contador>0){
        echo "<script> 
        alert ('Successfully login');
        window.location = '../empleado.php';
        </script>";
        session_start();
        $_SESSION['loge']=$id;
    }else{
        echo "<script> 
        alert ('Not login');
        window.location = 'logine.php';
        </script>";
    }
    ?>
