<?php 
include ("../partes/conexion.php");
$serId = $_GET['serId']; 
$sql = "SELECT Pie_Id, Pie_Nom FROM piesa WHERE Ser_Id=".$serId ;
$result = $conexion->query($sql);

if ($result->num_rows > 0) 
{
    //echo '<table id="tablaPiezasDer" class="tablaInformativa">';
	while($row = $result->fetch_assoc()) 
	{
        

        $pieId=$row["Pie_Id"];
        $pieNom=$row["Pie_Nom"];

       

        if($pieNom=="Geometr&iacutea Variable" || $pieNom=="Geometría Variable")
        {
            echo '<button id="btnPieDer'.$pieId.'" class="btn-default btn130_float" onclick="mostrarCaliVent('.$pieId.', `'.$pieNom.'`, 1)" type="button" data-toggle="modal" data-target="#popUpCalVen"> <p class="textBtn">'.$pieNom.'</p> </button>';
        }
        elseif($pieNom=="V&aacutelvula" || $pieNom=="Válvula")
        {
            echo '<button id="btnPieDer'.$pieId.'" class="btn-default btn130_float" onclick="mostrarNeumElec('.$pieId.', `'.$pieNom.'`, 2)" type="button" data-toggle="modal" data-target="#popUpNeuEle"> <p class="textBtn">'.$pieNom.'</p> </button>';
        }
        else
        {
            echo '<button id="btnPieDer'.$pieId.'" class="btn-default btn130_float" onclick="selectPieza('.$pieId.', `'.$pieNom.'`, 0, 0)" type="button"> <p class="textBtn">'.$pieNom.'</p> </button>';
        }

            
    }
}
?>