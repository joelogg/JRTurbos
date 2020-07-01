<div class="row" style="margin: 0;">
	<div class="col-lg-12" style="padding: 0;">

		<div class="col-sm-10" style="padding: 0;">

			<div class="row" style="margin: 0;">

				<div class="col-sm-5" style="padding: 0;">
					
					<table class="table table-responsive">
						<tr>
							<td>Nombre: </td>
						  	<td id="rNombre"></td>
						</tr>
						<tr>
							<td>DNI: </td>
							<td id="rDNI"></td>
						</tr>
						<tr>
							<td>Dirección:</td>
							<td id="rDireccion"></td>
						</tr>
						<tr>
							<td>Ciudad:</td>
							<td id="rCiudad"></td>
						</tr>
						<tr>
							<td>Tel: </td>
							<td id="rTel"></td>
						</tr>
						<tr>
							<td>Destino: </td>
							<td>
								<input type="text" class="form-control" id="rDes" style="text-transform: uppercase;" >
							</td>
						</tr>
					</table>

					<br>
					<form class="form-horizontal" action="" onSubmit="return false" style="margin-top: 20px; text-align: left;">
						
						<fieldset disabled>
							<div class="form-group">
								<label class="col-sm-4">Precio:</label>
								<div class="col-sm-8">
									<input type="number" class="form-control"  id="precio" disable>
								</div>
							</div>
						</fieldset>

						<div class="form-group">
							<label class="col-sm-4">A Cuenta:</label>
							<div class="col-sm-8">
								<input type="number" class="form-control" id="aAcuenta" onkeyup="aCuenta()" onclick="borrarCero(this)">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4">Saldo:</label>
							<div class="col-sm-8">
								<input type="number" id="saldo" class="form-control" disabled>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4">Hora Entrega:</label>
							<div class="col-sm-8">
								<input id="timepicker" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-4">Fecha Entrega:</label>
							<div class="col-sm-8">
								<div class="input-group date">
									<input  id="datepicker" type="text" class="form-control" disabled style="background-color: #FFF">
									<span class="input-group-addon" onclick="mostrarDatee()">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
    							</div>
							</div>
						</div>
					</form>

					<div id="divAccesoriosextras">
				  	</div>


				</div>

				<div class="col-sm-7" style="padding: 0;">

				
					<table class="table table-responsive ticket">
						<tr>
							<th>Marca</th>
						  	<th>Modelo</th>
						  	<th>Cod</th>
						</tr>
						<tr>
							<td id="pMarcaVehiculo"></td>
						  	<td id="pModeloVehiculo"></td>
						  	<td id="pCodigoVehiculo"></td>
						</tr>
						<tr>
							<td id="pMarca"></td>
						  	<td id="pModelo"></td>
						  	<td id="pCodigo"></td>
						</tr>						
						<tr>
						  	<td colspan="3">
						  		<table id="tablaPiezasResumen" class="table table-responsive">
						  			<tr>
									  	<td>
									  		<span>
									  			<p id="pServicio"></p>
										  		<p id="pTrabajos"></p>
											</span>
									  	</td>
									  	<td>S/. <input type="number" id="idPre100" onkeyup="sumarPrecios()" onclick="borrarCero(this)"></td>
									</tr>		
									
								</table>
						  	</td>
						</tr>
						<tr>
						  	<td colspan="3">
						  		<center>
						  			<button id="btnConIGV" class="btnAcc btnEstilo2" onclick="agregarIGV()" style="background-color: #FFF; width: 100px;">Incluido IGV</button>
						  			<button id="btnSinIGV" class="btnAcc btnEstilo2" onclick="quitarIGV()" style="background-color: green; width: 100px;">Sin IGV</button>
						  		</center>
						  	</td>
						</tr>	
					</table>


						
				</div>
			</div>
		</div>
 
		<div class="col-sm-2" style="padding: 0;">
			
			<div class="row" id="cabezera" style="margin: 0;">
				<div class="col-lg-12" style="padding: 0;">
					<center>
						<img id="logoPeque" src="../img/JRturbos-logo.png">
					</center>
				</div>
			</div>
			<div class="row" style="margin: 0;">
				<div class="col-lg-12" style="padding: 0;">
					<center>
						<button id="btnAtras" type="button" class="btn-lg btn-warning btn130" onclick="turbo()"><p class="textBtn">Atras</p></button>
						<br>
						<button id="btnImprimeProforma" type="button" class="btn-lg btn-info btn130" data-toggle="modal" data-target="#popUpImprimir" onclick="imprimirProforma()"><p class="textBtn">Proforma</p></button>
						<br>
						<button id="btnFinalizar" type="button" class="btn-lg btn-success btn130" data-toggle="modal" data-target="#popUpImprimir" onclick="finalizar(
						)"><p class="textBtn">Contrato</p></button>

					</center>
				</div>
			</div>
		</div>
	</div>
</div>

