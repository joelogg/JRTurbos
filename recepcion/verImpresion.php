<?php
include ("../partes/conexion.php");

$Bol_Id = $_GET['Bol_Id'];
$soloVer = $_GET['soloVer'];

$Gar_BolId = "";
//primero verificar si tiene garantia
$sql = "SELECT Gar_Tip, Gar_BolId FROM garantia WHERE garantia.Bol_Id=".$Bol_Id." ORDER BY Gar_Id DESC";
$result = $conexion->query($sql);
if ($result->num_rows > 0) 
{
	if($row = $result->fetch_assoc()) 
	{
		$Gar_BolId=$row["Gar_BolId"];
		$Gar_Tip=$row["Gar_Tip"];
	}
}

if ($Gar_BolId!="") 
{

	$sql = "SELECT Bol_NumDoc FROM boleta WHERE boleta.Bol_Id=".$Gar_BolId;
	$result = $conexion->query($sql);
	if ($result->num_rows > 0) 
	{
		if($row = $result->fetch_assoc()) 
		{
			$Bol_NumDoc_Gar=$row["Bol_NumDoc"];

		}
	}
}


$sql = "SELECT Cli_Nom, Cli_Dir, Cli_Tel, Bol_Not, Bol_Tip, Bol_FecRec, Bol_FecEnt, Bol_HorEnt, Bol_Id, Bol_IGV, Ser_Nom, SerRea_Pre, serviciorealizado.Ser_Id, MC_Nom, Mod_Nom, Tur_Cod, VehTip_Nom, Veh_Nom, Mot_Cod, Bol_Pre, Bol_ACue, Bol_NumDoc FROM boleta, cliente, serviciorealizado, servicios, turbo, modelocarro, marcacarro, motor, vehiculotipo, vehiculo WHERE boleta.Cli_Id=cliente.Cli_Id AND boleta.Bol_Id=serviciorealizado.DetBol_Id AND serviciorealizado.Ser_Id=servicios.Ser_Id AND boleta.Tur_Id=turbo.Tur_Id AND turbo.Mod_Id=modelocarro.Mod_Id AND modelocarro.MC_Id=marcacarro.MC_Id AND marcacarro.Mot_Id=motor.Mot_Id AND motor.VehTip_Id=vehiculotipo.VehTip_Id AND vehiculotipo.Veh_Id=vehiculo.Veh_Id AND boleta.Bol_Id=".$Bol_Id;
$result = $conexion->query($sql);
if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
	{
		$cliNom=$row["Cli_Nom"];
		$cliDir=$row["Cli_Dir"];
		
		$cliTel1=$row["Cli_Tel"];
		if($cliTel1=="0")
			$cliTel1 = "";
		
		$bol_Not=$row["Bol_Not"];

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


		$fechaEntrega = date("d-m-Y", strtotime($fechaEntrega));



		$pos_marcaNom = strlen($marcaNom);
		for ($i=0; $i < strlen($marcaNom); $i++) 
		{ 
			if ($marcaNom[$i]==',') 
			{
				$pos_marcaNom = $i;
				break;
			}
		}

		$pos_modeloNom = strlen($modeloNom);
		for ($i=0; $i < strlen($modeloNom); $i++) 
		{ 
			if ($modeloNom[$i]==',') 
			{
				$pos_modeloNom = $i;
				break;
			}
		}

		$pos_turboCod = strlen($turboCod);
		for ($i=0; $i < strlen($turboCod); $i++) 
		{ 
			if ($turboCod[$i]==',') 
			{
				$pos_turboCod = $i;
				break;
			}
		}

		$pos_vehiculoNom = strlen($vehiculoNom);
		for ($i=0; $i < strlen($vehiculoNom); $i++) 
		{ 
			if ($vehiculoNom[$i]==',') 
			{
				$pos_vehiculoNom = $i;
				break;
			}
		}

		$pos_tipVehNom = strlen($tipVehNom);
		for ($i=0; $i < strlen($tipVehNom); $i++) 
		{ 
			if ($tipVehNom[$i]==',') 
			{
				$pos_tipVehNom = $i;
				break;
			}
		}

		$pos_motorCod = strlen($motorCod);
		for ($i=0; $i < strlen($motorCod); $i++) 
		{ 
			if ($motorCod[$i]==',') 
			{
				$pos_motorCod = $i;
				break;
			}
		}

		
		$marcaNom = substr($marcaNom, 0, $pos_marcaNom);
		$modeloNom = substr($modeloNom, 0, $pos_modeloNom);
		$turboCod = substr($turboCod, 0, $pos_turboCod);
		$vehiculoNom = substr($vehiculoNom, 0, $pos_vehiculoNom);
		$tipVehNom = substr($tipVehNom, 0, $pos_tipVehNom);
		$motorCod = substr($motorCod, 0, $pos_motorCod);
			
    }
}
else
{
	//echo "Error: " . $sql . "<br>" . $conexion->error;
}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title></title>
	<link rel="icon" href="../img/JRturbos-logo-favicon.png">
	<link rel="stylesheet" type="text/css" href="css/estiloProforma.css">

