<?php
include ("../partes/conexion.php"); 

$sql = "SELECT AccExt_Id, AccExt_Nom FROM accesoriosextras";
$result = $conexion->query($sql);

if ($result->num_rows > 0) 
{	
	while($row = $result->fetch_assoc()) 
	{
        $IdAccExt=$row["AccExt_Id"];
        $NomAccExt=$row["AccExt_Nom"];
        echo '<button class="btn btn-default btnAccAbajo" id="btnAcc'.$IdAccExt.'" onclick="selectAccesorio('.$IdAccExt.',`'.$NomAccExt.'`)">'.$NomAccExt.'</button>';

    }
}
?>