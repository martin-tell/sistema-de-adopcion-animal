<?php
	session_start();
	if(!isset($_POST['usuario'], $_POST['contrasena'])){
		header("Location: index.php");
		exit();
	}
	$usuario=$_POST['usuario']; 
	$contrasena=$_POST['contrasena'];
	$enlace = mysqli_connect("localhost","root","");
	mysqli_select_db($enlace, "adopcion_animal");
	$resultado = mysqli_query($enlace, "select a.*, u.* from adoptantes a inner join usuarios u on a.id_usuario = u.id where u.nombre_usuario = '$usuario';");
	if($resultado){
		if($fila = mysqli_fetch_array($resultado)){
			if($fila['contrasena'] == $contrasena){
				$_SESSION['id'] = $fila['id_adoptante'];
				$_SESSION['nombre_adoptante'] = $fila['nombre_adoptante'];
				$_SESSION['mail'] = $fila['mail'];
				$_SESSION['telefono'] = $fila['telefono'];
				$_SESSION['direccion'] = $fila['direccion'];
				$_SESSION['edad'] = $fila['edad'];
				$_SESSION['genero'] = $fila['genero'];
				$_SESSION['usuario'] = $fila['nombre_usuario'];
				$_SESSION['tipo'] = $fila['tipo_usuario'];
				if($_SESSION['tipo'] == "administrador"){
					echo "<script> alert('Bienvenido administrador'); </script>";
					echo "<script> window.location.href = 'indexAdm.php'; </script>";
				}else{
					echo "<script> alert('Bienvenido'); </script>";
					echo "<script> window.location.href = 'indexU.php'; </script>";
				}
			}else {
				echo "<script> alert('Usuario o contraseña incorrecta'); </script>";
				echo "<script> window.location.href = 'login.php'; </script>";
			} 
		}else {
			echo "<script> alert('Usuario o contraseña incorrecta'); </script>";
			echo "<script> window.location.href = 'login.php'; </script>";
		}
	}else{
		echo "<script> alert('Usuario o contraseña incorrecta'); </script>";
		echo "<script> window.location.href = 'login.php'; </script>";
	}
?>  