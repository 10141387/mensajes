<?php
    include "funciones.php";
	$con=conectar();
	echo "<head><link href='estilos/estilin.css' rel='stylesheet'></head>";
	$query="select * from mensaje where id_padre='0'";
	
	if (!$resultado=mysqli_query($con,$query)) {echo "Error". mysqli_error($con);}
	else{
	
	while($muestra=mysqli_fetch_array($resultado)){
		echo "<h1>Tema:".$muestra['asunto']."</h1>";
		echo "<h2>".$muestra['descripcion']."<a href='contesta_mensaje.php?id_padre=".$muestra['id_mensaje']."'> Contestar</a></h2>";
		mensajes_respuesta($muestra['id_mensaje'],$con);
	}

	}
	
	
	mysqli_close($con);
?>