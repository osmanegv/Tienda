
<?php 
session_start();
require "../conexion.php";
$message='';
$ide=$_SESSION['log'];
if(!empty($_POST["nom_tarjeta"]) && !empty($_POST["num_tarjeta"]) && !empty($_POST["cvv"])){
    $sql = "insert into metodo_pago VALUES (null,:id,:nom_tarjeta,:num_tarjeta,:cvv_tarjeta )";
    $stmt = $conn ->prepare($sql);
    $stmt->bindParam(':id',$ide);
    $stmt->bindParam(':nom_tarjeta',$_POST['nom_tarjeta']);
    $stmt->bindParam(':num_tarjeta',$_POST['num_tarjeta']);
    $stmt->bindParam(':cvv_tarjeta',$_POST['cvv']);

    if($stmt->execute()){
        $message= 'Successfully added';
        echo "<script> 
    alert ('Successfully added');
    window.location = '../cliente.php';
    </script>";

    }else {
        $message='Sorry thre must have been an issue creating your address';
        echo "<script> 
        alert ('Sorry thre must have been an issue creating your address');
        </script>";
    }
}
?>
