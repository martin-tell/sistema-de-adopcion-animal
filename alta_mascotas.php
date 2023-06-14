<?php
	session_start();
	if(isset($_SESSION['usuario'])){	
		if($_SESSION['tipo'] == "cliente"){
			header("Location: indexU.php");
			exit();
		}
	}
	$enlace = mysqli_connect("localhost","root","");
	mysqli_select_db($enlace, "adopcion_animal");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Información de la mascota</title>
<meta charset="uft-8">
<link href="css/style.css" rel="stylesheet" type="text/css">
<!--[if IE 6]><link href="css/ie6.css" rel="stylesheet" type="text/css"><![endif]-->
<!--[if IE 7]><link href="css/ie7.css" rel="stylesheet" type="text/css"><![endif]-->
</head>
<body>
<div id="header"> <a href="#" id="logo"><img src="images/logo.gif" width="310" height="114" alt=""></a>
  <ul class="navigation">
    <li><a href="indexU.php">Inicio</a></li>
    <li class="active"><a href="alta_mascotas.php">Alta Mascotas</a></li>
    <li><a href="mis_mascotasAdm.php">Mis Mascotas</a></li>
    <li><a href="reporte.php" target="_blank"> Reporte </a></li>
    <li><a href="logout.php"> Logout </a></li>
	<li><div style="padding: 0 20px">Bienvenido/a: <?= $_SESSION['usuario'] ?></div></li>
  </ul>
</div>
<div id="body">
    <h1 style="text-align:center;"> Alta Mascotas </h1>
    <div style="display:flex; justify-content: center; align-items: center; text-align: center;">
    <fieldset>
        <legend>Datos Mascota</legend>
        <form action="alta.php" method="post" enctype="multipart/form-data">
            <div style="display:flex; flex-direction: column; align-items: flex-start;">
                <label>Nombre: </label>
                <input type="text" name="nombre" style="width: 97%" required>
                <label>Especie: </label>
                <input type="text" name="especie" style="width: 97%" required>
                <label>Raza: </label>
                <input type="text" name="raza" style="width: 97%" required>
                <label>Edad: </label>
                <input type="text" name="edad" style="width: 97%" required>
                <label>Imagen: </label>
                <input type="file" name="imagen" required>
                <label>Descripción: </label>
                <textarea name="descripcion" maxlength="120" style="width: 97%; resize: none;" rows="3" cols="20" required></textarea>
            </div>
            <br>
            <input type="submit" value="Dar de alta" name="registrarse">
        </form>
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
