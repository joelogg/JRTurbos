<div id="cabezera" class="row">
	<div class="col-lg-12">
		<img id="logo" src="../img/JRturbos-logo.png">
		<button id="btnCerrarSesion" class="btn btn-danger" onclick="cerrarSesion()">Cerrar Sesión</button>
	</div>
</div>
<div class="row" id="contenido">
	<form class="form-horizontal" action="" onSubmit="guardarCliente(); return false" style="margin-top: 20px; 
			text-align: left;">	
	<div class="col-sm-10">
		<center>
		<!--
			<form class="form-horizontal" action="" onSubmit="return false" style="margin-top: 20px; 
			text-align: left;">	
		-->
			
				<div class="form-group">
					<label class="col-sm-1"></label>
					<label class="col-sm-2">
						<button id="btnDNI" type="button" class="btn btn-success" onclick="usarDNI()">DNI:</button>
						<button id="btnRUC" type="button" class="btn" onclick="usarRUC()">RUC:</button>
					</label>
					<div class="col-sm-9" id="inputDniRuc">
						<input type="number" class="form-control" id="dniI" maxlength="8" placeholder="Ingresar DNI" oninvalid="setCustomValidity(`Ingrese DNI Correcto.`)" oninput="setCustomValidity(``); if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeyup="habilitarBtnGuardarCliente()" style="text-transform: uppercase;" required autofocus>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-1"></label>
					<label class="col-sm-2" >Nombre:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="nombreI" autocomplete="off" 
						maxlength="60" onfocus="comprobarCliente()" placeholder="Ingresar Nombre Completo" oninvalid="setCustomValidity('Ingrese Nombre Completo.')" oninput="setCustomValidity(``); if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeyup="habilitarBtnGuardarCliente()" style="text-transform: uppercase;" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-1"></label>
					<label class="col-sm-2">Dirección:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="dirI" autocomplete="off"
						 maxlength="200" placeholder="Ingresar Dirección" oninvalid="setCustomValidity('Ingrese Dirección.')" oninput="setCustomValidity(``); if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeyup="habilitarBtnGuardarCliente()" style="text-transform: uppercase;" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-1"></label>
					<label class="col-sm-2">Ciudad:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="ciuI" autocomplete="off" 
						maxlength="20" placeholder="Ingresar Ciudad" oninvalid="setCustomValidity('Ingrese Ciudad.')" oninput="setCustomValidity(``); if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeyup="habilitarBtnGuardarCliente(); " style="text-transform: uppercase;" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-1"></label>
					<label class="col-sm-2">Teléfono:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="telI" maxlength="40" autocomplete="off" 
						placeholder="Ingresar Teléfono" oninvalid="setCustomValidity('Ingrese Telefono.')" oninput="setCustomValidity(``); if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeyup="habilitarBtnGuardarCliente()" style="text-transform: uppercase;" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-1"></label>
					<label class="col-sm-2">Destino:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="desI" autocomplete="off" 
						maxlength="200" placeholder="Ingresar Destino de Entrega" oninput="setCustomValidity(``); if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" style="text-transform: uppercase;">
					</div>
				</div>
				
			

			


				<div id="historialClie">		
				</div>
			
		</center>
	</div>




	<div id="botonesAbajo" class="col-sm-2">
		<center>
			<button id="btnAtras" type="button" class="btn-lg btn-warning btn130" onclick="cancelarCliente()"><p class="textBtn">Atras</p></button>
			<br>
			<button id="btnGuardar" type="submit" class="btn-lg btn-success btn130" disabled><p class="textBtn">Guardar</p></button>
		</center>
	</div>

	</form>
</div>







