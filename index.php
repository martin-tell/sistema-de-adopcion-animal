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
<title>Adopción de Mascotas</title>
<meta charset="utf-8">
<link href="css/style.css" rel="stylesheet" type="text/css">
<!--[if IE 6]><link href="css/ie6.css" rel="stylesheet" type="text/css"><![endif]-->
<!--[if IE 7]><link href="css/ie7.css" rel="stylesheet" type="text/css"><![endif]-->
</head>
<body>
<div id="header"> <a href="#" id="logo"><img src="images/logo.gif" width="310" height="114" alt=""></a>
  <ul class="navigation">
    <li class="active"><a href="index.php">Inicio</a></li>
    <li><a href="reporte.php" target="_blank"> Reporte </a></li>
    <li><a href="registro.php"> Registarse </a></li>
    <li><a href="login.php"> Login </a></li>
  </ul>
</div>
<div id="body">
  <h1 style="text-align:center;"> Catálogo de Máscotas </h1>
		<div style="text-align:center;">
			<p> Haga click sobre la foto de la mascota para ver su información completa </p>
		</div>
		<div style="display: grid; place-content: center;">
			<table border="1">
				<?php foreach($datos as $d): ?>
					<tr>
						<?php foreach($d as $m): ?>
							<td style="text-align:center;"> 
								<a href="descripcion.php?id=<?= $m['id_mascota'] ?>&nmbr=<?= $m['nombre_mascota'] ?>&dd=<?= $m['edad'] ?>&rz=<?= $m['raza'] ?>&dscrp=<?= $m['descripcion'] ?>&ft=<?= $m['foto_mascota'] ?>&spc=<?= $m['especie']?>&fch=<?= $m['fecha_adopcion']?>"> 
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
