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
			<h3>Mi carrito</h3>
			<div class="body-pedidos" id="space-list">
			</div>
			<input class="ipt-procom" type="text" id="direccion_envio" placeholder="Dirección">
			<br>
			<input class="ipt-procom" type="text" id="telefono_venta" placeholder="Celular">
			<br>
			<h4>Tipos de pago</h4>
			<div class="metodo-pago">
				<input type="radio" name="tipopago" value="1" id="tipo1">
				<label for="tipo1">Pago por transferencia</label>
			</div>
			<div class="metodo-pago">
				<input type="radio" name="tipopago" value="2" id="tipo2">
				<label for="tipo2">Pago con tarjeta de crédito/débito</label>
			</div>
			<button onclick="procesar_compra()" style="margin-top: 5px;">Procesar compra</button>
		</div>
	</div>
	<script type="text/javascript" src="js/main-scripts.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$.ajax({
				url:'servicios/pedido/get_porprocesar.php',
				type:'POST',
				data:{},
				success:function(data){
					console.log(data);
					let html='';
					let sumaMonto=0;
					for (var i = 0; i < data.datos.length; i++) {
						html+=
						'<div class="item-pedido">'+
							'<div class="pedido-img">'+
								'<img src="assets/products/'+data.datos[i].imagen+'">'+
							'</div>'+
							'<div class="pedido-detalle">'+
								'<h3>'+data.datos[i].nombre+'</h3>'+
								'<p><b>Precio:</b> S/ '+data.datos[i].precio+'</p>'+
								'<p><b>Fecha:</b> '+data.datos[i].fecha+'</p>'+
								'<p><b>Estado:</b> '+data.datos[i].estado+'</p>'+
								'<p><b>Dirección:</b> '+data.datos[i].direccion_envio+'</p>'+
								'<p><b>Celular:</b> '+data.datos[i].telefono_venta+'</p>'+
							'</div>'+
						'</div>';
						sumaMonto+=parseInt(data.datos[i].precio)+1;
					}
				    Culqi.settings({
				        title: 'Mi tienda',
				        currency: 'PEN',
				        description: 'Casacas',
				        amount: sumaMonto
				    });
					document.getElementById("space-list").innerHTML=html;
				},
				error:function(err){
					console.error(err);
				}
			});
		});
		function procesar_compra(){
			let direccion_envio=document.getElementById("direccion_envio").value;
			let telefono_venta=$("#telefono_venta").val();
			let tipopago=1;
			if (document.getElementById("tipo2").checked) {
				tipopago=2;
			}
			if (direccion_envio=="" || telefono_venta=="") {
				alert("Complete los campos");
			}else{
				if (!document.getElementById("tipo1").checked &&
					!document.getElementById("tipo2").checked) {
					alert("Seleccione un método de pago!");
				}else{
					if (tipopago==2) {
						Culqi.open();
					}else{
						$.ajax({
							url:'servicios/pedido/confirm.php',
							type:'POST',
							data:{
								direccion_envio:direccion_envio,
								telefono_venta:telefono_venta,
								tipopago:tipopago,
								token:''
							},
							success:function(data){
								console.log(data);
								if (data.state) {
									window.location.href="pedido.php";
								}else{
									alert(data.detail);
								}
							},
							error:function(err){
								console.error(err);
							}
						});
					}
				}
			}
		}
		function culqi() {
			if (Culqi.token) { 
		      	var token = Culqi.token.id;
		      	$.ajax({
					url:'servicios/pedido/confirm.php',
					type:'POST',
					data:{
						direccion_envio:document.getElementById("direccion_envio").value,
						telefono_venta:$("#telefono_venta").val(),
						tipopago:2,
						token:token
					},
					success:function(data){
						console.log(data);
						if (data.state) {
							window.location.href="pedido.php";
						}else{
							alert(data.detail);
						}
					},
					error:function(err){
						console.error(err);
					}
				});
		  	} else {
		      	console.log(Culqi.error);
		      	alert(Culqi.error.user_message);
		  	}
		};
	</script>
	<script src="https://checkout.culqi.com/js/v3"></script>
	<script>
	    Culqi.publicKey = 'pk_test_50a1c70acec8987f';
	</script>
</body>
</html>