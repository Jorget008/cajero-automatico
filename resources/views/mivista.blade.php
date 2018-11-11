@extends('layouts.cajero')
@section('title')Bienvenido @endsection
@section('style')

        html, body {
            background-color: DarkTurquoise;
            color: #ffffff;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 70px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    @endsection



@section('content')
    <div class="content">
        <div class="title m-b-md">
            Banco UNISANGIL
        </div>

        <div class="col-form-label">
            Somos una entidad bancaria comprometida con la seguridad de las finanzas de los ciudadanos. Cree una cuenta bancaria con nosotros y
            su dinero siempre estará seguro.
        </div>
    </div>
@endsection