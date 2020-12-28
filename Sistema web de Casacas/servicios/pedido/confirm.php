<?php
	session_start();
	$response=new stdClass();
	include_once('../_conexion.php');

	$DNI=$_SESSION['DNI'];
	$direccion_envio=$_POST['direccion_envio'];
	$telefono_venta=$_POST['telefono_venta'];
	$tipopago=$_POST['tipopago'];
	$token=$_POST['token'];

	if ($tipopago==1) {
		$estado=2;
	}else{
		$estado=3;
	}

	$sql="UPDATE venta SET direccion_envio='$direccion_envio',telefono_venta='$telefono_venta',estado=$estado,token='$token'
	where estado=1";
	$result=mysqli_query($con,$sql);
	if ($result) {
		$response->state=true;
	}else{
		$response->state=false;
		$response->detail="No se pudo actualizar el pedido. Intente más tarde";
	}

	mysqli_close($con);
	header('Content-Type: application/json');
	echo json_encode($response);