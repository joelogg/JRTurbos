<?php 
include ("../partes/conexion.php"); 


$Bol_Id = $_GET['Bol_Id'];


date_default_timezone_set('America/Lima');
$fechaAct = date('Y-m-d');
$horaAct = date("H:i:s");



$sql = "SELECT Bol_NumDoc, boleta.Bol_Id, cliente.Cli_Id, Bol_Tip, Bol_Not, Bol_FecEnt, Bol_HorEnt, Bol_Pre, Bol_ACue, Bol_IGV, Cli_Nom, Cli_Dir, Clie_Ciu, Cli_Tel, Cli_Dni, motor.Mot_Id, Mot_Cod, vehiculotipo.VehTip_Id, VehTip_Nom, vehiculo.Veh_Id, Veh_Nom, turbo.Tur_Id, Tur_Cod, modelocarro.Mod_Id, Mod_Nom, marcacarro.MC_Id, MC_Nom, servicios.Ser_Id, Ser_Nom, SerRea_Pre, serviciorealizado.SerRea_Id FROM cliente, boleta, motor, vehiculotipo, vehiculo, turbo, modelocarro, marcacarro, serviciorealizado, servicios WHERE cliente.Cli_Id=boleta.Cli_Id AND motor.Mot_Id=marcacarro.Mot_Id AND vehiculotipo.VehTip_Id=motor.VehTip_Id AND vehiculo.Veh_Id=vehiculotipo.Veh_Id AND turbo.Tur_Id=boleta.Tur_Id AND modelocarro.Mod_Id=turbo.Mod_Id AND marcacarro.MC_Id=modelocarro.MC_Id AND boleta.Bol_Id=serviciorealizado.DetBol_Id AND servicios.Ser_Id=serviciorealizado.Ser_Id AND boleta.Bol_Id='".$Bol_Id."'";

