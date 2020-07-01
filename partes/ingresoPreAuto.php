<?php
if(empty($_SESSION["activo"]))
{
}
else
{
	if($_SESSION["activo"] == "true")
	{
		if($_SESSION["privilegio"]==1)
		{
			header('Location:'.$dirServidor.'recepcion/');
		}
		elseif($_SESSION["privilegio"]==2)
		{
			header('Location:'.$dirServidor.'admin/');
		}
		elseif($_SESSION["privilegio"]==3)
		{
			header('Location:'.$dirServidor.'trabajos/');
		}
	}
}

?>