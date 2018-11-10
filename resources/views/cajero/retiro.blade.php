<div class="modal fade text-xs-left" id="modal-retiro" data-keyboard="false"  data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="height: 50%">

            <div class="modal-header">
                <label v-if="tipomovimiento==0">Digite el saldo que desea retirar: </label>
                <label v-if="tipomovimiento==1">Digite el saldo que desea consignar: </label>
                <input v-model="monto">
                <button v-on:click="movimiento('1','0')" v-if="tipocuenta==1 && tipomovimiento==0 ">aceptar</button>
                <button v-on:click="movimiento('2','0')" v-if="tipocuenta==2&& tipomovimiento==0">aceptar</button>
                <button v-on:click="movimiento('1','1')" v-if="tipocuenta==1&& tipomovimiento==1">aceptar</button>
                <button v-on:click="movimiento('2','1')" v-if="tipocuenta==2&& tipomovimiento==1">aceptar</button>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <spam aria-hidden="true">Volver</spam>
                </button>


            </div>
            <div class="modal-header" v-else>
                <label for="">Usted no cuenta con el tipo de cuenta seleccionado.</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <spam aria-hidden="true">Volver</spam>
                </button>

            </div>

        </div>
    </div>


</div>