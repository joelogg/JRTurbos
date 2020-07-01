<?php
include ("../partes/conexion.php");
$Bol_Id = $_GET['Bol_Id'];
$accesoriosIds = $_GET['accesoriosIds'];

$sql = "DELETE FROM boletaaccesoriosextra WHERE Bol_Id=".$Bol_Id;
if ($conexion->query($sql) === TRUE) 
{
    //echo "Record deleted successfully";
} 


$accListIds = explode(',', $accesoriosIds);
$max = sizeof($accListIds);
for($i = 0; $i < $max;$i++)
{
	$sql = "INSERT INTO boletaaccesoriosextra(AccExt_Id, Bol_Id) VALUES (".$accListIds[$i].",".$Bol_Id.")";

	if ($conexion->query($sql) === TRUE) 
	{
//	    echo "New record created successfully";
	} 
}





?>