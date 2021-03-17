@extends('layouts.app')

@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">LISTADO DE FICHAJES</h4>
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
                                        <th>Dia</th>
                                        <th>Hora entrada</th>
                                        <th>Hora salida</th>
                                        <th>Tiempo transcurrido</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($checks as $check)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ \Carbon\Carbon::parse($check->day)->format('d/m/Y')}}</td>
                                            <td>{{ $check->checkin }}</td>
                                            <td>{{ $check->checkout}}</td>
                                            <td>{{ Carbon\Carbon::parse($check->checkin)->diffAsCarbonInterval($check->checkout) }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $checks->links() }}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer text-center">
        Portal del empleado: FICHAJES - Desarrollo de aplicaciones web 2021 - María Castro Juíz
    </footer>
</div>

@endsection


