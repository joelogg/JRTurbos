<?php 
include ("../partes/conexion.php"); 

$tipo = $_GET['tipo'];
$origenDatos = $_GET['origenDatos'];
$Bol_Id_Gar = $_GET['Bol_Id'];

$cliId = $_GET['cliId'];
$cliDni = $_GET['cliDni'];
$cliNom = $_GET['cliNom'];
$cliDir = $_GET['cliDir'];
$cliTel = $_GET['cliTel'];
$cliCiu = $_GET['cliCiu'];

$destino = $_GET['destino'];

$idVeh = $_GET['idVeh'];
$nomVeh = $_GET['nomVeh'];
$idTipVeh = $_GET['idTipVeh'];
$nomTipVeh = $_GET['nomTipVeh'];
$idMot = $_GET['idMot'];
$nomMot = $_GET['nomMot'];

$idMar = $_GET['idMar'];
$nomMar = $_GET['nomMar'];
$idMod = $_GET['idMod'];
$nomMod = $_GET['nomMod'];
$idCodTur = $_GET['idCodTur'];
$codTur = $_GET['codTur'];

$servicioId = $_GET['servicioId'];
$servicioNom = $_GET['servicioNom'];
$servicioTrabajos = $_GET['servicioTrabajos'];

$idsPie = $_GET['idsPie'];
$nomsPie = $_GET['nomsPie'];
$trasPie = $_GET['trasPie'];
$tipsPie = $_GET['tipsPie'];
$cantPiesas = $_GET['cantPiesas'];

$precioSer = $_GET['precioSer'];
$presPie = $_GET['presPie'];
$precioTotal = $_GET['precioTotal'];
$aCuenta = $_GET['aCuenta'];

$IGV = $_GET['IGV'];
$idsAcc = $_GET['idsAcc'];
$nomsAcc = $_GET['nomsAcc'];
$fechaEntrega = $_GET['fechaEntrega'];
$horaEntrega = $_GET['horaEntrega'];



$horaEntrega = $horaEntrega . ":00";
$fechaEntrega = date("Y-m-d", strtotime($fechaEntrega));


//Cliente
$sql = "SELECT Cli_Id FROM cliente WHERE Cli_Dni=".$cliDni;
$result = $conexion->query($sql);
if ($result->num_rows > 0) 
{
	if($row = $result->fetch_assoc()) 
	{
        $cliId=$row["Cli_Id"];
        

        $sql2 = "UPDATE cliente SET Cli_Nom='".$cliNom."', Cli_Dir='".$cliDir."', Cli_Tel='".$cliTel."', Clie_Ciu='".$cliCiu."' WHERE Cli_Dni=".$cliDni;
		if ($conexion->query($sql2) === TRUE) 
		{
		    //echo "Record deleted successfully";
		} 
		else
			echo "Error Actualizar Cliente";
    }
}
else
{
   	$sql2 = 'INSERT INTO cliente(Cli_Nom, Cli_Dir, Clie_Ciu,  Cli_Tel, Cli_Dni) VALUES ("'.$cliNom.'", "'.$cliDir.'", "'.$cliCiu.'", "'.$cliTel.'", "'.$cliDni.'")';

	if ($conexion->query($sql2) === TRUE) 
	{
	    $sql = "SELECT Cli_Id FROM cliente WHERE Cli_Dni=".$cliDni;
		$result = $conexion->query($sql);
		if ($result->num_rows > 0) 
		{
			if($row = $result->fetch_assoc()) 
			{
		        $cliId=$row["Cli_Id"];
		    }
		}
	} 
	else 
	{
	    echo "Error CLiente: " . $sql2 . "<br>" . $conexion->error;
	}
}



$numRec = 1;

if($tipo==0)//boleta
{
	$sql = "SELECT Bol_NumDoc FROM boleta WHERE Bol_Tip=0 ORDER BY Bol_NumDoc DESC	LIMIT 1" ;
	$result = $conexion->query($sql);

	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{
			$emp_NumBol = $row["Bol_NumDoc"];
			$numRec = $emp_NumBol + 1;
		}
	}
}
else
{
	$sql = "SELECT Bol_NumDoc FROM boleta WHERE Bol_Tip=1 ORDER BY Bol_NumDoc DESC	LIMIT 1" ;
	$result = $conexion->query($sql);

	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{
			$emp_NumBol = $row["Bol_NumDoc"];
			$numRec = $emp_NumBol + 1;
		}
	}		
}

if (isset($_GET['Bol_NumDoc']))
{
	$numRec = $_GET['Bol_NumDoc'];
} 



