<?php

include('db.php');

if (isset($_GET['idtareas'])){
	$id = $_GET['idtareas'];
	$tarea = "DELETE FROM tareas WHERE idtareas = $id";
	$resultado = mysqli_query($conn , $tarea);
	if(!$resultado){
		die("error");

	}

	$_SESSION['message'] = "tarea eliminada";
	$_SESSION ['message_type'] = 'danger';

	header("Location:index.php");

}

?>