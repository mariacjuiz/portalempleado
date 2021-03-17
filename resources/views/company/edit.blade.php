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


            <div class="border-top">
                <div class="card-body">
                    <button type="submit" class="btn btn-mewy">Aceptar</button>
                    <a class="btn btn-mewy" href="{{url('/vacations') }}">Cancel</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ 'Introducir fecha inicio y fecha fin solicitada' }}</h4>
                            <hr>
                            <div class="form-group row">
                                <label for="startdate" class="col-sm-3 text-right control-label col-form-label">{{ 'Fecha Inicio' }}</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="startdate" id="startdate" value="{{ isset($vacation->startdate)?$vacation->startdate:'' }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="enddate" class="col-sm-3 text-right control-label col-form-label">{{ 'Fecha fin' }}</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="enddate" id="enddate" value="{{ isset($vacation->enddate)?$vacation->enddate:'' }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="validate" class="col-sm-3 text-right control-label col-form-label">{{ 'Validado' }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="validate" id="validate" value="{{ isset($vacation->validate)?$vacation->validate:'NO' }}" required disabled>
                                </div>
                            </div>

                            <input type="hidden" class="form-control" name="user_id" id="user_id" value="{{ isset($vacation->user_id)?$vacation->user_id:Auth::user()->id }}">
                            <input type="hidden" class="form-control" name="created_at" id="created_at" value="{{ isset($vacation->created_at)?$vacation->created_at:now() }}">
                            <input type="hidden" class="form-control" name="updated_at" id="updated_at" value="{{ now() }}">
                        </div>
                    </div>
                </div>
            </div>


        </form >
    </div>
</div>

<footer class="footer text-center page-wrapper">
{{ 'Portal del empleado: MODIFICAR VACACIONES - Desarrollo de aplicaciones web 2021 - María Castro Juíz' }}
</footer>


@endsection