//cabecera Boleta
$bolRea = 0;
if($servicioId>2)
{
	$bolRea = 1;
}

date_default_timezone_set('America/Lima');
$fecha = date('Y-m-d');
$hora = date("H:i:s");


$sql = 'INSERT INTO boleta(Cli_Id, Bol_Tip, Bol_NumDoc, Bol_Rea, Tur_Id, Bol_FecRec, Bol_HorRec, Bol_FecEnt, Bol_HorEnt, Bol_Pre, Bol_ACue, Bol_IGV, Bol_Not) VALUES ("'.$cliId.'", "'.$tipo.'", "'.$numRec.'", "'.$bolRea.'", '.$idCodTur.', "'.$fecha.'", "'.$hora.'", "'.$fechaEntrega.'", "'.$horaEntrega.'", '.$precioTotal.', '.$aCuenta.', '.$IGV.', "'.$destino.'")';

if ($conexion->query($sql) === TRUE) 
{
    //echo "Cabecera Bol ok";
} 
else 
{
    echo "Error Boleta: " . $sql . "<br>" . $conexion->error;
}



$Bol_Id = -1;
$sql = "SELECT Bol_Id FROM boleta WHERE Bol_NumDoc=".$numRec."  AND Bol_Tip=".$tipo." ORDER by Bol_Id DESC Limit 1";
$result = $conexion->query($sql);
if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
	{
        $Bol_Id=$row["Bol_Id"];
    }
}
echo $Bol_Id."%&";


//en lal base de datos garantia y reparacion tienen q tener id >= 4
if ($origenDatos>=4) 
{
	$garTip = 0;
	if ($origenDatos==4)//Garantia
	{
		$garTip = 0;
	}
	elseif ($origenDatos==5)//reparacion
	{
		$garTip = 1;
	}

	$sql = 'INSERT INTO garantia (Bol_Id, Gar_BolId, Gar_Tip) VALUES ("'.$Bol_Id.'", "'.$Bol_Id_Gar.'", "'.$garTip.'")';
	if ($conexion->query($sql) === TRUE) 
	{
	    //echo "Detalle Serv ok";
	} 
	else 
	{
	    echo "Erro Insertar Garantia: " . $sql . "<br>" . $conexion->error;
	}
}



//Servicio

$sql = 'INSERT INTO serviciorealizado(DetBol_Id, Ser_Id, SerRea_Pre) VALUES ("'.$Bol_Id.'", "'.$servicioId.'", "'.$precioSer.'")';
if ($conexion->query($sql) === TRUE) 
{
    //echo "Detalle Serv ok";
} 
else 
{
    echo "Erro Detalle Ser: " . $sql . "<br>" . $conexion->error;
}

$SerRea_Id = 1;
$sql = "SELECT SerRea_Id FROM serviciorealizado WHERE DetBol_Id=".$Bol_Id;
$result = $conexion->query($sql);
if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
	{
        $SerRea_Id=$row["SerRea_Id"];
    }
}


//Pieza Realizada

$nomCalibracion = "Calibración ";
$nomVenta = "Venta ";
$nomNeumatico = "Neumático ";
$nomElectronico = "Electrónico ";



$pieListIds = explode(',', $idsPie);
$pieListNom = explode(',', $nomsPie);
$pieListTra = explode(',', $trasPie);
$pieListTip = explode(',', $tipsPie);
$pieListPre = explode(',', $presPie);

for($i = 0; $i < $cantPiesas;$i++)
{
	$sql = 'INSERT INTO piesarealizada(SerRea_Id, Pie_Id, PieRea_Tra, PieRea_Tip, PieRea_Pre ) VALUES ("'.$SerRea_Id.'", "'.$pieListIds[$i].'", "'.$pieListTra[$i].'", "'.$pieListTip[$i].'", "'.$pieListPre[$i].'")';
	if ($conexion->query($sql) === TRUE) 
	{
	    //echo "Pieza Rea ok";
	} 
	else 
	{
	    echo "Error Pieza Bol: " . $sql . "<br>" . $conexion->error;
	}
}


//accesorios extra
$accListIds = explode(',', $idsAcc);
$max = sizeof($accListIds);
for($i = 0; $i < $max;$i++)
{
	$sql = 'INSERT INTO boletaaccesoriosextra(AccExt_Id, Bol_Id) VALUES ("'.$accListIds[$i].'", "'.$Bol_Id.'")';
	if ($conexion->query($sql) === TRUE) 
	{
	    //echo "Detalle Acc ok";
	} 
	else 
	{
	    //echo "Detalle Acc: " . $sql . "<br>" . $conexion->error;
	}
}


?>