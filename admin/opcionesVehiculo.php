<?php 
include ("../partes/conexion.php"); 
$idA = $_GET['idP'];
$sql = "SELECT Veh_Id, Veh_Nom FROM vehiculo WHERE 1 ORDER BY Veh_Nom ASC";
$result = $conexion->query($sql);



if ($result->num_rows > 0) 
{	
	while($row = $result->fetch_assoc()) 
	{
        $Veh_Id=$row["Veh_Id"];
        $Veh_Nom=$row["Veh_Nom"];
        if ($idA==$Veh_Id) 
        	echo '<option value="'.$Veh_Id.'" selected>'.$Veh_Nom.'</option>';
        else
        	echo '<option value="'.$Veh_Id.'">'.$Veh_Nom.'</option>';
    }
}
else
{
	echo "Error: " . $sql . "<br>" . $conexion->error;
}
?>