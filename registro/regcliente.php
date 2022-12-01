<?php

require "../sesion/conexion.php";
$message = '';
if (!empty($_POST["nombre_cliente"]) && !empty($_POST["email_cliente"]) && !empty($_POST["pass_cliente"])) {
    $sql = "insert into clientes (tipo_usuario, nombre_cliente, email_cliente, pass_cliente) VALUES (2,:nombre_cliente,:email_cliente,:pass_cliente )";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre_cliente', $_POST['nombre_cliente']);
    $stmt->bindParam(':email_cliente', $_POST['email_cliente']);
    $stmt->bindParam(':pass_cliente', $_POST['pass_cliente']);

    if ($stmt->execute()) {
        $message = 'Successfully created new user';
        $resultado = $conex->query("select * from clientes WHERE email_cliente='" . $_POST['email_cliente'] . "' 
    AND pass_cliente = '" . $_POST['pass_cliente'] . "'") or die($conex->error);
        while ($fila = mysqli_fetch_array($resultado)) {
            $id = $fila['id_cliente'];
        }

        echo "<script> 
    alert ('Successfully created new user');
    window.location = '/Tienda/index.php';
    </script>";
        session_start();
        $_SESSION['log'] = $id;
        $_SESSION['tp'] = 2;
    } else {
        $message = 'Sorry thre must have been an issue creating your password';
        echo "<script> 
        alert ('Sorry thre must have been an issue creating your password');
        window.location = 'registro.php';
        </script>";
    }
}
?>