<?php include ("../partes/sesionStart.php"); ?>
<?php include ("actual.php"); ?>
<?php include ("../partes/seguridad.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Recepcion</title>
	<link rel="icon" href="../img/JRturbos-logo-favicon.png">
	<link rel="stylesheet" type="text/css" href="css/estiloTrabajos.css">

  	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>

</head>
<body onload="ventanaPrincipal()">
	<div id="contenidoTotal" class="container-fluid" >


	</div>
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

	
	var myVar = setInterval(myTimer, 2000);

	function myTimer() 
	{
	    ventanaPrincipal();
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
		xhttp.open("GET", "ventanaPrincipal.php?interno=1", true);
		xhttp.send();
	}

	function paraTimer()
	{
		clearInterval(myVar);
	}
	
	var Bol_Id=0;
	var accesoriosIds = [];

	function editarObservaciones(BolId)
	{
		Bol_Id = BolId;
		accesoriosIds = [];

		paraTimer();

		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
		    	document.getElementById('contenidoPopUp').innerHTML = validar; 
		    	pintarSeleccionados(BolId);
		    }
		};
		xhttp.open("GET", "verAccesoriosExtra.php?Bol_Id="+BolId, true);
		xhttp.send();
		
	}

	
	function pintarSeleccionados(Bol_Id)
	{
		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
		    	if (validar.length<1) 
		    	{
		    		return;
		    	}
		    	var idsAcc = validar.split(",");
		    	accesoriosIds = [];
		    	for (var i = 0; i <idsAcc.length; i++) 
		    	{
		    		accesoriosIds.push(parseInt(idsAcc[i])); 
		    	}
		    	for (var i = 0; i <accesoriosIds.length; i++) 
		    	{
		    		document.getElementById('btnAcc'+accesoriosIds[i] ).style.backgroundColor = "#0A0";
		    	}
		    }
		};
		xhttp.open("GET", "pintarSeleccionados.php?Bol_Id="+Bol_Id, true);
		xhttp.send();
		
	}

	function selectAccesorio(idAcc)
	{
		for (i = 0; i < accesoriosIds.length; i++) 
		{
			if(idAcc==accesoriosIds[i])
			{
				accesoriosIds.splice(accesoriosIds.indexOf(idAcc), 1);
				document.getElementById('btnAcc'+idAcc).style.backgroundColor = "inherit";
				return;
			}

		}		
		document.getElementById('btnAcc'+idAcc).style.backgroundColor = "#0A0";
		accesoriosIds.push(idAcc); 
	}

	function finEditarObservaciones()
	{		
		console.log(Bol_Id);
		console.log(accesoriosIds);
		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
		    	myVar = setInterval(myTimer, 2000);
		    	accesoriosIds = [];
		    }
		};
		xhttp.open("GET", "actualizarIdsAccesorios.php?Bol_Id="+Bol_Id+" & accesoriosIds="+accesoriosIds, true);
		xhttp.send();
	}

	function cerrarPopUp()
	{
		myVar = setInterval(myTimer, 2000);	
	}
	
	
	function terminar(idB, estadoTarea) 
	{
		paraTimer();
		estadoTarea = estadoTarea + 1;
		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	ventanaPrincipal();
		    	myVar = setInterval(myTimer, 2000);		    	
		    }
		};
		xhttp.open("GET", "terminar.php?idB="+idB+" & estadoTarea="+estadoTarea, true);
		xhttp.send();
	}

	function restaurar(idB) 
	{
		paraTimer();
		xhttp.onreadystatechange = function() 
		{
		    if (xhttp.readyState == 4 && xhttp.status == 200) 
		    {	    	
		    	var validar = xhttp.responseText;
		    	ventanaPrincipal();		
		    	myVar = setInterval(myTimer, 2000);		    	
		    }
		};
		xhttp.open("GET", "restaurar.php?idB="+idB, true);
		xhttp.send();
	}
</script>
</body>
</html>