<?php
include ("../partes/conexion.php");
$Bol_Id = $_GET['Bol_Id'];

//Seleccionando Num DOc
$sql = "SELECT Bol_NumDoc FROM boleta WHERE Bol_Id=".$Bol_Id ;
$result = $conexion->query($sql);

$Bol_NumDoc = 0;

if ($result->num_rows > 0) 
{
	if($row = $result->fetch_assoc()) 
	{
        $Bol_NumDoc=$row["Bol_NumDoc"];
    }
}
echo $Bol_NumDoc;

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

?>