<?php 
include ("../partes/conexion.php"); 
$interno = $_GET['interno']; // si es 1 lo llaman en trabajador

?>

<div id="cabezera" class="row">
	<div class="col-lg-12" style="padding-right: 0px;">
		<img id="logo" src="../img/JRturbos-logo.png">
<?php 	
	if ($interno==1) 
	{
		echo '<button id="btnCerrarSesion" class="btn btn-danger" onclick="cerrarSesion()">Cerrar Sesión</button>';
	}
	else
	{
		echo '<button id="btnAtras" type="button" class="btn-lg btn-warning btn130" onclick="ventanaPrincipal()" style="float: right; margin-top:0;"><p class="textBtn">Atras</p></button>';
	}
		

		
?>
	</div>
</div>

<div class="row" style="padding: 0">
	<div class="col-sm-12" style="padding: 0">
	
		<table class="table table-responsive">
			<tr class="info">
				<th>N° Contrato</th>
				<th>Fecha/Hora (Entrega)</th>				 
				<th>Turbo</th>
				<th>Cliente</th>				  
				<th>Servicio</th>
				<th>Extras Turbo</th>
					  <?php
					  if($interno==1)
					  	echo '<th>Estado</th>';
					  ?>
				</tr>

	<?php
	date_default_timezone_set('America/Lima');
	$fechaAct = date('Y-m-d');
	$horaAct = date("H:i:s");

	

	$sql = "SELECT Bol_Id, Bol_NumDoc, Bol_Rea, Bol_FecEnt, Bol_HorEnt, Cli_Nom, SerRea_Id, Ser_Nom, MC_Nom, Tur_Cod, Mod_Nom, VehTip_Nom, Veh_Nom, Mot_Cod FROM boleta, cliente, serviciorealizado, servicios, turbo, marcacarro, modelocarro, motor, vehiculotipo, vehiculo WHERE Bol_Tip=0 AND Bol_Rea<8 AND Bol_Anu=0 AND cliente.Cli_Id=boleta.Cli_Id AND boleta.Bol_Id=serviciorealizado.DetBol_Id AND servicios.Ser_Id=serviciorealizado.Ser_Id AND boleta.Tur_Id=turbo.Tur_Id AND turbo.Mod_Id=modelocarro.Mod_Id AND modelocarro.MC_Id=marcacarro.MC_Id AND marcacarro.Mot_Id=motor.Mot_Id AND motor.VehTip_Id=vehiculotipo.VehTip_Id AND vehiculotipo.Veh_Id=vehiculo.Veh_Id ORDER BY Bol_FecEnt ASC, Bol_HorEnt ASC";
	$result = $conexion->query($sql);

	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{
			$Bol_Id=$row["Bol_Id"];
			$Bol_NumDoc=$row["Bol_NumDoc"];
			$Bol_Rea=$row["Bol_Rea"];
	        $Bol_FecEnt=$row["Bol_FecEnt"];
	        $Bol_HorEnt=$row["Bol_HorEnt"];
	        $MC_Nom=$row["MC_Nom"];
	        $Mod_Nom=$row["Mod_Nom"];
	        $Tur_Cod=$row["Tur_Cod"];
	        $Cli_Nom=$row["Cli_Nom"];
	        $SerRea_Id=$row["SerRea_Id"];
	        $Ser_Nom=$row["Ser_Nom"];

	        $vehTip_Nom=$row["VehTip_Nom"];
	        $veh_Nom=$row["Veh_Nom"];
	        $Mot_Cod=$row["Mot_Cod"];

	        if($Bol_Rea==0)
	        	$nombreEstado = "Arenado";	      
	        elseif($Bol_Rea==1)
	        	$nombreEstado = "Pulido";
	        elseif($Bol_Rea==2)
	        	$nombreEstado = "Balanceado";
	        elseif($Bol_Rea==3)
	        	$nombreEstado = "Armado Cartridge";
	        elseif($Bol_Rea==4)
	        	$nombreEstado = "Prueba Cartridge";
	        elseif($Bol_Rea==5)
	        	$nombreEstado = "Armado Turbo";
	        elseif($Bol_Rea==6)
	        	$nombreEstado = "Calibrado Turbo";
	        elseif($Bol_Rea==7)
	        	$nombreEstado = "Terminar";


	        $sql2 = "SELECT AccExt_Nom FROM boleta, boletaaccesoriosextra, accesoriosextras WHERE boleta.Bol_Id=boletaaccesoriosextra.Bol_Id AND boletaaccesoriosextra.AccExt_Id=accesoriosextras.AccExt_Id AND boleta.Bol_Id=".$Bol_Id;
			$result2 = $conexion->query($sql2);

			$observaciones = "";
			$cant = 0;
			if ($result2->num_rows > 0) 
			{
				while($row2 = $result2->fetch_assoc()) 
				{
					$accExt_NomAbr=$row2["AccExt_Nom"];
					if ($cant%2==0) 
						$observaciones = $observaciones.$accExt_NomAbr." - ";
					else
						$observaciones = $observaciones.$accExt_NomAbr."<br>";

					$cant = $cant + 1;
				}
			}
	        

	        $minutoAnadir=30; 
			$segundos_minutoAnadir=$minutoAnadir*60; 

			$segundos_horaInicial=strtotime($horaAct); 
			$horaAux=date("H:i",$segundos_horaInicial+$segundos_minutoAnadir);

		

	        if($Bol_FecEnt<$fechaAct)//rojo ya se paso
	        {
	        	$color = "#E00";
	        }
	        elseif(date("H:i",$segundos_horaInicial+(60*30))>$Bol_HorEnt && $Bol_FecEnt<=$fechaAct)//rojo fala menos de media hora
	        {
	        	$color = "#E00";
	        }
	        elseif(date("H:i",$segundos_horaInicial+(60*60))>$Bol_HorEnt && $Bol_FecEnt<=$fechaAct)//naranja falta de 30 a 60min
	        {
	        	$color = "#FAAC58";
	        }
	        elseif(date("H:i",$segundos_horaInicial+(60*120))>$Bol_HorEnt && $Bol_FecEnt<=$fechaAct)//amarillo falta de 60min a 2hrs
	        {
	        	$color = "#F6F080";
	        }
	        else
	        {
	        	$color = "#0A0";
	        }
	        	
	        echo '<tr>';
			echo '<td style="background-color: '.$color.'">'.$Bol_NumDoc.'</td>';
			echo '<td style="background-color: '.$color.'">'.$Bol_FecEnt.' / '.$Bol_HorEnt.'</td>';
			echo '<td style="background-color: '.$color.'"><b>Vehículo:</b> '.$veh_Nom.' / '.$vehTip_Nom.' / '.$Mot_Cod.'<br><b>Turbo:</b> '.$MC_Nom.' / '.$Mod_Nom.' / '.$Tur_Cod;
			echo '<td style="background-color: '.$color.'">'.$Cli_Nom.'</td>';
			echo '<td style="background-color: '.$color.'">'.$Ser_Nom;

			$sql2 = "SELECT Pie_Nom, PieRea_Tra, PieRea_Tip FROM serviciorealizado, piesarealizada, piesa WHERE piesarealizada.Pie_Id=piesa.Pie_Id AND serviciorealizado.SerRea_Id=piesarealizada.SerRea_Id AND serviciorealizado.SerRea_Id=".$SerRea_Id;
			$result2 = $conexion->query($sql2);
			if ($result2->num_rows > 0) 
			{	
				echo '<ul style="margin:0;">';
				while($row2 = $result2->fetch_assoc()) 
				{
					$pie_Nom=$row2["Pie_Nom"];
					$pieRea_Tra=$row2["PieRea_Tra"];

					if ($pieRea_Tra=="1") 
					{
						$pie_Nom = "Calibración ".$pie_Nom;
					}
					elseif ($pieRea_Tra=="2") 
					{
						$pie_Nom = "Venta ".$pie_Nom;
					}

					$pieRea_Tip=$row2["PieRea_Tip"];
					if ($pieRea_Tip=="1") 
					{
						$pie_Nom = $pie_Nom." Neumático";
					}
					elseif ($pieRea_Tip=="2") 
					{
						$pie_Nom = $pie_Nom. " Eléctrico";
					}
														
					echo '<li>'.$pie_Nom.'</li>';
				}
				echo '<ul>';
			}

			echo '</td>';
			if($interno==1)
			{
				echo '<td style="background-color: '.$color.'"><button class="btn btn-primary btnGruAccExt" onclick="editarObservaciones('.$Bol_Id.')" data-toggle="modal" data-target="#popAccEct">'.$observaciones.'</button></td>';
				echo '<td style="background-color: '.$color.'"><button class="btn btn-primary" id="btnEstado'.$Bol_Id.'" onclick="terminar('.$Bol_Id.', '.$Bol_Rea.')">'.$nombreEstado.'</button></td>';
			}
			else
			{
				echo '<td style="background-color: '.$color.'">'.$observaciones.'</td>';
			}
			
			echo '</tr>';
			
	    }
	}


	//
	$sql = "SELECT Bol_Id, Bol_NumDoc, Bol_FecEnt, Bol_HorEnt, Cli_Nom, SerRea_Id, Ser_Nom, MC_Nom, Mod_Nom, Tur_Cod,  VehTip_Nom, Veh_Nom, Mot_Cod FROM boleta, cliente, serviciorealizado, servicios, turbo, marcacarro, modelocarro, motor, vehiculotipo, vehiculo WHERE Bol_Tip=0 AND Bol_Rea>7 AND Bol_Anu=0 AND cliente.Cli_Id=boleta.Cli_Id AND boleta.Bol_Id=serviciorealizado.DetBol_Id AND servicios.Ser_Id=serviciorealizado.Ser_Id AND boleta.Tur_Id=turbo.Tur_Id AND turbo.Mod_Id=modelocarro.Mod_Id AND modelocarro.MC_Id=marcacarro.MC_Id AND marcacarro.Mot_Id=motor.Mot_Id AND motor.VehTip_Id=vehiculotipo.VehTip_Id AND vehiculotipo.Veh_Id=vehiculo.Veh_Id AND Bol_FecTer='".$fechaAct."' ORDER BY Bol_FecEnt ASC, Bol_HorEnt ASC";
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
	        $Tur_Cod=$row["Tur_Cod"];
	        $Cli_Nom=$row["Cli_Nom"];
	        $SerRea_Id=$row["SerRea_Id"];
	        $Ser_Nom=$row["Ser_Nom"];

	        $vehTip_Nom=$row["VehTip_Nom"];
	        $veh_Nom=$row["Veh_Nom"];
	        $Mot_Cod=$row["Mot_Cod"];

	         $sql2 = "SELECT AccExt_Nom FROM boleta, boletaaccesoriosextra, accesoriosextras WHERE boleta.Bol_Id=boletaaccesoriosextra.Bol_Id AND boletaaccesoriosextra.AccExt_Id=accesoriosextras.AccExt_Id AND boleta.Bol_Id=".$Bol_Id;
			$result2 = $conexion->query($sql2);
			$observaciones = "";
			$cant = 0;
			if ($result2->num_rows > 0) 
			{
				while($row2 = $result2->fetch_assoc()) 
				{
					$accExt_NomAbr=$row2["AccExt_Nom"];
					if ($cant%2==0) 
						$observaciones = $observaciones.$accExt_NomAbr." - ";
					else
						$observaciones = $observaciones.$accExt_NomAbr."<br>";

					$cant = $cant + 1;
				}
			}

	        $minutoAnadir=30; 
			$segundos_minutoAnadir=$minutoAnadir*60; 

			$segundos_horaInicial=strtotime($horaAct); 
			$horaAux=date("H:i",$segundos_horaInicial+$segundos_minutoAnadir);

				

			$color = "#FFF";
	        	
	        echo '<tr>';
			echo '<td style="background-color: '.$color.'">'.$Bol_NumDoc.'</td>';
			echo '<td style="background-color: '.$color.'">'.$Bol_FecEnt.' / '.$Bol_HorEnt.'</td>';
			echo '<td style="background-color: '.$color.'"><b>Vehículo:</b> '.$veh_Nom.' / '.$vehTip_Nom.' / '.$Mot_Cod.'<br><b>Turbo:</b> '.$MC_Nom.' / '.$Mod_Nom.' / '.$Tur_Cod;
			echo '<td style="background-color: '.$color.'">'.$Cli_Nom.'</td>';
			echo '<td style="background-color: '.$color.'">'.$Ser_Nom;

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
			if($interno==1)
			{
				echo '<td style="background-color: '.$color.'"><button class="btn btn-primary" onclick="editarObservaciones('.$Bol_Id.')" data-toggle="modal" data-target="#popAccEct">'.$observaciones.'</button></td>';
				echo '<td style="background-color: '.$color.'"><button class="btn btn-primary" onclick="restaurar('.$Bol_Id.')">Restaurar</button></td>';
			}
			else
			{
				echo '<td style="background-color: '.$color.'">'.$observaciones.'</td>';
			}
			
			echo '</tr>';
			
	    }
	}

	?>
					
				

		</table>
	</div>
</div>