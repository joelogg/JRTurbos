<!-- Buscar el turbo por cod en turbo -->
<div class="modal fade" id="popUpBuscarCodTur" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Buscar Turbo por Código</h4>
      </div>
      <div class="modal-body">
           <form action="" onSubmit="return false">
              <div class="form-group">
                <label>Código del turbo:</label>
                <input type="text" class="form-control" id="codTurBuscar_input" maxlength="100" onkeyup="mayus(this), habilitarBtnTur()" oninput="setCustomValidity(``); if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autofocus>
              </div>
            </form> 
      </div>
      <div class="modal-footer">
        <div class="row" style="margin: 0;">
          <center>
            <div class="col-xs-6" style="padding: 0;">
              <button id="btnBuscarTurbo" type="button" class="btn btn-success btn-lg" data-dismiss="modal" onclick="buscarCodTur_secTurbo()">Agregar</button>
            </div>
            <div class="col-xs-6" style="padding: 0;">
              <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal" >Cancelar</button>
            </div>
          </center>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- 1-Nuevo Vehiculo -->
<div class="modal fade" id="popUpVehiculo" role="dialog">
  <div class="modal-dialog modal-md">
 		<div class="modal-content">
   		<div class="modal-header">
   			<button type="button" class="close" data-dismiss="modal">&times;</button>
   			<h4 class="modal-title">Agregando Vehículo</h4>
   		</div>
   		<div class="modal-body">
           <form action="" onSubmit="return false">
              <div class="form-group">
                <label>Nombre del vehículo:</label>
                <input type="text" class="form-control" id="vehiculoNombre" maxlength="100" onkeyup="mayus(this), habilitarBtnVeh()" oninput="setCustomValidity(``); if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autofocus>
              </div>
            </form> 
   		</div>
	   	<div class="modal-footer">
        <div class="row" style="margin: 0;">
          <center>
            <div class="col-xs-6" style="padding: 0;">
              <button id="btnAgregarVehiculo" type="button" class="btn btn-success btn-lg disabled" data-dismiss="modal" onclick="guardarVehiculoNuevo()" disabled>Agregar</button>
            </div>
            <div class="col-xs-6" style="padding: 0;">
              <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal" >Cancelar</button>
            </div>
          </center>
        </div>
   		</div>
  	</div>
  </div>
</div>




<!-- 2-Nuevo Tipo Vehiculo -->
<!--cambio -->
<div class="modal fade" id="popUpTipoVehiculo" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!--cambio -->
        <h4 class="modal-title">Agregando Modelo de Vehículo</h4>
      </div>
      <div class="modal-body">
           <form action="" onSubmit="return false">
              <div class="form-group">
                <!--cambio -->
                <label>Nombre del modelo del vehículo:</label>
                <!--cambio -->
                <input type="text" class="form-control" id="tipVehNombre" maxlength="100" onkeyup="mayus(this), habilitarBtnTipVeh()" oninput="setCustomValidity(``); if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autofocus>
              </div>
            </form> 
      </div>
      <div class="modal-footer">
        <div class="row" style="margin: 0;">
          <center>
            <div class="col-xs-6" style="padding: 0;">
              <!--cambio -->
              <button id="btnAgregarTipVehiculo" type="button" class="btn btn-success btn-lg disabled" data-dismiss="modal" onclick="guardarTipVehNuevo()" disabled>Agregar</button>
            </div>
            <div class="col-xs-6" style="padding: 0;">
              <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal" >Cancelar</button>
            </div>
          </center>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- 3-Nuevo Motor -->
<!--cambio -->
<div class="modal fade" id="popUpMotor" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!--cambio -->
        <h4 class="modal-title">Agregando Motor</h4>
      </div>
      <div class="modal-body">
           <form action="" onSubmit="return false">
              <div class="form-group">
                <!--cambio -->
                <label>Nombre del motor:</label>
                <!--cambio -->
                <input type="text" class="form-control" id="motorCod" maxlength="100" onkeyup="mayus(this), habilitarBtnMot()" oninput="setCustomValidity(``); if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autofocus>
              </div>
            </form> 
      </div>
      <div class="modal-footer">
        <div class="row" style="margin: 0;">
          <center>
            <div class="col-xs-6" style="padding: 0;">
              <!--cambio -->
              <button id="btnAgraegarMotor" type="button" class="btn btn-success btn-lg disabled" data-dismiss="modal" onclick="guardarMotorNuevo()" disabled>Agregar</button>
            </div>
            <div class="col-xs-6" style="padding: 0;">
              <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal" >Cancelar</button>
            </div>
          </center>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- 4-Nueva Marca -->
