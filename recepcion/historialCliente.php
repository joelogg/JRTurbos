<?php 
include ("../partes/conexion.php"); 
$cliDni = $_GET['cliDni'];
$sql = "SELECT Ser_Nom, Tur_Cod, Mod_Nom, marcacarro.MC_Nom, Bol_FecRec, Bol_Pre FROM cliente, boleta, turbo, modelocarro, marcacarro, serviciorealizado, servicios WHERE Bol_Tip=0 AND cliente.Cli_Id=boleta.Cli_Id AND boleta.Tur_Id=turbo.Tur_Id AND turbo.Mod_Id=modelocarro.Mod_Id AND modelocarro.MC_Id=marcacarro.MC_Id AND serviciorealizado.DetBol_Id=boleta.Bol_Id AND servicios.Ser_Id=serviciorealizado.Ser_Id AND cliente.Cli_Dni=".$cliDni." ORDER BY Bol_FecRec DESC";
$result = $conexion->query($sql);



if ($result->num_rows > 0) 
{
	echo '<table class="table table-responsive" style="margin-top: 6%; margin-left:50px;">';
	echo '<tr>';
	echo '<th>Turbo</th>';
    echo '<th>Servicio</th>';
	echo '<th>Fecha</th>';
	echo '<th>Precio</th>';
	echo '</tr>';
	while($row = $result->fetch_assoc()) 
	{
        $tur_Cod=$row["Tur_Cod"];
        $mod_Nom=$row["Mod_Nom"];
        $ser_Nom=$row["Ser_Nom"];
        $mC_Nom=$row["MC_Nom"];
        $Bol_FecRec=$row["Bol_FecRec"];
        $Bol_Pre=$row["Bol_Pre"];

        //echo $idCli.',:'.$nom.',:'.$dir.',:'.$tel1.',:'.$tel2;
        echo '<tr>';
        echo '<td>'.$mC_Nom.'/'.$mod_Nom.'/'.$tur_Cod.'</td>';
        echo '<td>'.$ser_Nom.'</td>';
        echo '<td>'.$Bol_FecRec.'</td>';
        echo '<td>'.$Bol_Pre.'</td>';
        echo '</tr>';

    }
    echo '</table>';
}
?>