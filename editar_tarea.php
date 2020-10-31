<?php
include('db.php');

if (isset($_GET['idtareas'])){
	$id = $_GET['idtareas'];
	$tarea = "SELECT * FROM tareas WHERE idtareas =$id";
	$resultado = mysqli_query($conn, $tarea);
	if (mysqli_num_rows($resultado) == 1){
		$row = mysqli_fetch_array($resultado);
		$titulo =$row['titulo'];
		$description = $row['descripcion'];
	}


}


if (isset($_POST['update'])){
	$id = $_GET['idtareas'];
	$titulo =$_POST['title'];
	$description = $_POST['description'];


	$query = "UPDATE tareas set titulo = '$titulo', description = '$description' WHERE idtareas= $id ";
	$resultado=msqli_query($conn, $query);
	
	header("Location:index.php");
	$_SSESION['message'] = 'actualizacion existosa';
	$_SSESION['message_type'] =  'primary';
	header("Location:index.php");


}

?>

<?php include ("include/header.php") ?>

<div class = "container p-4">
	<div class = "row">
		<div class = "col-md-4 mx-auto">
			<div class = "card card-body">
				<form action= "editar_tarea.php?idtareas=<?php echo $_GET['idtareas']; ?>" method="POST">
					<div class="fomr-group">
						<input type="text" name="title" value="<?php echo $titulo; ?>"
						class="form-control" placeholder="Update  title">
					</div>
					<div class="fomr-group">
						<textarea name="description"  row="2" class="form-control"  placeholder="Update Descripcion"><?php echo $description ; ?></textarea>
						
					</div>
					<button class=" btn btn-success" name="update">
						actualizar
						
					</button>

				</form>
				
			</div>
			
		</div>
		
	</div>
	

</div>