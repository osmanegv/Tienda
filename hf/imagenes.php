<?php

$target_dir = "../archivos/img_productos/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$Filename = basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script> 
        alert ('El archivo no es una imagen');
        </script>";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "<script> 
    alert('El archivo que intenta subir ya existe');
    </script>";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "<script> 
    alert ('El archivo es demasiado grande');
    </script>";
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "<script> 
    alert ('Solo se permitn formatos JPG, PNG y JPEG');
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
        $upload = 1;
    }

}

?>