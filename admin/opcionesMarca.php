<?php 
include ("../partes/conexion.php"); 
$idA = $_GET['idP'];

$sql = "SELECT Mot_Id FROM marcacarro WHERE MC_Id='".$idA."'";
$result = $conexion->query($sql);

if ($result->num_rows > 0) 
{	
	while($row = $result->fetch_assoc()) 
	{
        $idP=$row["Mot_Id"];

    }
}




$sql = "SELECT MC_Id, MC_Nom FROM marcacarro WHERE Mot_Id='".$idP."' ORDER BY MC_Nom ASC";
$result = $conexion->query($sql);



if ($result->num_rows > 0) 
{	
	while($row = $result->fetch_assoc()) 
	{
        $MC_Id=$row["MC_Id"];
        $MC_Nom=$row["MC_Nom"];
        if ($idA==$MC_Id) 
        	echo '<option value="'.$MC_Id.'" selected>'.$MC_Nom.'</option>';
        else
        	echo '<option value="'.$MC_Id.'">'.$MC_Nom.'</option>';
    }
}
else
{
	echo "Error: " . $sql . "<br>" . $conexion->error;
}
?>