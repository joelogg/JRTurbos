
class Cliente
{
	constructor() 
	{
		
		this.id = -1;
	    this.dni = "";
	    this.nombre = "";
	    this.direccion = "";
	    this.ciudad = "";
	    this.telefono = "";
	    

	   /* this.id = 1;
	    this.dni = "71629445";
	    this.nombre = "Joel";
	    this.direccion = "Mi casa";
	    this.ciudad = "Are";
	    this.telefono = "545454";*/


	}

	limpiar()
	{
		this.id = -1;
		this.dni = "";
	    this.nombre = "";
	    this.direccion = "";
	    this.ciudad = "";
	    this.telefono = "";
	}





	comprobarCliente()
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
		    	if (validar!="")
		    	{		    		
		    		var array = validar.split(",:");
		    		this.id = array[0];
					this.nombre = array[1];
					this.direccion = array[2];
					this.ciudad = array[3];
					this.telefono = array[4];
		    		document.getElementById('nombreI').value = this.nombre;
		    		document.getElementById('dirI').value = this.direccion;
		    		document.getElementById('ciuI').value = this.ciudad;
		    		document.getElementById('telI').value = this.telefono;
		    	}
		    	else
		    	{
		    		document.getElementById('nombreI').value = "";
		    		document.getElementById('dirI').value = "";
		    		document.getElementById('ciuI').value = "";
		    		document.getElementById('telI').value = "";

		    		this.limpiar;
		    	}
		    	habilitarBtnGuardarCliente();
		    	
		    }
		};
		xhttp.open("GET", "comprobarCliente.php?cliDni="+this.dni, true);
		xhttp.send();
	}

	historial()
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
		    	document.getElementById('historialClie').innerHTML = validar;
		    }
		};
		xhttp.open("GET", "historialCliente.php?cliDni="+this.dni, true);
		xhttp.send();
	}


	
}
