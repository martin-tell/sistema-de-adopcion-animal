<?php 
	session_start(); 
	session_destroy();
	echo "<script> alert('Vuelva pronto :)'); </script>";
	echo "<script> window.location.href = 'index.php'; </script>";
?>