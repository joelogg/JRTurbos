<?php 
include ("../partes/conexion.php"); 
$idA = $_GET['idP'];

$sql = "SELECT MC_Id FROM modelocarro WHERE Mod_Id='".$idA."'";
$result = $conexion->query($sql);

if ($result->num_rows > 0) 
{	
	while($row = $result->fetch_assoc()) 
	{
        $idP=$row["MC_Id"];

    }
}




$sql = "SELECT Mod_Id, Mod_Nom FROM modelocarro WHERE MC_Id='".$idP."' ORDER BY Mod_Nom ASC";
$result = $conexion->query($sql);



if ($result->num_rows > 0) 
{	
	while($row = $result->fetch_assoc()) 
	{
        $Mod_Id=$row["Mod_Id"];
        $Mod_Nom=$row["Mod_Nom"];
        if ($idA==$Mod_Id) 
        	echo '<option value="'.$Mod_Id.'" selected>'.$Mod_Nom.'</option>';
        else
        	echo '<option value="'.$Mod_Id.'">'.$Mod_Nom.'</option>';
    }
}
else
{
	echo "Error: " . $sql . "<br>" . $conexion->error;
}
?>