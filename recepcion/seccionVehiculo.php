<?php 
include ("../partes/conexion.php"); 
$sql = "SELECT Veh_Id, Veh_Nom, Veh_Dir FROM vehiculo WHERE 1 ORDER BY Veh_Nom ASC";
$result = $conexion->query($sql);
?>
<button id="btnNuevo" class="btn-default btn130_float" style= "background-image:url(img/nuevo.png); background-repeat:no-repeat; background-position:center; background-size: 90% 90%;" type="button" data-toggle="modal" data-target="#popUpVehiculo">
    <p class="textBtn">Nuevo Vehículo</p>
</button>

<?php


if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
	{
        $id=$row["Veh_Id"];
        $nomPre=$row["Veh_Nom"];
        $dir=$row["Veh_Dir"];

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

       

        /*$salto = 9;
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
        }*/

        if($dir=="")
        {
            echo '<button class="btn-default btn130_float" onclick="selectorVehiculo('.$id.', `'.$nom.'`)" type="button">
            <p class="textBtn" style="font-size: '.$letraSize.'px;">'.$nom.'</p></button>';
        }
        else
        {
            echo '<button class="btn-default btn130_float" onclick="selectorVehiculo('.$id.', `'.$nom.'`)" type="button" style="background-image:url(imgLogos/'.$dir.')">
            <p class="textBtn" style="font-size: '.$letraSize.'px;"></p></button>';
        }
        
    }
}
?>