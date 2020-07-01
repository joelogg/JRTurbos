<?php
include ("../partes/conexion.php"); 

$codTur = $_GET['codTur'];

$sql = "SELECT turbo.Tur_Id, Tur_Cod, modelocarro.Mod_Id, Mod_Nom, marcacarro.MC_Id, MC_Nom, motor.Mot_Id, Mot_Cod, vehiculotipo.VehTip_Id, VehTip_Nom, vehiculo.Veh_Id, Veh_Nom FROM turbo, modelocarro, marcacarro, motor, vehiculotipo, vehiculo WHERE turbo.Mod_Id=modelocarro.Mod_Id AND modelocarro.MC_Id=marcacarro.MC_Id AND marcacarro.Mot_Id=motor.Mot_Id AND motor.VehTip_Id=vehiculotipo.VehTip_Id AND vehiculotipo.Veh_Id=vehiculo.Veh_Id AND Tur_Cod='".$codTur."'";


$result = $conexion->query($sql);

if ($result->num_rows > 0) 
{
	if($row = $result->fetch_assoc()) 
	{
        $Tur_Id=$row["Tur_Id"];
        $Tur_Cod=$row["Tur_Cod"];
        $Mod_Id=$row["Mod_Id"];
        $Mod_Nom=$row["Mod_Nom"];
        $MC_Id=$row["MC_Id"];
        $MC_Nom=$row["MC_Nom"];

        $Mot_Id=$row["Mot_Id"];
        $Mot_Cod=$row["Mot_Cod"];
        $VehTip_Id=$row["VehTip_Id"];
        $VehTip_Nom=$row["VehTip_Nom"];
        $Veh_Id=$row["Veh_Id"];
        $Veh_Nom=$row["Veh_Nom"];

        echo $Mot_Id ."%&". $Mot_Cod ."%&". 
        	$VehTip_Id ."%&". $VehTip_Nom ."%&". 
        	$Veh_Id ."%&". $Veh_Nom ."%&".
        	$Tur_Id ."%&". $Tur_Cod ."%&". 
        	$Mod_Id ."%&". $Mod_Nom ."%&". 
        	$MC_Id ."%&". $MC_Nom ."%&"	;
    }
}

?>