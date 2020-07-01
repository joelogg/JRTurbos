<?php 
include ("../partes/conexion.php"); 
$idVeh = $_GET['idVeh'];
$sql = "SELECT VehTip_Id, VehTip_Nom FROM vehiculotipo WHERE Veh_Id=".$idVeh." ORDER BY VehTip_Nom ASC";
$result = $conexion->query($sql);
?>

<button id="btnNuevo" class="btn-default btn130_float" style= "background-image:url(img/nuevo.png); background-repeat:no-repeat; background-position:center; background-size: 90% 90%;" type="button" data-toggle="modal" data-target="#popUpTipoVehiculo">
    <p class="textBtn">Nuevo Modelo Vehículo</p>
</button>

<?php

if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
	{
        $idTip=$row["VehTip_Id"];
        $nomPre=$row["VehTip_Nom"];

        $nomPreSeparado = explode(" ",$nomPre);
        $cantLetrasMax = 1;

        foreach ($nomPreSeparado as $valor) 
        {
            $cantLetras = strlen($valor);
            if($cantLetras>$cantLetrasMax)
            {
                $cantLetrasMax = $cantLetras;
            }
        }

        $nom = $nomPre;
        $letraSize = 19;
        $letraSize = 160/$cantLetrasMax;
        if($letraSize > 19)
        {
            $letraSize = 19;
        }
        
        /*$letraSize = 19;
        $salto = 9;
        $tam = strlen($nomPre);
        $nom = "";
        if ($tam>=80) 
        {
            $letraSize = 12;
            $salto = 16;
        }
        elseif ($tam>=70) 
        {
            $letraSize = 13;
            $salto = 14;
        }
        elseif ($tam>=60) 
        {
            $letraSize = 14;
            $salto = 13;
        }
        elseif ($tam>=50) 
        {
            $letraSize = 16;
            $salto = 11;
        }
        else
        {
            $letraSize = 18;
            $salto = 8;
        }
        
        $canCa = 0;
        for ($i=0; $i <$tam ; $i++) 
        { 
            $nom = $nom . substr($nomPre, $i, 1); 
            if (substr($nomPre, $i, 1)==" ") 
            {
                $canCa = 0;
            }
            if ($canCa%$salto==0 && $i>0)
                $nom = $nom. "<br>";

            $canCa = $canCa+1;
        }
*/
        echo '<button class="btn-default btn130_float" onclick="selectorTipVeh('.$idTip.', `'.$nom.'`)" type="button" style="">
            <p class="textBtn" style="font-size: '.$letraSize.'px;">'.$nom.'</p>
        </button>';
    }
}
?>


<?php