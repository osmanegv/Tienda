
<?php
session_start();
$arreglo=$_SESSION['carrito'];
for($i=0; $i<count($arreglo); $i++){
if($arreglo[$i]['ID']==$_POST['id']){
    $arreglo[$i]['CANTIDAD']=$_POST['Cantidad'];
    $_SESSION['carrito']=$arreglo;
break;
}
}



?>