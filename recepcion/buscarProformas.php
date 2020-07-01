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
			<form class="form-horizontal" action="" onSubmit="verProformas(0); return false" style="margin-top: 20px; text-align: left;">
				
				<div class="form-group">
					<label class="col-sm-2">Número de cotización:</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="numContratoForm" placeholder="Ingresar número de proforma" maxlength="5">
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
					<th>N° Proforma</th>
				  	<th>Fecha/Hora</th>				 
					<th>Turbo</th>
					<th>Cliente</th>				  
					<th>Servicio</th>
					<th>Precio</th>
					<th>Generar Contrato</th>
				</tr>

<?php
	date_default_timezone_set('America/Lima');
	$fechaAct = date('Y-m-d');
	$horaAct = date("H:i:s");

	
	$numContrato = $_GET['numContrato'];

//--------Para los servicios------------
	$sql = "SELECT Bol_Id, Bol_NumDoc, Bol_FecRec, Bol_HorRec, Bol_Pre, Cli_Nom, SerRea_Id, Ser_Nom, MC_Nom, Mod_Nom FROM boleta, cliente, serviciorealizado, servicios, turbo, marcacarro, modelocarro WHERE Bol_Tip=1 AND cliente.Cli_Id=boleta.Cli_Id AND boleta.Bol_Id=serviciorealizado.DetBol_Id AND servicios.Ser_Id=serviciorealizado.Ser_Id AND boleta.Tur_Id=turbo.Tur_Id AND turbo.Mod_Id=modelocarro.Mod_Id AND modelocarro.MC_Id=marcacarro.MC_Id AND Bol_FecRec='".$fechaAct."' ORDER BY Bol_FecRec DESC, Bol_HorRec DESC";

	if($numContrato>0)
	{
		$sql = "SELECT Bol_Id, Bol_NumDoc, Bol_FecRec, Bol_HorRec, Bol_Pre, Cli_Nom, SerRea_Id, Ser_Nom, MC_Nom, Mod_Nom FROM boleta, cliente, serviciorealizado, servicios, turbo, marcacarro, modelocarro WHERE Bol_Tip=1 AND cliente.Cli_Id=boleta.Cli_Id AND boleta.Bol_Id=serviciorealizado.DetBol_Id AND servicios.Ser_Id=serviciorealizado.Ser_Id AND boleta.Tur_Id=turbo.Tur_Id AND turbo.Mod_Id=modelocarro.Mod_Id AND modelocarro.MC_Id=marcacarro.MC_Id AND Bol_FecRec='".$fechaAct."' AND Bol_NumDoc='".$numContrato."' ORDER BY Bol_FecRec DESC, Bol_HorRec DESC";
	}
	//echo $sql;
	$result = $conexion->query($sql);
	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{
			$Bol_Id=$row["Bol_Id"];
			$Bol_NumDoc=$row["Bol_NumDoc"];
	        $Bol_FecRec=$row["Bol_FecRec"];
	        $Bol_HorRec=$row["Bol_HorRec"];
	        $Bol_Pre=$row["Bol_Pre"];
	        $MC_Nom=$row["MC_Nom"];
	        $Mod_Nom=$row["Mod_Nom"];
	        $Cli_Nom=$row["Cli_Nom"];
	        $SerRea_Id=$row["SerRea_Id"];
	        $Ser_Nom=$row["Ser_Nom"];
	        $Bol_Id=$row["Bol_Id"];

	        $sql2 = "SELECT AccExt_Nom FROM boleta, boletaaccesoriosextra, accesoriosextras WHERE boleta.Bol_Id=boletaaccesoriosextra.Bol_Id AND boletaaccesoriosextra.AccExt_Id=accesoriosextras.AccExt_Id AND boleta.Bol_Id=".$Bol_Id;
			$result2 = $conexion->query($sql2);

			$observaciones = "-";
			if ($result2->num_rows > 0) 
			{
				while($row2 = $result2->fetch_assoc()) 
				{
					$accExt_Nom=$row2["AccExt_Nom"];
					$observaciones = $observaciones.$accExt_Nom."-";
				}
			}
	        

	        $minutoAnadir=30; 
			$segundos_minutoAnadir=$minutoAnadir*60; 

			$segundos_horaInicial=strtotime($horaAct); 
			$horaAux=date("H:i",$segundos_horaInicial+$segundos_minutoAnadir);

				

	        $color = "#FFF";
	        	
	        echo '<tr>';
			echo '<td>'.$Bol_NumDoc.'</td>';
			echo '<td>'.$Bol_FecRec.' / '.$Bol_HorRec.'</td>';
			echo '<td>'.$MC_Nom.' / '.$Mod_Nom.'</td>';
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
			echo '<td>'.$Bol_Pre.'</td>';

			echo '<td><button class="btn btn-info" onclick="generarContrato('.$Bol_Id.')" data-toggle="modal" data-target="#popUpGenCon">Generar Contrato</button></td>';
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