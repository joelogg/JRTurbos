<?php
include ("../partes/conexion.php");
$Bol_Id = $_GET['Bol_Id'];

//Elimando Cabecera
$sql2 = "UPDATE boleta SET Bol_Anu=1 WHERE Bol_Id=".$Bol_Id;
if ($conexion->query($sql2) === TRUE) 
{
    //echo "Record deleted successfully";
} 
else
	echo "Error delete boleta";

?>