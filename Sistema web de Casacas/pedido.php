<?php
	session_start();
	if (!isset($_SESSION['DNI'])) {
		header('location: index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mi sistema E-Commerce</title>
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
	<?php include("layouts/_main-header.php"); ?>
	<div class="main-content">
		<div class="content-page">
			<h3>Mis pedidos</h3>
			<div class="body-pedidos" id="space-list">
			</div>
			<h3>Datos de pago</h3>
			<div class="p-line"><div>MONTO TOTAL:</div>S/.&nbsp;<span id="montototal"></span></div>
			<div class="p-line"><div>Banco:</div>BCP</div>
			<div class="p-line"><div>N° de Cuenta:</div>202-45678945-007</div>
			<div class="p-line"><div>Representante:</div>Joao Chávez Salas</div>
			<p><b>NOTA:</b> Para confirmar la compra debe realizar el deposito por le monto total, y enviar el comprobante al siguiente correo joao@gmail.com o al número de whatsapp 931034377</p>
		</div>
	</div>
	<script type="text/javascript" src="js/main-scripts.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$.ajax({
				url:'servicios/pedido/get_procesados.php',
				type:'POST',
				data:{},
				success:function(data){
					console.log(data);
					let html='';
					let monto=0;
					for (var i = 0; i < data.datos.length; i++) {
						html+=
						'<div class="item-pedido">'+
							'<div class="pedido-img">'+
								'<img src="assets/products/'+data.datos[i].imagen+'">'+
							'</div>'+
							'<div class="pedido-detalle">'+
								'<h3>'+data.datos[i].nombre+'</h3>'+
								'<p><b>Precio:</b> S/.'+data.datos[i].precio+'</p>'+
								'<p><b>Fecha:</b> '+data.datos[i].fecha+'</p>'+
								'<p><b>Estado:</b> '+data.datos[i].estadotext+'</p>'+
								'<p><b>Dirección:</b> '+data.datos[i].direccion_envio+'</p>'+
								'<p><b>Celular:</b> '+data.datos[i].telefono_venta+'</p>'+
							'</div>'+
						'</div>';
						if (data.datos[i].estado=="2") {
							monto+=parseFloat(data.datos[i].precio);
						}
					}
					document.getElementById("montototal").innerHTML=monto;
					document.getElementById("space-list").innerHTML=html;
				},
				error:function(err){
					console.error(err);
				}
			});
		});
	</script>
</body>
</html>