<!--cambio -->
<div class="modal fade" id="popUpMarca" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!--cambio -->
        <h4 class="modal-title">Agregando Marca del Turbo</h4>
      </div>
      <div class="modal-body">
           <form action="" onSubmit="return false">
              <div class="form-group">
                <!--cambio -->
                <label>Nombre de la marca del turbo:</label>
                <!--cambio -->
                <input type="text" class="form-control" id="marcaNombre" maxlength="100" onkeyup="mayus(this), habilitarBtnMar()" oninput="setCustomValidity(``); if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autofocus>
              </div>
            </form> 
      </div>
      <div class="modal-footer">
        <div class="row" style="margin: 0;">
          <center>
            <div class="col-xs-6" style="padding: 0;">
              <!--cambio -->
              <button id="btnAgregarMarca" type="button" class="btn btn-success btn-lg disabled" data-dismiss="modal" onclick="guardarMarcaNueva()" disabled>Agregar</button>
            </div>
            <div class="col-xs-6" style="padding: 0;">
              <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal" >Cancelar</button>
            </div>
          </center>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- 5-Nuevo Modelo -->
<!--cambio -->
<div class="modal fade" id="popUpModelo" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!--cambio -->
        <h4 class="modal-title">Agregando Modelo del Turbo</h4>
      </div>
      <div class="modal-body">
           <form action="" onSubmit="return false">
              <div class="form-group">
                <!--cambio -->
                <label>Nombre del modelo del turbo:</label>
                <!--cambio -->
                <input type="text" class="form-control" id="modeloNombre" maxlength="100" onkeyup="mayus(this), habilitarBtnMod()" oninput="setCustomValidity(``); if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autofocus>
              </div>
            </form> 
      </div>
      <div class="modal-footer">
        <div class="row" style="margin: 0;">
          <center>
            <div class="col-xs-6" style="padding: 0;">
              <!--cambio -->
              <button id="btnAgregarModelo" type="button" class="btn btn-success btn-lg disabled" data-dismiss="modal" onclick="guardarModeloNuevo()" disabled>Agregar</button>
            </div>
            <div class="col-xs-6" style="padding: 0;">
              <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal" >Cancelar</button>
            </div>
          </center>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- 6-Nuevo Turbo -->
<!--cambio -->
<div class="modal fade" id="popUpTurbo" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!--cambio -->
        <h4 class="modal-title">Agregando Turbo</h4>
      </div>
      <div class="modal-body">
           <form action="" onSubmit="return false">
              <div class="form-group">
                <!--cambio -->
                <label>Nombre del turbo:</label>
                <!--cambio -->
                <input type="text" class="form-control" id="turboCod" maxlength="100" onkeyup="mayus(this), habilitarBtnTur()" oninput="setCustomValidity(``); if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autofocus>
              </div>
            </form> 
      </div>
      <div class="modal-footer">
        <div class="row" style="margin: 0;">
          <center>
            <div class="col-xs-6" style="padding: 0;">
              <!--cambio -->
              <button id="btnAgregarCodTur" type="button" class="btn btn-success btn-lg disabled" data-dismiss="modal" onclick="guardarTurboNuevo()" disabled>Agregar</button>
            </div>
            <div class="col-xs-6" style="padding: 0;">
              <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal" >Cancelar</button>
            </div>
          </center>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Calibracion Venta -->
<div class="modal fade" id="popUpCalVen" role="dialog">
  <div class="modal-dialog modal-sm"><!-- style="width: auto;">-->
    <div class="modal-content">

        <div class="modal-body">
          <button class="btn-default btn130" onclick="selectorCalVen(1)" type="button" 
          data-dismiss="modal">
            <p class="textBtn">Calibración</p>
          </button>
          <button class="btn-default btn130" onclick="selectorCalVen(2)" type="button"
          data-dismiss="modal">
            <p class="textBtn">Venta</p>
          </button>
        </div>
       

    </div>
  </div>
</div>

<!-- Neumatio Electrica -->
<div class="modal fade" id="popUpNeuEle" role="dialog">
  <div class="modal-dialog modal-sm"><!-- style="width: auto;">-->
    <div class="modal-content">


      <div class="modal-body">
        <button class="btn-default btn130" onclick="selectorNeuEle(1)" type="button" 
        data-dismiss="modal" data-toggle="modal" data-target="#popUpCalVen">
          <p class="textBtn">Neumática</p>
        </button>
        <button class="btn-default btn130" onclick="selectorNeuEle(2)" type="button" 
         data-dismiss="modal" data-toggle="modal" data-target="#popUpCalVen">
          <p class="textBtn">Eléctrico</p>
        </button>
      </div>

    </div>
  </div>
</div>


<!-- Regresar a ventana principal -->
<div class="modal fade oculto-impresion" id="popUpRegVenPri" role="dialog">
  <div class="modal-dialog modal-sm"><!-- style="width: auto;">-->
    <div class="modal-content">



       <div class="modal-body">
        <center>
           <button class="btn-default btn130" onclick="ventanaPrincipal()" type="button" 
            data-dismiss="modal">
            <p class="textBtn">Regresar</p>
          </button>
        </center>
      </div>

    </div>
  </div>
