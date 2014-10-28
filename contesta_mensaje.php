<?php
    include "funciones.php";
	echo "<head><link href='estilos/estilin.css' rel='stylesheet'></head>";
	$con=conectar();
	echo "<body><div id='topmenu' ><ul><li>Inicio</li><li><a href='mostrar_mensajes.php'>Mensajes</a><li></ul></div>";
	
echo "<body><div id='conten' >";
	
	if(!isset($_POST['btn_contesta'])) {
		$id=$_GET['id_padre'];
		echo "<form name='contesta_mensaje' action='". $_SERVER['PHP_SELF']."' method='post'>
		<input type='hidden' name='id_padre' value='".$id."'>
		<textarea name='form_mensaje_respuesta' col='50' rows='5'>Mensaje
		</textarea>
		<input type='submit' name='btn_contesta' value='Contestar'>
</form>"; ;
	}else {
		$id=$_POST['id_padre'];
		
		
		
		$query="INSERT INTO mensaje (id_mensaje, id_padre,asunto,id_usuario,descripcion,id_cat,fecha_creacion) 
		VALUES (NULL, '".$id."', 'REspuesta', '1', '".$_POST['form_mensaje_respuesta']."', '2', '2014-10-22');";
		if(!$resultado=mysqli_query($con, $query)) {echo "Error".mysqli_error($con);} else{
				
				header('Location: /mensajes/mostrar_mensajes.php');
				
			echo "<a href='mostrar_mensajes.php'>Regresar</a>";}	
		
	}
	
	echo "</div>";
	
	


mysqli_close($con);
?>
