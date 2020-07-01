<?php include ("partes/sesionStart.php"); ?>
<?php include ("partes/ingresoPreAuto.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>JR Turbos</title>
	<link rel="icon" href="img/JRturbos-logo-favicon.png">
	<link rel="stylesheet" type="text/css" href="css/estiloInicio.css">
</head>
<body>
	<section>
		<img id="logo" src="img/JRturbos-logo.png">
		<span id="error" ></span>
		
			<table>
				<tr>
					<td><label>Usuario:</label> </td>
					<td><input type="text" id="usuario" autofocus></td>
				</tr>
				<tr>
					<td><label>Constraseña:</label></td>
					<td><input type="password" id="clave"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" id="boton" class="btnEstilo1" onclick="validar()" value="Iniciar"></td>
				</tr>		
			</table>
		
	</section>
	
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
function validar() 
{
	var usuario = document.getElementById("usuario").value;
	var clave = document.getElementById("clave").value;
	

	xhttp.onreadystatechange = function() 
	{
	    if (xhttp.readyState == 4 && xhttp.status == 200) 
	    {
	    	var validar = xhttp.responseText;
	    	console.log(validar);
	    	if(validar == "EntrarReceptor")
	    	{
	    		eliminarProformas();
				location.href="recepcion/";
	    	}
	    	else if(validar == "EntrarAdministrador")
	    	{
				location.href="admin/";
	    	}
	    	else if(validar == "EntrarTrabajador")
	    	{
				location.href="trabajos/";
	    	}
	    	else if(validar == "Ingrese contraseña")
	    	{
				document.getElementById("error").innerHTML = validar;
	    		document.getElementById("clave").focus();
	    	}
	    	else
	    	{
	    		document.getElementById("error").innerHTML = validar;
	    		document.getElementById("usuario").value = "";
				document.getElementById("clave").value = "";
	    		document.getElementById("usuario").focus();
	    	}	      	
	    }
	};
	xhttp.open("GET", "partes/validarIniciarSesion.php?usuario="+usuario+"&clave="+clave, true);
	xhttp.send();
}

function eliminarProformas() 
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
	    	console.log(validar);
	    }
	};
	xhttp.open("GET", "partes/eliminarProformas.php", true);
	xhttp.send();
}

</script>
<script> 
	document.onkeypress = KeyPressed; 
	function KeyPressed(e) 
	{ 
		tecla = (document.all) ? e.keyCode :e.which;
	  	// si la tecla no es 13 devuelve verdadero,  si es 13 devuelve false y la pulsación no se ejecuta
	  	if(tecla!=13)
	  	{
	  		//console.log("no enter");
	  	}
	  	else
	  	{
	  		//console.log("enter");
	  		validar();
	  	}
	} 
</script>
</body>
</html>