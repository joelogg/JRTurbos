<?php include ("../partes/sesionStart.php"); ?>
<?php include ("actual.php"); ?>
<?php include ("../partes/seguridad.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Recepcion</title>
	<link rel="icon" href="../img/JRturbos-logo-favicon.png">
	<link rel="stylesheet" type="text/css" href="css/estiloRecepcion.css">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	
  	<!-- hora -->
  	<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script src="js/gijgo.min.js" type="text/javascript"></script>
    <link href="css/gijgo.min.css" rel="stylesheet" type="text/css" />
    

    <!-- fecha -->
  	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" type="text/javascript"></script>
  	<link rel="stylesheet" href="css/jquery-ui.css"/>
  	<script src="js/jquery-ui.js" type="text/javascript"></script>


<!--
  	
  	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>


    <-- hora->
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    
    <-- fecha->
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" type="text/javascript"></script>
-->
  	


</head>

<body onload="ventanaPrincipal()">
	<div id="contenidoTotal" class="container-fluid oculto-impresion">


	</div>
	
	<?php include ("popUps.php"); ?>




<script src="js/cliente.js"></script>
<script src="js/turbo.js"></script>
<script>

	function cargarPick() 
	{
		    
      
		//fecha

		$.datepicker.regional['es'] = {
				 closeText: 'Cerrar',
				 prevText: '< Ant',
				 nextText: 'Sig >',
				 currentText: 'Hoy',
				 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
				 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
				 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
				 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
				 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
				 weekHeader: 'Sm',
				 dateFormat: 'dd-mm-yy',
				 firstDay: 1,
				 isRTL: false,
				 showMonthAfterYear: false,
				 yearSuffix: ''
				 };


		$.datepicker.setDefaults($.datepicker.regional['es']);
		$(function () {
		$("#datepicker").datepicker({
					uiLibrary: 'bootstrap', 
					orientation: "top right"
				});
		});



		//hora

		$('#timepicker').timepicker({
		        	footer: true,
		            uiLibrary: 'bootstrap'
		        });
	}

	function mostrarDatee()
	{
		$('#datepicker').datepicker("show");
		ponerZindex();
	}


	const clienteObj = new Cliente();
	const turboObj = new Turbo();
	
	var xhttp;
	if (window.XMLHttpRequest) 
	{
	    xhttp = new XMLHttpRequest();
	} 
	else 
	{
	    // code for IE6, IE5
	    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	function mayus(e) 
	{
	    e.value=e.value.toUpperCase();	    
	}

	function cerrarSesion()
	{
		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
		    	location.reload();
		    }
		};
		xhttp.open("GET", "../partes/cerrarSesion.php", true);
		xhttp.send();
	}

	function actualizarPagina() 
	{
		location.reload();
	}

	function ventanaPrincipal()
	{
		Bol_Id = -1;
		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
				document.getElementById('contenidoTotal').innerHTML = validar; 
		    }
		};
		xhttp.open("GET", "ventanaPrincipal.php", true);
		xhttp.send();
	}

	var dniRuc = true;//true si se usa dni
	function contrato() 
	{
		origenDatos = 0;
		clienteObj.limpiar();
		turboObj.limpiar();
		turboObj.destino = "";
		dniRuc = true;
		cliente();
	}


//========================== cliente ==========================
	function cliente()
	{
		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
		    	document.getElementById('contenidoTotal').innerHTML = validar; 

		    	if (dniRuc) 
		    	{
		    		usarDNI();
		    	}
		    	else
		    	{
		    		usarRUC();
		    	}

		    	document.getElementById('dniI').value = clienteObj.dni;
			    document.getElementById('nombreI').value = clienteObj.nombre;
			    document.getElementById('dirI').value = clienteObj.direccion;
			    document.getElementById('ciuI').value = clienteObj.ciudad;
			    document.getElementById('telI').value = clienteObj.telefono;
			    document.getElementById('desI').value = turboObj.destino;
		    }
		};
		xhttp.open("GET", "ventanaCliente.php", true);
		xhttp.send();
	}

	function cancelarCliente() 
	{
		clienteObj.limpiar();
		turboObj.limpiar();
		ventanaPrincipal();
	}

	
	function usarDNI()
	{
		dniRuc = true;
		var aux = document.getElementById("dniI").value;
		if(aux.length > 8) 
			aux = aux.slice(0, 8);
		document.getElementById("btnDNI").className = "btn btn-success";	
		document.getElementById("btnRUC").className = "btn";
		
		document.getElementById("inputDniRuc").innerHTML = '<input type="number" class="form-control" id="dniI" maxlength="8" value="'+aux+'" placeholder="Ingresar DNI" oninvalid="setCustomValidity(`Ingrese DNI Correcto.`)" oninput="setCustomValidity(``); if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeyup="habilitarBtnGuardarCliente()" style="text-transform: uppercase;" required autofocus>';
	}

	function usarRUC()
	{
		dniRuc = false;
		var aux = document.getElementById("dniI").value;
		document.getElementById("btnDNI").className = "btn";	
		document.getElementById("btnRUC").className = "btn btn-success";
		
		document.getElementById("inputDniRuc").innerHTML = '<input type="number" class="form-control" id="dniI" maxlength="11" value="'+aux+'" placeholder="Ingresar RUC" oninvalid="setCustomValidity(`Ingrese RUC Correcto.`)" oninput="setCustomValidity(``); if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeyup="habilitarBtnGuardarCliente()" style="text-transform: uppercase;" required autofocus>';
	}


	function habilitarBtnGuardarCliente()
	{
		if (document.getElementById('dniI').value.length>=8 &&
			document.getElementById('nombreI').value.length>0 &&
			document.getElementById('dirI').value.length>0 &&
			document.getElementById('ciuI').value.length>0 &&
			document.getElementById('telI').value.length>0 ) 
		{
			document.getElementById('btnGuardar').disabled = false;
			document.getElementById("btnGuardar").style.opacity = 1;
		}
		else
		{
			document.getElementById('btnGuardar').disabled = true;
			document.getElementById("btnGuardar").style.opacity = 0.5;
		}
	}

	function guardarCliente() 
	{
		clienteObj.dni = document.getElementById('dniI').value;
		var tam = clienteObj.dni.length; 
		if (dniRuc) 
		{
			if (tam==8) 
			{
				clienteObj.nombre = document.getElementById('nombreI').value.toUpperCase();
			    clienteObj.direccion = document.getElementById('dirI').value.toUpperCase();
			    clienteObj.ciudad = document.getElementById('ciuI').value.toUpperCase();
			    clienteObj.telefono = document.getElementById('telI').value;
			    turboObj.destino = document.getElementById('desI').value.toUpperCase();
			    
				turbo();
			}
			else
			{
				alert("Cantidad de dígitos incorrecto DNI!!!");
			}
		}
		else
		{
			if (tam==11) 
			{
				clienteObj.nombre = document.getElementById('nombreI').value.toUpperCase();
			    clienteObj.direccion = document.getElementById('dirI').value.toUpperCase();
			    clienteObj.ciudad = document.getElementById('ciuI').value.toUpperCase();
			    clienteObj.telefono = document.getElementById('telI').value;
			    turboObj.destino = document.getElementById('desI').value.toUpperCase();
				    
				turbo();
			}
			else
			{
				alert("Cantidad de dígitos incorrecto RUC!!!");
			}
		}
	}

	function comprobarCliente () 
	{
		clienteObj.dni = document.getElementById('dniI').value;
		if (clienteObj.dni.length>0) 
		{
			clienteObj.comprobarCliente();
			clienteObj.historial();
		}
		
	}


