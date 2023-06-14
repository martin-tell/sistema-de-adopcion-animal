<?php
	session_start();
	if(isset($_SESSION['usuario'])){	
		if($_SESSION['tipo'] == "administrador"){
			header("Location: indexAdm.php");
			exit();
		}else{
			header("Location: indexU.php");
			exit();
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Registrar</title>
<meta charset="uft-8">
<link href="css/style.css" rel="stylesheet" type="text/css">
<!--[if IE 6]><link href="css/ie6.css" rel="stylesheet" type="text/css"><![endif]-->
<!--[if IE 7]><link href="css/ie7.css" rel="stylesheet" type="text/css"><![endif]-->
</head>
<body>
<div id="header"> <a href="#" id="logo"><img src="images/logo.gif" width="310" height="114" alt=""></a>
  <ul class="navigation">
    <li><a href="index.php">   Inicio   </a></li>
    <li><a href="reporte.php" target="_blank"> Reporte </a></li>
    <li class="active"><a href="registro.php"> Registarse </a></li>
    <li><a href="login.php">Login</a></li>
  </ul>
</div>
<div id="body">
  <h1 style="text-align:center;"> Registrar </h1>
	<div style="display:flex; justify-content: center; align-items: center; text-align: center;">
			<fieldset>
					<legend>Registro</legend>
					<form action="registrar.php" method="post">
						<div style="display:flex; flex-direction: column; align-items: flex-start;">
							<label>Nombre y apellidos: </label>
							<input type="text" name="nombre" required>
							<label>Nombre de usuario: </label>
							<input type="text" name="usuario" required>
							<label>Contraseña: </label>
							<input type="password" name="contrasena" required>
							<label>Dirección: </label>
							<input type="text" name="direccion" required>
							<label>Correo: </label>
							<input type="email" name="correo" required>
							<label>Número Telefónico: </label>
							<input type="text" name="telefono" required>
							<label>Edad: </label>
							<input type="text" name="edad" pattern="[0-9]+" required>
						</div>
						<br>
						<div style="display: flex; justify-content: space-between;">
							<label>Género: </label> 
							<select name="genero" required>
								<option value="M"> Masculino </option>
								<option value="F"> Femenino </option>
							</select>
						</div>
						<br>
						<input type="submit" value="Registrar" name="registrarse">
					</form>
					<p style="font-size: 10px;"> ¿Ya tienes cuenta? Entra desde <a href="login.php"> aquí </a></p>
			</fieldset>
		</div>
		<br>
  <div class="featured">
    <ul>
      <li><a href="#"><img src="images/organic-and-chemical-free.jpg" width="300" height="90" alt=""></a></li>
      <li><a href="#"><img src="images/good-food.jpg" width="300" height="90" alt=""></a></li>
      <li class="last"><a href="#"><img src="images/pet-grooming.jpg" width="300" height="90" alt=""></a></li>
    </ul>
  </div>
  
</div>
<div id="footer">
  <div id="footnote">
    <div class="section">Copyright &copy; 2012 <a href="#">Company Name</a> All rights reserved | Website Template By <a target="_blank" href="http://www.freewebsitetemplates.com/">freewebsitetemplates.com</a></div>
  </div>
</div>
</body>
</html>
