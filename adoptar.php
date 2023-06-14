<?php
	session_start();
	if(!isset($_SESSION['usuario'])){	
		header("Location: indexAdm.php");
	}
	if(!isset($_POST['id_adoptante'], $_POST['id_mascota'], $_POST['anterior'])){
		header("Location: index.php");
		exit();
        }
	$id_adoptante = $_POST['id_adoptante'];
	$id_mascota = $_POST['id_mascota'];
	$anterior = $_POST['anterior'];
	$enlace = mysqli_connect("localhost","root","");
	mysqli_select_db($enlace, "adopcion_animal");
	$resultado = mysqli_query($enlace, "select * from adopciones where id_mascota = $id_mascota");
	if (mysqli_num_rows($resultado) > 0){
		echo "<script> alert('La mascota seleccionada ya ha sido adoptada por otro adoptante.'); </script>";
		echo "<script> window.location.href = '$anterior'; </script>";
	}else {
		$resultado = mysqli_query($enlace, "select * from adopciones where id_adoptante = $id_adoptante");
		if(mysqli_num_rows($resultado) >= 5)
			echo "<script> alert('El adoptante ya ha adoptado el número máximo de mascotas permitido.'); </script>";
		else {
			$fecha = date("y-m-d");
            		if(mysqli_query($enlace, "insert into adopciones (id_adoptante, id_mascota, fecha_adopcion) VALUES ($id_adoptante, $id_mascota, '$fecha')")){
				echo "<script> alert('" . htmlspecialchars($_SESSION['usuario'], ENT_QUOTES) . ": has realizado la adopción con éxito.'); </script>";
				echo "<script> window.location.href = '$anterior$fecha'; </script>";
            		}else{ 
				echo "<script> alert('Ha habido un error al realizar la adopción.); </script>";
				echo "<script> window.location.href = '$anterior'; </script>";
			}
        	}
		echo "<script> window.location.href = '$anterior'; </script>";
    	}
?>