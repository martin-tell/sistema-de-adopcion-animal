<?php
	session_start();
	if(isset($_SESSION['usuario'])){	
		if($_SESSION['tipo'] == "cliente"){
			header("Location: indexU.php");
			exit();
		}
	}
	if(!isset($_POST['actualizar'])){
		header("Location: index.php");
		exit();
        }
	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$edad = $_POST['edad'];
	$raza = $_POST['raza'];
	$descripcion = $_POST['descripcion'];
	$foto = $_POST['foto'];
	$especie = $_POST['especie'];
	$fecha = $_POST['fecha'];
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
    <li><a href="alta_mascotas.php">Alta Mascotas</a></li>
    <li><a href="mis_mascotasAdm.php">Mis Mascotas</a></li>
    <li><a href="reporte.php" tarPOST="_blank"> Reporte </a></li>
    <li><a href="logout.php"> Logout </a></li>
	<li><div style="padding: 0 20px">Bienvenido/a: <?= $_SESSION['usuario'] ?></div></li>
  </ul>
</div>
<div id="body">
  <h1 style="text-align:center;"> Actualizar </h1>
  <p style="text-align:center;"> Reescriba los datos que quiera actualizar en los campos ubicados al lado de la foto de la mascota </p>
		<div style="display: grid; place-content: center;">
			<table border="1">
				<form action="actualizar.php" method="post">
					<input type="hidden" name="id" value="<?= $id ?>">	
					<tr> <td colspan="3"> <div style="display: grid; place-content: center; background-color: #FBD603"> <p> Información general de la mascota </p> </div> </td> </tr>
					<tr> <td rowspan="11"> <img src="img/<?= $foto ?>" width="250" height="250"> </td> </tr>
					<tr> <td> ID de la mascota: </td> <td style="text-align:center;"> <?= $id ?> </td> </tr>
					<tr> <td> Nombre: </td> <td style="text-align:center;"> <input type="text" name="nombre" value="<?= $nombre ?>"> </td> </tr>
					<tr> <td> Edad: </td> <td style="text-align:center;"> <input type="text" name="edad" value="<?= $edad ?>"> </td> </tr>
					<tr> <td> Especie: </td> <td style="text-align:center;"> <input type="text" name="especie" value="<?= $especie ?>"> </td> </tr>
					<tr> <td> Raza: </td> <td style="text-align:center;"> <input type="text" name="raza" value="<?= $raza ?>"> </td> </tr>
					<tr> <td> Fecha de Adopción: </td> <td style="text-align:center;"> <?php if($fecha != null) echo $fecha; else echo "-";?> </td> </tr>
					<tr> <td> Descripción: </td> <td style="text-align:center;"> <textarea name="descripcion" maxlength="120" rows="5" cols="20" style="resize: none;"><?= $descripcion ?></textarea> </td>  </tr>
					<tr> <td> Disponible para adoptar: </td> <td style="text-align:center;"> <?php if($fecha == null) echo "Sí"; else echo "No";?> </td> </tr>
						<tr> <td> Actualizar datos: </td> <td style="text-align:center;"> <input type="submit" name="actualizar" value="Actualizar"> </td> </tr>
				</form>
				<form action="eliminar.php" method="post"> 	
					<tr> <td> Eliminar mascota: </td> <td style="text-align:center;"> <input type="submit" name="eliminar" value="Eliminar" disabled="true"> </td> </tr>
				</form>

			</table>
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
    <div class="section">Copyright &copy; 2012 <a href="#">Company Name</a> All rights reserved | Website Template By <a tarPOST="_blank" href="http://www.freewebsitetemplates.com/">freewebsitetemplates.com</a></div>
  </div>
</div>
</body>
</html>
