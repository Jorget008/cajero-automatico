<div class="modal fade text-xs-left" id="modal-retiro" data-keyboard="false"  data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 240px" role="document">
        <div class="modal-content" >
            <div class=" justify-content-center">
                <div class="card">
                    <div class="card-header">
                        <label v-if="tipocuenta==1">Cuenta de ahorros </label>
                        <label v-if="tipocuenta==2">Cuenta corriente </label>
                    </div>
                    <div class="card-body">
                        <label v-if="tipomovimiento==0">Ingrese el saldo que desea retirar: </label>
                        <label v-if="tipomovimiento==1">Digite el saldo que desea consignar: </label>
                        <input v-model="monto">
                    </div>
                    <div class="card-footer">
                        <div class="btn-group-sm">
                            <button class="btn-sm btn-success" v-on:click="movimiento('1','0')" v-if="tipocuenta==1 && tipomovimiento==0 ">Retirar</button>
                            <button class="btn-sm btn-success" v-on:click="movimiento('2','0')" v-if="tipocuenta==2&& tipomovimiento==0">Retirar</button>
                            <button class="btn-sm btn-success" v-on:click="movimiento('1','1')" v-if="tipocuenta==1&& tipomovimiento==1">Consignar</button>
                            <button class="btn-sm btn-success" v-on:click="movimiento('2','1')" v-if="tipocuenta==2&& tipomovimiento==1">Consignar</button>
                            <button type="button" class="btn-sm btn-danger" data-dismiss="modal" aria-label="Close">
                                <spam  aria-hidden="true">Regresar</spam>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>