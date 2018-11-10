<div class="modal fade text-xs-left" id="modal-create" data-keyboard="false"  data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="height: 50%">

            <div class="modal-header" v-if="respuesta.status">
                <label for="">El saldo de su @{{respuesta.tipocuenta}} es de @{{respuesta.saldo}} pesos</label>
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