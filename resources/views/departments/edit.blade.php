@extends('layouts.app')

@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">{{ 'EDITAR DEPARTAMENTO' }}</h4>
                <div class="ml-auto text-right">

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">

        <form action= "{{ url('/departments/'.$department->id)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }} <!-- token de seguridad / llave de acceso -->
            {{-- Accedemos directamente al método UPDATE del controlador del departamento --}}
            {{ method_field('PATCH') }}

            <!---- Vista form ---->
            @include('departments.form', ['Accion'=>'Modificar'])
            <!---- Vista form ---->

        </form >
    </div>
</div>

<footer class="footer text-center page-wrapper">
{{ 'Portal del empleado: MODIFICAR DEPARTAMENTO - Desarrollo de aplicaciones web 2021 - María Castro Juíz' }}
</footer>


@endsection
