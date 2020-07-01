<?php 
include ("../partes/conexion.php"); 
$codMotor = $_GET['codMotor'];
$tipVehId = $_GET['tipVehId'];

$sql = "SELECT * FROM motor WHERE Mot_Cod='".$codMotor."' AND VehTip_Id='".$tipVehId."'";
$result = $conexion->query($sql);



if ($result->num_rows > 0) 
{	
	if($row = $result->fetch_assoc()) 
	{
        $idMot=$row["Mot_Id"];
        echo $idMot;
    }
}
else
{
	$sql = "INSERT INTO motor(VehTip_Id, Mot_Cod) VALUES ('".$tipVehId."', '".$codMotor."')";

	if ($conexion->query($sql) === TRUE) 
	{
		$sql = "SELECT * FROM motor WHERE Mot_Cod='".$codMotor."' AND VehTip_Id='".$tipVehId."'";
		$result = $conexion->query($sql);

		if ($result->num_rows > 0) 
		{	
			while($row = $result->fetch_assoc()) 
			{
		        $idMot=$row["Mot_Id"];
        		echo $idMot;
		    }
		}
	} 
	else 
	{
		echo "Error: " . $sql . "<br>" . $conexion->error;
	}
}
?>