$result = $conexion->query($sql);
if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
        $Bol_Not=$row["Bol_Not"];
        echo $Bol_Not."%&";
        $Bol_FecEnt=$row["Bol_FecEnt"];
        echo $Bol_FecEnt."%&";
        $Bol_HorEnt=$row["Bol_HorEnt"];
        echo $Bol_HorEnt."%&";
        $Bol_Pre=$row["Bol_Pre"];
        echo $Bol_Pre."%&";
        $Bol_ACue=$row["Bol_ACue"];
        echo $Bol_ACue."%&";
        $Bol_IGV=$row["Bol_IGV"];
        echo $Bol_IGV."%&";


        $Bol_NumDoc=$row["Bol_NumDoc"];
        echo $Bol_NumDoc."%&";

        $Bol_Tip=$row["Bol_Tip"];
        echo $Bol_Tip."%&";

        $Bol_Id=$row["Bol_Id"];
        echo $Bol_Id."%&";

        $Cli_Id=$row["Cli_Id"];
        $Cli_Nom=$row["Cli_Nom"];
        $Cli_Dir=$row["Cli_Dir"];
        $Clie_Ciu=$row["Clie_Ciu"];
        $Cli_Tel=$row["Cli_Tel"];
        $Cli_Dni=$row["Cli_Dni"];
        
        echo $Cli_Id."%&".$Cli_Nom."%&".$Cli_Dir."%&".$Clie_Ciu."%&".$Cli_Tel."%&".$Cli_Dni."%&";

        $Mot_Id=$row["Mot_Id"];
        $Mot_Cod=$row["Mot_Cod"];
        $VehTip_Id=$row["VehTip_Id"];
        $VehTip_Nom=$row["VehTip_Nom"];
        $Veh_Id=$row["Veh_Id"];
        $Veh_Nom=$row["Veh_Nom"];

        echo $Mot_Id."%&".$Mot_Cod."%&".$VehTip_Id."%&".$VehTip_Nom."%&".$Veh_Id."%&".$Veh_Nom."%&";

        $Tur_Id=$row["Tur_Id"];
        $Tur_Cod=$row["Tur_Cod"];
        $Mod_Id=$row["Mod_Id"];
        $Mod_Nom=$row["Mod_Nom"];
        $MC_Id=$row["MC_Id"];
        $MC_Nom=$row["MC_Nom"];

        echo $Tur_Id."%&".$Tur_Cod."%&".$Mod_Id."%&".$Mod_Nom."%&".$MC_Id."%&".$MC_Nom."%&";
            
        $Ser_Id=$row["Ser_Id"];
        $Ser_Nom=$row["Ser_Nom"];
        $SerRea_Pre=$row["SerRea_Pre"];
        $SerRea_Id=$row["SerRea_Id"];

        echo $Ser_Id."%&".$Ser_Nom."%&".$SerRea_Pre."%&";
            

        $serTrabajos = "";
        $sql2 = "SELECT Tra_Nom FROM trabajos WHERE Ser_Id='".$Ser_Id."'";

        $result2 = $conexion->query($sql2);
        if ($result2->num_rows > 0) 
        {
            $serTrabajos = "<ul>";
            while($row2 = $result2->fetch_assoc()) 
            {
                $Tra_Nom=$row2["Tra_Nom"];
                $serTrabajos = $serTrabajos."<li>".$Tra_Nom."</li>";

            }
            $serTrabajos = $serTrabajos."</ul>";
        }
        echo $serTrabajos."%&";

        


        $piesasIds = "";
        $piesasNom = "";
        $piesasPre = "";
        $piesasTra = "";
        $piesasTip = "";
        $sql2 = "SELECT piesa.Pie_Id, Pie_Nom, PieRea_Pre, PieRea_Tra, PieRea_Tip FROM piesarealizada, piesa WHERE piesa.Pie_Id=piesarealizada.Pie_Id AND SerRea_Id='".$SerRea_Id."'";

        $cantPiezas = 0;
        $result2 = $conexion->query($sql2);
        if ($result2->num_rows > 0) 
        {
            while($row2 = $result2->fetch_assoc()) 
            {
                $Pie_Id=$row2["Pie_Id"];
                $Pie_Nom=$row2["Pie_Nom"];
                $PieRea_Pre=$row2["PieRea_Pre"];
                $PieRea_Tra=$row2["PieRea_Tra"];
                $PieRea_Tip=$row2["PieRea_Tip"];

                $piesasIds = $piesasIds.$Pie_Id.'$#';
                $piesasNom = $piesasNom.$Pie_Nom.'$#';
                $piesasPre = $piesasPre.$PieRea_Pre.'$#';
                $piesasTra = $piesasTra.$PieRea_Tra.'$#';
                $piesasTip = $piesasTip.$PieRea_Tip.'$#';

                $cantPiezas = $cantPiezas + 1;

            }
            $piesasIds = substr ($piesasIds , 0, strlen($piesasIds)-2);
            $piesasNom = substr ($piesasNom , 0, strlen($piesasNom)-2);
            $piesasPre = substr ($piesasPre , 0, strlen($piesasPre)-2);
            $piesasTra = substr ($piesasTra , 0, strlen($piesasTra)-2);
            $piesasTip = substr ($piesasTip , 0, strlen($piesasTip)-2);

        }
        echo $piesasIds."%&".$piesasNom."%&".$piesasPre."%&".$piesasTra."%&".$piesasTip."%&";
        echo $cantPiezas."%&";


        $accIds = "";
        $accNom = "";
        $sql2 = "SELECT AccExt_Nom, accesoriosextras.AccExt_Id FROM boleta, boletaaccesoriosextra, accesoriosextras WHERE boleta.Bol_Id=boletaaccesoriosextra.Bol_Id AND boletaaccesoriosextra.AccExt_Id=accesoriosextras.AccExt_Id AND boleta.Bol_Id=".$Bol_Id;

        $result2 = $conexion->query($sql2);
        if ($result2->num_rows > 0) 
        {
            while($row2 = $result2->fetch_assoc()) 
            {
                $Acc_Id=$row2["AccExt_Id"];
                $Acc_Nom=$row2["AccExt_Nom"];

                $accIds = $accIds.$Acc_Id.'$#';
                $accNom = $accNom.$Acc_Nom.'$#';

            }
            $accIds = substr ($accIds , 0, strlen($accIds)-2);
            $accNom = substr ($accNom , 0, strlen($accNom)-2);

        }
        echo $accIds."%&".$accNom."%&";
          
    }
}
else
    echo "Mal";


?>				
