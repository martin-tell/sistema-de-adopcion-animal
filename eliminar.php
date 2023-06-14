<?php
	session_start();
	if(isset($_SESSION['usuario'])){	
		if($_SESSION['tipo'] == "cliente"){
			header("Location: indexU.php");
			exit();
		}
	}
	if(!isset($_POST['eliminar'])){
		header("Location: index.php");
		exit();
        }
	$id = $_POST['id'];	
	print($id);
	$enlace = mysqli_connect("localhost","root","");
	mysqli_select_db($enlace, "adopcion_animal");
        $consulta = "delete from mascotas where id_mascota='$id'";
	if(mysqli_query($enlace, $consulta)){
		echo "<script> alert('Se ha eliminado la mascota de la base de datos correctamente.'); </script>";
		echo "<script> window.location.href = 'index.php'; </script>";	
	}else{
        	echo "<script> alert('Error al eliminar la mascota de la base de datos inténtelo más tarde'); </script>";
        	echo "<script> window.location.href = 'index.php'; </script>";			
	}
	
?>