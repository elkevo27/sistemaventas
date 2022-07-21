<?php
if (isset($_GET['term'])){
	# conectare la base de datos
 include('../conexion.php');
 $db_handle = new DBController();

$return_arr = array();

$sqlc = "SELECT  * FROM clientes WHERE  ruc like '%".$_GET['term']."%' LIMIT 13";

$faq = $db_handle->runQuery($sqlc);

foreach($faq as $k=>$v) {
/* Recuperar y almacenar en conjunto los resultados de la consulta.*/		
	$row_array['value'] = $faq[$k]['ruc'];
	$row_array['Nombres']=$faq[$k]['ruc'];
	
	$row_array['usuarios']=$faq[$k]['nombres'];
	$row_array['nombres']=$faq[$k]['direcion'];
	
	array_push($return_arr,$row_array);
}
/* Codifica el resultado del array en JSON. */
echo json_encode($return_arr);
}
