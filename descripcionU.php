<?php
	session_start();
	if(isset($_SESSION['usuario'])){	
		if($_SESSION['tipo'] == "administrador"){
			header("Location: indexAdm.php");
			exit();
		}
	}
	if(!isset($_GET['id'], $_GET['nmbr'], $_GET['dd'], $_GET['rz'], $_GET['dscrp'], $_GET['ft'], $_GET['spc'], $_GET['fch'])){
		header("Location: index.php");
		exit();
        }
	$id = $_GET['id'];
	$nombre = $_GET['nmbr'];
	$edad = $_GET['dd'];
	$raza = $_GET['rz'];
	$descripcion = $_GET['dscrp'];
	$foto = $_GET['ft'];
	$especie = $_GET['spc'];
	$fecha = $_GET['fch'];
	$enlace = mysqli_connect("localhost","root","");
	mysqli_select_db($enlace, "adopcion_animal");
	$direcc_actual = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
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
    <li><a href="mis_mascotasU.php">Mis Mascotas</a></li>
    <li><a href="reporte.php" target="_blank"> Reporte </a></li>
    <li><a href="logout.php"> Logout </a></li>
	<li><div style="padding: 0 20px">Bienvenido/a: <?= $_SESSION['usuario'] ?></div></li>
  </ul>
</div>
<div id="body">
  <h1 style="text-align:center;"> Descripción </h1>
		<div style="display: grid; place-content: center;">
			<table border="1">
				<tr> <td colspan="3"> <div style="display: grid; place-content: center; background-color: #FBD603"> <p> Información general de la mascota </p> </div> </td> </tr>
				<tr> <td rowspan="9"> <img src="img/<?= $foto ?>" width="250" height="250"> </td> </tr>
				<tr> <td> ID de la mascota: </td> <td style="text-align:center;"> <?= $id ?> </td> </tr>
				<tr> <td> Nombre: </td> <td style="text-align:center;"> <?= $nombre ?> </td> </tr>
				<tr> <td> Edad: </td> <td style="text-align:center;"> <?= $edad ?> </td> </tr>
				<tr> <td> Especie: </td> <td style="text-align:center;"> <?= $especie ?> </td> </tr>
				<tr> <td> Raza: </td> <td style="text-align:center;"> <?= $raza ?> </td> </tr>
				<tr> <td> Fecha de Adopción: </td> <td style="text-align:center;"> <?php if($fecha != null) echo $fecha; else echo "-";?> </td> </tr>
				<tr> <td> Descripción: </td> <td style="text-align:center;"> <?= $descripcion ?> </td>  </tr>
				<tr> <td> Disponible para adoptar: </td> <td style="text-align:center;"> <?php if($fecha == null) echo "Sí"; else echo "No";?> </td> </tr>
			</table>
		</div>
		<div style="text-align:center;"> 
			<p> Si la mascota está disponible para adopción verifique sus datos y presione el botón "adoptar" para realizar la adopción </p> 
		</div>
		<div style="display: flex; justify-content: center; align-items: center;text-align:center;">
			<fieldset>
				<legend>Sus Datos</legend>
				<table border="1">
					<tr> <td> ID: </td> <td style="text-align:center;"> <?= $_SESSION['id'] ?> </td> </tr>
					<tr> <td> Nombre: </td> <td style="text-align:center;"> <?= $_SESSION['usuario'] ?> </td> </tr>
					<tr> <td> Correo: </td> <td style="text-align:center;"> <?= $_SESSION['mail'] ?> </td> </tr>
					<tr> <td> Teléfono: </td> <td style="text-align:center;"> <?= $_SESSION['telefono'] ?> </td> </tr>
					<tr> <td> Dirección: </td> <td style="text-align:center;"> <?= $_SESSION['direccion'] ?> </td> </tr>
					<tr> <td> Edad: </td> <td style="text-align:center;"> <?= $_SESSION['edad'] ?></td> </tr>
					<tr> <td> Género: </td> <td style="text-align:center;"> <?= $_SESSION['genero'] ?> </td> </tr>
				</table>
				<br>
				<form action="adoptar.php" method="post">
					<input type="hidden" value="<?= $direcc_actual ?>" name="anterior">
					<input type="hidden" value="<?= $_SESSION['id'] ?>" name="id_adoptante">
					<input type="hidden" value="<?= $id ?>" name="id_mascota">
					<input type="submit" name="adoptar" value="<?='Adoptar a '.$nombre?>">
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
