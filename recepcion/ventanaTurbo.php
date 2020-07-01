<div class="row" style="margin: 0;">
	<div class="col-lg-12" style="padding: 0;">

		<div class="col-sm-10" style="padding: 0; margin-top: 20px;">

			<div class="row" style="margin: 0;">

				<div class="col-sm-5" style="padding: 0;">
					
					<section id="botonesMedio">
						<button id="btnLimpiar" class="btn-default btnOpciones" type="button" onclick="limpiarTodoTurbo()" ><p class="textBtn">Limpiar</p></button>
						<button id="btnVehiculos" class="btn-default btnOpciones" type="button" onclick="vehiculos()" ><p class="textBtn">Vehículos</p></button>	
						<button id="btnServicio" class="btn-default btnOpciones" type="button" onclick="servicios()" hidden="true" ><p class="textBtn">Servicios</p></button>	
					</section>

					<section id="infoSeleccionada">
					
						<section id="listaTurbos">
							<table class="table table-responsive">
								<tr class="tablaCabecera">
									<th><button class="btn btn-primary btnRegresarEstado" onclick="limpiarTodoTurbo()" id="btnVehiculoRegresar" disabled>Vehículo</button></th>
								  	<th><button class="btn btn-primary btnRegresarEstado" onclick="retrocederSelectorVehiculo()" id="btnTipVehRegresar" disabled>Modelo</button></th>
								  	<th><button class="btn btn-primary btnRegresarEstado" onclick="retrocederSelectorTipVeh()" id="btnMotorRegresar" disabled>Motor</button></th>
								</tr>
								<tr>
									<td id="pMarcaVeh"></td>
								  	<td id="pModeloVeh"></td>
								  	<td id="pMotor"></td>
								</tr>
								<tr>
									<th><button class="btn btn-primary btnRegresarEstado" onclick="retrocederSelectorMotor()" id="btnTurboRegresar" disabled>Turbo</button></th>
								  	<th><button class="btn btn-primary btnRegresarEstado" onclick="retrocederSelectorMarca()" id="btnModeloTurboRegresar" disabled>Modelo</button></th>
								  	<th><button class="btn btn-primary btnRegresarEstado" onclick="retrocederSelectorModelo()" id="btnCodTurboRegresar" disabled>Código</button>
								  		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#popUpBuscarCodTur">
								  			<span class="glyphicon glyphicon-search">
								  		</button>
								  	</th>
								</tr>
								<tr>
									<td id="pMarca"></td>
								  	<td id="pModelo"></td>
								  	<td id="pCodigo"></td>
								</tr>
								<tr>
								  	<td colspan="3">
								  		<table id="tablaPiezasPro" class="table table-responsive">
								  			

										</table>
								  	</td>
								</tr>
								<tr>
								  	<td colspan="3">
								  		<span>
								  			<p id="pServicio"></p>
									  		<p id="pTrabajos"></p>
										</span>
								  	</td>
								</tr>				
							</table>
						</section>

					</section>

					
				</div>

				<div class="col-sm-7" style="padding: 0;">

						<p id="indicadorVentanaSuperior" style="background-color: #2196F3; margin:0; height: 30px; text-align: center; color: #fff; font-size: 16px; font-weight:bold;">aa</p>

						
						<section id="contenidoMedio">
							<?php include ("seccionVehiculo.php"); ?>
						</section>
						
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
						<button id="btnAtras" type="button" class="btn-lg btn-warning btn130" onclick="cancelarTurbo()"><p class="textBtn">Atras</p></button>
						<br>
						<button id="btnGuardar" type="button" class="btn-lg btn-success btn130" onclick="guardarTurbo()" disabled><p class="textBtn">Guardar</p></button>
					</center>
				</div>
			</div>
		</div>
	</div>
</div>



			
