@extends('layouts.app')

@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">{{ 'EDITAR VACACIONES' }}</h4>
                <div class="ml-auto text-right">

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">

        <form action= "{{ url('/vacations/'.$vacation->id)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }} <!-- token de seguridad / llave de acceso -->
            {{-- Accedemos directamente al método UPDATE del controlador del departamento --}}
            {{ method_field('PATCH') }}

            <!---- Vista form ---->
            @include('vacations.form', ['Accion'=>'Modificar'])
            <!---- Vista form ---->

        </form >
    </div>
</div>

<footer class="footer text-center page-wrapper">
{{ 'Portal del empleado: MODIFICAR VACACIONES - Desarrollo de aplicaciones web 2021 - María Castro Juíz' }}
</footer>


@endsection
