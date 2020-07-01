<?php
if(empty($_SESSION["activo"]))
{
	header('Location:'.$dirServidor);
}
else
{
	if($_SESSION["activo"] == "true")
	{
		if($_SESSION["privilegio"]==$_SESSION["actual"])
		{}
		elseif($_SESSION["privilegio"]==1)
		{
			header('Location:'.$dirServidor.'recepcion/');
		}
		elseif($_SESSION["privilegio"]==2)
		{
			header('Location:'.$dirServidor.'trabajos/');
		}
		elseif($_SESSION["privilegio"]==3)
		{
			header('Location:'.$dirServidor.'admin/');
		}
		else
		{
			$_SESSION["activo"] = "false";
			header('Location:'.$dirServidor);
		}	
	}
	else
	{
		$_SESSION["activo"] = "false";
		header('Location:'.$dirServidor);
	}
}

?>