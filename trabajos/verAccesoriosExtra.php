<?php
include ("../partes/conexion.php");
$Bol_Id = $_GET['Bol_Id'];

$sql = "SELECT AccExt_Id, AccExt_Nom FROM accesoriosextras";
$result = $conexion->query($sql);

echo '<table class="tableBtnAcc table-bordered">';

$i=0;
if ($result->num_rows > 0) 
{	
	while($row = $result->fetch_assoc()) 
	{
        $IdAccExt=$row["AccExt_Id"];
        $NomAccExt=$row["AccExt_Nom"];
       
        if ($i%2==0) 
        {
        	echo '<tr>';
       		echo '<td><button class="btn btn-lg btnAccExt" id="btnAcc'.$IdAccExt.'" onclick="selectAccesorio('.$IdAccExt.')" >'.$NomAccExt.' </button></td>';
        }
        else
        {
        	echo '<td><button class="btn btn-lg btnAccExt" id="btnAcc'.$IdAccExt.'" onclick="selectAccesorio('.$IdAccExt.')" >'.$NomAccExt.' </button></td>';
        	echo '</tr>';
        }
       

        $i = $i + 1;
    }
}

echo '</table>';
?>