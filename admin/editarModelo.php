<?php 
include ("../partes/conexion.php"); 
$idPa = $_GET['idP'];
$idAct = $_GET['idA'];
$nomA = $_GET['nomA'];

$sql = "UPDATE modelocarro SET MC_Id='".$idPa."', Mod_Nom='".$nomA."' WHERE Mod_Id='".$idAct."'";

if ($conexion->query($sql) === TRUE) 
{
    //echo "Record deleted successfully";
} 
else
	echo "Error Actualizar Cliente";


$sql = "UPDATE variables SET Var_Tip='5', Var_TipId='".$idAct."' WHERE Var_Id=1";

if ($conexion->query($sql) === TRUE) 
{
    //echo "Record deleted successfully";
} 
else
	echo "Error Actualizar Cliente";
?>