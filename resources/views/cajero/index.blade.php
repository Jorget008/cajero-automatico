@extends('layouts.cajero')
@section('title')Banco Unisangil @endsection
@section('style')
    html, body {
    background-color: MediumTurquoise;

    color: #636b6f;
    font-family: 'Nunito', sans-serif;
    font-weight: 10;
    height: 100vh;
    margin: 0;
    }
@endsection
@section('content')

    <div id="cajero" class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">


                    <div class="card-body">
                        <div class="form-group btn-group-vertical float-left col-6">
                            <button class="btn-block btn-dark" v-on:click="consultar('1')">Consultar saldo cuenta de ahorros</button>
                            <button type="button" class="btn-block btn-dark"  v-on:click="retiro('1','1')">Consignar en cuenta de ahorros</button>
                            <button type="button" class="btn-block btn-dark" v-on:click="retiro('1','0')">Retirar de su cuenta de ahorros</button>
                        </div>
                        <div class="form-group btn-group-vertical float-right col-6">
                            <button type="button" class="btn-block btn-dark" v-on:click="consultar('2')">Consultar saldo de su cuenta corriente</button>
                            <button type="button" class="btn-block btn-dark" v-on:click="retiro('2','1')">Consignar en cuenta corriente</button>
                            <button type="button" class="btn-block btn-dark" v-on:click="retiro('2','0')">Retirar de su cuenta corriente</button>
                        </div>
                        <button type="button" class="btn-block btn-dark col-12  " v-on:click="imprimir()">Ver resumen de los movimientos de sus cuentas</button>
                    </div>
                </div>
            </div>
        </div>

        @include('cajero.retiro')
        @include('cajero.estracto')






    </div>


@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.2.0/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.5.0/vue-resource.js"></script>


<script>

    var app=new Vue({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        },
        el: '#cajero',
        data:{
            respuesta:{
                title:'',
                mensaje:[{nombre:''}],
                type:'',
            },

            tipocuenta:'',
            tipomovimiento:'',
            monto:0,
            urlCAhorros :'{{ route('saldo', ['tipocuenta' => 1])}}',
            urlCCorriente :'{{ route('saldo', ['tipocuenta' => 2])}}',
            urlEstracto: "{{ route('estracto')}}",
        },


        methods: {
            notification:function(title,text,type){
                swal({
                   // "timer":1800,
                    "title":title,
                    "text":text,
                    "type": type,
                    "confirmButtonColor":"#85be39",
                    "cancelButtonColor":'#ef5350',
                    "confirmButtonText:": "Aceptar",
                    "cancelButtonText:": "Cancelar",
                    "showCancelButton":false,
                    "showConfirmButton":true,
                    "allowEscapeKey":false,
                    "allowOutsideClick":false,
                });
            },
            retiro: function(tipocuenta,tipomovimiento){
                this.tipocuenta=tipocuenta;
                this.tipomovimiento=tipomovimiento;
                this.monto='';
                $('#modal-retiro').modal('show');
            },

            imprimir: function () {
              url=this.urlEstracto;
                this.$http.get(url).then(response=>{
                    this.respuesta=response.body;
                 //   this.notification(response.body.title,response.body.mensaje,response.body.type);
                }).catch(error=>{
                    console.log(error);
                });
                $('#modal-estracto').modal('show');
            },

            consultar: function (tipocuenta) {
                if(tipocuenta==1){
                    url=this.urlCAhorros;
                }else{
                    url=this.urlCCorriente;
                }
              this.$http.get(url).then(response=>{
                  this.notification(response.body.title,response.body.mensaje,response.body.type);
                }).catch(error=>{
                  console.log(error);
              });
            },

            volverconsulta: function () {
                $('#modal-create').modal('hide');
            },

            movimiento: function (tipocuenta,tipomovimiento) {
                this.$http.post('/retiro', { tipocuenta: tipocuenta, tipomovimiento: tipomovimiento,valor:this.monto }).then(response =>{
                    this.notification(response.body.title,response.body.mensaje,response.body.type);
                    this.respuesta= response.status;

                });
                this.monto='';
                $('#modal-retiro').modal('hide');
            },
        },
        mounted(){

        }

    })
</script>

@endsection

