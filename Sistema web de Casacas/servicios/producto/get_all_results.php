<?php
include('../_conexion.php');
$response=new stdClass();

//$datos=array();
$datos=[];
$i=0;
$text=$_POST['text'];
$sql="select * from casaca where estado=1 and nombre LIKE '%$text%'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
	$obj=new stdClass();
	$obj->ID_casaca=$row['ID_casaca'];
	$obj->talla=$row['talla'];
	$obj->nombre=$row['nombre'];
	$obj->sexo=$row['sexo'];
	$obj->precio=$row['precio'];
	$obj->imagen=$row['imagen'];
	$obj->estado=$row['estado'];
	$obj->ID_stock_casaca=$row['ID_stock_casaca'];
	$datos[$i]=$obj;
	$i++;
}
$response->datos=$datos;

mysqli_close($con);
header('Content-Type: application/json');
echo json_encode($response);
