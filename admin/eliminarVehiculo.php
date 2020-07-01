<?php 
include ("../partes/conexion.php"); 
$idAct = $_GET['idA'];

$sql = "DELETE FROM vehiculo WHERE Veh_Id='".$idAct."'";

if ($conexion->query($sql) === TRUE) 
{
    //echo "Record deleted successfully";
} 
else
	echo "Error";



$sql = "UPDATE variables SET Var_Tip='0', Var_TipId='0' WHERE Var_Id=1";

if ($conexion->query($sql) === TRUE) 
{
    //echo "Record deleted successfully";
} 
else
	echo "Error Actualizar Cliente";
?>