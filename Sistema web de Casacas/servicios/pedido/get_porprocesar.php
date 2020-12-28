<?php
include('../_conexion.php');
$response=new stdClass();

function estado2texto($id){
	switch ($id) {
		case '1':
			return 'Por procesar';
			break;
		case '2':
			return 'Por pagar';
			break;
		default:
			break;
	}
}

$datos=[];
$i=0;
$sql="select *,v.estado estadoventa from venta v
inner join casaca c
on v.ID_casaca_venta=c.ID_casaca
where v.estado=1";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
	$obj=new stdClass();
	$obj->ID_venta=$row['ID_venta'];
	$obj->ID_casaca=$row['ID_casaca'];
	$obj->nombre=utf8_encode($row['nombre']);
	$obj->precio=$row['precio'];
	$obj->imagen=$row['imagen'];
	$obj->fecha=$row['fecha'];
	$obj->direccion_envio=utf8_encode($row['direccion_envio']);
	$obj->telefono_venta=$row['telefono_venta'];
	$obj->estado=estado2texto($row['estadoventa']);
	$datos[$i]=$obj;
	$i++;
}
$response->datos=$datos;

mysqli_close($con);
header('Content-Type: application/json');
echo json_encode($response);
