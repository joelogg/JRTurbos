<?php 
include ("../partes/conexion.php"); 
?>


<div id="cabezera" class="row">
	<div class="col-lg-12">
		<img id="logo" src="../img/JRturbos-logo.png">
		<button id="btnCerrarSesion" class="btn btn-danger" onclick="cerrarSesion()">Cerrar Sesión</button>
	</div>
</div>
<div class="row" id="contenido">
	<div class="col-sm-10">
		<center>
			<form class="form-horizontal" action="" onSubmit="buscarTurbo(0); return false" style="margin-top: 20px; text-align: left;">
				
				<div class="form-group">
					<label class="col-sm-2">Numero de contrato:</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="numContratoForm" placeholder="Ingresar número de contrato" maxlength="5">
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
					<th>N° Contrato</th>
					<th>Fecha/Hora (Entrega)</th>				 
					<th>Turbo</th>
					<th>Cliente</th>				  
					<th>Servicio</th>
				</tr>

<?php


$numContrato = $_GET['numContratoForm'];

$sql = "SELECT Bol_Id, Bol_NumDoc, Bol_FecEnt, Bol_HorEnt, Cli_Nom, SerRea_Id, Ser_Nom, MC_Nom, Mod_Nom, Mot_Cod, VehTip_Nom, Veh_Nom FROM boleta, cliente, serviciorealizado, servicios, turbo, marcacarro, modelocarro, motor, vehiculotipo, vehiculo WHERE Bol_Tip=0 AND cliente.Cli_Id=boleta.Cli_Id AND boleta.Bol_Id=serviciorealizado.DetBol_Id AND servicios.Ser_Id=serviciorealizado.Ser_Id AND boleta.Tur_Id=turbo.Tur_Id AND turbo.Mod_Id=modelocarro.Mod_Id AND modelocarro.MC_Id=marcacarro.MC_Id AND marcacarro.Mot_Id=motor.Mot_Id AND motor.VehTip_Id=vehiculotipo.VehTip_Id AND vehiculotipo.Veh_Id=vehiculo.Veh_Id ORDER BY Bol_FecEnt DESC, Bol_HorEnt DESC";

if($numContrato>0)
{
	$sql = "SELECT Bol_Id, Bol_NumDoc, Bol_FecEnt, Bol_HorEnt, Cli_Nom, SerRea_Id, Ser_Nom, MC_Nom, Mod_Nom, Mot_Cod, VehTip_Nom, Veh_Nom FROM boleta, cliente, serviciorealizado, servicios, turbo, marcacarro, modelocarro, motor, vehiculotipo, vehiculo WHERE Bol_Tip=0 AND cliente.Cli_Id=boleta.Cli_Id AND boleta.Bol_Id=serviciorealizado.DetBol_Id AND servicios.Ser_Id=serviciorealizado.Ser_Id AND boleta.Tur_Id=turbo.Tur_Id AND turbo.Mod_Id=modelocarro.Mod_Id AND modelocarro.MC_Id=marcacarro.MC_Id AND marcacarro.Mot_Id=motor.Mot_Id AND motor.VehTip_Id=vehiculotipo.VehTip_Id AND vehiculotipo.Veh_Id=vehiculo.Veh_Id AND Bol_NumDoc='".$numContrato."' ORDER BY Bol_FecEnt DESC, Bol_HorEnt DESC";
}

	

	$result = $conexion->query($sql);
	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{
			$Bol_Id=$row["Bol_Id"];
			$Bol_NumDoc=$row["Bol_NumDoc"];
	        $Bol_FecEnt=$row["Bol_FecEnt"];
	        $Bol_HorEnt=$row["Bol_HorEnt"];
	        $MC_Nom=$row["MC_Nom"];
	        $Mod_Nom=$row["Mod_Nom"];
	        $Cli_Nom=$row["Cli_Nom"];
	        $SerRea_Id=$row["SerRea_Id"];
	        $Ser_Nom=$row["Ser_Nom"];
	        $Bol_Id=$row["Bol_Id"];

	        $mot_Cod=$row["Mot_Cod"];
	        $vehTip_Nom=$row["VehTip_Nom"];
	        $veh_Nom=$row["Veh_Nom"];
	       	
	       	$Bol_FecEnt = date("d-m-Y", strtotime($Bol_FecEnt));
	       		
	        echo '<tr>';
			echo '<td>'.$Bol_NumDoc.'</td>';
			echo '<td>'.$Bol_FecEnt.' / '.$Bol_HorEnt.'</td>';
			echo '<td><b>Vehículo:</b> '.$veh_Nom.' / '.$vehTip_Nom.' / '.$veh_Nom.'<br><b>Turbo:</b> '.$MC_Nom.' / '.$Mod_Nom.'</td>';
			echo '<td>'.$Cli_Nom.'</td>';
			echo '<td>'.$Ser_Nom;

			$sql2 = "SELECT Pie_Nom FROM serviciorealizado, piesarealizada, piesa WHERE PieRea_Tra=1 and piesarealizada.Pie_Id=piesa.Pie_Id AND serviciorealizado.SerRea_Id=piesarealizada.SerRea_Id AND serviciorealizado.SerRea_Id=".$SerRea_Id;
			$result2 = $conexion->query($sql2);
			if ($result2->num_rows > 0) 
			{	
				echo '<ul style="margin:0;">';
				while($row2 = $result2->fetch_assoc()) 
				{
					$pie_Nom=$row2["Pie_Nom"];
					echo '<li>'.$pie_Nom.'</li>';
				}
				echo '<ul>';
			}

			echo '</td>';
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

