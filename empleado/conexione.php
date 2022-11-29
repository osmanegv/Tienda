<?php
$_SERVER= "localhost:3307";
$username= "root";
$password= "";
$database= "factor_tecnologia";

$conex = mysqli_connect("localhost:3307","root","","factor_tecnologia"); 

try{
    $conn= new PDO("mysql:host=$_SERVER;dbname=$database",$username,$password);
    //echo "Connected to $database successfully.";
    //echo "<script> 
   // alert ('Conexion exitosa');
  //  </script>";
}catch(PDOException $e){
    die("connected failed:".$e->getMessage());
}


?>