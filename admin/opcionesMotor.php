<?php 
include ("../partes/conexion.php"); 
$idA = $_GET['idP'];

$sql = "SELECT VehTip_Id FROM motor WHERE Mot_Id='".$idA."'";
$result = $conexion->query($sql);

if ($result->num_rows > 0) 
{	
	while($row = $result->fetch_assoc()) 
	{
        $idP=$row["VehTip_Id"];

    }
}




$sql = "SELECT Mot_Id, Mot_Cod FROM motor WHERE VehTip_Id='".$idP."' ORDER BY Mot_Cod ASC";
$result = $conexion->query($sql);



if ($result->num_rows > 0) 
{	
	while($row = $result->fetch_assoc()) 
	{
        $Mot_Id=$row["Mot_Id"];
        $Mot_Cod=$row["Mot_Cod"];
        if ($idA==$Mot_Id) 
        	echo '<option value="'.$Mot_Id.'" selected>'.$Mot_Cod.'</option>';
        else
        	echo '<option value="'.$Mot_Id.'">'.$Mot_Cod.'</option>';
    }
}
else
{
	echo "Error: " . $sql . "<br>" . $conexion->error;
}
?>