</head>
<body>
	<table class="tablaImprimir">
		<!-- ****************** Parte 1 ******************* -->
		<tr>
			<td>
				<table id="datosArriba" >
					<tr>
						<td>
							<center>
								<p class="sinEspacios pMediano"><b>Juan Rodríguez Valverde</b></p>
								<p class="sinEspacios pPequenio pocoInterlinea" style="margin-bottom: 3px;">TECNICO ESPECIALIZADO</p>
								<p class="sinEspacios pPequenio pocoInterlinea">Principal: CALLE E. BIRO 103-C</p>
								<p class="sinEspacios pPequenio pocoInterlinea">Sucursal: AV. INDUSTRIAL 123</p>
								<p class="sinEspacios pPequenio pocoInterlinea">APIMA - PAUCARPATA - AREQUIPA</p>
								<p class="sinEspacios pPequenio pocoInterlinea">Telf: 054-460805 RPC: 958399051 Entel: 999994770</p>						
								<p class="sinEspacios pPequenio pocoInterlinea">Página Web: www.jrturbos.pe / Facebook: JR TURBOS</p>
								<p class="sinEspacios pPequenio pocoInterlinea">ventas@jrturbos.pe / WhatsApp: 959739315</p>

							</center>
						</td>
						<td>
							<img id="logoImprimir" src="../img/JRturbos-logo.png">						
						</td>
						<td>
							<center><p>REPARACIÓN<br> VENTA Y<br> DELIVERY DE<br> TURBOS</p></center>
						</td>
						<td>
							<section id="numDocu">
<?php
							if($tipo==0)
								echo '<p class="sinEspacios">CONTRATO</p>';
							else
								echo '<p class="sinEspacios">PROFORMA</p>';

							$tamBol = strlen($Bol_NumDoc);
							$tamRestante = 5-$tamBol;
							$Bol_NumDocMod = $Bol_NumDoc;
							if($tamRestante<=0)
							{
								$Bol_NumDocMod = "0".$Bol_NumDocMod;
							}
							else
							{
								for ($i=0; $i<$tamRestante ; $i++) 
								{ 
									$Bol_NumDocMod = "0".$Bol_NumDocMod;
								}
							}
?>
								<br>
								<p class="sinEspacios">N° <?php echo $Bol_NumDocMod;?> </p>
							</section>
							<p class="sinEspacios" style="margin-left: 5px;"> Fecha: <?php echo $Bol_FecRec;?></p>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		
		<!-- ****************** Parte 2 ******************* -->
		<tr>
			<td>
				<table id="datosMedio">
					<tr>
						<td  valign="top">
							<table id="datosClienteDescripcion">
								<tr>
									<td style="border: 1px solid #555; border-radius: 10px;">
										<p class="sinEspacios">Señores: <?php echo $cliNom;?> </p>
										<p class="sinEspacios">Dirección: <?php echo $cliDir;?></p>
									</td>
								</tr>
								<tr>
									<td>
										<table id="descripcion">
											<tr>
												<th>Descripción</th>
												<th>Total</th>
											</tr>