</div>


<!-- Historial CLiente -->
<div class="modal fade" id="popUpHislCli" role="dialog">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">



       <div id="contenidoHisCli" class="modal-body">
           Espere...
      </div>

    </div>
  </div>
</div>



<!-- Imprimir -->
<div class="modal fade" id="popUpImprimir" data-backdrop="static" role="dialog">
  <div class="modal-dialog modal-lg" style="width: 810px;">
    <div class="modal-content" style="border: 0;">



       <div id="contenidoImprimir" class="modal-body">
           Espere...
      </div>

    </div>
  </div>
</div>


<!-- Verificar Editar -->
<div class="modal fade" id="popUpVeriEdit" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">¿Realmente desea editar? </h4>
      </div>
      <!--
      <div class="modal-body">
           <form>
              <div class="form-group">
                
              </div>
            </form> 
      </div>
    -->
      <div class="modal-footer">
        <div class="row" style="margin: 0;">
          <center>
            <div class="col-xs-6" style="padding: 0;">

              <button type="button" class="btn btn-success btn-lg" data-dismiss="modal" onclick="editarContraro()" >Editar</button>
            </div>
            <div class="col-xs-6" style="padding: 0;">
              <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal" >Cancelar</button>
            </div>
          </center>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Verificar Anular -->
<div class="modal fade" id="popUpVeriAnu" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">¿Realmente desea anular contraro? </h4>
      </div>
      <!--
      <div class="modal-body">
           <form>
              <div class="form-group">
                
              </div>
            </form> 
      </div>
    -->
      <div class="modal-footer">
        <div class="row" style="margin: 0;">
          <center>
            <div class="col-xs-6" style="padding: 0;">

              <button type="button" class="btn btn-success btn-lg" data-dismiss="modal" onclick="anularContraro()" >Anular</button>
            </div>
            <div class="col-xs-6" style="padding: 0;">
              <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal" >Cancelar</button>
            </div>
          </center>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Verificar Activar -->
<div class="modal fade" id="popUpVeriAct" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">¿Realmente desea activar contraro? </h4>
      </div>
      <!--
      <div class="modal-body">
           <form>
              <div class="form-group">
                
              </div>
            </form> 
      </div>
    -->
      <div class="modal-footer">
        <div class="row" style="margin: 0;">
          <center>
            <div class="col-xs-6" style="padding: 0;">

              <button type="button" class="btn btn-success btn-lg" data-dismiss="modal" onclick="activarContraro()" >Activar</button>
            </div>
            <div class="col-xs-6" style="padding: 0;">
              <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal" >Cancelar</button>
            </div>
          </center>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Verificar Generar COntrat -->
<div class="modal fade" id="popUpGenCon" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">¿Realmente desea generar contraro? </h4>
      </div>
      <!--
      <div class="modal-body">
           <form>
              <div class="form-group">
                
              </div>
            </form> 
      </div>
    -->
      <div class="modal-footer">
        <div class="row" style="margin: 0;">
          <center>
            <div class="col-xs-6" style="padding: 0;">

              <button type="button" class="btn btn-success btn-lg" data-dismiss="modal" onclick="generarContraroDeProforma()" >Generar Contrato</button>
            </div>
            <div class="col-xs-6" style="padding: 0;">
              <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal" >Cancelar</button>
            </div>
          </center>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Verificar Solo Garantia -->
<div class="modal fade" id="popUpSolGar" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">¿Realmente desea realizar garantía? </h4>
      </div>
      <!--
      <div class="modal-body">
           <form>
              <div class="form-group">
                
              </div>
            </form> 
      </div>
    -->
      <div class="modal-footer">
        <div class="row" style="margin: 0;">
          <center>
            <div class="col-xs-6" style="padding: 0;">

              <button type="button" class="btn btn-success btn-lg" data-dismiss="modal" onclick="realizarGarantia()" >Realizar Garantía</button>
            </div>
            <div class="col-xs-6" style="padding: 0;">
              <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal" >Cancelar</button>
            </div>
          </center>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- Verificar Reparacion -->
<div class="modal fade" id="popUpRep" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">¿Realmente desea relizar reparación? </h4>
      </div>
      <!--
      <div class="modal-body">
           <form>
              <div class="form-group">
                
              </div>
            </form> 
      </div>
    -->
      <div class="modal-footer">
        <div class="row" style="margin: 0;">
          <center>
            <div class="col-xs-6" style="padding: 0;">

              <button type="button" class="btn btn-success btn-lg" data-dismiss="modal" onclick="realizarReparacion()" >Realizar Reparación</button>
            </div>
            <div class="col-xs-6" style="padding: 0;">
              <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal" >Cancelar</button>
            </div>
          </center>
        </div>
      </div>
    </div>
  </div>
</div>