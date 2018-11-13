<div class="modal fade text-xs-left" id="modal-estracto" data-keyboard="false"  data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="height: 50%">

            <div class="modal-header">
                <table class="table table-dark">
                    <caption style="display: table-caption">Cliente: @{{ respuesta.mensaje[0].nombre }}</caption>
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Cuenta</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Valor</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr v-for="(mensaje,index) in respuesta.mensaje[1]":key="index">
                        <th>@{{index+1}}</th>
                        <td>@{{mensaje.created_at}}</td>
                        <td>@{{mensaje.cuenta.tipo_cuenta.nombre}}</td>
                        <td>@{{mensaje.transaccion.nombre}}</td>
                        <td>@{{mensaje.valor}}</td>
                    </tr>
                    </tbody>
                </table>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <spam aria-hidden="true">Volver</spam>
                </button>

            </div>


        </div>
    </div>


</div>