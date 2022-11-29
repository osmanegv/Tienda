<?php 
session_start();
$arreglo=$_SESSION['carrito'];
for($i=0; $i<count($arreglo); $i++){
    if($arreglo[$i]['ID'] !=$_POST['id']){
        $arregloNuevo[]=array(
            'ID'=>$arreglo[$i]['ID'],
            'NOMBRE'=>$arreglo[$i]['NOMBRE'],
            'PRECIO'=>$arreglo[$i]['PRECIO'],
            'CANTIDAD'=>$arreglo[$i]['CANTIDAD'],
            'IMG'=>$arreglo[$i]['IMG']
        );
        
    }
} 
if(isset($arregloNuevo)){
$_SESSION['carrito']=$arregloNuevo;

}else{
unset($_SESSION['carrito']);

}

 echo "Listo";


?>