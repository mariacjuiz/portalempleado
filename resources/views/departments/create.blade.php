@extends('layouts.app')

@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">{{ 'NUEVO DEPARTAMENTO' }}</h4>
                <div class="ml-auto text-right">

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <form action= "{{ url('/departments')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }} <!-- token de seguridad / llave de acceso -->

            <!---- Vista form ---->
            @include('departments.form', ['Accion'=>'Alta'])
            <!---- Vista form ---->

        </form >
    </div>
</div>

<footer class="footer text-center page-wrapper">
    {{ 'Portal del empleado: NUEVO DEPARTAMENTO - Desarrollo de aplicaciones web 2021 - María Castro Juíz' }}
</footer>


@endsection

