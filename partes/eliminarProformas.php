<?php
include ("../partes/conexion.php");

date_default_timezone_set('America/Lima');
$fechaAct = date('Y-m-d');

$nuevafecha = strtotime ( '-7 day' , strtotime ( $fechaAct ) ) ;
$fechaAct = date ( 'Y-m-j' , $nuevafecha );
echo $fechaAct;

$sql4 = "SELECT Bol_Id FROM boleta WHERE Bol_Tip=1 AND Bol_FecRec<'".$fechaAct."'" ;
$result4 = $conexion->query($sql4);

if ($result4->num_rows > 0) 
{
	while($row4 = $result4->fetch_assoc()) 
	{
		$Bol_Id = $row4['Bol_Id'];
		//echo $detBol_Id."-";

		
		//Eliminando accesorios extras
		$sql = "DELETE FROM boletaaccesoriosextra WHERE Bol_Id=".$Bol_Id;

		if ($conexion->query($sql) === TRUE) 
		{
		    //echo "Record deleted successfully";
		} 
		else
			echo "Error delete detalleAce";


		//Eliminando Servicios y piesas
		$sql = "SELECT SerRea_Id FROM serviciorealizado WHERE DetBol_Id=".$Bol_Id ;
		$result = $conexion->query($sql);

		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
			{
		        $serRea_Id=$row["SerRea_Id"];

		        //Elimanando Piesas realizadas
		        $sql2 = "DELETE FROM piesarealizada WHERE SerRea_Id=".$serRea_Id;
				if ($conexion->query($sql2) === TRUE) 
				{
				    //echo "Record deleted successfully";
				} 
				else
					echo "Error delete piesarealizada";

				//Elimanando Servicio realizado
		        $sql2 = "DELETE FROM serviciorealizado WHERE SerRea_Id=".$serRea_Id;
				if ($conexion->query($sql2) === TRUE) 
				{
				    //echo "Record deleted successfully";
				} 
				else
					echo "Error delete serviciorealizado";
		    }
		}
		else
			echo "Error select serviciorealizado";


		//Elimando Cabecera
		$sql2 = "DELETE FROM boleta WHERE Bol_Id=".$Bol_Id;
		if ($conexion->query($sql2) === TRUE) 
		{
		    //echo "Record deleted successfully";
		} 
		else
			echo "Error delete boleta";
	}
}

?>