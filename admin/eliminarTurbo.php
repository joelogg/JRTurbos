<?php 
include ("../partes/conexion.php"); 
$idAct = $_GET['idA'];


$sql = "SELECT Mod_Id FROM turbo WHERE Tur_Id='".$idAct."'";
$result = $conexion->query($sql);

if ($result->num_rows > 0) 
{	
	if($row = $result->fetch_assoc()) 
	{
        $idPa=$row["Mod_Id"];
    }
}




$sql = "DELETE FROM turbo WHERE Tur_Id='".$idAct."'";

if ($conexion->query($sql) === TRUE) 
{
    //echo "Record deleted successfully";
} 
else
	echo "Error";


$sql = "UPDATE variables SET Var_Tip='5', Var_TipId='".$idPa."' WHERE Var_Id=1";

if ($conexion->query($sql) === TRUE) 
{
    //echo "Record deleted successfully";
} 
else
	echo "Error Actualizar Cliente";
?>