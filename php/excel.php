<?php
require "funciones.php";
$con=conectar();

header("Content-type: application/octet-stream");
//indicamos al navegador que se está devolviendo un archivo
header("Content-Disposition: attachment; filename=mensajes.xls");
//con esto evitamos que el navegador lo grabe en su caché
header("Pragma: no-cache");
header("Expires: 0");

    $query="select * from mensaje where id_padre='0' order by id_mensaje desc";
	
	if (!$resultado=mysqli_query($con,$query)) {echo "Error". mysqli_error($con);}
	else{
	echo "<table><tr><td>Tema</td><td>mensaje</td></tr>";
	while($muestra=mysqli_fetch_array($resultado)){
		echo "<td class='marker'>".$muestra['asunto']."</td><td>".utf8_encode($muestra['descripcion'])."</td></tr>";
		//mensajes_respuesta($muestra['id_mensaje'],$con);
	}
	echo "</table>";
	}
?>