<?php 
include ("../partes/conexion.php"); 
$idB = $_GET['idB'];
$estadoTarea = $_GET['estadoTarea'];

date_default_timezone_set('America/Lima');
$fechaAct = date('Y-m-d');
$horaAct = date("H:i:s");

$sql = "UPDATE boleta SET Bol_Rea='".$estadoTarea."' WHERE Bol_Id=".$idB;

if ($conexion->query($sql) === TRUE) 
{
    //echo "Record updated successfully";
} 
else 
{
    //echo "Error updating record: " . $conexion->error;
}

$sql = 'UPDATE boleta SET Bol_FecTer="'.$fechaAct.'" WHERE Bol_Id='.$idB;

if ($conexion->query($sql) === TRUE) 
{
    //echo "Record updated successfully";
} 
else 
{
    //echo "Error updating record: " . $conexion->error;
}

?>
