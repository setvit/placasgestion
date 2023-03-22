<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Consulta de placas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

  <meta name="author" content="epm">
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Aspirante</title>

<link rel="stylesheet" href="style.css" />
<script>
    webshims.setOptions('waitReady', false);
    webshims.setOptions('forms-ext', {types: 'date'});
    webshims.polyfill('forms forms-ext');
  </script>
  <script type="text/javascript">
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
  var switchery = new Switchery(html);
});
</script>
  <script type="text/javascript">
			if(history.forward(1)){
				location.replace( history.forward(1) );
			}
   </script>
	<script type="text/javascript">
		function validateForm() {
		    var x = document.forms["inscripcion"]["nombres"].value;
		    if (x == null || x == "") {
		        alert("Debe llenar este campo");
		        return false;
		    }
		}
	</script>
</head>

<body>
<div id="content">

<h2>Datos de la placa</h2>

<hr />

<?php

include("conexion.php");
$numplaca = $_POST['numplaca'];
$strConsulta = mysqli_query($conexion,"SELECT placa,serv.descripcion_servicio, cla.descripcion_clase,
age.descripcion_agencia, estado_entrega, fecha_entrega_usuario, disponibilidad_placa 
FROM tab_placas tpla
INNER JOIN tab_tipo_servicio serv ON tpla.id_servicio = serv.id_servicio
INNER JOIN tab_clase_automotor cla ON tpla.id_clase = cla.id_clase
INNER JOIN tab_agencias age ON tpla.id_agencia = age.id_agencia
WHERE placa = '$numplaca'");
if (mysqli_num_rows($strConsulta)==0) {
	# code...
	echo '<table cellpadding="0" cellspacing="0" width="100%">';
	echo '<thead><tr><td>La placa ingresada no existe o aún no está disponible para ser retirada</td></tr></thead>';
	echo "</table>";
	//echo '<input type="button" value="Enviar correo a gestor de placas" class="btn btn-success" name="btn1" href="mailto:aguerrero@movidelnor.gob.ec">';
	echo '<a href="mailto:aguerrero@movidelnor.gob.ec">Enviar email a gestor de placas de la EPM</a>';

}else {
	# code...
	//$strConsulta = mysqli_query($conexion,"SELECT placa, tipo_placa, tipo_vehiculo, nombre_agencia, estado_entrega FROM tab_placas WHERE placa = '$numplaca'");
	$numfilas = mysqli_num_rows($strConsulta);
	
	echo '<table cellpadding="0" cellspacing="0" width="100%">';
	echo '<thead><tr><td>Placa</td><td>Servicio</td><td>Clase</td><td>Agencia</td><td>Está entregada?</td><td>Se puede retirar la placa</td><td>Fecha de entrega</td></tr></thead>';
	for ($i=0; $i<$numfilas; $i++)
	{
		$fila = mysqli_fetch_array($strConsulta);
		$numlista = $i + 1;
		echo '<td>'.$fila['placa'].'</td>';
		echo '<td>'.$fila['descripcion_servicio'].'</td>';
		echo '<td>'.$fila['descripcion_clase'].'</td>';
		echo '<td>'.$fila['descripcion_agencia'].'</td>';
		echo '<td>'.$fila['estado_entrega'].'</td>';
		echo '<td>'.$fila['disponibilidad_placa'].'</td>';
		echo '<td>'.$fila['fecha_entrega_usuario'].'</td>';
    //echo '<td>'.$fila['nombre'].' '.$fila['apellido'].'</td>';
		//echo '<td><a href="reporte.php?id='.$fila['placa'].'">Imprimir resultado</a></td></tr>';
	}
	echo "</table>";
}

?>			
<center>
      <input type="submit" value="Nueva consulta" class="btn btn-info" name="btn2" 
	onclick="window.location.href='/placasgestion/consulta/index.html'">
</center>
</div>
</body>
</html>
