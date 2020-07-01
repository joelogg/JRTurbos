<?php 
include ("../partes/conexion.php"); 
$sql = "SELECT Ser_Id, Ser_Nom FROM servicios";
$result = $conexion->query($sql);


if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
	{
        $idSer=$row["Ser_Id"];
        $nomSer=$row["Ser_Nom"];
        //$nomSer="Básico";

        if ( !($nomSer=="Garant&iacutea" || $nomSer=="Garantía") )
        {
        
        	echo '<button class="btn-default btn130_float" onclick="selectorServicio('.$idSer.', `'.$nomSer.'`)" type="button">
        	<p class="textBtn">'.$nomSer.'</p>
        </button>';
        }
    }
}
?>