<?php
include('../_conexion.php');
$response=new stdClass();

session_start();
$DNI=$_SESSION['DNI'];
$datos=[];
$i=0;
$sql="select v.*, c.*,
CASE WHEN v.estado=2 THEN
	'POR PAGAR'
ELSE 
	CASE WHEN v.estado=3 THEN
		'POR ENTREGAR'
	ELSE
		'OTRO'
	END
END estadotxt
from venta v
inner join casaca c
on v.ID_casaca_venta=c.ID_casaca
where v.DNI_usuario_venta=$DNI";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
	$obj=new stdClass();
	$obj->talla=$row['talla'];
	$obj->nombre=utf8_decode($row['nombre']);
	$obj->sexo=$row['sexo'];
	$obj->fecha=$row['fecha'];
	$obj->direccion_envio=$row['direccion_envio'];
	$obj->telefono_venta=$row['telefono_venta'];
	$obj->estado=$row['estadotxt'];	
	$obj->precio=$row['precio'];
	$obj->imagen=$row['imagen'];
	$datos[$i]=$obj;
	$i++;
}
$response->datos=$datos;

mysqli_close($con);
header('Content-Type: application/json');
echo json_encode($response);
