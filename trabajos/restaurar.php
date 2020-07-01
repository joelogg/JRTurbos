<?php 
include ("../partes/conexion.php"); 
$idB = $_GET['idB'];

date_default_timezone_set('America/Lima');
$fechaAct = date('Y-m-d');


$sql = "UPDATE boleta SET Bol_Rea=0 WHERE Bol_Id=".$idB;

if ($conexion->query($sql) === TRUE) 
{
    //echo "Record updated successfully";
} 
else 
{
    //echo "Error updating record: " . $conexion->error;
}


$sql = 'UPDATE boleta SET Bol_FecTer="" WHERE Bol_Id='.$idB;

if ($conexion->query($sql) === TRUE) 
{
    //echo "Record updated successfully";
} 
else 
{
    //echo "Error updating record: " . $conexion->error;
}

?>
