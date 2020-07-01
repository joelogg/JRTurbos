<?php 
include ("../partes/conexion.php"); 
$idA = $_GET['idP'];

$sql = "SELECT Veh_Id FROM vehiculotipo WHERE VehTip_Id='".$idA."'";
$result = $conexion->query($sql);

if ($result->num_rows > 0) 
{	
	while($row = $result->fetch_assoc()) 
	{
        $idP=$row["Veh_Id"];

    }
}




$sql = "SELECT VehTip_Id, VehTip_Nom FROM vehiculotipo WHERE Veh_Id='".$idP."' ORDER BY VehTip_Nom ASC";
$result = $conexion->query($sql);



if ($result->num_rows > 0) 
{	
	while($row = $result->fetch_assoc()) 
	{
        $VehTip_Id=$row["VehTip_Id"];
        $VehTip_Nom=$row["VehTip_Nom"];
        if ($idA==$VehTip_Id) 
        	echo '<option value="'.$VehTip_Id.'" selected>'.$VehTip_Nom.'</option>';
        else
        	echo '<option value="'.$VehTip_Id.'">'.$VehTip_Nom.'</option>';
    }
}
else
{
	echo "Error: " . $sql . "<br>" . $conexion->error;
}
?>