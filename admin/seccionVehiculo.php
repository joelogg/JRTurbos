<?php 
include ("../partes/conexion.php"); 

$Var_Tip = 0;
$Var_TipId = 0;

$sql = "SELECT Var_Tip, Var_TipId FROM variables WHERE Var_Id=1";
$result= $conexion->query($sql);
if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) 
    {
        $Var_Tip=$row["Var_Tip"];
        $Var_TipId=$row["Var_TipId"];
    }
}

$id_Veh_aux = 0;
$id_VehTip_aux = 0;
$id_Mot_aux = 0;

$id_Mar_aux = 0;
$id_Mod_aux = 0;
$id_Tur_aux = 0;




//-- Vehiculo --
if($Var_Tip==1)
{
    $sql = "SELECT vehiculo.Veh_Id FROM vehiculo WHERE vehiculo.Veh_Id='".$Var_TipId."'";


    $result = $conexion->query($sql);

    if ($result->num_rows > 0) 
    {
        if($row = $result->fetch_assoc()) 
        {
            $id_Veh_aux=$row["Veh_Id"];
        }
    }
}

//-- Vehiculo Tipo --
else if($Var_Tip==2)
{
    $sql = "SELECT vehiculotipo.VehTip_Id, vehiculo.Veh_Id FROM vehiculotipo, vehiculo WHERE vehiculotipo.Veh_Id=vehiculo.Veh_Id AND vehiculotipo.VehTip_Id='".$Var_TipId."'";


    $result = $conexion->query($sql);

    if ($result->num_rows > 0) 
    {
        if($row = $result->fetch_assoc()) 
        {
            $id_VehTip_aux=$row["VehTip_Id"];
            $id_Veh_aux=$row["Veh_Id"];
        }
    }
}

//-- Motor --
else if($Var_Tip==3)
{
    $sql = "SELECT motor.Mot_Id, vehiculotipo.VehTip_Id, vehiculo.Veh_Id FROM motor, vehiculotipo, vehiculo WHERE motor.VehTip_Id=vehiculotipo.VehTip_Id AND vehiculotipo.Veh_Id=vehiculo.Veh_Id AND motor.Mot_Id='".$Var_TipId."'";


    $result = $conexion->query($sql);

    if ($result->num_rows > 0) 
    {
        if($row = $result->fetch_assoc()) 
        {
            $id_Mot_aux=$row["Mot_Id"];
            $id_VehTip_aux=$row["VehTip_Id"];
            $id_Veh_aux=$row["Veh_Id"];
        }
    }
}

//-- Marca --
else if($Var_Tip==4)
{
    $sql = "SELECT marcacarro.MC_Id, motor.Mot_Id, vehiculotipo.VehTip_Id, vehiculo.Veh_Id FROM marcacarro, motor, vehiculotipo, vehiculo WHERE marcacarro.Mot_Id=motor.Mot_Id AND motor.VehTip_Id=vehiculotipo.VehTip_Id AND vehiculotipo.Veh_Id=vehiculo.Veh_Id AND marcacarro.MC_Id='".$Var_TipId."'";


    $result = $conexion->query($sql);

    if ($result->num_rows > 0) 
    {
        if($row = $result->fetch_assoc()) 
        {
            $id_Mar_aux=$row["MC_Id"];

            $id_Mot_aux=$row["Mot_Id"];
            $id_VehTip_aux=$row["VehTip_Id"];
            $id_Veh_aux=$row["Veh_Id"];
        }
    }
}

//-- Modelo --
else if($Var_Tip==5)
{
    $sql = "SELECT modelocarro.Mod_Id, marcacarro.MC_Id, motor.Mot_Id, vehiculotipo.VehTip_Id, vehiculo.Veh_Id FROM modelocarro, marcacarro, motor, vehiculotipo, vehiculo WHERE modelocarro.MC_Id=marcacarro.MC_Id AND marcacarro.Mot_Id=motor.Mot_Id AND motor.VehTip_Id=vehiculotipo.VehTip_Id AND vehiculotipo.Veh_Id=vehiculo.Veh_Id AND modelocarro.Mod_Id='".$Var_TipId."'";


    $result = $conexion->query($sql);

    if ($result->num_rows > 0) 
    {
        if($row = $result->fetch_assoc()) 
        {
            $id_Mod_aux=$row["Mod_Id"];
            $id_Mar_aux=$row["MC_Id"];

            $id_Mot_aux=$row["Mot_Id"];
            $id_VehTip_aux=$row["VehTip_Id"];
            $id_Veh_aux=$row["Veh_Id"];
        }
    }
}

