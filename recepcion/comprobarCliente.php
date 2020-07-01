<?php 
include ("../partes/conexion.php"); 
$dni = $_GET['cliDni'];


$sql = "SELECT Cli_Id, Cli_Nom, Cli_Dir, Clie_Ciu, Cli_Tel FROM cliente WHERE Cli_Dni='".$dni."'";

$result = $conexion->query($sql);



if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
	{
        $idCli=$row["Cli_Id"];
        $nom=$row["Cli_Nom"];
        $dir=$row["Cli_Dir"];
        $ciu=$row["Clie_Ciu"];
        $tel=$row["Cli_Tel"];

        echo $idCli.',:'.$nom.',:'.$dir.',:'.$ciu.',:'.$tel;

    }
}
?>