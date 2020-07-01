<?php 
include ("../partes/conexion.php"); 
$idAct = $_GET['idA'];

$sql = "SELECT VehTip_Id FROM motor WHERE Mot_Id='".$idAct."'";
$result = $conexion->query($sql);

if ($result->num_rows > 0) 
{	
	if($row = $result->fetch_assoc()) 
	{
        $idPa=$row["VehTip_Id"];
    }
}


$sql = "DELETE FROM motor WHERE Mot_Id='".$idAct."'";

if ($conexion->query($sql) === TRUE) 
{
    //echo "Record deleted successfully";
} 
else
	echo "Error";


$sql = "UPDATE variables SET Var_Tip='2', Var_TipId='".$idPa."' WHERE Var_Id=1";

if ($conexion->query($sql) === TRUE) 
{
    //echo "Record deleted successfully";
} 
else
	echo "Error Actualizar Cliente";
?>