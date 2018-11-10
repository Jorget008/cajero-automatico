@extends('layouts.cajero')
@section('title')Banco Unisangil @endsection
@section('content')

    <div id="cajero">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="form-group row">
                            <div class="col-md-6">
                                <button type="button" class="btn-block" v-on:click="retiro('1','0')">Retiro cuenta de ahorros</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn-block" v-on:click="consultar('1')">Consultar saldo cuenta de ahorros</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <button type="button" class="btn-block" v-on:click="retiro('2','0')">Retiro cuenta corriente</button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn-block" v-on:click="consultar('2')">Consultar saldo cuenta corriente</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <button type="button" class="btn-block"  v-on:click="retiro('1','1')">Consignar en cuenta de ahorros</button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn-block" v-on:click="retiro('2','1')">Consignar en cuenta corriente</button>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        @include('cajero.saldo')
        @include('cajero.retiro')
    </div>

@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.2.0/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.5.0/vue-resource.js"></script>

<script>

    var app=new Vue({
        el: '#cajero',
        data:{
            respuesta:{
                saldo:'',
                tipocuenta:'',
                status:false,
            },

            tipocuenta:'',
            tipomovimiento:'',
            monto:0,
            urlCAhorros :'{{ route('saldo', ['tipocuenta' => 1])}}',
            urlCCorriente :'{{ route('saldo', ['tipocuenta' => 2])}}',
            routeRetiroAhorro: "{{ route('retiro')}}",
            routeRetiroCorriente: "{{ route('retiro')}}",
            routeConsigna: "{{ route('consigna') }}",
            routeCambioClave: "{{ route('new_clave') }}",
        },

        methods: {
            retiro: function(tipocuenta,tipomovimiento){
                this.tipocuenta=tipocuenta;
                this.tipomovimiento=tipomovimiento;
                $('#modal-retiro').modal('show');
            },

            consultar: function (tipocuenta) {
                if(tipocuenta==1){
                    url=this.urlCAhorros;
                }else{
                    url=this.urlCCorriente;
                }

              this.$http.get(url).then(response=>{
                  this.respuesta=response.body;
                }).catch(error=>{
                  console.log(error);
              });
                $('#modal-create').modal('show');
            },
            volverconsulta: function () {
                $('#modal-create').modal('hide');
            },

            movimiento: function (tipocuenta,tipomovimiento) {
                if(tipocuenta==1){
                    url=this.routeRetiroAhorro;
                }else{
                    url=this.routeRetiroCorriente;
                }
                //url=this.routeRetiro;
                axios.post('/retiro', { tipocuenta: tipocuenta, tipomovimiento: tipomovimiento,valor:this.monto })
                    .then(function(response){
                        this.respuesta=response.data;
                        console.log(response.data)
                    });

                /* this.$http.post('retiro',{parametros:tipocuenta}).then(response=>{
                     this.respuesta=response.body;
                 }).catch(error=>{
                     console.log(error);
                 });*/
                $('#modal-retiro').modal('hide');
            },

        },
        mounted(){

        }

    })
</script>

@endsection

