<?php
    session_start();
    if(isset($_SESSION['usuario'])){	
        if($_SESSION['tipo'] != "administrador"){
            header("Location: index.php");
            exit();
        }
    }
    if(!isset($_POST['nombre'], $_POST['especie'], $_POST['raza'], $_POST['edad'], $_FILES['imagen'], $_POST['descripcion'], $_POST['raza'])){
	header("Location: index.php");
        exit();
    }
    $nombre = $_POST['nombre'];
    $especie = $_POST['especie'];
    $raza = $_POST['raza'];
    $edad = $_POST['edad'];
    $descripcion = $_POST['descripcion'];
    $carpeta = "img/";
    $nombre_imagen = $_FILES['imagen']['name'];
    $imagen = $carpeta . basename($nombre_imagen);
    $es_img = getimagesize($_FILES['imagen']['tmp_name']);
    $tipo_imagen = strtolower(pathinfo($imagen,PATHINFO_EXTENSION));
    if($es_img === false) {
        echo "<script> alert('El archivo no es una imagen.'); </script>";
        echo "<script> window.history.back(); </script>";
	exit();
    }
    if (file_exists($imagen)) {
        echo "<script> alert('El archivo ya existe.'); </script>";
        echo "<script> window.history.back(); </script>";
	exit();
    }
    if ($_FILES['imagen']['size'] > 500000) {
        echo "<script> alert('El archivo es demasiado grande.'); </script>";
        echo "<script> window.history.back(); </script>";
	exit();
    }
    if($tipo_imagen != "jpg" && $tipo_imagen != "png" && $tipo_imagen != "jpeg") {
        echo "<script> alert('Solo se permiten archivos JPG, JPEG y PNG.'); </script>";
        echo "<script> window.history.back(); </script>";
	exit();
    }
    if (!move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen)) {
        echo "<script> alert('Hubo un error al cargar el archivo.'); </script>";
        echo "<script> window.history.back(); </script>";
	exit();
    }
    $enlace = mysqli_connect("localhost","root","");
    mysqli_select_db($enlace, "adopcion_animal");
    if(mysqli_query($enlace, "insert into mascotas (nombre_mascota, especie, raza, edad, descripcion, foto_mascota) values ('$nombre', '$especie', '$raza', $edad, '$descripcion', '$nombre_imagen')")){
	echo "<script> alert('Se ha dado de alta a la mascota correctamente.'); </script>";
        echo "<script> window.location.href = 'index.php'; </script>";	
    }else{
        echo "<script> alert('Error al dar de alta a la mascota revise sus datos o inténtelo más tarde'); </script>";
        echo "<script> window.history.back(); </script>";
    }
?>