//-- Turbo --
else if($Var_Tip==6)
{
    $sql = "SELECT turbo.Tur_Id, modelocarro.Mod_Id, marcacarro.MC_Id, motor.Mot_Id, vehiculotipo.VehTip_Id, vehiculo.Veh_Id FROM turbo, modelocarro, marcacarro, motor, vehiculotipo, vehiculo WHERE turbo.Mod_Id=modelocarro.Mod_Id AND modelocarro.MC_Id=marcacarro.MC_Id AND marcacarro.Mot_Id=motor.Mot_Id AND motor.VehTip_Id=vehiculotipo.VehTip_Id AND vehiculotipo.Veh_Id=vehiculo.Veh_Id AND turbo.Tur_Id='".$Var_TipId."'";


    $result = $conexion->query($sql);

    if ($result->num_rows > 0) 
    {
        if($row = $result->fetch_assoc()) 
        {
            $id_Tur_aux=$row["Tur_Id"];
            $id_Mod_aux=$row["Mod_Id"];
            $id_Mar_aux=$row["MC_Id"];

            $id_Mot_aux=$row["Mot_Id"];
            $id_VehTip_aux=$row["VehTip_Id"];
            $id_Veh_aux=$row["Veh_Id"];
        }
    }
}









$can = 0;
$sql_a = "SELECT COUNT(*) AS Cant FROM vehiculo WHERE 1";
$result_a= $conexion->query($sql_a);
if ($result_a->num_rows > 0) 
{
    while($row_a = $result_a->fetch_assoc()) 
    {
        $can=$row_a["Cant"];
    }
}

echo '<div class="panel-group" id="accordionTodo">';
    echo '<div class="panel panel-default">';

        echo '<div class="panel-heading">';
            echo '<h4 class="panel-title">';
                echo '<button class="btn btn-success" style="margin-right: 5px;" onclick="verPopUpNuevoVeh()" data-toggle="modal" data-target="#popUpAgregar">Agregar</button> ';
                echo ' <span class="badge"> '.$can.' </span> <a data-toggle="collapse" data-parent="#accordionTodo" href="#collapseTod">Vehículos</a>';                            
                       
            echo '</h4>';
        echo '</div>';
        echo '<div id="collapseTod" class="panel-collapse collapse in">';
            echo '<div class="panel-body">';

