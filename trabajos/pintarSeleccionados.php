<?php
include ("../partes/conexion.php");
$Bol_Id = $_GET['Bol_Id'];

$sql = "SELECT accesoriosextras.AccExt_Id FROM boletaaccesoriosextra, accesoriosextras WHERE accesoriosextras.AccExt_Id=boletaaccesoriosextra.AccExt_Id AND Bol_Id=".$Bol_Id;
$result = $conexion->query($sql);

$respuesta = "";
if ($result->num_rows > 0) 
{	
	while($row = $result->fetch_assoc()) 
	{
        $IdAccExt=$row["AccExt_Id"];
       
        $respuesta = $respuesta. $IdAccExt.',';
    }
}

if(strlen($respuesta)>1)
	echo substr($respuesta,0,strlen($respuesta)-1);
?>