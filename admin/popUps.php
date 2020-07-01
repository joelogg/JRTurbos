<!-- Agregar -->
<div class="modal fade" id="popUpAgregar" data-backdrop="static" role="dialog">
  <div class="modal-dialog modal-md">
 		<div class="modal-content">
   		<div class="modal-header">
   			<button type="button" class="close" data-dismiss="modal">&times;</button>
   			<h4 id="popUpTituloAgregar" class="modal-title"></h4>
   		</div>
   		<div class="modal-body">
           <form action="" onSubmit="return false">
              <div class="form-group">
                <label id="popUpIndicadorAgregar"></label>
                <input type="text" class="form-control" id="iNombreAg" maxlength="100" onkeyup="mayus(this), habilitarBtnAgr()" oninput="setCustomValidity(``); if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
              </div>
            </form> 
   		</div>
	   	<div class="modal-footer">
        <div class="row" style="margin: 0;">
          <center>
            <div class="col-xs-6" style="padding: 0;">
              <button id="btnAgregar" type="button" class="btn btn-success btn-lg disabled" data-dismiss="modal" onclick="guardarNuevo()" disabled>Agregar</button>
            </div>
            <div class="col-xs-6" style="padding: 0;">
              <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal" onclick="cancelarGuardar()">Cancelar</button>
            </div>
          </center>
        </div>
   		</div>
  	</div>
  </div>
</div>




<!-- Editar -->
<!--cambio -->
<div class="modal fade" id="popUpEditar" data-backdrop="static" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!--cambio -->
        <h4 id="popUpTituloEditar" class="modal-title"></h4>
      </div>
      <div class="modal-body">
           <form action="" onSubmit="return false">
              <div class="form-group">
                <label id="opcionesSelect" for="sel1"></label>
                <select class="form-control" id="sel1">
                  
                </select>
              </div>
              <div class="form-group">
                <!--cambio -->
                <label id="popUpIndicadorEditar"></label>
                <!--cambio -->
                <input type="text" class="form-control" id="iNombreEd" maxlength="100" onkeyup="mayus(this), habilitarBtnEdi()" oninput="setCustomValidity(``); if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
              </div>
            </form> 
      </div>
      <div class="modal-footer">
        <div class="row" style="margin: 0;">
          <center>
            <div class="col-xs-6" style="padding: 0;">
              <!--cambio -->
              <button id="btnEditar" type="button" class="btn btn-success btn-lg" data-dismiss="modal" onclick="editar()">Actualizar</button>
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



<!-- Eliminar -->
<!--cambio -->
<div class="modal fade" id="popUpEliminar" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!--cambio -->
        <h4 id="popUpTituloEliminar" class="modal-title"></h4>
      </div>
      <div class="modal-footer">
        <div class="row" style="margin: 0;">
          <center>
            <div class="col-xs-6" style="padding: 0;">
              <!--cambio -->
              <button id="btnEliminar" type="button" class="btn btn-success btn-lg" data-dismiss="modal" onclick="eliminar()">Eliminar</button>
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




