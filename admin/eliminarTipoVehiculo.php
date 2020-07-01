<?php 
include ("../partes/conexion.php"); 
$idAct = $_GET['idA'];

$sql = "SELECT Veh_Id FROM vehiculotipo WHERE VehTip_Id='".$idAct."'";
$result = $conexion->query($sql);

if ($result->num_rows > 0) 
{	
	if($row = $result->fetch_assoc()) 
	{
        $idPa=$row["Veh_Id"];
    }
}


$sql = "DELETE FROM vehiculotipo WHERE VehTip_Id='".$idAct."'";

if ($conexion->query($sql) === TRUE) 
{
    //echo "Record deleted successfully";
} 
else
	echo "Error";


$sql = "UPDATE variables SET Var_Tip='1', Var_TipId='".$idPa."' WHERE Var_Id=1";

if ($conexion->query($sql) === TRUE) 
{
    //echo "Record deleted successfully";
} 
else
	echo "Error Actualizar Cliente";
?>