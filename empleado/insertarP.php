<?php

$target_dir = "../archivos/img_productos/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script> 
        alert ('El archivo no es una imagen - " . $check["mime"] . ".');
        window.location = 'empleado.php';
        </script>";
        $uploadOk = 0;
    }
}


// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "<script> 
    alert ('El archivo es demasiado grande');
    window.location = 'empleado.php';
    </script>";
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "<script> 
    alert ('Solo estan permitidos archivos JPG, JPEG y PNG');
    window.location = 'empleado.php';
    </script>";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<script> 
    alert ('El archivo no se ha subido');
    window.location = 'empleado.php';
    </script>";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<script> 
    alert ('El archivo ha sido subido');
    </script>";
    } else {
        echo "<script> 
    alert ('El archivo no se ha subido');
    window.location = 'empleado.php';
    </script>";
    }
}

session_start();
require "../sesion/conexion.php";
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
}
?>