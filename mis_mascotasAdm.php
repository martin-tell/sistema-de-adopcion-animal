<?php
	session_start();
	if(isset($_SESSION['usuario'])){	
		if($_SESSION['tipo'] == "cliente"){
			header("Location: indexU.php");
			exit();
		}
	}
	$id = $_SESSION['id'];
	$enlace = mysqli_connect("localhost","root","");
	mysqli_select_db($enlace, "adopcion_animal");
	$consulta = mysqli_query($enlace, "select mascotas.*, adopciones.fecha_adopcion, adoptantes.nombre_adoptante as nombre 
						from mascotas 
						join adopciones on mascotas.id_mascota = adopciones.id_mascota 
						join adoptantes on adopciones.id_adoptante = adoptantes.id_adoptante 
						where adoptantes.id_adoptante = $id;");
	$registros = array();
	while($fila = mysqli_fetch_array($consulta))
		array_push($registros, $fila);
	$num_mascotas = count($registros);
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
    <li><a href="alta_mascotas.php">Alta Mascotas</a></li>
    <li class="active"><a href="mis_mascotasAdm.php">Mis Mascotas</a></li>
    <li><a href="reporte.php" target="_blank"> Reporte </a></li>
    <li><a href="logout.php"> Logout </a></li>
    <li><div style="padding: 0 20px">Bienvenido/a: <?= $_SESSION['usuario'] ?></div></li>
  </ul>
</div>
<div id="body">
  <h1 style="text-align:center;"> Mis Mascotas </h1>
  <?php if($num_mascotas != 0): ?>
    <div style="display: grid; place-content: center;">
      <table border="1">
        <tr> <td colspan="7"> <div style="display: grid; place-content: center; background-color: #FBD603"> <p> Mis Mascotas </p> </div> </td> </tr>
        <?php foreach($registros as $r): ?>
	  <tr> <td rowspan="3"> <img src="img/<?= $r['foto_mascota'] ?>" width="60" height="60"> </td>  </tr>
	  <tr> <th> ID de la mascota: </th> <td style="text-align:center;"> <?= $r['id_mascota'] ?> </td> <th> Nombre: </th> <td style="text-align:center;"> <?= $r['nombre_mascota'] ?> </td> <th> Edad: </th> <td style="text-align:center;"> <?= $r['edad'] ?> </td> </tr>
	  <tr> <th> Especie: </th> <td style="text-align:center;"> <?= $r['especie'] ?> </td> <th> Raza: </th> <td style="text-align:center;"> <?= $r['raza'] ?> <th> Fecha de Adopción: </th> <td style="text-align:center;"> <?= $r['fecha_adopcion'] ?> </td> </tr>
        <?php endforeach; ?>
      </table>
    </div>
  <?php else: ?>
    <br><br><br><br>
    <h2 style="text-align:center;"> Aún no ha adoptado ninguna mascota... </h2>	
    <br><br><br><br>
  <?php endif; ?>
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
