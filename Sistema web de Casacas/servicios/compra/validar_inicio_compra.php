<?php
session_start();
$response=new stdClass();

if (!isset($_SESSION['DNI'])) {
	$response->state=false;
	$response->detail="No esta logeado";
	$response->open_login=true;
}else{
	include_once('../_conexion.php');
	$DNI=$_SESSION['DNI'];
	$ID_casaca=$_POST['ID_casaca'];
	$sql="INSERT INTO venta
	(DNI_usuario_venta,ID_casaca_venta,fecha,estado,direccion_envio,telefono_venta)
	VALUES
	($DNI,$ID_casaca,now(),1,'','')";
	$result=mysqli_query($con,$sql);
	if ($result) {
		$response->state=true;
		$response->detail="Producto agregado";
	}else{
		$response->state=false;
		$response->detail="No se pudo agregar producto. Intente más tarde";
	}
	mysqli_close($con);
}

header('Content-Type: application/json');
echo json_encode($response);