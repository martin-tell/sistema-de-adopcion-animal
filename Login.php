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
<title>Login</title>
<meta charset="uft-8">
<link href="css/style.css" rel="stylesheet" type="text/css">
<!--[if IE 6]><link href="css/ie6.css" rel="stylesheet" type="text/css"><![endif]-->
<!--[if IE 7]><link href="css/ie7.css" rel="stylesheet" type="text/css"><![endif]-->
</head>
<body>
<div id="header"> <a href="#" id="logo"><img src="images/logo.gif" width="310" height="114" alt=""></a>
  <ul class="navigation">
    <li><a href="index.php">Inicio</a></li>
    <li><a href="reporte.php" target="_blank"> Reporte </a></li>
    <li><a href="registro.php"> Registarse </a></li>
    <li class="active"><a href="login.php"> Login </a></li>
  </ul>
</div>
<div id="body">
  <h1 style="text-align:center;"> Login </h1>
		<div style="display:flex; justify-content: center; align-items: center; text-align: center;">
			<fieldset>
				<?php if(!isset($_SESSION['usuario'])): ?>
					<legend>Login</legend>
					<form action="loguear.php" method="post">
						<div style="display: flex; flex-direction: column;justify-content: center; align-items: center">
							<img src="img/user.png" height:"100" width="100">
							<br>
							<label>Nombre de usurio: </label>
							<input type="text" name="usuario" required>
							<label>Contraseña: </label>
							<input type="password" name="contrasena" required>
							<br>
						</div>
						<input type="submit" value="Login" name="login">	
					</form>
					<p style="font-size: 12px;"> ¿No tienes cuenta? Regístrate <a href="registro.php"> aquí </a></p>
				<?php else: ?>
					<?php header('Location: index.php'); ?>
				<?php endif; ?>
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
