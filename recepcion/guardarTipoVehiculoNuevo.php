<?php 
include ("../partes/conexion.php"); 
$nomVeh = $_GET['tipVehNombre'];
$tipVehId = $_GET['vehiculoId'];

$sql = "SELECT * FROM vehiculotipo WHERE VehTip_Nom='".$nomVeh."' AND Veh_Id='".$tipVehId."'";
$result = $conexion->query($sql);



if ($result->num_rows > 0) 
{	
	if($row = $result->fetch_assoc()) 
	{
        $idTipVeh=$row["VehTip_Id"];
        echo $idTipVeh;
    }
}
else
{
	$sql = "INSERT INTO vehiculotipo(Veh_Id, VehTip_Nom) VALUES ('".$tipVehId."', '".$nomVeh."')";

	if ($conexion->query($sql) === TRUE) 
	{
		$sql = "SELECT * FROM vehiculotipo WHERE VehTip_Nom='".$nomVeh."' AND Veh_Id='".$tipVehId."'";
		$result = $conexion->query($sql);

		if ($result->num_rows > 0) 
		{	
			while($row = $result->fetch_assoc()) 
			{
		        $idTipVeh=$row["VehTip_Id"];
		        echo $idTipVeh;
		    }
		}
	} 
	else 
	{
		echo "Error: " . $sql . "<br>" . $conexion->error;
	}
}
?>