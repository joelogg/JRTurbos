<?php 
include ("../partes/conexion.php"); 
$idSer = $_GET['idSer'];
$sql = "SELECT Tra_Nom FROM trabajos WHERE Ser_Id=".$idSer;
$result = $conexion->query($sql);

//$resp = "";
if ($result->num_rows > 0) 
{
	echo "<ul>";
	while($row = $result->fetch_assoc()) 
	{
        $nomTra=$row["Tra_Nom"];

        echo '<li>'.$nomTra.'</li>';
        //$resp = $resp . $nomTra.', ';
    }
    echo "</ul>";
    //echo  substr($resp, 0, -2);
}
else
	echo "";
?>