@extends('layouts.app')

@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">{{ 'NUEVO USUARIO' }}</h4>
                <div class="ml-auto text-right">

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        {{-- <div class="border-top">
            <div class="card-body">
                <button type="submit" class="btn btn-mewy">Aceptar</button>
                <button type="reset" class="btn btn-mewy">Limpiar</button>
                <a class="btn btn-mewy" href="{{url('/users') }}">Cancel</a>
            </div>
        </div> --}}

        <form action= "{{ url('/users')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }} <!-- token de seguridad / llave de acceso -->

            <!---- Vista form ---->
            @include('users.form', ['Accion'=>'Alta', 'Origen' => 'Mnto'])
            <!---- Vista form ---->

        </form >
    </div>
</div>

<footer class="footer text-center page-wrapper">
    {{ 'Portal del empleado: NUEVO USUARIO - Desarrollo de aplicaciones web 2021 - María Castro Juíz' }}
</footer>


@endsection

