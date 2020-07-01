<?php
include ("../partes/conexion.php");
header('Content-Type: text/html; charset=utf-8');


$cliDni = $_GET['cliDni'];
?>



    <table class="table table-responsive" style="margin-top: 6%">
        <tr class="info">
            <th>Turbo</th>
            <th>Fecha Recepcción</th>
            <th>Precio</th>
            <th>Ver</th>
        </tr>
<?php
$sql = "SELECT Tur_Cod, Mod_Nom, marcacarro.MC_Nom, Bol_FecRec, Bol_Pre, Bol_Id FROM cliente, boleta, turbo, modelocarro, marcacarro WHERE Bol_Tip=0 AND cliente.Cli_Id=boleta.Cli_Id AND boleta.Tur_Id=turbo.Tur_Id AND turbo.Mod_Id=modelocarro.Mod_Id AND modelocarro.MC_Id=marcacarro.MC_Id AND cliente.Cli_Dni=".$cliDni;
$result = $conexion->query($sql);



if ($result->num_rows > 0) 
{
    
    while($row = $result->fetch_assoc()) 
    {
        $tur_Cod=$row["Tur_Cod"];
        $mod_Nom=$row["Mod_Nom"];
        $mC_Nom=$row["MC_Nom"];
        $Bol_FecRec=$row["Bol_FecRec"];
        $Bol_Pre=$row["Bol_Pre"];
        $Bol_Id=$row["Bol_Id"];

        $Bol_FecRec = date("d-m-Y", strtotime($Bol_FecRec));
        
        echo '<tr>';
        echo '<td>'.$mC_Nom.'/'.$mod_Nom.'/'.$tur_Cod.'</td>';
        echo '<td>'.$Bol_FecRec.'</td>';
        echo '<td>S/'.$Bol_Pre.'</td>';
        echo '<td><button class="btnEstilo1" onclick="verImpresion('.$Bol_Id.', 1)" data-toggle="modal" data-target="#popUpImprimir">Ver</button></td>';
        echo '</tr>';

    }
    
}

?>
    </table>










