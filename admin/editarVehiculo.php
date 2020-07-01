<?php 
include ("../partes/conexion.php"); 
$idAct = $_GET['idA'];
$nomA = $_GET['nomA'];

$sql = "UPDATE vehiculo SET Veh_Nom='".$nomA."' WHERE Veh_Id='".$idAct."'";

if ($conexion->query($sql) === TRUE) 
{
    //echo "Record deleted successfully";
} 
else
	echo "Error Actualizar Cliente";


$sql = "UPDATE variables SET Var_Tip='1', Var_TipId='".$idAct."' WHERE Var_Id=1";

if ($conexion->query($sql) === TRUE) 
{
    //echo "Record deleted successfully";
} 
else
	echo "Error Actualizar Cliente";
?>