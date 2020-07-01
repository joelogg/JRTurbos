<?php 
include ("../partes/conexion.php"); 
$nomMar = $_GET['nomMar'];
$motorId = $_GET['motorId'];

$sql = "SELECT * FROM marcacarro WHERE MC_Nom='".$nomMar."' AND Mot_Id='".$motorId."'";
$result = $conexion->query($sql);



if ($result->num_rows > 0) 
{	
	while($row = $result->fetch_assoc()) 
	{
        $idMar=$row["MC_Id"];
        echo $idMar;
    }
}
else
{
	$sql = "INSERT INTO marcacarro (MC_Nom, Mot_Id) VALUES ('".$nomMar."', '".$motorId."')";

	if ($conexion->query($sql) === TRUE) 
	{
		$sql = "SELECT * FROM marcacarro WHERE MC_Nom='".$nomMar."' AND Mot_Id='".$motorId."'";
		$result = $conexion->query($sql);

		if ($result->num_rows > 0) 
		{	
			while($row = $result->fetch_assoc()) 
			{
		        $idMar=$row["MC_Id"];
		        echo $idMar;
		    }
		}
	} 
	else 
	{
		echo "Error: " . $sql . "<br>" . $conexion->error;
	}
}
?>