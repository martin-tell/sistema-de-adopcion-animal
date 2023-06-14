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
	$especie = $_POST['especie'];
	$enlace = mysqli_connect("localhost","root","");
	mysqli_select_db($enlace, "adopcion_animal");
        $consulta = "update mascotas set nombre_mascota='$nombre', especie='$especie', raza='$raza', edad=$edad, descripcion='$descripcion' where id_mascota='$id'";
	if(mysqli_query($enlace, $consulta)){
		echo "<script> alert('Se han actualizado los datos de la mascota correctamente.'); </script>";
		echo "<script> window.location.href = 'index.php'; </script>";	
	}else{
        	echo "<script> alert('Error al actualizar los datos de la mascota revise sus datos o inténtelo más tarde'); </script>";
        	echo "<script> window.location.href = 'index.php'; </script>";			
	}
	
?>