<?php
																		
										//$servicioTrabajos
										echo '<tr>';
											echo '<td>'.$servicioNom;

											if ($Gar_BolId!="") 
											{
												echo '<ul style="margin:0;">';
												if ($Gar_Tip==0) //Solo Garantia
												{
													echo '<li>Garantía del contrato N° '.$Bol_NumDoc_Gar.'</li>';
												}
												echo '</ul>';
											}


											$sql = "SELECT Tra_Nom FROM trabajos WHERE Ser_Id=".$servicioId;
											$result = $conexion->query($sql);
											if ($result->num_rows > 0) 
											{
												echo '<ul style="margin:0; line-height:16px">';
												while($row = $result->fetch_assoc()) 
												{
											        $tra_Nom=$row["Tra_Nom"];
											        echo '<li>'.$tra_Nom.'</li>';
											    }

											   	$sql3 = "SELECT PieRea_Pre, PieRea_Tra, PieRea_Tip, Pie_Nom FROM boleta, serviciorealizado, piesarealizada, piesa  WHERE boleta.Bol_Id=serviciorealizado.DetBol_Id AND serviciorealizado.SerRea_Id=piesarealizada.SerRea_Id AND piesarealizada.Pie_Id=piesa.Pie_Id AND boleta.Bol_Id=".$Bol_Id;
												$result3 = $conexion->query($sql3);
												if ($result3->num_rows > 0) 
												{
													while($row3 = $result3->fetch_assoc()) 
													{
														$pieRea_Pre=$row3["PieRea_Pre"];
														$pie_Nom=$row3["Pie_Nom"];
														$pieRea_Tra=$row3["PieRea_Tra"];

														if ($pieRea_Pre<=0) 
														{
															if ($pieRea_Tra=="1") 
															{
																$pie_Nom = "Calibración ".$pie_Nom;
															}
															elseif ($pieRea_Tra=="2") 
															{
																$pie_Nom = "Venta ".$pie_Nom;
															}

															$pieRea_Tip=$row3["PieRea_Tip"];
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
													}
												}

											    echo '</ul>';
											}

											echo '</td>';
											echo '<td>'.$servicioPrecio.'</td>';
										echo '</tr>';


										
										$sql = "SELECT PieRea_Pre, PieRea_Tra, PieRea_Tip, Pie_Nom FROM boleta, serviciorealizado, piesarealizada, piesa  WHERE boleta.Bol_Id=serviciorealizado.DetBol_Id AND serviciorealizado.SerRea_Id=piesarealizada.SerRea_Id AND piesarealizada.Pie_Id=piesa.Pie_Id AND boleta.Bol_Id=".$Bol_Id;
										$result = $conexion->query($sql);
										if ($result->num_rows > 0) 
										{
											while($row = $result->fetch_assoc()) 
											{
												$pieRea_Pre=$row["PieRea_Pre"];
												$pie_Nom=$row["Pie_Nom"];
												$pieRea_Tra=$row["PieRea_Tra"];

												if ($pieRea_Pre>0)
												{
													if ($pieRea_Tra=="1") 
													{
														$pie_Nom = "Calibración ".$pie_Nom;
													}
													elseif ($pieRea_Tra=="2") 
													{
														$pie_Nom = "Venta ".$pie_Nom;
													}

													$pieRea_Tip=$row["PieRea_Tip"];
													if ($pieRea_Tip=="1") 
													{
														$pie_Nom = $pie_Nom." Neumático";
													}
													elseif ($pieRea_Tip=="2") 
													{
														$pie_Nom = $pie_Nom. " Eléctrico";
													}
													


													echo '<tr>';
														echo '<td>'.$pie_Nom.'</td>';
														echo '<td>'.$pieRea_Pre.'</td>';											
													echo '</tr>';
												}
											}
										}
										
?>

										</table>
									</td>
								</tr>
							</table>
						</td>
						<td  valign="top">
							<table id="datosDerecha">
								<tr>
									<td>
										<table style="width: 100%; border-collapse: collapse;  ">
											<tr>
												<td>Entrega:</td>
												<td style="border-bottom: 1px solid gray;"><p class="sinEspacios"> <?php echo $fechaEntrega.' / '. $horaEntrega.'hrs.';?></p></td>
											</tr>
											<tr>
												<td>Telefono:</td>
												<td style="border-bottom: 1px solid gray;"><p class="sinEspacios"> <?php echo $cliTel1;?></p></td>
											</tr>
											<tr>
												<td>Turbo:</td>
												<td style="border-bottom: 1px solid gray;"><p class="sinEspacios"> <?php echo $marcaNom.' / '.$modeloNom;?></p></td>
											</tr>
											<tr>
												<td>Vehículo:</td>
												<td style="border-bottom: 1px solid gray;"><p class="sinEspacios"> <?php echo $vehiculoNom.' / '. $tipVehNom.' / '.$motorCod;?></p></td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td style="text-align: justify;">
										
										<p class="sinEspacios pPequenio">VALIDEZ DE GARANTIA:</p>
										<p class="sinEspacios pPequenio pocoInterlinea">Debe de cumplir con los siguientes requerimientos:</p>
										<p class="sinEspacios pPequenio pocoInterlinea">-Mantener filtro de aire y aceite limpio.</p>
										<p class="sinEspacios pPequenio pocoInterlinea">-Bomba de aceite en buen estado.</p>
										<p class="sinEspacios pPequenio pocoInterlinea">-Cambiar aceite cada 5000 km.</p>
										<p class="sinEspacios pPequenio pocoInterlinea">-Por ningun motivo desamar o manipular el Turbo.</p>
										<p class="sinEspacios pPequenio pocoInterlinea">De lo contrario la garantía quedará anulada.</p>
										<p class="sinEspacios pPequenio pocoInterlinea"><b>NOTA:</b> Pasado 3 meses de no recoger su Turbo, la empresa no se responsabiliza ni se hará cargo del componente.</p>
									</td>
								</tr>
							</table>
						</td>
				   	</tr>
				</table>
			</td>
		</tr>

		<!-- ****************** Parte 3 ******************* -->
		<tr>
			<td>
				<table id="datosAbajo">
					<tr>
						<td id="tdobservaciones" valign="top">
							<section id="observaciones">
								Observaciones:								
<?php


						 $sql2 = "SELECT AccExt_Nom FROM boleta, boletaaccesoriosextra, accesoriosextras WHERE boleta.Bol_Id=boletaaccesoriosextra.Bol_Id AND boletaaccesoriosextra.AccExt_Id=accesoriosextras.AccExt_Id AND boleta.Bol_Id=".$Bol_Id;
							$result2 = $conexion->query($sql2);
							$observaciones = "";
							if ($result2->num_rows > 0) 
							{
								while($row2 = $result2->fetch_assoc()) 
								{
									$accExt_Nom=$row2["AccExt_Nom"];
									$observaciones = $observaciones.$accExt_Nom.", ";
								}
							}
							$observaciones = substr($observaciones, 0, strlen($observaciones)-2);
							echo $observaciones;

							echo " /Dirección: ".$bol_Not;

							if ($Gar_BolId!="") 
							{
								echo '<ul style="margin:0;">';
								if ($Gar_Tip==1) //reparacion
								{
									echo '<li> Garantía del contrato N° '.$Bol_NumDoc_Gar.'</li>';
								}
								echo '</ul>';
							}

							

?>
								
							</section>

<?php
						if($igv==1)
						{
							echo '<p class="sinEspacios pPequenio">Canjear por Boleta o Factura / Cotización incluye I.G.V</p>';
						}
						else
						{
							echo '<p class="sinEspacios pPequenio">Canjear por Boleta o Factura / Cotización no incluye I.G.V</p>';
						}
							
?>
						</td>
						<td>
							<table id="precioTotal" style="margin-left: 5px;">
								<tr>
									<td>A/CUENTA</td>
									<td>S/. <?php echo $aCuenta;?> </td>
								</tr>
								<tr>
									<td>SALDO</td>
									<td>S/. <?php echo ($precio-$aCuenta);?> </td>
								</tr>
								<tr>
									<td>TOTAL</td>
									<td>S/. <?php echo $precio;?> </td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>

	</table>
	<button id="btnImprimir" type="button" class="btn-lg btn-success btn130 oculto-impresion" onclick="imprimir()">
		<p class="textBtn">Imprimir</p>
	</button>
<?php
if ($soloVer=="1" || $soloVer==1) 
{
	echo '<button id="btnCasa" type="button" class="btn-lg btn-warning btn130 oculto-impresion" data-dismiss="modal"  style="margin-left: 465px">
		<p class="textBtn">Atras</p>
	</button>';
}
else
{
	echo '<button id="btnCasa" type="button" class="btn-lg btn-warning btn130 oculto-impresion" onclick="actualizarPagina()" style="margin-left: 465px">
		<p class="textBtn">Regresar</p>
	</button>';
}

?>
</body>