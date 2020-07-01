<?php
include ("../partes/conexion.php"); 
?>

<div id="cabezera" class="row">
	<div class="col-lg-12">
		<img id="logo" src="../img/JRturbos-logo.png" onclick="ventanaPrincipal()">
		<button id="btnCerrarSesion" class="btn btn-danger" onclick="cerrarSesion()">Cerrar Sesión</button>
	</div>
</div>

 <div class="row">
 	<div class="col-sm-12" style="width: 100%">
 		<?php
		include ("seccionVehiculo.php"); 
		?>
 	</div>
</div> 

