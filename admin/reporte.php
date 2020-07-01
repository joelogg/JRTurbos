<?php
include ("../partes/conexion.php"); 







date_default_timezone_set('America/Lima');
$fechaFin = date('Y-m-d');
$fechaIni = strtotime ( '-30 day' , strtotime ( $fechaFin ) ) ;
$fechaIni = date ( 'Y-m-d' , $fechaIni );


?>

<div id="cabezera" class="row">
	<div class="col-lg-12">
		<img id="logo" src="../img/JRturbos-logo.png" onclick="ventanaPrincipal()">
		<button id="btnCerrarSesion" class="btn btn-danger" onclick="cerrarSesion()">Cerrar Sesión</button>
	</div>
</div>

<div class="row" id="contenido">
	<div class="col-lg-12">
		<center>
			<table>
			 	<tr>
					<td>Fecha Inicio:</td>
					<td> <input type="date" id="fechaIni" value="<?php echo $fechaIni;?>" ></td>
				</tr>
				<tr>
					<td>Fecha Fin:</td>
					<td> <input type="date" id="fechaFin" value="<?php echo $fechaFin;?>"></td>
				</tr>
				<tr>
					<td><button onclick="reporte()" class="btnForm btnEstilo1">Buscar</button></td>

					<td>
						<button onclick="generateexcel('tablaSelect')" class="btnForm btnEstilo1">Exportar Excel</button>
					</td>

				</tr>
			</table>
		</center>
		<center>
			<table id="tablaSelect" class="table table-responsive" >
			<tr>
				<th>N Contrato</th>
				<th>Fecha Receppción</th>
				<th>Cliente</th>
				<th>Dirección</th>
				<th>Servicio</th>
				<th>Precio</th>
				<th>Piezas</th>

				<th>Fecha Entrega</th>
				<th>Telefono</th>
				<th>Turbo</th>
				<th>Vehiculo</th>

				<th>Observaciones</th>
				<th>A Cuenta</th>
				<th>Saldo</th>
				<th>Precio Total</th>
			</tr>


			
<?php
$fechaIni = $_GET['fechaIni'];
$fechaFin = $_GET['fechaFin'];

if ($fechaIni== " ") 
{
	date_default_timezone_set('America/Lima');
	$fechaFin = date('Y-m-d');
	$fechaIni = strtotime ( '-30 day' , strtotime ( $fechaFin ) ) ;
	$fechaIni = date ( 'Y-m-d' , $fechaIni );
}





$sql = "SELECT Cli_Nom, Cli_Dir, Cli_Tel, Bol_Tip, Bol_FecRec, Bol_FecEnt, Bol_HorEnt, Bol_Id, Bol_IGV, Ser_Nom, SerRea_Pre, serviciorealizado.Ser_Id, MC_Nom, Mod_Nom, Tur_Cod, VehTip_Nom, Veh_Nom, Mot_Cod, Bol_Pre, Bol_ACue, Bol_NumDoc FROM boleta, cliente, serviciorealizado, servicios, turbo, modelocarro, marcacarro, motor, vehiculotipo, vehiculo WHERE boleta.Cli_Id=cliente.Cli_Id AND boleta.Bol_Id=serviciorealizado.DetBol_Id AND serviciorealizado.Ser_Id=servicios.Ser_Id AND boleta.Tur_Id=turbo.Tur_Id AND turbo.Mod_Id=modelocarro.Mod_Id AND modelocarro.MC_Id=marcacarro.MC_Id AND marcacarro.Mot_Id=motor.Mot_Id AND motor.VehTip_Id=vehiculotipo.VehTip_Id AND vehiculotipo.Veh_Id=vehiculo.Veh_Id AND boleta.Bol_FecEnt>='".$fechaIni."' AND boleta.Bol_FecEnt<='".$fechaFin."'";

