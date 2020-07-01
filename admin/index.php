<?php include ("../partes/sesionStart.php"); ?>
<?php include ("actual.php"); ?>
<?php include ("../partes/seguridad.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administracion</title>
	<link rel="icon" href="../img/JRturbos-logo-favicon.png">
	<link rel="stylesheet" type="text/css" href="css/estiloAdministrador.css">

  	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>

</head>
<body onload="verVehTur()">
	<div id="contenidoTotal" class="container-fluid"></div>

	<?php include ("popUps.php"); ?>

<script>



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


	function ventanaPrincipal()
	{
		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
		    	document.getElementById('contenidoTotal').innerHTML = validar; 
		    }
		};
		xhttp.open("GET", "ventanaPrincipla.php", true);
		xhttp.send();
	}

	var fechaIni = "";
	var fechaFin = "";
	function reporte()
	{

		if ( document.getElementById('fechaIni') ) 
		{	
			fechaIni = document.getElementById('fechaIni').value;
		}

		if ( document.getElementById('fechaFin') ) 
		{
			fechaFin = document.getElementById('fechaFin').value;
		}

		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
		    	document.getElementById('contenidoTotal').innerHTML = validar; 
		    }
		};
		xhttp.open("GET", "reporte.php?original=1 && fechaIni="+fechaIni+" & fechaFin="+fechaFin, true);
		xhttp.send();
	}




	function generateexcel(tableid) 
	{ 
	    var table= document.getElementById(tableid); 
	    var html = table.outerHTML;
	    while (html.indexOf('á') != -1) html = html.replace('á', '&aacute;'); 
	    while (html.indexOf('Á') != -1) html = html.replace('Á', '&Aacute;'); 
	    while (html.indexOf('é') != -1) html = html.replace('é', '&eacute;'); 
	    while (html.indexOf('É') != -1) html = html.replace('É', '&Eacute;'); 
	    while (html.indexOf('í') != -1) html = html.replace('í', '&iacute;'); 
	    while (html.indexOf('Í') != -1) html = html.replace('Í', '&Iacute;'); 
	    while (html.indexOf('ó') != -1) html = html.replace('ó', '&oacute;'); 
	    while (html.indexOf('Ó') != -1) html = html.replace('Ó', '&Oacute;'); 
	    while (html.indexOf('ú') != -1) html = html.replace('ú', '&uacute;'); 
	    while (html.indexOf('Ú') != -1) html = html.replace('Ú', '&Uacute;'); 
	    while (html.indexOf('º') != -1) html = html.replace('º', '&ordm;'); 
	    while (html.indexOf('ñ') != -1) html = html.replace('ñ', '&ntilde;'); 
	    while (html.indexOf('Ñ') != -1) html = html.replace('Ñ', '&Ntilde;');  
	    window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html)); 
	} 

	
	function verVehTur() 
	{
		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
		    	document.getElementById('contenidoTotal').innerHTML = validar; 
		    }
		};
		xhttp.open("GET", "ventanaVehTur.php", true);
		xhttp.send();
	}

	function mayus(e) 
	{
	    e.value=e.value.toUpperCase();	    
	}

	function habilitarBtnAgr() 
	{
		if(document.getElementById('iNombreAg').value=="")
		{
			document.getElementById('btnAgregar').disabled = true;
			document.getElementById("btnAgregar").className = "btn btn-success btn-lg disabled";
		}
		else
		{
			document.getElementById('btnAgregar').disabled = false;
			document.getElementById("btnAgregar").className = "btn btn-success btn-lg";
		}
	}

	function habilitarBtnEdi() 
	{
		if(document.getElementById('iNombreEd').value=="")
		{
			document.getElementById('btnEditar').disabled = true;
			document.getElementById("btnEditar").className = "btn btn-success btn-lg disabled";
		}
		else
		{
			document.getElementById('btnEditar').disabled = false;
			document.getElementById("btnEditar").className = "btn btn-success btn-lg";
		}
	}


	function cancelarGuardar() 
	{
		document.getElementById('iNombreAg').value = "";
	}

	function cancelarEditar() 
	{
		document.getElementById('iNombreEd').value = "";
	}

	var actual = 0; //1=veh, 2=tipVeh, 3=mot, 4=mar, 5=mod, 6=tur
	var nomA = "";
	var idA = 0;
	var idP = 0;

	//-------------Nuevo--------------
	function verPopUpNuevoVeh() 
	{
		actual = 1;
		document.getElementById('popUpTituloAgregar').innerHTML = "Agregando Vehículo";
		document.getElementById('popUpIndicadorAgregar').innerHTML = "Nombre del vehículo:";
	}

	function verPopUpNuevoTipVeh(idPEntra) 
	{
		idP = idPEntra;
		actual = 2;

		document.getElementById('popUpTituloAgregar').innerHTML = "Agregando Tipo de Vehículo";
		document.getElementById('popUpIndicadorAgregar').innerHTML = "Nombre de tipo vehículo:";
	}

	function verPopUpNuevoMot(idPEntra) 
	{
		idP = idPEntra;
		actual = 3;

		document.getElementById('popUpTituloAgregar').innerHTML = "Agregando Motor";
		document.getElementById('popUpIndicadorAgregar').innerHTML = "Nombre del motor:";
	}

	function verPopUpNuevoMar(idPEntra) 
	{
		idP = idPEntra;
		actual = 4;

		document.getElementById('popUpTituloAgregar').innerHTML = "Agregando Marca de Turbo";
		document.getElementById('popUpIndicadorAgregar').innerHTML = "Nombre del modelo del turbo:";
	}

	function verPopUpNuevoMod(idPEntra) 
	{
		idP = idPEntra;
		actual = 5;

		document.getElementById('popUpTituloAgregar').innerHTML = "Agregando Modelo de Turbo";
		document.getElementById('popUpIndicadorAgregar').innerHTML = "Nombre de la marca del turbo:";
	}

	function verPopUpNuevoTur(idPEntra) 
	{
		idP = idPEntra;
		actual = 6;

		document.getElementById('popUpTituloAgregar').innerHTML = "Agregando Turbo";
		document.getElementById('popUpIndicadorAgregar').innerHTML = "Nombre del turbo:";
	}


	function guardarNuevo() 
	{
		//1=veh, 2=tipVeh, 3=mot, 4=mar, 5=mod, 6=tur
		nom = document.getElementById('iNombreAg').value;
		if (actual==1) 
		{
			xhttp.onreadystatechange = function() 
			{
			    if (xhttp.readyState == 4 && xhttp.status == 200) 
			    {	    	
			    	var validar = xhttp.responseText;
			    	location.reload();
			    }
			};
			xhttp.open("GET", "guardarVehiculoNuevo.php?nomVeh="+nom, true);
			xhttp.send();
		}
		else if(actual==2)
		{
			xhttp.onreadystatechange = function() 
			{
			    if (xhttp.readyState == 4 && xhttp.status == 200) 
			    {	    	
			    	var validar = xhttp.responseText;
			    	location.reload();
			    }
			};
			xhttp.open("GET", "guardarTipoVehiculoNuevo.php?tipVehNombre="+nom+"&& vehiculoId="+idP, true);
			xhttp.send();
		}
		else if(actual==3)
		{
			xhttp.onreadystatechange = function() 
			{
			    if (xhttp.readyState == 4 && xhttp.status == 200) 
			    {	    	
			    	var validar = xhttp.responseText;
			    	location.reload();
			    }
			};
			xhttp.open("GET", "guardarMotorNuevo.php?codMotor="+nom+"&& tipVehId="+idP, true);
			xhttp.send();
		}
		else if(actual==4)
		{
			xhttp.onreadystatechange = function() 
			{
			    if (xhttp.readyState == 4 && xhttp.status == 200) 
			    {	    	
			    	var validar = xhttp.responseText;
			    	location.reload();
			    }
			};
			xhttp.open("GET", "guardarMarcaNueva.php?nomMar="+nom+"&& motorId="+idP, true);
			xhttp.send();
		}
		else if(actual==5)
		{
			xhttp.onreadystatechange = function() 
			{
			    if (xhttp.readyState == 4 && xhttp.status == 200) 
			    {	    	
			    	var validar = xhttp.responseText;
			    	location.reload();
			    }
			};
			xhttp.open("GET", "guardarModeloNuevo.php?nomMod="+nom+"&& marcaId="+idP, true);
			xhttp.send();
		}
		else if(actual==6)
		{
			xhttp.onreadystatechange = function() 
			{
			    if (xhttp.readyState == 4 && xhttp.status == 200) 
			    {	    	
			    	var validar = xhttp.responseText;
			    	location.reload();
			    }
			};
			xhttp.open("GET", "guardarTurboNuevo.php?codTurbo="+nom+"&& modeloId="+idP, true);
			xhttp.send();
		}
	}

	//-------------------Editar------------------
	function verPopUpEditarVeh(nomAct, idAct) 
	{
		actual = 1;
		nomA = nomAct;
		idA = idAct;
		document.getElementById('popUpTituloEditar').innerHTML = "Agregando Vehículo";
		document.getElementById('popUpIndicadorEditar').innerHTML = "Nombre del vehículo:";
		document.getElementById('iNombreEd').value = nomA;

		document.getElementById('opcionesSelect').innerHTML = "";
		document.getElementById('sel1').innerHTML = "";
		document.getElementById('sel1').disabled = true;
	}

	function verPopUpEditarTipVeh(nomAct, idAct, idPad) 
	{
		nomA = nomAct;
		idA = idAct;
		idP = idPad;
		actual = 2;

		document.getElementById('popUpTituloEditar').innerHTML = "Agregando Tipo de Vehículo";
		document.getElementById('popUpIndicadorEditar').innerHTML = "Nombre de tipo vehículo:";
		document.getElementById('iNombreEd').value = nomA;

		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
		    	document.getElementById('opcionesSelect').innerHTML = "Seleccione Vehículo";
				document.getElementById('sel1').innerHTML = validar;
				document.getElementById('sel1').disabled = false;
		    }
		};
		xhttp.open("GET", "opcionesVehiculo.php?idP="+idP, true);
		xhttp.send();
	}

	function verPopUpEditarMot(nomAct, idAct, idPad) 
	{
		nomA = nomAct;
		idA = idAct;
		idP = idPad;
		actual = 3;

		document.getElementById('popUpTituloEditar').innerHTML = "Agregando Motor";
		document.getElementById('popUpIndicadorEditar').innerHTML = "Nombre del motor:";
		document.getElementById('iNombreEd').value = nomA;

		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
		    	document.getElementById('opcionesSelect').innerHTML = "Seleccione Tipo Vehículo";
				document.getElementById('sel1').innerHTML = validar;
				document.getElementById('sel1').disabled = false;
		    }
		};
		xhttp.open("GET", "opcionesTipoVehiculo.php?idP="+idP, true);
		xhttp.send();
	}

	function verPopUpEditarMar(nomAct, idAct, idPad) 
	{
		nomA = nomAct;
		idA = idAct;
		idP = idPad;
		actual = 4;

		document.getElementById('popUpTituloEditar').innerHTML = "Agregando Marca de Turbo";
		document.getElementById('popUpIndicadorEditar').innerHTML = "Nombre del modelo del turbo:";
		document.getElementById('iNombreEd').value = nomA;

		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
		    	document.getElementById('opcionesSelect').innerHTML = "Seleccione Motor";
				document.getElementById('sel1').innerHTML = validar;
				document.getElementById('sel1').disabled = false;
		    }
		};
		xhttp.open("GET", "opcionesMotor.php?idP="+idP, true);
		xhttp.send();
	}

	function verPopUpEditarMod(nomAct, idAct, idPad) 
	{
		nomA = nomAct;
		idA = idAct;
		idP = idPad;
		actual = 5;

		document.getElementById('popUpTituloEditar').innerHTML = "Agregando Modelo de Turbo";
		document.getElementById('popUpIndicadorEditar').innerHTML = "Nombre de la marca del turbo:";
		document.getElementById('iNombreEd').value = nomA;

		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
		    	document.getElementById('opcionesSelect').innerHTML = "Seleccione Marca de Turbo";
				document.getElementById('sel1').innerHTML = validar;
				document.getElementById('sel1').disabled = false;
		    }
		};
		xhttp.open("GET", "opcionesMarca.php?idP="+idP, true);
		xhttp.send();
	}

	function verPopUpEditarTur(nomAct, idAct, idPad) 
	{
		nomA = nomAct;
		idA = idAct;
		idP = idPad;
		actual = 6;

		document.getElementById('popUpTituloEditar').innerHTML = "Agregando Turbo";
		document.getElementById('popUpIndicadorEditar').innerHTML = "Nombre del turbo:";
		document.getElementById('iNombreEd').value = nomA;

		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
		    	document.getElementById('opcionesSelect').innerHTML = "Seleccione Modelo de Turbo";
				document.getElementById('sel1').innerHTML = validar;
				document.getElementById('sel1').disabled = false;
		    }
		};
		xhttp.open("GET", "opcionesModelo.php?idP="+idP, true);
		xhttp.send();
	}


	function editar() 
	{
		//1=veh, 2=tipVeh, 3=mot, 4=mar, 5=mod, 6=tur
		nom = document.getElementById('iNombreEd').value;
		idP = document.getElementById('sel1').value;
		if (actual==1) 
		{
			xhttp.onreadystatechange = function() 
			{
			    if (xhttp.readyState == 4 && xhttp.status == 200) 
			    {	    	
			    	var validar = xhttp.responseText;
			    	location.reload();
			    }
			};
			xhttp.open("GET", "editarVehiculo.php?nomA="+nom+"& idA="+idA, true);
			xhttp.send();
		}
		else if(actual==2)
		{
			xhttp.onreadystatechange = function() 
			{
			    if (xhttp.readyState == 4 && xhttp.status == 200) 
			    {	    	
			    	var validar = xhttp.responseText;
			    	location.reload();
			    }
			};
			xhttp.open("GET", "editarTipoVehiculo.php?nomA="+nom+"& idA="+idA+"& idP="+idP, true);
			xhttp.send();
		}
		else if(actual==3)
		{
			xhttp.onreadystatechange = function() 
			{
			    if (xhttp.readyState == 4 && xhttp.status == 200) 
			    {	    	
			    	var validar = xhttp.responseText;
			    	location.reload();
			    }
			};
			xhttp.open("GET", "editarMotor.php?nomA="+nom+"& idA="+idA+"& idP="+idP, true);
			xhttp.send();
		}
		else if(actual==4)
		{
			xhttp.onreadystatechange = function() 
			{
			    if (xhttp.readyState == 4 && xhttp.status == 200) 
			    {	    	
			    	var validar = xhttp.responseText;
			    	location.reload();
			    }
			};
			xhttp.open("GET", "editarMarca.php?nomA="+nom+"& idA="+idA+"& idP="+idP, true);
			xhttp.send();
		}
		else if(actual==5)
		{
			xhttp.onreadystatechange = function() 
			{
			    if (xhttp.readyState == 4 && xhttp.status == 200) 
			    {	    	
			    	var validar = xhttp.responseText;
			    	location.reload();
			    }
			};
			xhttp.open("GET", "editarModelo.php?nomA="+nom+"& idA="+idA+"& idP="+idP, true);
			xhttp.send();
		}
		else if(actual==6)
		{
			xhttp.onreadystatechange = function() 
			{
			    if (xhttp.readyState == 4 && xhttp.status == 200) 
			    {	    	
			    	var validar = xhttp.responseText;
			    	location.reload();
			    }
			};
			xhttp.open("GET", "editarTurbo.php?nomA="+nom+"& idA="+idA+"& idP="+idP, true);
			xhttp.send();
		}
	}


	//-----------------Eliminar---------------------

	function verPopUpEliminarVeh(idAEntra) 
	{
		idA = idAEntra;
		actual = 1;
		document.getElementById('popUpTituloEliminar').innerHTML = "Eliminar Vehículo";
	}

	function verPopUpEliminarTipVeh(idAEntra) 
	{
		idA = idAEntra;
		actual = 2;
		document.getElementById('popUpTituloEliminar').innerHTML = "Eliminar Tipo de Vehículo";
	}

	function verPopUpEliminarMot(idAEntra) 
	{
		idA = idAEntra;
		actual = 3;
		document.getElementById('popUpTituloEliminar').innerHTML = "Eliminar Motor";
	}

	function verPopUpEliminarMar(idAEntra) 
	{
		idA = idAEntra;
		actual = 4;
		document.getElementById('popUpTituloEliminar').innerHTML = "Eliminar Marca de Turbo";
	}

	function verPopUpEliminarMod(idAEntra) 
	{
		idA = idAEntra;
		actual = 5;
		document.getElementById('popUpTituloEliminar').innerHTML = "Eliminar Modelo de Turbo";
	}

	function verPopUpEliminarTur(idAEntra) 
	{
		idA = idAEntra;
		actual = 6;
		document.getElementById('popUpTituloEliminar').innerHTML = "Eliminar Turbo";
	}


	function eliminar() 
	{
		//1=veh, 2=tipVeh, 3=mot, 4=mar, 5=mod, 6=tur
		if (actual==1) 
		{
			xhttp.onreadystatechange = function() 
			{
			    if (xhttp.readyState == 4 && xhttp.status == 200) 
			    {	    	
			    	var validar = xhttp.responseText;
			    	if(validar=="Error")
			    		alert("No se puede eliminar vehículo");
			    	location.reload();
			    }
			};
			xhttp.open("GET", "eliminarVehiculo.php?idA="+idA, true);
			xhttp.send();
		}
		else if(actual==2)
		{
			xhttp.onreadystatechange = function() 
			{
			    if (xhttp.readyState == 4 && xhttp.status == 200) 
			    {	    	
			    	var validar = xhttp.responseText;
			    	if(validar=="Error")
			    		alert("No se puede eliminar tipo vehículo");
			    	location.reload();
			    }
			};
			xhttp.open("GET", "eliminarTipoVehiculo.php?idA="+idA, true);
			xhttp.send();
		}
		else if(actual==3)
		{
			xhttp.onreadystatechange = function() 
			{
			    if (xhttp.readyState == 4 && xhttp.status == 200) 
			    {	    	
			    	var validar = xhttp.responseText;
			    	if(validar=="Error")
			    		alert("No se puede eliminar motor");
			    	location.reload();
			    }
			};
			xhttp.open("GET", "eliminarMotor.php?idA="+idA, true);
			xhttp.send();
		}
		else if(actual==4)
		{
			xhttp.onreadystatechange = function() 
			{
			    if (xhttp.readyState == 4 && xhttp.status == 200) 
			    {	    	
			    	var validar = xhttp.responseText;
			    	if(validar=="Error")
			    		alert("No se puede eliminar marca de turbo");
			    	location.reload();
			    }
			};
			xhttp.open("GET", "eliminarMarca.php?idA="+idA, true);
			xhttp.send();
		}
		else if(actual==5)
		{
			xhttp.onreadystatechange = function() 
			{
			    if (xhttp.readyState == 4 && xhttp.status == 200) 
			    {	    	
			    	var validar = xhttp.responseText;
			    	if(validar=="Error")
			    		alert("No se puede eliminar modelo de turbo");
			    	location.reload();
			    }
			};
			xhttp.open("GET", "eliminarModelo.php?idA="+idA, true);
			xhttp.send();
		}
		else if(actual==6)
		{
			xhttp.onreadystatechange = function() 
			{
			    if (xhttp.readyState == 4 && xhttp.status == 200) 
			    {	    	
			    	var validar = xhttp.responseText;
			    	if(validar=="Error")
			    		alert("No se puede eliminar turbo");
			    	location.reload();
			    }
			};
			xhttp.open("GET", "eliminarTurbo.php?idA="+idA, true);
			xhttp.send();
		}
	}

</script>
</body>
</html>