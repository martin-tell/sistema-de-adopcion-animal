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
    if(!isset($_POST['id_adoptante'], $_POST['id_mascota'], $_POST['anterior'])){
	header("Location: index.php");
        exit();
    }
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $edad = $_POST['edad'];
    $genero = $_POST['genero'];
    $enlace = mysqli_connect("localhost","root","");
    mysqli_select_db($enlace, "adopcion_animal");
    mysqli_begin_transaction($enlace);
    mysqli_autocommit($enlace, FALSE);
    $insercion_usuario = mysqli_prepare($enlace, "insert into usuarios (nombre_usuario, contrasena, tipo_usuario) VALUES (?, ?, 'cliente')");
    mysqli_stmt_bind_param($insercion_usuario, "ss", $usuario, $contrasena);
    $r1 = mysqli_stmt_execute($insercion_usuario);
    $id_usuario = mysqli_insert_id($enlace);
    $insercion_adoptante = mysqli_prepare($enlace, "insert into adoptantes (nombre_adoptante, mail, telefono, direccion, edad, genero, id_usuario) VALUES (?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($insercion_adoptante, "ssssssi", $nombre, $correo, $telefono, $direccion, $edad, $genero, $id_usuario);
    $r2 = mysqli_stmt_execute($insercion_adoptante);
    if($r1 && $r2) {
        mysqli_commit($enlace);
        echo "<script> alert('Nuevo adoptante registrado correctamente'); </script>";
        echo "<script> window.location.href = 'login.php'; </script>";
    } else {
        mysqli_rollback($enlace);
        echo "<script> alert('Error al registrar al adoptante revise sus datos o inténtelo más tarde'); </script>";
        echo "<script> window.history.back(); </script>";
    }
    mysqli_autocommit($enlace, TRUE);
?>