$result = $conexion->query($sql);
if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
	{
		$cliNom=$row["Cli_Nom"];
		$cliDir=$row["Cli_Dir"];
		
		$cliTel=$row["Cli_Tel"];
		if($cliTel=="0")
			$cliTel = "";
		

		$tipo=$row["Bol_Tip"];
		$Bol_FecRec=$row["Bol_FecRec"];
		$Bol_Id=$row["Bol_Id"];
		$servicioNom=$row["Ser_Nom"];
		$servicioPrecio=$row["SerRea_Pre"];
		$servicioId=$row["Ser_Id"];
		$fechaEntrega=$row["Bol_FecEnt"];
		$horaEntrega=$row["Bol_HorEnt"];

		$marcaNom=$row["MC_Nom"];
		$modeloNom=$row["Mod_Nom"];
		$turboCod=$row["Tur_Cod"];
		$vehiculoNom=$row["VehTip_Nom"];
		$tipVehNom=$row["Veh_Nom"];
		$motorCod=$row["Mot_Cod"];
		
		$precio = $row['Bol_Pre'];
		$aCuenta = $row['Bol_ACue'];        

		$Bol_NumDoc = $row['Bol_NumDoc'];
		$igv = $row['Bol_IGV']; 
			


		echo '<tr>';
		echo '<td>'.$Bol_NumDoc.'</td>';
		echo '<td>'.$Bol_FecRec.'</td>';
		echo '<td>'.$cliNom.'</td>';
		echo '<td>'.$cliDir.'</td>';
		echo '<td>'.$servicioNom.'</td>';
		echo '<td>S/'.$servicioPrecio.'</td>';

				
		
		echo '<td>';
		$sql2 = "SELECT PieRea_Pre, PieRea_Tra, PieRea_Tip, Pie_Nom FROM boleta, serviciorealizado, piesarealizada, piesa  WHERE boleta.Bol_Id=serviciorealizado.DetBol_Id AND serviciorealizado.SerRea_Id=piesarealizada.SerRea_Id AND piesarealizada.Pie_Id=piesa.Pie_Id AND boleta.Bol_Id=".$Bol_Id;
		$result2 = $conexion->query($sql2);
		if ($result2->num_rows > 0) 
		{
			echo '<ul>';
			while($row2 = $result2->fetch_assoc()) 
			{
				$pieRea_Pre=$row2["PieRea_Pre"];
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
													
					echo '<li>'.$pie_Nom.': '.$pieRea_Pre.'</li>';											
			}
			echo '</ul>';
		}
		echo '</td>';
					

		echo '<td>'.$fechaEntrega.' / '. $horaEntrega.'hrs.</td>';
		echo '<td>'.$cliTel.'</td>';
		echo '<td>'.$marcaNom.'/'.$modeloNom.'</td>';
		echo '<td>'.$vehiculoNom.'/'. $tipVehNom.'/'.$motorCod.'</td>';
											


		echo '<td>';
		$sql2 = "SELECT AccExt_Nom FROM boleta, boletaaccesoriosextra, accesoriosextras WHERE boleta.Bol_Id=boletaaccesoriosextra.Bol_Id AND boletaaccesoriosextra.AccExt_Id=accesoriosextras.AccExt_Id AND boleta.Bol_Id=".$Bol_Id;
		$result2 = $conexion->query($sql2);

		if ($result2->num_rows > 0) 
		{
			echo '<ul>';
			while($row2 = $result2->fetch_assoc()) 
			{
				$accExt_Nom=$row2["AccExt_Nom"];
				echo '<li>'.$accExt_Nom.'</li>';
			}
			echo '</ul>';
		}
		echo '</td>';

		echo '<td>S/'.$aCuenta.'</td>';
		echo '<td>S/'.($precio-$aCuenta).'</td>';
		echo '<td>S/ '.$precio.'</td>';
							
		echo '</tr>';

	}
}
else
{
	//echo "Error: " . $sql . "<br>" . $conexion->error;
}
?>

				
			</table>
						
		</center>
	</div>
</div>

