@extends('layouts.app')

@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">VACACIONES PENDIENTES DE VALIDAR</h4>
                <div class="ml-auto text-right">

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="material-icon-list-demo">
                            <table id="zero_config" class="table table-light table table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Usurio</th>
                                        <th>Inicio</th>
                                        <th>Fin</th>
                                        <th>Validado</th>
                                        <th>Fecha de creación</th>
                                        <th>Acciones<th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($vacations as $vacation)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $vacation->userName}}</td>
                                            <td>{{ \Carbon\Carbon::parse($vacation->startdate)->format('d/m/Y')}}</td>
                                            <td>{{ \Carbon\Carbon::parse($vacation->enddate)->format('d/m/Y')}}</td>
                                            <td>{{ $vacation->validate}}</td>
                                            <td>{{ \Carbon\Carbon::parse($vacation->created_at)->format('d/m/Y H:m')}}</td>
                                            <td>
                                                <div>
                                                    <form method="post" action="{{ url('/vacations/'.$vacation->id) }}" style="display: inline">
                                                        {{-- Como enviamos la informacion de un formulario, usamos el token --}}
                                                        <input type="hidden" class="form-control date-inputmask" id="validate" name= "validate" value="SI">
                                                        {{csrf_field() }}
                                                        {{-- Accedemos directamente al método update del controlador de la ausencia --}}
                                                        {{ method_field('PATCH') }}

                                                        <button class="btn btn-mewy btn-sm" type="submit" onclick="return confirm('¿Desea validar las vacaciones?');">Validar</button>

                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $vacations->links() }}
                            {{--
                                echo $user->name;
                            @endforeach --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer text-center">
        Portal del empleado: VACACIONES - Desarrollo de aplicaciones web 2021 - María Castro Juíz
    </footer>
</div>

@endsection


