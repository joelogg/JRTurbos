<div id="cabezera" class="row">
	<div class="col-lg-12">
		<img id="logo" src="../img/JRturbos-logo.png">
		<button id="btnCerrarSesion" class="btn btn-danger" onclick="cerrarSesion()">Cerrar Sesión</button>
	</div>
</div>
<div class="row" id="contenido">
	<div class="col-lg-8">
		<center>
			<section id="secBotones">
			
				
				<button id="btnContrato" class="btn btn-default btnPrincipal" type="button" onclick="contrato()">
					<p class="textBtn">Contrato</p>
				</button>
				
				<button id="btnCliente" class="btn btn-default btnPrincipal" type="button" onclick="buscarCliente(-1)">
					<p class="textBtn">Clientes</p>
				</button>
						
				<button id="btnResumen" class="btn btn-default btnPrincipal" type="button" onclick="resumenOrdenes(-1)">
					<p class="textBtn">Resumen <br>del día</p>
				</button>
					
				<button id="btnTurbo" class="btn btn-default btnPrincipal" type="button" onclick="buscarTurbo(-1)">
					<p class="textBtn">Historial<br> Turbos</p>
				</button>
				
				<button id="btnProforma" class="btn btn-default btnPrincipal" type="button" onclick="verProformas(-1)">
					<p class="textBtn">Cotizaciones</p>
				</button>
			
				<button id="btnGarantia" class="btn btn-default btnPrincipal" type="button" onclick="buscarGarantia(-1)">
					<p class="textBtn">Garantias</p>
				</button>
				
				<button id="btnProduccion" class="btn btn-default btnPrincipal" type="button" onclick="verProduccion()">
					<p class="textBtn">Producción</p>
				</button>
				
			
			</section>
		</center>
	</div>

	<div class="col-lg-4">

		<table class="table table-responsive" style="margin-top: 6%">
			<tr class="info">
				<th>Nº Contrato</th>
				<th>Fecha / Hora</th>
				<th>Turbo</th>
			</tr>

<?php  
	include ("../partes/conexion.php"); 
	date_default_timezone_set('America/Lima');
	$fechaAct = date('Y-m-d');

	$sql = 'SELECT DISTINCT(Bol_NumDoc), Bol_FecEnt, Bol_HorEnt, MC_Nom, Mod_Nom FROM boleta, serviciorealizado, servicios, turbo, marcacarro, modelocarro WHERE Bol_Tip=0 AND boleta.Bol_Id=serviciorealizado.DetBol_Id AND serviciorealizado.Ser_Id=servicios.Ser_Id AND boleta.Tur_Id=turbo.Tur_Id AND turbo.Mod_Id=modelocarro.Mod_Id AND modelocarro.MC_Id=marcacarro.MC_Id AND servicios.Ser_Id!=3 AND servicios.Ser_Id!=4 AND Bol_Anu=0 AND Bol_FecRec="'.$fechaAct.'" ORDER BY Bol_FecEnt ASC, Bol_HorEnt ASC';
	$result = $conexion->query($sql);

	$i=1;
	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{
			$Bol_NumDoc=$row["Bol_NumDoc"];
	        $Bol_FecEnt=$row["Bol_FecEnt"];
	        $Bol_HorEnt=$row["Bol_HorEnt"];
	        $MC_Nom=$row["MC_Nom"];
	        $Mod_Nom=$row["Mod_Nom"];

	        echo '<tr>';
			echo '<td>'.$Bol_NumDoc.'</td>';

			$Bol_FecEnt = date("d-m-Y", strtotime($Bol_FecEnt));
			echo '<td>'.$Bol_FecEnt.' / '.$Bol_HorEnt.'</td>';
			echo '<td>'.$MC_Nom.' / '.$Mod_Nom.'</td>';
			echo '</tr>';
			$i=$i+1;
	    }
	}
	?>

	
		</table>		
	</div>
</div>








