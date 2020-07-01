<?php 
include ("../partes/conexion.php"); 
?>


<div id="cabezera" class="row">
	<div class="col-lg-12" >
		<img id="logo" src="../img/JRturbos-logo.png">
		<button id="btnCerrarSesion" class="btn btn-danger" onclick="cerrarSesion()">Cerrar Sesión</button>
	</div>
</div>
<div class="row" id="contenido">
	<div class="col-sm-10">
		<center>
			<form class="form-horizontal" action="" onSubmit="buscarCliente(0); return false" style="margin-top: 20px; text-align: left;">
				
				<div class="form-group">
					<label class="col-sm-2">DNI:</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="dniI" placeholder="Ingresar DNI" maxlength="5">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary btn-lg">Buscar</button>
					</div>
				</div>
				
			</form>

			


			<table class="table table-responsive" style="margin-top: 6%">
				<tr class="info">
					<th>Nombre</th>				 
					<th>DNI</th>	
					<th>Dirección</th>
					<th>Telefono</th>				  
					<th>Ver Historial</th>
				</tr>

<?php


$dni = $_GET['dni'];


$sql = "SELECT Cli_Id, Cli_Dni, Cli_Nom, Cli_Dir, Cli_Tel FROM cliente";

if($dni>0)
{
	$sql = "SELECT Cli_Id, Cli_Dni, Cli_Nom, Cli_Dir, Cli_Tel FROM cliente WHERE Cli_Dni=".$dni;
}

$result = $conexion->query($sql);



if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
	{
        $idCli=$row["Cli_Id"];
        $cliDni=$row["Cli_Dni"];
        $nom=$row["Cli_Nom"];
        $dir=$row["Cli_Dir"];
        $tel=$row["Cli_Tel"];


        echo '<tr>';
        echo '<td>'.$nom.'</td>';
        echo '<td>'.$cliDni.'</td>';
        echo '<td>'.$dir.'</td>';
        echo '<td>'.$tel.'</td>';
        echo '<td><button class="btn btn-info" onclick="verHistorialCliente('.$cliDni.')" data-toggle="modal" data-target="#popUpHislCli">Historial</button></td>';
        echo '</tr>';
    }
}
?>

			</table>		
		</center>
	</div>




	<div id="botonesAbajo" class="col-sm-2">
		<center>
			<button id="btnAtras" type="button" class="btn-lg btn-warning btn130" onclick="ventanaPrincipal()"><p class="textBtn">Atras</p></button>
		</center>
	</div>


</div>







