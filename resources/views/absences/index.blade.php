@extends('layouts.app')

@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">AUSENCIA DEL USUARIO </h4>
                <div class="ml-auto text-right">

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="border-top">
            <div class="card-body">
                <a class="btn btn-mewy" href="{{ url('absences/create') }}">Nueva Ausencia</a>
            </div>
        </div>

        @if ($errors->any())
            <div class="card-body">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="material-icon-list-demo">
                            <table id="zero_config" class="table table-light table table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Tipo</th>
                                        <th>Fecha/hora inicio</th>
                                        <th>Fecha/hora fin</th>
                                        <th>Validado</th>
                                        <th>Fecha de petición</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($absences as $absence)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $absence->hourName}}</td>
                                            <td>{{ \Carbon\Carbon::parse($absence->startdate)->format('d/m/Y')}}</td>
                                            <td>{{ \Carbon\Carbon::parse($absence->enddate)->format('d/m/Y')}}</td>
                                            <td>{{ $absence->validate}}</td>
                                            <td>{{ \Carbon\Carbon::parse($absence->created_at)->format('d/m/Y H:m')}}</td>
                                            <td>
                                                <div>
                                                    @if ($absence->validate == 'NO')

                                                        <form method="post" action="{{ url('/absences/'.$absence->id) }}" style="display: inline">
                                                            {{-- Como enviamos la informacion de un formulario, usamos el token --}}
                                                            {{csrf_field() }}
                                                            {{-- Accedemos directamente al método destroy del controlador del usuario --}}
                                                            {{ method_field('DELETE') }}
                                                            <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Desea borrar la ausencia?');">Eliminar</button>

                                                        </form>
                                                    @endif
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
        Portal del empleado: AUSENCIAS - Desarrollo de aplicaciones web 2021 - María Castro Juíz
    </footer>
</div>

@endsection


