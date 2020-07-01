<?php 
include ("../partes/conexion.php"); 
$nomVeh = $_GET['nomVeh'];
$sql = "SELECT * FROM vehiculo WHERE Veh_Nom='".$nomVeh."'";
$result = $conexion->query($sql);



if ($result->num_rows > 0) 
{	
	while($row = $result->fetch_assoc()) 
	{
        $idVeh=$row["Veh_Id"];
        echo $idVeh;
    }
}
else
{
	$sql = "INSERT INTO vehiculo(Veh_Nom) VALUES ('".$nomVeh."')";

	if ($conexion->query($sql) === TRUE) 
	{
		$sql = "SELECT * FROM vehiculo WHERE Veh_Nom='".$nomVeh."'";
		$result = $conexion->query($sql);

		if ($result->num_rows > 0) 
		{	
			while($row = $result->fetch_assoc()) 
			{
		        $idVeh=$row["Veh_Id"];
		        echo $idVeh;
		    }
		}
	} 
	else 
	{
		echo "Error: " . $sql . "<br>" . $conexion->error;
	}
}
?>