//========================== turbo ==========================
	
	function cancelarTurbo() 
	{
		cliente();
		clienteObj.historial();
	}

	function turbo() 
	{
		turboObj.limpiarResumen();
		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
			    document.getElementById('contenidoTotal').innerHTML = validar; 
			    colocarTurboParte1();
				colocarTurboParte2();

				document.getElementById('indicadorVentanaSuperior').innerHTML = "Marca Vehículo";
		    }
		};
		xhttp.open("GET", "ventanaTurbo.php", true);
		xhttp.send();
	}

	function colocarTurboParte1()
	{
	    document.getElementById('pMarcaVeh').innerHTML = turboObj.nomVeh;
	    document.getElementById('pModeloVeh').innerHTML = turboObj.nomTipVeh;
	    document.getElementById('pMotor').innerHTML = turboObj.nomMot;
	    document.getElementById('pMarca').innerHTML = turboObj.nomMar;
	    document.getElementById('pModelo').innerHTML = turboObj.nomMod ;
	    document.getElementById('pCodigo').innerHTML = turboObj.codTur;
	}


	var timout;
	function colocarTurboParte2()
	{
		if(turboObj.idCodTur!=-1)
		{
		    document.getElementById('pServicio').innerHTML = turboObj.servicioNom;
			document.getElementById('pTrabajos').innerHTML = turboObj.servicioTrabajos;

			if(turboObj.servicioId!=-1)
			{
				if(turboObj.idsPie.length>0)
				{
					selectorServicio(turboObj.servicioId, turboObj.servicioNom) ;
					timout = window.setInterval("ponerSeleccionesPiezas()",1000);
				}
				else
				{
					selectorTurbo(turboObj.idCodTur, turboObj.codTur);
				}
			}
		}
		
	}

	function ponerSeleccionesPiezas()
	{
		for (var i = 0; i < turboObj.cantPiesas; i++) 
		{
			selectPieza2(turboObj.idsPie[i], turboObj.nomsPie[i], turboObj.trasPie[i], turboObj.tipsPie[i], false) ;
		}
		clearTimeout(timout);
	}
	

	// ------ Vehiculo ------
	function limpiarTodoTurbo() 
	{
		document.getElementById('indicadorVentanaSuperior').innerHTML = "Marca Vehículo";

		document.getElementById('btnServicio').hidden = true;
		turboObj.limpiar();
		eliminarPiezaTodo();
		colocarTurboParte1();
		colocarTurboParte2();
		document.getElementById('btnGuardar').disabled = true;
		document.getElementById("btnGuardar").style.opacity = 0.5;
		vehiculos();
	}
	function vehiculos() 
	{
		document.getElementById('indicadorVentanaSuperior').innerHTML = "Marca Vehículo";
		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
				document.getElementById('contenidoMedio').innerHTML = validar; 
				
				document.getElementById('btnVehiculoRegresar').disabled = true;
				document.getElementById('btnTipVehRegresar').disabled = true;
				document.getElementById('btnMotorRegresar').disabled = true;

				document.getElementById('btnTurboRegresar').disabled = true;
				document.getElementById('btnModeloTurboRegresar').disabled = true;
				document.getElementById('btnCodTurboRegresar').disabled = true;
		    }
		};
		xhttp.open("GET", "seccionVehiculo.php", true);
		xhttp.send();
	}

	function habilitarBtnVeh() 
	{
		if(document.getElementById('vehiculoNombre').value=="")
		{
			document.getElementById('btnAgregarVehiculo').disabled = true;
			document.getElementById("btnAgregarVehiculo").className = "btn btn-success btn-lg disabled";
		}
		else
		{
			document.getElementById('btnAgregarVehiculo').disabled = false;
			document.getElementById("btnAgregarVehiculo").className = "btn btn-success btn-lg";
		}
	}



	function guardarVehiculoNuevo() 
	{
 		var nomVeh = document.getElementById('vehiculoNombre').value;

		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	 
		    	var validar = xhttp.responseText;
		    	selectorVehiculo(validar, nomVeh);   	
		    }
		};		
		xhttp.open("GET", "guardarVehiculoNuevo.php?nomVeh="+nomVeh, true);
		xhttp.send();
	}

	function retrocederSelectorVehiculo()
	{
		selectorVehiculo(turboObj.idVeh, turboObj.nomVeh);
		
		document.getElementById('btnVehiculoRegresar').disabled = true;
		document.getElementById('btnTipVehRegresar').disabled = true;
		document.getElementById('btnMotorRegresar').disabled = true;

		document.getElementById('btnTurboRegresar').disabled = true;
		document.getElementById('btnModeloTurboRegresar').disabled = true;
		document.getElementById('btnCodTurboRegresar').disabled = true;
	}

	function selectorVehiculo(id, nom)
	{
		document.getElementById('indicadorVentanaSuperior').innerHTML = "Modelo Vehículo";

		document.getElementById('btnServicio').hidden = true;
		turboObj.limpiar();
		eliminarPiezaTodo();
		colocarTurboParte1();
		colocarTurboParte2();

		document.getElementById('vehiculoNombre').value = "";
		document.getElementById('btnAgregarVehiculo').disabled = true;
		document.getElementById("btnAgregarVehiculo").className = "btn btn-success btn-lg disabled";

		turboObj.idVeh = id;
		turboObj.nomVeh = nom;
	
	    turboObj.idTipVeh = -1;
	    turboObj.nomTipVeh = "";
	    turboObj.idMot = -1;
	    turboObj.nomMot = "";

	    turboObj.idMar = -1;
	    turboObj.nomMar = "";
	    turboObj.idMod = -1;
	    turboObj.nomMod = "";
	    turboObj.idCodTur = -1;
	    turboObj.codTur = "";

	    document.getElementById('btnGuardar').disabled = true;
		document.getElementById("btnGuardar").style.opacity = 0.5;

		colocarTurboParte1();

		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
				document.getElementById('contenidoMedio').innerHTML = validar; 
				document.getElementById('btnVehiculoRegresar').disabled = false;
		    }
		};
		xhttp.open("GET", "seccionTipVehiculo.php?idVeh="+id, true);
		xhttp.send();
	}



	// ------ Tipo Vehiculo ------
	function habilitarBtnTipVeh() 
	{
		if(document.getElementById('tipVehNombre').value=="")
		{
			document.getElementById('btnAgregarTipVehiculo').disabled = true;
			document.getElementById("btnAgregarTipVehiculo").className = "btn btn-success btn-lg disabled";
		}
		else
		{
			document.getElementById('btnAgregarTipVehiculo').disabled = false;
			document.getElementById("btnAgregarTipVehiculo").className = "btn btn-success btn-lg";
		}
	}



	function guardarTipVehNuevo() 
	{
 		var nomTipVeh = document.getElementById('tipVehNombre').value;

		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	 
		    	var validar = xhttp.responseText;
		    	selectorTipVeh(validar, nomTipVeh);   	
		    }
		};		
		xhttp.open("GET", "guardarTipoVehiculoNuevo.php?tipVehNombre="+nomTipVeh+"&& vehiculoId="+turboObj.idVeh, true);
		xhttp.send();
	}

	function retrocederSelectorTipVeh()
	{
		selectorTipVeh(turboObj.idTipVeh, turboObj.nomTipVeh);
		
		document.getElementById('btnTipVehRegresar').disabled = true;
		document.getElementById('btnMotorRegresar').disabled = true;

		document.getElementById('btnTurboRegresar').disabled = true;
		document.getElementById('btnModeloTurboRegresar').disabled = true;
		document.getElementById('btnCodTurboRegresar').disabled = true;
	}

	function selectorTipVeh(id, nom)
	{
		document.getElementById('indicadorVentanaSuperior').innerHTML = "Código Motor";

		document.getElementById('tipVehNombre').value = "";
		document.getElementById('btnAgregarTipVehiculo').disabled = true;
		document.getElementById("btnAgregarTipVehiculo").className = "btn btn-success btn-lg disabled";

	    turboObj.idTipVeh = id;
	    turboObj.nomTipVeh = nom;
	    turboObj.idMot = -1;
	    turboObj.nomMot = "";

	    turboObj.idMar = -1;
	    turboObj.nomMar = "";
	    turboObj.idMod = -1;
	    turboObj.nomMod = "";
	    turboObj.idCodTur = -1;
	    turboObj.codTur = "";
		colocarTurboParte1();

		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
				document.getElementById('contenidoMedio').innerHTML = validar; 
				document.getElementById('btnTipVehRegresar').disabled = false;
		    }
		};
		xhttp.open("GET", "seccionMotor.php?idTipVeh="+id, true);
		xhttp.send();
	}

	// ------ Motor ------
	function habilitarBtnMot() 
	{
		if(document.getElementById('motorCod').value=="")
		{
			document.getElementById('btnAgraegarMotor').disabled = true;
			document.getElementById("btnAgraegarMotor").className = "btn btn-success btn-lg disabled";
		}
		else
		{
			document.getElementById('btnAgraegarMotor').disabled = false;
			document.getElementById("btnAgraegarMotor").className = "btn btn-success btn-lg";
		}
	}



	function guardarMotorNuevo() 
	{
 		var nomMot = document.getElementById('motorCod').value;

		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	 
		    	var validar = xhttp.responseText;
		    	selectorMotor(validar, nomMot);   	
		    }
		};		
		xhttp.open("GET", "guardarMotorNuevo.php?codMotor="+nomMot+"&& tipVehId="+turboObj.idTipVeh, true);
		xhttp.send();
	}

	function retrocederSelectorMotor()
	{
		selectorMotor(turboObj.idMot, turboObj.nomMot);

		document.getElementById('btnMotorRegresar').disabled = true;

		document.getElementById('btnTurboRegresar').disabled = true;
		document.getElementById('btnModeloTurboRegresar').disabled = true;
		document.getElementById('btnCodTurboRegresar').disabled = true;
	}

	function selectorMotor(id, nom)
	{
		document.getElementById('indicadorVentanaSuperior').innerHTML = "Marca Turbo";

		document.getElementById('motorCod').value  = "";
		document.getElementById('btnAgraegarMotor').disabled = true;
		document.getElementById("btnAgraegarMotor").className = "btn btn-success btn-lg disabled";

	    turboObj.idMot = id;
	    turboObj.nomMot = nom;

	    turboObj.idMar = -1;
	    turboObj.nomMar = "";
	    turboObj.idMod = -1;
	    turboObj.nomMod = "";
	    turboObj.idCodTur = -1;
	    turboObj.codTur = "";
		colocarTurboParte1();

		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
				document.getElementById('contenidoMedio').innerHTML = validar; 
				document.getElementById('btnMotorRegresar').disabled = false;
		    }
		};
		xhttp.open("GET", "seccionMarca.php?motorId="+id, true);
		xhttp.send();
	}

	// ------ Marca ------
	function habilitarBtnMar() 
	{
		if(document.getElementById('marcaNombre').value=="")
		{
			document.getElementById('btnAgregarMarca').disabled = true;
			document.getElementById("btnAgregarMarca").className = "btn btn-success btn-lg disabled";
		}
		else
		{
			document.getElementById('btnAgregarMarca').disabled = false;
			document.getElementById("btnAgregarMarca").className = "btn btn-success btn-lg";
		}
	}



	function guardarMarcaNueva() 
	{
 		var nomMar = document.getElementById('marcaNombre').value;

		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	 
		    	var validar = xhttp.responseText;
		    	selectorMarca(validar, nomMar);   	
		    }
		};		
		xhttp.open("GET", "guardarMarcaNueva.php?nomMar="+nomMar+"&& motorId="+turboObj.idMot, true);
		xhttp.send();
	}

	function retrocederSelectorMarca()
	{
		selectorMarca(turboObj.idMar, turboObj.nomMar);

		document.getElementById('btnTurboRegresar').disabled = true;
		document.getElementById('btnModeloTurboRegresar').disabled = true;
		document.getElementById('btnCodTurboRegresar').disabled = true;
	}

	function selectorMarca(id, nom)
	{
		document.getElementById('indicadorVentanaSuperior').innerHTML = "Modelo Turbo";

		document.getElementById('marcaNombre').value = "";
		document.getElementById('btnAgregarMarca').disabled = true;
		document.getElementById("btnAgregarMarca").className = "btn btn-success btn-lg disabled";

	    turboObj.idMar = id;
	    turboObj.nomMar = nom;
	    turboObj.idMod = -1;
	    turboObj.nomMod = "";
	    turboObj.idCodTur = -1;
	    turboObj.codTur = "";
		colocarTurboParte1();

		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
				document.getElementById('contenidoMedio').innerHTML = validar; 
				document.getElementById('btnTurboRegresar').disabled = false;
		    }
		};
		xhttp.open("GET", "seccionModelo.php?idMar="+id, true);
		xhttp.send();
	}

	// ------ Modelo ------
	function habilitarBtnMod() 
	{
		if(document.getElementById('modeloNombre').value=="")
		{
			document.getElementById('btnAgregarModelo').disabled = true;
			document.getElementById("btnAgregarModelo").className = "btn btn-success btn-lg disabled";
		}
		else
		{
			document.getElementById('btnAgregarModelo').disabled = false;
			document.getElementById("btnAgregarModelo").className = "btn btn-success btn-lg";
		}
	}



	function guardarModeloNuevo() 
	{
 		var nomMod = document.getElementById('modeloNombre').value;

		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	 
		    	var validar = xhttp.responseText;
		    	selectorModelo(validar, nomMod);   	
		    }
		};		
		xhttp.open("GET", "guardarModeloNuevo.php?nomMod="+nomMod+"&& marcaId="+turboObj.idMar, true);
		xhttp.send();
	}

	function retrocederSelectorModelo()
	{
		selectorModelo(turboObj.idMod, turboObj.nomMod);

		document.getElementById('btnModeloTurboRegresar').disabled = true;
		document.getElementById('btnCodTurboRegresar').disabled = true;
	}

	function selectorModelo(id, nom)
	{
		document.getElementById('indicadorVentanaSuperior').innerHTML = "Código Turbo";

		document.getElementById('modeloNombre').value = "";
		document.getElementById('btnAgregarModelo').disabled = true;
		document.getElementById("btnAgregarModelo").className = "btn btn-success btn-lg disabled";
		
	    turboObj.idMod = id;
	    turboObj.nomMod = nom;
	    turboObj.idCodTur = -1;
	    turboObj.codTur = "";
		colocarTurboParte1();

		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
				document.getElementById('contenidoMedio').innerHTML = validar; 
				document.getElementById('btnModeloTurboRegresar').disabled = false;
		    }
		};
		xhttp.open("GET", "seccionTurboCod.php?idMod="+id, true);
		xhttp.send();
	}

	// ------ Cod Turbo ------
	function habilitarBtnTur() 
	{
		if(document.getElementById('turboCod').value=="")
		{
			document.getElementById('btnAgregarCodTur').disabled = true;
			document.getElementById("btnAgregarCodTur").className = "btn btn-success btn-lg disabled";
		}
		else
		{
			document.getElementById('btnAgregarCodTur').disabled = false;
			document.getElementById("btnAgregarCodTur").className = "btn btn-success btn-lg";
		}
	}



	function guardarTurboNuevo() 
	{
 		var nomTur = document.getElementById('turboCod').value;

		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	 
		    	var validar = xhttp.responseText;
		    	selectorTurbo(validar, nomTur);   	
		    }
		};		
		xhttp.open("GET", "guardarTurboNuevo.php?codTurbo="+nomTur+"&& modeloId="+turboObj.idMod, true);
		xhttp.send();
	}

	function selectorTurbo(id, nom)
	{
		document.getElementById('turboCod').value = "";
		document.getElementById('btnAgregarCodTur').disabled = true;
		document.getElementById("btnAgregarCodTur").className = "btn btn-success btn-lg disabled";
		
	    turboObj.idCodTur = id;
	    turboObj.codTur = nom;
		colocarTurboParte1();

		document.getElementById('btnCodTurboRegresar').disabled = false;

		servicios()
	}

	//--------- Servicios -----------
	function servicios() 
	{
		eliminarPiezaTodo();

		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
			    document.getElementById('contenidoMedio').innerHTML = validar; 
				document.getElementById('indicadorVentanaSuperior').innerHTML = "Servicio";	
			    
		    }
		};
		xhttp.open("GET", "servicios.php", true);
		xhttp.send();
	}


	function agregarBotonServicios()
	{
		document.getElementById('btnServicio').hidden = false;
	}

	function selectorServicio(id, nomServicio) 
	{
		document.getElementById('indicadorVentanaSuperior').innerHTML = "Pieza";	
		document.getElementById('pServicio').innerHTML = nomServicio;
		
		document.getElementById('btnGuardar').disabled = false;
		document.getElementById("btnGuardar").style.opacity = 1;

		agregarBotonServicios();

		turboObj.servicioId = id;		
		turboObj.servicioNom = nomServicio;

		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	   	
		    	var validar = xhttp.responseText;
		    	turboObj.servicioTrabajos = validar;
			    document.getElementById('pTrabajos').innerHTML = validar;     				
				piezas(id) ;
		    }
		};
		xhttp.open("GET", "seccionTrabajos.php?idSer="+id, true);
		xhttp.send();
	}

	//--- Piezas ---
	function piezas(servicioId) 
	{
		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
			    document.getElementById('contenidoMedio').innerHTML = validar; 			    
		    }
		};
		xhttp.open("GET", "seccionPiezas.php?serId="+servicioId, true);
		xhttp.send();
	}


	var idPieAux, nomPieAux, traPieAux=0, tipPieAux=0;

	function mostrarCaliVent(idPie, nomPie) 
	{
		if (document.getElementById("btnPieDer"+idPie).className == "btn-default btn130_float agregado") 
		{
			document.getElementById("btnPieDer"+idPie).className = "btn-default btn130_float";
			$('#popUpCalVen').modal('toggle'); 
			
			selectPieza(idPie, nomPie, 0, 0) ;
		}
		else
		{
			idPieAux = idPie;
			nomPieAux = nomPie;
			tipPieAux = 0;
		}
	}

	function mostrarNeumElec(idPie, nomPie) 
	{
		if (document.getElementById("btnPieDer"+idPie).className == "btn-default btn130_float agregado") 
		{
			document.getElementById("btnPieDer"+idPie).className = "btn-default btn130_float";
			$('#popUpNeuEle').modal('toggle'); 
			selectPieza(idPie, nomPie, 0, 0) ;
		}
		else
		{
			idPieAux = idPie;
			nomPieAux = nomPie;
		}
	}

	function selectorNeuEle(eleccion)
	{
		tipPieAux = eleccion;
	}

	function selectorCalVen(eleccion)
	{
		traPieAux = eleccion;
		selectPieza(idPieAux, nomPieAux, traPieAux, tipPieAux) ;
	}

	function selectPieza(idPie, nomPie, traPie, tipPie) 
	{
		selectPieza2(idPie, nomPie, traPie, tipPie, true); 
	}
	
	function selectPieza2(idPie, nomPie, traPie, tipPie, agregarDesdeOriginal) 
	{	
		var table = document.getElementById("tablaPiezasPro");
		var tamLis = turboObj.idsPie.length;
		var existe = false;
		
		if(agregarDesdeOriginal)
		{
			for (i = 0; i < tamLis; i++) 
			{ 
	    		var row = table.tBodies[0].rows[i]
	    		if(row.getAttribute("id") == "trPro"+idPie)
	    		{
	    			document.getElementById("tablaPiezasPro").deleteRow(i);
	    			existe = true;
	    			break;
	    		}
			}
		}

		if (existe)//eliminar
		{
			document.getElementById('btnPieDer'+idPie).style.backgroundColor =  "";
			turboObj.nomsPie.splice(turboObj.idsPie.indexOf(idPie), 1);
			turboObj.trasPie.splice(turboObj.idsPie.indexOf(idPie), 1);
			turboObj.tipsPie.splice(turboObj.idsPie.indexOf(idPie), 1);
			turboObj.idsPie.splice(turboObj.idsPie.indexOf(idPie), 1);
			turboObj.cantPiesas--;
		}
		else //agregar
		{
			document.getElementById("btnPieDer"+idPie).className = "btn-default btn130_float agregado";
			document.getElementById('btnPieDer'+idPie).style.backgroundColor = "green";	

			var table = document.getElementById("tablaPiezasPro");
	    	var row = table.insertRow(table.length);
	    	row.setAttribute("id", "trPro"+idPie);
	    	var cell1 = row.insertCell(0);
	    	var cell2 = row.insertCell(1);

			var nomTraPie = ""; //Normal
	    	if(traPie==1)//Calibracion
	    	{
	    		nomTraPie = "Calibración";
	    	}
	    	else if(traPie==2)//Venta
	    	{
	    		nomTraPie = "Venta";
	    	}

	    	var nomTipPie = "";//Normal
	    	if(tipPie==1)//Neumatico
	    	{
	    		nomTipPie = "Neomática";
	    	}
	    	else if(tipPie==2)//Electrico
	    	{
	    		nomTipPie = "Electrónica";
	    	}
	    	

	    	cell1.innerHTML = nomTraPie + " " + nomPie + " " + nomTipPie;
	    	cell2.innerHTML = '<button class="btnElimnar" type="button" onclick="eliminarPieza('+idPie+')"></button> ';


	    	if(agregarDesdeOriginal) 
			{
				turboObj.cantPiesas++;
				turboObj.idsPie.push(idPie);
				turboObj.nomsPie.push(nomPie);
				turboObj.trasPie.push(traPie);
				turboObj.tipsPie.push(tipPie);
			}
		}
	}

	function eliminarPieza(idPie) 
	{
		var table = document.getElementById("tablaPiezasPro");
		var tamLis = turboObj.idsPie.length;

		
		document.getElementById('btnPieDer'+idPie).style.backgroundColor = "";

		for (i = 0; i < tamLis; i++) 
		{ 
    		var row = table.tBodies[0].rows[i]
    		if(row.getAttribute("id") == "trPro"+idPie)
    		{
    			document.getElementById("tablaPiezasPro").deleteRow(i);
    			break;
    		}
		}

		turboObj.nomsPie.splice(turboObj.idsPie.indexOf(idPie), 1);
		turboObj.trasPie.splice(turboObj.idsPie.indexOf(idPie), 1);
		turboObj.tipsPie.splice(turboObj.idsPie.indexOf(idPie), 1);
		turboObj.idsPie.splice(turboObj.idsPie.indexOf(idPie), 1);
		turboObj.cantPiesas--;
	}


	function eliminarPiezaTodo() 
	{	
		document.getElementById("tablaPiezasPro").innerHTML = "";
		turboObj.nomsPie = [];
		turboObj.trasPie = [];
		turboObj.tipsPie = [];
		turboObj.idsPie = [];
		turboObj.cantPiesas = 0;
	}

	//---------- Resumen ----------

	function guardarTurbo() 
	{
		if (turboObj.servicioId!=-1) 
			resumen();
		else
			alert("Datos Incompletos.");
	}

	function ponerZindex()
	{
		//document.getElementById('ui-datepicker-div').style.zIndex = "2";
		/*document.getElementById('ui-datepicker-div').style.width= "500px";
		document.getElementById('ui-datepicker-div').style.paddingBottom= "35px";
		document.getElementById('ui-datepicker-div').style.height= "300px";
*/
		/*var tabla = document.getElementsByClassName('ui-datepicker-calendar');
		var cantTablas = tabla.length;
		for (var i = 0; i < cantTablas; i++) 
		{
			tabla[i].style.height= "100%";

		}
*/
		var btnDias = document.getElementsByClassName('ui-state-default');
		var cantBtnDias = btnDias.length;
		for (var i = 0; i < cantBtnDias; i++) 
		{
			btnDias[i].style.height= "100%";
		}
	}
	

	function resumen() 
	{
		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
			    document.getElementById('contenidoTotal').innerHTML = validar; 
			    timout = window.setInterval("ponerDatosResumen()",1000);
			    cargarPick() ;
			    ponerAccesoriosExtras();
			    ponerFechaHora();
		    }
		};
		xhttp.open("GET", "ventanaResumen.php", true);
		xhttp.send();
	}

	var numDocumento=0;
	function ponerDatosResumen() 
	{
		if (origenDatos==4) 
		{
			turboObj.servicioId = 5;
			turboObj.servicioNom = "Garatía";
			turboObj.servicioTrabajos = "De contrato Nro. " + numDocumento;
			turboObj.precioSer = 0;
			document.getElementById('idPre100').disabled = true;
			for (var i = 0; i < turboObj.cantPiesas; i++) 
			{
				turboObj.presPie[i] = 0;
			}

			turboObj.precioTotal = 0;
			turboObj.aCuenta = 0;
			turboObj.saldo = 0;
		}
		document.getElementById('rNombre').innerHTML = clienteObj.nombre;
		document.getElementById('rDNI').innerHTML = clienteObj.dni;
		document.getElementById('rDireccion').innerHTML = clienteObj.direccion;
		document.getElementById('rCiudad').innerHTML = clienteObj.ciudad;
		document.getElementById('rTel').innerHTML = clienteObj.telefono;
		document.getElementById('rDes').value = turboObj.destino;

		document.getElementById('pMarcaVehiculo').innerHTML = turboObj.nomVeh;
		document.getElementById('pModeloVehiculo').innerHTML = turboObj.nomTipVeh;
		document.getElementById('pCodigoVehiculo').innerHTML = turboObj.nomMot;
		document.getElementById('pMarca').innerHTML = turboObj.nomMar;
		document.getElementById('pModelo').innerHTML = turboObj.nomMod;
		document.getElementById('pCodigo').innerHTML = turboObj.codTur;

		document.getElementById('pServicio').innerHTML = turboObj.servicioNom;
		document.getElementById('pTrabajos').innerHTML = turboObj.servicioTrabajos;

		document.getElementById('precio').value = turboObj.precioTotal;
		document.getElementById('aAcuenta').value = turboObj.aCuenta;
		document.getElementById('saldo').value = turboObj.saldo;

		//if (turboObj.precioSer != 0 ) 
		{
			document.getElementById("idPre100").value = turboObj.precioSer;
		}
		

		var table = document.getElementById("tablaPiezasResumen");

		var origenOriginal = true;
		if (turboObj.cantPiesas==0) 
		{
			origenOriginal = true;
		}
		else
		{
			origenOriginal = false;
		}
		
		for (var i = 0; i < turboObj.cantPiesas; i++) 
		{
	    	var row = table.insertRow(table.length);
	    	row.setAttribute("id", "trPro"+turboObj.idsPie[0]);
	    	var cell1 = row.insertCell(0);
	    	var cell2 = row.insertCell(1);

			var nomTraPie = ""; //Normal
	    	if(turboObj.trasPie[i]==1)//Calibracion
	    	{
	    		nomTraPie = "Calibración";
	    	}
	    	else if(turboObj.trasPie[i]==2)//Venta
	    	{
	    		nomTraPie = "Venta";
	    	}

	    	var nomTipPie = "";//Normal
	    	if(turboObj.tipsPie[i]==1)//Neumatico
	    	{
	    		nomTipPie = "Neomática";
	    	}
	    	else if(turboObj.tipsPie[i]==2)//Electrico
	    	{
	    		nomTipPie = "Electrónica";
	    	}
	    	

	    	cell1.innerHTML = nomTraPie + " " + turboObj.nomsPie[i] + " " + nomTipPie;
	    	
	    	var esCalibracion = "";
	    	if (turboObj.trasPie[i]==1) 
	    	{
	    		esCalibracion = " disabled";
	    	}

	    	if (origenOriginal) 
	    	{
	    		cell2.innerHTML = 'S/. <input type="number" id="idPre'+turboObj.idsPie[i]+'" onkeyup="sumarPrecios()" onclick="borrarCero(this)" '+esCalibracion+'> ';
	    		turboObj.presPie.push(0);
	    	}
	    	else
	    	{
	    		if(origenDatos==4)
	    		{
	    			cell2.innerHTML = 'S/. <input type="number" id="idPre'+turboObj.idsPie[i]+'"  value="'+turboObj.presPie[i]+'" onkeyup="sumarPrecios()" onclick="borrarCero(this)" disabled>';
	    		}
	    		else
	    		{
	    			cell2.innerHTML = 'S/. <input type="number" id="idPre'+turboObj.idsPie[i]+'"  value="'+turboObj.presPie[i]+'" onkeyup="sumarPrecios()" onclick="borrarCero(this)" '+esCalibracion+'>';
	    		}
	    		
	    	}
	    	
		
		}

		if (turboObj.IGV) 
		{
			agregarIGV();
		}
		else
		{
			quitarIGV();
		}
		clearTimeout(timout);
	}

	function borrarCero(actual)
	{
		if (actual.value == 0)
			actual.value = "";
	}

	function sumarPrecios() 
	{
		if(document.getElementById("idPre100").value=="")
			turboObj.precioSer = 0;
		else
	    	turboObj.precioSer = parseFloat(document.getElementById("idPre100").value);
		var precioTotal = turboObj.precioSer;


		for (var i = 0; i < turboObj.cantPiesas; i++) 
		{
			if(document.getElementById("idPre"+turboObj.idsPie[i]).value!="")
			{
				turboObj.presPie[i] = parseFloat(document.getElementById("idPre"+turboObj.idsPie[i]).value);
				precioTotal += parseFloat(document.getElementById("idPre"+turboObj.idsPie[i]).value);
			}
		}

		document.getElementById("precio").value = precioTotal;
		turboObj.precioTotal = precioTotal;
		aCuenta();
	}

	function aCuenta() 
	{
		if(document.getElementById("aAcuenta").value!="")
	    	turboObj.aCuenta = parseFloat(document.getElementById("aAcuenta").value);


		var saldo = turboObj.precioTotal - turboObj.aCuenta;
	    
		document.getElementById("saldo").value = saldo;
	}

	

	function agregarIGV() 
	{
		turboObj.IGV = true;
		document.getElementById('btnConIGV').style.backgroundColor = "green";
		document.getElementById('btnSinIGV').style.backgroundColor = "#FFF";
	}
	function quitarIGV() 
	{
		turboObj.IGV = false;
		document.getElementById('btnConIGV').style.backgroundColor = "#FFF";
		document.getElementById('btnSinIGV').style.backgroundColor = "green";
	}
	

	function ponerAccesoriosExtras()
	{
		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
			    document.getElementById('divAccesoriosextras').innerHTML = validar; 
			    selectAccesorio2();
		    }
		};
		xhttp.open("GET", "getAccesoriosExtraResumen.php", true);
		xhttp.send();
	}

	function selectAccesorio2()
	{
		var botonesAcce = document.getElementsByClassName('btnAccAbajo');
		var cantBotonesAcce = botonesAcce.length;
		var posIguales = [];
		for (var i = 0; i < cantBotonesAcce; i++) 
		{
			for (j = 0; j < turboObj.nomsAcc.length; j++) 
			{
				if(turboObj.nomsAcc[j]==botonesAcce[i].innerHTML)
				{
					posIguales.push(i);
				}
				
			}

		}

		for (var i = posIguales.length-1; i>=0; i--) 
		{
			document.getElementsByClassName('btnAccAbajo')[posIguales[i]].className = "btn btn-success btnAcc";
		}
	}

	function selectAccesorio(idAcc, nom) 
	{
		for (i = 0; i < turboObj.idsAcc.length; i++) 
		{
			if(idAcc==turboObj.idsAcc[i])
			{
				turboObj.nomsAcc.splice(turboObj.idsAcc.indexOf(idAcc), 1);
				turboObj.idsAcc.splice(turboObj.idsAcc.indexOf(idAcc), 1);
				document.getElementById('btnAcc'+idAcc).className = "btn btn-default btnAcc";
				return;
			}

		}
		
		document.getElementById('btnAcc'+idAcc).className = "btn btn-success btnAcc";
		turboObj.idsAcc.push(idAcc); 
		turboObj.nomsAcc.push(nom); 
	}

	function ponerFechaHora()
	{
		var fecha = new Date(); //Fecha actual
		var mes = fecha.getMonth()+1; //obteniendo mes
		var dia = fecha.getDate(); //obteniendo dia
		var ano = fecha.getFullYear(); //obteniendo año
		var hora =fecha.getHours()
		var minutos = fecha.getMinutes();

		var horaEntrada = 8;		
		var demora = 4;
		var otroDia = false;

		var horaFinTrabajo_hr = 18;
		var horaFinTrabajo_min = 30;
		var horaDiaSiguiente_hr = 15;
		var horaDiaSiguiente_min = 30;

		if (fecha.getDay()==6) // sabado
		{
			horaFinTrabajo_hr = 15;
			horaFinTrabajo_min = 0;
			horaDiaSiguiente_hr = 13;
			horaDiaSiguiente_min = 0;
		}
			
		var horaFinTrabajo = horaFinTrabajo_hr*60 + horaFinTrabajo_min;
		var horaDiaSiguiente = horaDiaSiguiente_hr*60 + horaDiaSiguiente_min;
		var horaActual = hora*60 + minutos;

		if (horaActual > horaFinTrabajo || fecha.getDay()==0) //despues de la hora de salida
		{
			hora = horaEntrada + demora;
			minutos = 0;
			otroDia = true;
		}
		else if(hora<8)//antes de la hora de trabajo
		{
			hora = horaEntrada + demora;
			minutos = 0;
		}
		else if (horaActual>=horaDiaSiguiente) //para el otro dia, dentro la hora de trabajo
		{
			var mins_restantes = horaFinTrabajo - horaActual;

			minutos = 60-mins_restantes%60;
			if (minutos==60) 
			{
				hora = horaEntrada + (4-Math.floor(mins_restantes/60));
				minutos = 0;
			}
			if (minutos>0) 
				hora = horaEntrada + (4-Math.floor(mins_restantes/60)-1);
			else
				hora = horaEntrada + (4-Math.floor(mins_restantes/60));

			otroDia = true;
		}
			
		else // para el mismo dia
		{
			horaActual += demora*60;
			if (horaActual>=horaFinTrabajo) //si se pasa la hora de salida asignar hora salida
			{
				hora = horaFinTrabajo_hr;
				minutos = horaFinTrabajo_min;
			}
			else
			{
				hora += demora;
			}
		}
		

		if (hora<10) 
			hora = '0'+hora;
		if (minutos<10) 
			minutos = '0'+minutos;

		di=28
		f = new Date(ano,mes-1,di);
		while(f.getMonth()==mes-1)
		{
			di++;
			f = new Date(ano,mes-1,di);
		}
		diasMes = di-1;



		
		if (otroDia) 
		{
			if (fecha.getDay()==6)
			{
				dia += 2;
			}
			else
			{
				dia++;
			}
			
			if(dia>diasMes)
			{
				dia = dia%diasMes;
				mes++;
				if (mes>12) 
				{
					ano++;
					mes = 1;
				}
			}
		}



		if (turboObj.fechaEntrega=="" || turboObj.horaEntrega=="") 
		{
			if(dia<10)
				dia='0'+dia; //agrega cero si el menor de 10
			if(mes<10)
				mes='0'+mes //agrega cero si el menor de 10	
			
			turboObj.fechaEntrega = dia+"-"+mes+"-"+ano;
			turboObj.horaEntrega = hora+":"+minutos;
		}


		document.getElementById('datepicker').value = turboObj.fechaEntrega;
		document.getElementById('timepicker').value = turboObj.horaEntrega;


		

	}
	//----------- Guardar Boleta Proforma ---------------

	var Bol_Id=-1;
	function llenarDatosGuardar(BolTip, origenDatos) 
	{
		var datosString = "tipo=" + BolTip + " & origenDatos=" + origenDatos + " & Bol_Id="+Bol_Id;

		datosString += " & cliId=" + clienteObj.id + " & cliDni=" + clienteObj.dni + " & cliNom=" + clienteObj.nombre + "& cliDir=" + clienteObj.direccion + "& cliCiu=" + clienteObj.ciudad + "& cliTel=" + clienteObj.telefono;
		
		datosString += "& destino="+ turboObj.destino + " & idVeh="+ turboObj.idVeh + " & nomVeh="+ turboObj.nomVeh + " & idTipVeh="+ turboObj.idTipVeh + " & nomTipVeh="+ turboObj.nomTipVeh + " & idMot="+ turboObj.idMot + " & nomMot="+ turboObj.nomMot + " & idMar="+ turboObj.idMar + " & nomMar="+ turboObj.nomMar + " & idMod="+ turboObj.idMod + " & nomMod="+ turboObj.nomMod + " & idCodTur="+ turboObj.idCodTur + " & codTur="+ turboObj.codTur + " & servicioId="+ turboObj.servicioId + " & servicioNom="+ turboObj.servicioNom + " & servicioTrabajos="+ turboObj.servicioTrabajos + " & idsPie="+ turboObj.idsPie + "& nomsPie="+ turboObj.nomsPie +"& trasPie="+ turboObj.trasPie +"& tipsPie="+ turboObj.tipsPie + "& precioSer="+ turboObj.precioSer + "& presPie="+ turboObj.presPie +"& precioTotal="+ turboObj.precioTotal + " & aCuenta="+ turboObj.aCuenta + " & IGV="+ turboObj.IGV + " & idsAcc="+ turboObj.idsAcc + " & nomsAcc="+ turboObj.nomsAcc + " & fechaEntrega="+ turboObj.fechaEntrega + " & horaEntrega=" + turboObj.horaEntrega + " & cantPiesas=" + turboObj.cantPiesas;

		return datosString;
	}

	var origenDatos = 0;
	function imprimirProforma() 
	{
		guardarBoleta(1);
	}

	function finalizar() 
	{
		guardarBoleta(0);
	}

	function guardarBoleta(BolTip) //2=editar
	{
		turboObj.fechaEntrega = document.getElementById('datepicker').value;
		turboObj.horaEntrega = document.getElementById('timepicker').value;
		turboObj.destino = document.getElementById('rDes').value.toUpperCase();

		var datos = llenarDatosGuardar(BolTip, origenDatos);
		//console.log(datos);
		//console.log(origenDatos);
		if (origenDatos==2) //editar
		{
			xhttp.onreadystatechange = function() 
			{
			    if (xhttp.readyState == 4 && xhttp.status == 200) 
			    {	    	
			    	var validar = xhttp.responseText;
			    	datos += " & Bol_NumDoc="+validar;
			    	//console.log(validar);
			    	guardarBoletaBD(datos);
			    }
			};
			xhttp.open("GET", "eliminarContrato.php?Bol_Id="+Bol_Id, true);
			xhttp.send();
		}
		else if (origenDatos==3) //crear Proforma
		{
			xhttp.onreadystatechange = function() 
			{
			    if (xhttp.readyState == 4 && xhttp.status == 200) 
			    {	    	
			    	var validar = xhttp.responseText;
			    	guardarBoletaBD(datos);
			    }
			};
			xhttp.open("GET", "eliminarContrato.php?Bol_Id="+Bol_Id, true);
			xhttp.send();
		}
		else
		{
			guardarBoletaBD(datos);			
		}
	}

	function guardarBoletaBD(datos) 
	{
		xhttp.onreadystatechange = function() 
		{
			if (xhttp.readyState == 4 && xhttp.status == 200) 
			{	    	
				var validar = xhttp.responseText;
				posSeparador = validar.indexOf("%&");
				Bol_Id = validar.substring(0, posSeparador);
				console.log(validar);
				verImpresion(Bol_Id, 0);

				Bol_Id = -1;
		    }
		};
		xhttp.open("GET", "guardarBoleta.php?"+datos, true);
		xhttp.send();
	}

	function verImpresion(BolId, soloVer) //Bol_Id
	{
		var xhttp;
		if (window.XMLHttpRequest) 
		{
		    xhttp = new XMLHttpRequest();
		} 
		else 
		{
		    // code for IE6, IE5
		    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xhttp.onreadystatechange = function() 
		{
			if (xhttp.readyState == 4 && xhttp.status == 200) 
			{	    
	
				var validar = xhttp.responseText;
				document.getElementById('contenidoImprimir').innerHTML = validar; 
		    }
		};
		xhttp.open("GET", "verImpresion.php?Bol_Id="+BolId+" & soloVer="+soloVer, true);
		xhttp.send();
	}


	

	
	// -------Buacar Cliente
	
	function buscarCliente(dni)//-1 
	{
		if (dni != -1) 
		{
			dni = document.getElementById('dniI').value;
		}
		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
			    document.getElementById('contenidoTotal').innerHTML = validar; 
		    }
		};
		xhttp.open("GET", "buscarCliente.php?dni="+dni, true);
		xhttp.send();
	}
	
	function verHistorialCliente(cliDni) 
	{
		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
				document.getElementById('contenidoHisCli').innerHTML = validar;
			}
		};
		xhttp.open("GET", "historialClienteDos.php?cliDni=" + cliDni, true);
		xhttp.send();
	}


	//Buscar resumen del dia
	function resumenOrdenes(numContrato)//-1
	{
		if (numContrato != -1) 
		{
			numContrato = document.getElementById('numContratoForm').value;
		}
		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
			    document.getElementById('contenidoTotal').innerHTML = validar; 
		    }
		};
		xhttp.open("GET", "buscarResumenOrdenes.php?numContrato="+numContrato, true);
		xhttp.send();
	}
	
	function editar(BolId)
	{
		Bol_Id = BolId;
		origenDatos = 2; 	//editar		
	}

	function editarContraro() 
	{
		cargarDatosDB(Bol_Id, 3);//3=ir a resumen
	}


	function anular(BolId) 
	{
		Bol_Id = BolId;
	}

	function anularContraro() 
	{
		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
		    	resumenOrdenes(-1);
		    }
		};
		xhttp.open("GET", "anularContrato.php?Bol_Id="+Bol_Id, true);
		xhttp.send();
	}

	function activar(BolId) 
	{
		Bol_Id = BolId;
	}

	function activarContraro() 
	{
		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
		    	resumenOrdenes(-1);
		    }
		};
		xhttp.open("GET", "activarContrato.php?Bol_Id="+Bol_Id, true);
		xhttp.send();
	}


	function cargarDatosDB(Bol_Id_entra, irA)//1=cliente 2=Turbo 3=resumen
	{
		Bol_Id = Bol_Id_entra;

		var xhttp;
		if (window.XMLHttpRequest) 
		{
		    xhttp = new XMLHttpRequest();
		} 
		else 
		{
		    // code for IE6, IE5
		    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;

	    		posSeparador = validar.indexOf("%&");
			    turboObj.destino = validar.substring(0, posSeparador).toUpperCase();
			    validar = validar.substring(posSeparador+2);

			    posSeparador = validar.indexOf("%&");
			    turboObj.fechaEntrega = validar.substring(0, posSeparador);
			    validar = validar.substring(posSeparador+2);

			    posSeparador = validar.indexOf("%&");
			    var horaAux = validar.substring(0, posSeparador);
			    turboObj.horaEntrega = horaAux.substring(0,5);
			    validar = validar.substring(posSeparador+2);

			    posSeparador = validar.indexOf("%&");
			    turboObj.precioTotal = parseFloat(validar.substring(0, posSeparador));
			    validar = validar.substring(posSeparador+2);

			    posSeparador = validar.indexOf("%&");
			    turboObj.aCuenta = parseFloat(validar.substring(0, posSeparador));
			    validar = validar.substring(posSeparador+2);

			    posSeparador = validar.indexOf("%&");
			    turboObj.IGV = validar.substring(0, posSeparador);
			    validar = validar.substring(posSeparador+2);

			    turboObj.saldo = turboObj.precioTotal-turboObj.aCuenta;

		    	posSeparador = validar.indexOf("%&");
			    numDocumento = validar.substring(0, posSeparador);
			    validar = validar.substring(posSeparador+2);

		    	posSeparador = validar.indexOf("%&");
			    tipoDocumento = validar.substring(0, posSeparador);
			    validar = validar.substring(posSeparador+2);

			    posSeparador = validar.indexOf("%&");
			    Bol_Id = validar.substring(0, posSeparador);
			    validar = validar.substring(posSeparador+2);


			    //######## Cliente #############
				posSeparador = validar.indexOf("%&");
			    clienteObj.id = validar.substring(0, posSeparador);
			    validar = validar.substring(posSeparador+2);

			    posSeparador = validar.indexOf("%&");
			    clienteObj.nombre = validar.substring(0, posSeparador).toUpperCase();
			    validar = validar.substring(posSeparador+2);
				
				posSeparador = validar.indexOf("%&");
			    clienteObj.direccion = validar.substring(0, posSeparador).toUpperCase();
			    validar = validar.substring(posSeparador+2);

			    posSeparador = validar.indexOf("%&");
			    clienteObj.ciudad = validar.substring(0, posSeparador).toUpperCase();
			    validar = validar.substring(posSeparador+2);

			    posSeparador = validar.indexOf("%&");
			    clienteObj.telefono = validar.substring(0, posSeparador);
			    validar = validar.substring(posSeparador+2);

			    posSeparador = validar.indexOf("%&");
			    clienteObj.dni = validar.substring(0, posSeparador);
			    validar = validar.substring(posSeparador+2);

			    //############ Seccion Seleecion de los datos del vehiculo #############
			    //Vehiculo
			    posSeparador = validar.indexOf("%&");
			    turboObj.idMot = validar.substring(0, posSeparador);
			    validar = validar.substring(posSeparador+2);

			    posSeparador = validar.indexOf("%&");
			    turboObj.nomMot = validar.substring(0, posSeparador);
			    validar = validar.substring(posSeparador+2);

			    posSeparador = validar.indexOf("%&");
			    turboObj.idTipVeh = validar.substring(0, posSeparador);
			    validar = validar.substring(posSeparador+2);

			    posSeparador = validar.indexOf("%&");
			    turboObj.nomTipVeh = validar.substring(0, posSeparador);
			    validar = validar.substring(posSeparador+2);

			    posSeparador = validar.indexOf("%&");
			    turboObj.idVeh = validar.substring(0, posSeparador);
			    validar = validar.substring(posSeparador+2);

			    posSeparador = validar.indexOf("%&");
			    turboObj.nomVeh = validar.substring(0, posSeparador);
			    validar = validar.substring(posSeparador+2);

			    //turbo mismo
				posSeparador = validar.indexOf("%&");
			    turboObj.idCodTur = validar.substring(0, posSeparador);
			    validar = validar.substring(posSeparador+2);

			    posSeparador = validar.indexOf("%&");
			    turboObj.codTur = validar.substring(0, posSeparador);
			    validar = validar.substring(posSeparador+2);

			    posSeparador = validar.indexOf("%&");
			    turboObj.idMod = validar.substring(0, posSeparador);
			    validar = validar.substring(posSeparador+2);

			    posSeparador = validar.indexOf("%&");
			   	turboObj.nomMod = validar.substring(0, posSeparador);
			    validar = validar.substring(posSeparador+2);

			    posSeparador = validar.indexOf("%&");
			    turboObj.idMar = validar.substring(0, posSeparador);
			    validar = validar.substring(posSeparador+2);

			    posSeparador = validar.indexOf("%&");
			    turboObj.nomMar = validar.substring(0, posSeparador);
			    validar = validar.substring(posSeparador+2);

			    //Servicio
			    posSeparador = validar.indexOf("%&");
			    turboObj.servicioId = validar.substring(0, posSeparador);
			    validar = validar.substring(posSeparador+2);

			    posSeparador = validar.indexOf("%&");
			    turboObj.servicioNom = validar.substring(0, posSeparador);
			    validar = validar.substring(posSeparador+2);

			    posSeparador = validar.indexOf("%&");
			    turboObj.precioSer = validar.substring(0, posSeparador);
			    validar = validar.substring(posSeparador+2);

			    posSeparador = validar.indexOf("%&");
			    turboObj.servicioTrabajos = validar.substring(0, posSeparador);
			    validar = validar.substring(posSeparador+2);	    
			    
			    //piesas
			    posSeparador = validar.indexOf("%&");
			    aux = validar.substring(0, posSeparador);
			    turboObj.idsPie = aux.split("$#");
			    validar = validar.substring(posSeparador+2);

			    posSeparador = validar.indexOf("%&");
			    aux = validar.substring(0, posSeparador) ;
			    turboObj.nomsPie = aux.split("$#");
			    validar = validar.substring(posSeparador+2);

			    posSeparador = validar.indexOf("%&");
			    aux = validar.substring(0, posSeparador) ;
			    turboObj.presPie = aux.split("$#");
			    validar = validar.substring(posSeparador+2);

			    posSeparador = validar.indexOf("%&");
			    aux = validar.substring(0, posSeparador) ;
			    turboObj.trasPie = aux.split("$#");
			    validar = validar.substring(posSeparador+2);

			    posSeparador = validar.indexOf("%&");
			    aux = validar.substring(0, posSeparador) ;
			    turboObj.tipsPie = aux.split("$#");
			    validar = validar.substring(posSeparador+2); 

			    posSeparador = validar.indexOf("%&");
			    turboObj.cantPiesas = validar.substring(0, posSeparador);
			    validar = validar.substring(posSeparador+2);

			    //accesorios

			    posSeparador = validar.indexOf("%&");
			    aux = validar.substring(0, posSeparador);
			    turboObj.idsAcc = aux.split("$#");
			    validar = validar.substring(posSeparador+2);

			    posSeparador = validar.indexOf("%&");
			    aux = validar.substring(0, posSeparador) ;
			    turboObj.nomsAcc = aux.split("$#");
			    validar = validar.substring(posSeparador+2);

   

			    if (irA==2) // ir a Turbo
			    {
			    	turbo(false);
			    }
			    else if (irA==3) // ir a resumen
			    {
			    	resumen(false);
			    }

			    
		    }
		};
		xhttp.open("GET", "obtenerDatosBoletaProforma.php?Bol_Id="+Bol_Id, true);
		xhttp.send();

		
	}




	// buscar Turbo
	function buscarTurbo(numContrato)//-1
	{
		if (numContrato != -1) 
		{
			numContrato = document.getElementById('numContratoForm').value;
		}
		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
			    document.getElementById('contenidoTotal').innerHTML = validar; 
		    }
		};
		xhttp.open("GET", "buscarTurbo.php?numContratoForm="+numContrato, true);
		xhttp.send();
	}
	


	// ver proformas
	function verProformas(numContrato)//-1
	{
		if (numContrato != -1) 
		{
			numContrato = document.getElementById('numContratoForm').value;
		}
		//console.log(numContrato);
		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
			    document.getElementById('contenidoTotal').innerHTML = validar; 
		    }
		};
		xhttp.open("GET", "buscarProformas.php?numContrato="+numContrato, true);
		xhttp.send();
	}
	
	function generarContrato(BolId)
	{
		origenDatos = 3; // 1=Modo Normal, 2=deEditar, 3=deProforma, 4=soloGarantia, 5=deGarantiaReparacion
		Bol_Id = BolId;
	}

	function generarContraroDeProforma() 
	{
		cargarDatosDB(Bol_Id, 3);//3=ir a resumen
	}


	//Garantia
	function buscarGarantia(numContrato) 
	{
		if (numContrato != -1) 
		{
			numContrato = document.getElementById('numContratoForm').value;
		}
		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
			    document.getElementById('contenidoTotal').innerHTML = validar; 
		    }
		};
		xhttp.open("GET", "buscarGarantia.php?numContrato="+numContrato, true);
		xhttp.send();
	}

	function garantia(BolId) 
	{
		origenDatos = 4; // 1=Modo Normal, 2=deEditar, 3=deProforma, 4=soloGarantia, 5=deGarantiaReparacion
		Bol_Id = BolId;	
	}


	function realizarGarantia() 
	{
		cargarDatosDB(Bol_Id, 3);//3=ir a resumen
	}

	function reparacion(BolId) 
	{
		origenDatos = 5; // 1=Modo Normal, 2=deEditar, 3=deProforma, 4=soloGarantia, 5=deGarantiaReparacion
		Bol_Id = BolId;		
	}

	function realizarReparacion() 
	{
		cargarDatosDB(Bol_Id, 2);//2=ir a turbo
	}





	//Produccion
	function verProduccion() 
	{
		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
			    document.getElementById('contenidoTotal').innerHTML = validar; 

		    }
		};
		xhttp.open("GET", "../trabajos/ventanaPrincipal.php?interno=0", true);
		xhttp.send();
	}

	function imprimir() 
	{
		window.print();
	}




	function buscarCodTur_secTurbo()
	{
	    codTur = document.getElementById('codTurBuscar_input').value;
	    
	    xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
		    	
		    	if(validar.length>2)
		    	{
		    		console.log("Entro");
		    		posSeparador = validar.indexOf("%&");
				    turboObj.idMot = validar.substring(0, posSeparador);
				    validar = validar.substring(posSeparador+2);

				    posSeparador = validar.indexOf("%&");
				    turboObj.nomMot = validar.substring(0, posSeparador);
				    validar = validar.substring(posSeparador+2);

				    posSeparador = validar.indexOf("%&");
				    turboObj.idTipVeh = validar.substring(0, posSeparador);
				    validar = validar.substring(posSeparador+2);

				    posSeparador = validar.indexOf("%&");
				    turboObj.nomTipVeh = validar.substring(0, posSeparador);
				    validar = validar.substring(posSeparador+2);

				    posSeparador = validar.indexOf("%&");
				    turboObj.idVeh = validar.substring(0, posSeparador);
				    validar = validar.substring(posSeparador+2);

				    posSeparador = validar.indexOf("%&");
				    turboObj.nomVeh = validar.substring(0, posSeparador);
				    validar = validar.substring(posSeparador+2);

				    //turbo mismo
					posSeparador = validar.indexOf("%&");
				    turboObj.idCodTur = validar.substring(0, posSeparador);
				    validar = validar.substring(posSeparador+2);

				    posSeparador = validar.indexOf("%&");
				    turboObj.codTur = validar.substring(0, posSeparador);
				    validar = validar.substring(posSeparador+2);

				    posSeparador = validar.indexOf("%&");
				    turboObj.idMod = validar.substring(0, posSeparador);
				    validar = validar.substring(posSeparador+2);

				    posSeparador = validar.indexOf("%&");
				   	turboObj.nomMod = validar.substring(0, posSeparador);
				    validar = validar.substring(posSeparador+2);

				    posSeparador = validar.indexOf("%&");
				    turboObj.idMar = validar.substring(0, posSeparador);
				    validar = validar.substring(posSeparador+2);

				    posSeparador = validar.indexOf("%&");
				    turboObj.nomMar = validar.substring(0, posSeparador);

				    colocarTurboParte1();

				    selectorTurbo(turboObj.idCodTur, turboObj.codTur);
				}
				else
				{
					alert("No encontrado!");
				}
		    }
		};
		xhttp.open("GET", "buscarCodTur_secTurbo.php?codTur="+codTur, true);
		xhttp.send();


		
	}

</script>
</body>
</html>