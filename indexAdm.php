<?php
	session_start();
	if(isset($_SESSION['usuario'])){	
		if($_SESSION['tipo'] == "cliente"){
			header("Location: indexU.php");
			exit();
		}
	}else{
		header("Location: index.php");
		exit();
	}
	$enlace = mysqli_connect("localhost","root","");
	mysqli_select_db($enlace, "adopcion_animal");
	$consulta=mysqli_query($enlace, "select m.*, a.fecha_adopcion from mascotas m left join adopciones a on m.id_mascota = a.id_mascota");
	$registros = array();
	while($fila = mysqli_fetch_array($consulta))
		array_push($registros, $fila);
	$datos = array_chunk($registros, 5);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Catálogo de mascotas</title>
<meta charset="uft-8">
<link href="css/style.css" rel="stylesheet" type="text/css">
<!--[if IE 6]><link href="css/ie6.css" rel="stylesheet" type="text/css"><![endif]-->
<!--[if IE 7]><link href="css/ie7.css" rel="stylesheet" type="text/css"><![endif]-->
</head>
<body>
<div id="header"> <a href="#" id="logo"><img src="images/logo.gif" width="310" height="114" alt=""></a>
  <ul class="navigation">
    <li class="active"><a href="indexU.php">Inicio</a></li>
    <li><a href="alta_mascotas.php">Alta Mascotas</a></li>
    <li><a href="mis_mascotasAdm.php">Mis Mascotas</a></li>
    <li><a href="reporte.php" target="_blank"> Reporte </a></li>
    <li><a href="logout.php"> Logout </a></li>
	<li><div style="padding: 0 20px">Bienvenido/a: <?= $_SESSION['usuario'] ?></div></li>
  </ul>
</div>
<div id="body">
  <h1 style="text-align:center;"> Catálogo de Mascotas </h1>
  <div style="text-align:center;">
			<p> Haga click sobre la foto de la mascota para ver su información completa </p>
		</div>
		<div style="display: grid; place-content: center;">
			<table border="1">
				<?php foreach($datos as $d): ?>
					<tr>
						<?php foreach($d as $m): ?>
							<td style="text-align:center;"> 
								<a href="descripcionAdm.php?id=<?= $m['id_mascota'] ?>&nmbr=<?= $m['nombre_mascota'] ?>&dd=<?= $m['edad'] ?>&rz=<?= $m['raza'] ?>&dscrp=<?= $m['descripcion'] ?>&ft=<?= $m['foto_mascota'] ?>&spc=<?= $m['especie']?>&fch=<?= $m['fecha_adopcion']?>"> 
									<img src="img/<?= $m['foto_mascota'] ?>" height="200" width="200"> 
								</a> 
								<div style="display: grid; place-content: center; background-color: #FBD603">
									<p> Nombre: <?= $m['nombre_mascota'] ?> </p> 
								</div>
							</td>
						<?php endforeach; ?>
					</tr>		
				<?php endforeach; ?>
			</table>
		</div>
  <div class="featured">
    <ul>
      <li><a href="#"><img src="images/organic-and-chemical-free.jpg" width="300" height="90" alt=""></a></li>
      <li><a href="#"><img src="images/good-food.jpg" width="300" height="90" alt=""></a></li>
      <li class="last"><a href="#"><img src="images/pet-grooming.jpg" width="300" height="90" alt=""></a></li>
    </ul>
  </div>
  <br>  
</div>
<div id="footer">
  <div id="footnote">
    <div class="section">Copyright &copy; 2012 <a href="#">Company Name</a> All rights reserved | Website Template By <a target="_blank" href="http://www.freewebsitetemplates.com/">freewebsitetemplates.com</a></div>
  </div>
</div>
</body>
</html>
