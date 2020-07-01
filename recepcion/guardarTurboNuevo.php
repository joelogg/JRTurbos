<?php 
include ("../partes/conexion.php"); 
$codTurbo = $_GET['codTurbo'];
$modeloId = $_GET['modeloId'];

$sql = "SELECT * FROM turbo WHERE Tur_Cod='".$codTurbo."' AND Mod_Id='".$modeloId."'";
$result = $conexion->query($sql);



if ($result->num_rows > 0) 
{	
	if($row = $result->fetch_assoc()) 
	{
        $idTur=$row["Tur_Id"];
        echo $idTur;
    }
}
else
{
	$sql = "INSERT INTO turbo(Mod_Id, Tur_Cod) VALUES ('".$modeloId."', '".$codTurbo."')";

	if ($conexion->query($sql) === TRUE) 
	{
		$sql = "SELECT * FROM turbo WHERE Tur_Cod='".$codTurbo."' AND Mod_Id='".$modeloId."'";
		$result = $conexion->query($sql);

		if ($result->num_rows > 0) 
		{	
			while($row = $result->fetch_assoc()) 
			{
		        $idTur=$row["Tur_Id"];
        		echo $idTur;
		    }
		}
	} 
	else 
	{
		echo "Error: " . $sql . "<br>" . $conexion->error;
	}
}
?>