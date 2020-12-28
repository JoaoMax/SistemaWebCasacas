<?php
//1: Error de conexion
//2: Email invalido
//3: Contraseña incorrecta
include('_conexion.php');
$Correo_usuario=$_POST['Correo_usuario'];
$sql="SELECT * FROM Correo_usuario c
INNER JOIN Usuario u
ON u.DNI = c.DNI_usuario 
WHERE Correo_usuario='$Correo_usuario'";
$result=mysqli_query($con,$sql);
if ($result) {
	$row=mysqli_fetch_array($result);
	$count=mysqli_num_rows($result);
	if ($count!=0) {
		$password=$_POST['password'];
		if ($row['password']!=$password) {
			header('Location: ../login.php?e=3');
		}else{
			session_start();
			$_SESSION['DNI']=$row['DNI'];
			$_SESSION['Correo_usuario']=$row['Correo_usuario'];
			$_SESSION['Nombre_usuario']=$row['Nombre_usuario'];
			header('Location: ../');
		}
	}else{
		header('Location: ../login.php?e=2');
	}
}else{
	header('Location: ../login.php?e=1');
}