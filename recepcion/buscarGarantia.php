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
			<form class="form-horizontal" action="" onSubmit="buscarGarantia(0); return false" style="margin-top: 20px; text-align: left;">
				
				<div class="form-group">
					<label class="col-sm-2">Numero de proforma::</label>
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

			


			
				
<?php

	
$numContrato = $_GET['numContrato'];

//--------Para los servicios------------

	if($numContrato>0)
	{
		$sql = "SELECT Bol_Id, Bol_NumDoc, Bol_FecRec, Bol_HorRec, Bol_Pre, Cli_Nom, SerRea_Id, Ser_Nom, MC_Nom, Mod_Nom FROM boleta, cliente, serviciorealizado, servicios, turbo, marcacarro, modelocarro WHERE Bol_Tip=0 AND cliente.Cli_Id=boleta.Cli_Id AND boleta.Bol_Id=serviciorealizado.DetBol_Id AND servicios.Ser_Id=serviciorealizado.Ser_Id AND boleta.Tur_Id=turbo.Tur_Id AND turbo.Mod_Id=modelocarro.Mod_Id AND modelocarro.MC_Id=marcacarro.MC_Id AND Bol_NumDoc='".$numContrato."' ORDER BY Bol_FecRec DESC, Bol_HorRec DESC";
	
		$result = $conexion->query($sql);
		if ($result->num_rows > 0) 
		{
			if($row = $result->fetch_assoc()) 
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

		        ?>

			<center>
				<table style="padding: 40px; margin-bottom: 10px;">
					<tr>
						<td><button style="margin-right: 10px; margin-left: 10px" onclick="garantia(<?php echo $Bol_Id; ?>)" class="btn btn-info btn-lg" data-toggle="modal" data-target="#popUpSolGar" >Garantía</button></td>
						<td><button style="margin-right: 10px; margin-left: 10px" onclick="reparacion(<?php echo $Bol_Id; ?>)" class="btn btn-info btn-lg" data-toggle="modal" data-target="#popUpRep" >Reparación</button></td>
					</tr>
				</table>
			</center>

			<table class="table table-responsive">
				<tr class="info">
					<th>N° Contrato</th>
				  	<th>Fecha/Hora (Recepción)</th>				 
					<th>Turbo</th>
					<th>Cliente</th>				  
					<th>Servicio</th>
					<th>Precio</th>
					<th>Observaciones</th>
				</tr>

			<?php


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
		        


					

		        $color = "#FFF";
		        
		        $Bol_FecRec = date("d-m-Y", strtotime($Bol_FecRec));

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
				echo '<td>'.$observaciones.'</td>';
				echo '</tr>';

				$sql2 = "SELECT Bol_Id, Gar_Tip FROM garantia WHERE Gar_BolId=".$Bol_Id;
				$result2 = $conexion->query($sql2);
				if ($result2->num_rows > 0) 
				{	
					echo '<tr>';
					echo '<td colspan="7">';
					echo '<ul style="margin:0;">';
					while($row2 = $result2->fetch_assoc()) 
					{
						$Bol_Id=$row2["Bol_Id"];
						$Gar_Tip=$row2["Gar_Tip"];

						$sql3 = "SELECT Bol_NumDoc FROM boleta WHERE Bol_Id=".$Bol_Id;
						$result3 = $conexion->query($sql3);
						if ($result3->num_rows > 0) 
						{	
							if($row3 = $result3->fetch_assoc()) 
							{
								$Bol_NumDoc=$row3["Bol_NumDoc"];

								if ($Gar_Tip==0) 
									echo '<li>Garantía por revisión: Contrato N° '.$Bol_NumDoc.'</li>';
								else if ($Gar_Tip==1) 
									echo '<li>Garantía por reparación: Contrato N° '.$Bol_NumDoc.'</li>';
							}
						}
						
					}
					echo '<ul>';
					echo '</td>';
					echo '</tr>';
				}
				
		    }
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


