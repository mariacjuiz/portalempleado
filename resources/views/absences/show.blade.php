@extends('layouts.app')

@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">AUSENCIAS PENDIENTES DE VALIDAR</h4>
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
                                        <th>Usuario</th>
                                        <th>Tipo</th>
                                        <th>Fecha/hora inicio</th>
                                        <th>Fecha/hora fin</th>
                                        <th>Fecha de petición</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($absences as $absence)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $absence->userName}}</td>
                                            <td>{{ $absence->hourName}}</td>
                                            <td>{{ \Carbon\Carbon::parse($absence->startdate)->format('d/m/Y H:m')}}</td>
                                            <td>{{ \Carbon\Carbon::parse($absence->enddate)->format('d/m/Y H:m')}}</td>
                                            <td>{{ \Carbon\Carbon::parse($absence->created_at)->format('d/m/Y H:m')}}</td>
                                            <td>
                                                <div>
                                                    <form method="post" action="{{ url('/absences/'.$absence->id) }}" style="display: inline">
                                                        {{-- Como enviamos la informacion de un formulario, usamos el token --}}
                                                        <input type="hidden" class="form-control date-inputmask" id="validate" name= "validate" value="SI">
                                                        {{csrf_field() }}
                                                        {{-- Accedemos directamente al método update del controlador de la ausencia --}}
                                                        {{ method_field('PATCH') }}

                                                        <button class="btn btn-mewy btn-sm" type="submit" onclick="return confirm('¿Desea validar la ausencia?');">Validar</button>

                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $absences->links() }}
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
        Portal del empleado: AUSENCIAS PENDIENTES DE VALIDAR- Desarrollo de aplicaciones web 2021 - María Castro Juíz
    </footer>
</div>

@endsection


