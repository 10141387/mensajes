<?php
    include "funciones.php";
	$con=conectar();
	
	$query="select * from estatus";
	
	if (!$resultado=mysqli_query($con,$query)) {echo "Error". mysqli_error($con);}
	else{
	echo "<select name='estatus'>";
	while($muestra=mysqli_fetch_array($resultado)){
		echo "<option value='".$muestra['id_estatus']."'>".$muestra['descripcion']."</option>";
	}
	echo "</select>";
	}
	
	
	mysqli_close($con);
?>