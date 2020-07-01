<?php 
include ("sesionStart.php");
include ("conexion.php");

$usuario = $_GET["usuario"];
$clave = $_GET["clave"];


	$sql = "SELECT * FROM Usuario WHERE Usu_Usu='".$usuario."' AND Usu_Pas='".$clave."'";
	$result = $conexion->query($sql);

	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{
        	$_SESSION["activo"]="true";
			$_SESSION["privilegio"]	= $row["TipUsu_Id"];

			if($_SESSION["privilegio"]==1)
			{
				echo "EntrarReceptor";
			}
			elseif($_SESSION["privilegio"]==2)
			{
				echo "EntrarTrabajador";
			}
			elseif($_SESSION["privilegio"]==3)
			{
				echo "EntrarAdministrador";
			}
    	}
		
	}
	else
	{
		if($usuario =="")
		{
			echo "Ingrese usuario";
		}
		else if($clave=="")
		{
			echo "Ingrese contraseña";
		}
		else
		{
			echo "Usuario o contraseña incorrecta";
		}
		
	}
	$conexion->close();
?>
