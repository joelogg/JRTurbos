<?php 
include ("../partes/conexion.php"); 
$nomMod = $_GET['nomMod'];
$marcaId = $_GET['marcaId'];

$sql = "SELECT * FROM modelocarro WHERE Mod_Nom='".$nomMod."' AND MC_Id='".$marcaId."'";
$result = $conexion->query($sql);



if ($result->num_rows > 0) 
{	
	if($row = $result->fetch_assoc()) 
	{
        $idMod=$row["Mod_Id"];
        echo $idMod;
    }
}
else
{
	$sql = "INSERT INTO modelocarro(MC_Id, Mod_Nom) VALUES ('".$marcaId."', '".$nomMod."')";

	if ($conexion->query($sql) === TRUE) 
	{
		$sql = "SELECT * FROM modelocarro WHERE Mod_Nom='".$nomMod."' AND MC_Id='".$marcaId."'";
		$result = $conexion->query($sql);

		if ($result->num_rows > 0) 
		{	
			while($row = $result->fetch_assoc()) 
			{
		        $idMod=$row["Mod_Id"];
		        echo $idMod;
		    }
		}
	} 
	else 
	{
		echo "Error: " . $sql . "<br>" . $conexion->error;
	}
}


$sql = "UPDATE variables SET Var_Tip='5', Var_TipId='".$idMod."' WHERE Var_Id=1";

if ($conexion->query($sql) === TRUE) 
{
    //echo "Record deleted successfully";
} 
else
	echo "Error Actualizar Cliente";
?>