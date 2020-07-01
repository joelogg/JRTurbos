<?php 
include ("../partes/conexion.php"); 
include ("../partes/cabecera.php"); 
?>
<section id="contenido">		


	<section id="principal">
		<center>
			<table>
			 	<tr>
					<td>Numero de contrato:</td>
					<td> <input id="numContratoForm" type="number" autofocus > </td>
				</tr>
				<tr>
					<td colspan="2"><button onclick="resumenOrdenesPre()" class="btnForm btnEstilo1">Buscar</button></td>
				</tr>
			</table>
		</center>

		<table class="tablaInformativa">
			<tr class="tablaCabecera">
				<th>N° Contrato</th>
			  	<th>Fecha/Hora (Recepción)</th>				 
				<th>Turbo</th>
				<th>Cliente</th>				  
				<th>Servicio</th>
				<th>Precio</th>
				<th>Observaciones</th>
				<th>Detalle</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>

	<?php
	date_default_timezone_set('America/Lima');
	$fechaAct = date('Y-m-d');
	$horaAct = date("H:i:s");

	
	$numContrato = $_GET['numContrato'];

//--------Para los servicios------------
	$sql = "SELECT DISTINCT(Bol_Id), Bol_NumDoc, Bol_FecEnt, Bol_HorEnt, Bol_FecRec, Bol_HorRec, Cli_Nom, SerRea_Id, Ser_Nom, MC_Nom, Mod_Nom, Mot_Cod, VehTip_Nom, Veh_Nom, Bol_Pre FROM boleta, cliente, serviciorealizado, servicios, turbo, marcacarro, modelocarro, motor, vehiculotipo, vehiculo WHERE Bol_Tip=0 AND cliente.Cli_Id=boleta.Cli_Id AND boleta.Bol_Id=serviciorealizado.DetBol_Id AND servicios.Ser_Id=serviciorealizado.Ser_Id AND boleta.Tur_Id=turbo.Tur_Id AND turbo.Mod_Id=modelocarro.Mod_Id AND modelocarro.MC_Id=marcacarro.MC_Id AND marcacarro.Mot_Id=motor.Mot_Id AND motor.VehTip_Id=vehiculotipo.VehTip_Id AND vehiculotipo.Veh_Id=vehiculo.Veh_Id AND Bol_FecRec='".$fechaAct."' ORDER BY Bol_FecRec DESC, Bol_HorRec DESC LIMIT 100";


	if($numContrato>0)
	{
		$sql = "SELECT DISTINCT(Bol_Id), Bol_NumDoc, Bol_FecEnt, Bol_HorEnt, Bol_FecRec, Bol_HorRec, Cli_Nom, SerRea_Id, Ser_Nom, MC_Nom, Mod_Nom, Mot_Cod, VehTip_Nom, Veh_Nom, Bol_Pre FROM boleta, cliente, serviciorealizado, servicios, turbo, marcacarro, modelocarro, motor, vehiculotipo, vehiculo WHERE Bol_Tip=0 AND cliente.Cli_Id=boleta.Cli_Id AND boleta.Bol_Id=serviciorealizado.DetBol_Id AND servicios.Ser_Id=serviciorealizado.Ser_Id AND boleta.Tur_Id=turbo.Tur_Id AND turbo.Mod_Id=modelocarro.Mod_Id AND modelocarro.MC_Id=marcacarro.MC_Id AND marcacarro.Mot_Id=motor.Mot_Id AND motor.VehTip_Id=vehiculotipo.VehTip_Id AND vehiculotipo.Veh_Id=vehiculo.Veh_Id AND Bol_NumDoc='".$numContrato."' ORDER BY Bol_FecRec DESC, Bol_HorRec DESC LIMIT 100";
	}
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

			echo '<td><button class="btnEstilo1" onclick="verDetalle('.$Bol_Id.')">Ver</button></td>';
			echo '<td><button class="btnEstilo1" onclick="editar('.$Bol_Id.')">Editar</button></td>';
			echo '<td><button class="btnEstilo1" onclick="eliminar('.$Bol_Id.')">Eliminar</button></td>';
			echo '</tr>';
			
	    }
	}


	
	
	?>
					
					</table>
		</section>
	</section>

	<section id="botonesAbajo">
		<button id="btnAtras" class="btnOpciones" type="button" onclick="cancelarCliente()"><p class="textBtn">Atras</p></button>
	</section>
</section>