$sql = "SELECT Veh_Id, Veh_Nom, Veh_Dir FROM vehiculo WHERE 1 ORDER BY Veh_Nom ASC";
$result = $conexion->query($sql);
if ($result->num_rows > 0) 
{
    echo '<div class="panel-group" id="accordionVeh">';
        echo '<div class="panel panel-default">';
    while($row = $result->fetch_assoc()) 
    {
        $idVeh=$row["Veh_Id"];
        $nomVeh=$row["Veh_Nom"];

        $can = 0;
        $sql_a = "SELECT COUNT(*) AS Cant FROM vehiculotipo WHERE Veh_Id=".$idVeh;
        $result_a= $conexion->query($sql_a);
        if ($result_a->num_rows > 0) 
        {
            while($row_a = $result_a->fetch_assoc()) 
            {
                $can=$row_a["Cant"];
            }
        }
        
            echo '<div class="panel-heading">';
                echo '<h4 class="panel-title">';
                    $deshabilitarBtn = "";
                    if ($can>0) 
                        $deshabilitarBtn = "disabled";
                    echo '<button class="btn btn-danger" onclick="verPopUpEliminarVeh('.$idVeh.')" data-toggle="modal" data-target="#popUpEliminar" '.$deshabilitarBtn.'>Eliminar</button> ';
                    echo '<button class="btn btn-warning" style="margin-left: 5px; margin-right: 5px;" onclick="verPopUpEditarVeh(`'.$nomVeh.'`, '.$idVeh.')" data-toggle="modal" data-target="#popUpEditar">Editar</button> ';
                   echo '<button class="btn btn-success" style="margin-right: 5px;" onclick="verPopUpNuevoTipVeh('.$idVeh.')" data-toggle="modal" data-target="#popUpAgregar">Agregar</button> ';
                    echo ' <span class="badge"> '.$can.' </span> <a data-toggle="collapse" data-parent="#accordionVeh" href="#collapseVeh'.$idVeh.'">Vehículo: '.$nomVeh.'</a>';                            
                       
                echo '</h4>';
            echo '</div>';
            

            if ($id_Veh_aux == $idVeh) 
            {
                echo '<div id="collapseVeh'.$idVeh.'" class="panel-collapse collapse in">';
            }
            else
            {
                echo '<div id="collapseVeh'.$idVeh.'" class="panel-collapse collapse">';
            }
            
            

            
                echo '<div class="panel-body">';
                    



    //---------------TipoVehiculo--------------
$sql2 = "SELECT VehTip_Id, VehTip_Nom FROM vehiculotipo WHERE Veh_Id=".$idVeh." ORDER BY VehTip_Nom ASC";
$result2 = $conexion->query($sql2);


if ($result2->num_rows > 0) 
{
    echo '<div class="panel-group" id="accordionTipVeh">';
        echo '<div class="panel panel-default">';
    while($row2 = $result2->fetch_assoc()) 
    {
        $idTipVeh=$row2["VehTip_Id"];
        $nomTipVeh=$row2["VehTip_Nom"];

        $can = 0;
        
        $sql2_a = "SELECT COUNT(*) AS Cant FROM motor WHERE VehTip_Id=".$idTipVeh;
        $result2_a= $conexion->query($sql2_a);
        if ($result2_a->num_rows > 0) 
        {
            while($row2_a = $result2_a->fetch_assoc()) 
            {
                $can=$row2_a["Cant"];
            }
        }
        
            echo '<div class="panel-heading">';
                echo '<h4 class="panel-title">';
                    $deshabilitarBtn = "";
                    if ($can>0) 
                        $deshabilitarBtn = "disabled";
                    echo '<button class="btn btn-danger" onclick="verPopUpEliminarTipVeh('.$idTipVeh.')" data-toggle="modal" data-target="#popUpEliminar" '.$deshabilitarBtn.'>Eliminar</button> ';
                    echo '<button class="btn btn-warning" style="margin-left: 5px; margin-right: 5px;" onclick="verPopUpEditarTipVeh(`'.$nomTipVeh.'`, '.$idTipVeh.', '.$idVeh.')" data-toggle="modal" data-target="#popUpEditar">Editar</button> ';
                    echo '<button class="btn btn-success" style="margin-right: 5px;" onclick="verPopUpNuevoMot('.$idTipVeh.')" data-toggle="modal" data-target="#popUpAgregar">Agregar</button> ';
                    echo ' <span class="badge"> '.$can.' </span> <a data-toggle="collapse" data-parent="#accordionTipVeh" href="#collapseTipVeh'.$idTipVeh.'">Tipo Vehículo: '.$nomTipVeh.'</a>';                            
                       
                echo '</h4>';
            echo '</div>';

            if ($id_VehTip_aux == $idTipVeh)
            {
                echo '<div id="collapseTipVeh'.$idTipVeh.'" class="panel-collapse collapse in">';
            }
            else
            {
                echo '<div id="collapseTipVeh'.$idTipVeh.'" class="panel-collapse collapse">';
            }
            
            
            
            echo '<div class="panel-body">';
                    



        //---------------Motor--------------

$sql3 = "SELECT Mot_Id, Mot_Cod FROM motor WHERE VehTip_Id=".$idTipVeh." ORDER BY Mot_Cod ASC";
$result3 = $conexion->query($sql3);


if ($result3->num_rows > 0) 
{
    echo '<div class="panel-group" id="accordionMot">';
        echo '<div class="panel panel-default">';
    while($row3 = $result3->fetch_assoc()) 
    {
        $Mot_Id=$row3["Mot_Id"];
        $Mot_Cod=$row3["Mot_Cod"];

        $can = 0;
        $sql3_a = "SELECT COUNT(*) AS Cant FROM marcacarro WHERE Mot_Id=".$Mot_Id;
        $result3_a= $conexion->query($sql3_a);
        if ($result3_a->num_rows > 0) 
        {
            while($row3_a = $result3_a->fetch_assoc()) 
            {
                $can=$row3_a["Cant"];
            }
        }

            echo '<div class="panel-heading">';
                echo '<h4 class="panel-title">';
                    $deshabilitarBtn = "";
                    if ($can>0) 
                        $deshabilitarBtn = "disabled";
                    echo '<button class="btn btn-danger" onclick="verPopUpEliminarMot('.$Mot_Id.')" data-toggle="modal" data-target="#popUpEliminar" '.$deshabilitarBtn.'>Eliminar</button> ';
                    echo '<button class="btn btn-warning" style="margin-left: 5px; margin-right: 5px;" onclick="verPopUpEditarMot(`'.$Mot_Cod.'`, '.$Mot_Id.', '.$idTipVeh.')" data-toggle="modal" data-target="#popUpEditar">Editar</button> ';
                    echo '<button class="btn btn-success" style="margin-right: 5px;" onclick="verPopUpNuevoMar('.$Mot_Id.')" data-toggle="modal" data-target="#popUpAgregar">Agregar</button> ';
                    echo ' <span class="badge"> '.$can.' </span> <a data-toggle="collapse" data-parent="#accordionMot" href="#collapseMot'.$Mot_Id.'">Motor: '.$Mot_Cod.'</a>';                            
                       
                echo '</h4>';
            echo '</div>';


            if ($id_Mot_aux == $Mot_Id)
            {
                echo '<div id="collapseMot'.$Mot_Id.'" class="panel-collapse collapse in">';
            }
            else
            {
                echo '<div id="collapseMot'.$Mot_Id.'" class="panel-collapse collapse">';
            }
            
                echo '<div class="panel-body">';
                    



                //---------------Marca Turbo--------------
                
$sql4 = "SELECT MC_Id, MC_Nom FROM marcacarro WHERE Mot_Id=".$Mot_Id." ORDER BY MC_Nom ASC";
$result4 = $conexion->query($sql4);


if ($result4->num_rows > 0) 
{
    echo '<div class="panel-group" id="accordionMar">';
        echo '<div class="panel panel-default">';
    while($row4 = $result4->fetch_assoc()) 
    {
        $MC_Id=$row4["MC_Id"];
        $MC_Nom=$row4["MC_Nom"];

        $can = 0;
        $sql4_a = "SELECT COUNT(*) AS Cant FROM modelocarro WHERE MC_Id=".$MC_Id;
        $result4_a= $conexion->query($sql4_a);
        if ($result4_a->num_rows > 0) 
        {
            while($row4_a = $result4_a->fetch_assoc()) 
            {
                $can=$row4_a["Cant"];
            }
        }

            echo '<div class="panel-heading">';
                echo '<h4 class="panel-title">';
                    $deshabilitarBtn = "";
                    if ($can>0) 
                        $deshabilitarBtn = "disabled";
                    echo '<button class="btn btn-danger" onclick="verPopUpEliminarMar('.$MC_Id.')" data-toggle="modal" data-target="#popUpEliminar" '.$deshabilitarBtn.'>Eliminar</button> ';
                    echo '<button class="btn btn-warning" style="margin-left: 5px; margin-right: 5px;" onclick="verPopUpEditarMar(`'.$MC_Nom.'`, '.$MC_Id.', '.$Mot_Id.')" data-toggle="modal" data-target="#popUpEditar">Editar</button> ';
                    echo '<button class="btn btn-success" style="margin-right: 5px;" onclick="verPopUpNuevoMod('.$MC_Id.')" data-toggle="modal" data-target="#popUpAgregar">Agregar</button> ';
                    echo ' <span class="badge"> '.$can.' </span> <a data-toggle="collapse" data-parent="#accordionMar" href="#collapseMar'.$MC_Id.'">Marca Turbo: '.$MC_Nom.'</a>';                            
                       
                echo '</h4>';
            echo '</div>';

            if ($id_Mar_aux == $MC_Id)
            {
                echo '<div id="collapseMar'.$MC_Id.'" class="panel-collapse collapse in">';
            }
            else
            {
                echo '<div id="collapseMar'.$MC_Id.'" class="panel-collapse collapse">';
            }
            
                echo '<div class="panel-body">';
                    



                //---------------Modelo Turbo--------------
                
$sql5 = "SELECT Mod_Id, Mod_Nom FROM modelocarro WHERE MC_Id=".$MC_Id." ORDER BY Mod_Nom ASC";
$result5 = $conexion->query($sql5);


if ($result5->num_rows > 0) 
{
    echo '<div class="panel-group" id="accordionMod">';
        echo '<div class="panel panel-default">';
    while($row5 = $result5->fetch_assoc()) 
    {
        $Mod_Id=$row5["Mod_Id"];
        $Mod_Nom=$row5["Mod_Nom"];

        $can = 0;
        $sql5_a = "SELECT COUNT(*) AS Cant FROM turbo WHERE Mod_Id=".$Mod_Id;
        $result5_a= $conexion->query($sql5_a);
        if ($result5_a->num_rows > 0) 
        {
            while($row5_a = $result5_a->fetch_assoc()) 
            {
                $can=$row5_a["Cant"];
            }
        }

            echo '<div class="panel-heading">';
                echo '<h4 class="panel-title">';
                    $deshabilitarBtn = "";
                    if ($can>0) 
                        $deshabilitarBtn = "disabled";
                    echo '<button class="btn btn-danger" onclick="verPopUpEliminarMod('.$Mod_Id.')" data-toggle="modal" data-target="#popUpEliminar" '.$deshabilitarBtn.'>Eliminar</button> ';
                    echo '<button class="btn btn-warning" style="margin-left: 5px; margin-right: 5px;" onclick="verPopUpEditarMod(`'.$Mod_Nom.'`, '.$Mod_Id.', '.$MC_Id.')" data-toggle="modal" data-target="#popUpEditar">Editar</button> ';
                    echo '<button class="btn btn-success" style="margin-right: 5px;" onclick="verPopUpNuevoTur('.$Mod_Id.')" data-toggle="modal" data-target="#popUpAgregar">Agregar</button> ';
                    echo ' <span class="badge"> '.$can.' </span> <a data-toggle="collapse" data-parent="#accordionMod" href="#collapseMod'.$Mod_Id.'">Modelo Turbo: '.$Mod_Nom.'</a>';                            
                       
                echo '</h4>';
            echo '</div>';

            if ($id_Mod_aux == $Mod_Id)
            {
                echo '<div id="collapseMod'.$Mod_Id.'" class="panel-collapse collapse in">';
            }
            else
            {
                echo '<div id="collapseMod'.$Mod_Id.'" class="panel-collapse collapse">';
            }
            
                echo '<div class="panel-body">';
                    



                //---------------Turbo--------------
                
$sql6 = "SELECT Tur_Id, Tur_Cod FROM turbo WHERE Mod_Id=".$Mod_Id." ORDER BY Tur_Cod ASC";
$result6 = $conexion->query($sql6);


if ($result6->num_rows > 0) 
{
    echo '<div class="panel-group" id="accordionTur">';
        echo '<div class="panel panel-default">';
    while($row6 = $result6->fetch_assoc()) 
    {
        $Tur_Id=$row6["Tur_Id"];
        $Tur_Cod=$row6["Tur_Cod"];

        
            echo '<div class="">';
                echo '<h4 class="">';
                    
                    echo '<button class="btn btn-danger" onclick="verPopUpEliminarTur('.$Tur_Id.')" data-toggle="modal" data-target="#popUpEliminar">Eliminar</button> ';
                    echo '<button class="btn btn-warning" style="margin-left: 5px; margin-right: 5px;" onclick="verPopUpEditarTur(`'.$Tur_Cod.'`, '.$Tur_Id.', '.$Mod_Id.')" data-toggle="modal" data-target="#popUpEditar">Editar</button> ';
                    echo 'Turbo: '.$Tur_Cod;                            
                       
                echo '</h4>';
            echo '</div>';
       
    }
        echo '</div>';
    echo '</div>';
}


                //-------------Fin Turbo------------



                echo '</div>';
            echo '</div>';        
    }
        echo '</div>';
    echo '</div>';
}


                //-------------Fin Modelo Turbo------------



                echo '</div>';
            echo '</div>';        
    }
        echo '</div>';
    echo '</div>';
}

                //-------------Fin Marca Turbo------------



                echo '</div>';
            echo '</div>';        
    }
        echo '</div>';
    echo '</div>';
}

        //-------------Fin Motor------------



                echo '</div>';
            echo '</div>';        
    }
        echo '</div>';
    echo '</div>';
}

    //------------Fin Tipo Vehiculo------------



                echo '</div>';
            echo '</div>';        
    }
        echo '</div>';
    echo '</div>';
}

//------------Fin Vehiculo------------



                echo '</div>';
            echo '</div>';        
    
        echo '</div>';
    echo '</div>';

?>


    
      
   
    
  