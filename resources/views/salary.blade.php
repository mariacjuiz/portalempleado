@extends('layouts.app')

@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">LISTADO DE NÓMINAS</h4>
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
                                        <th>Año</th>
                                        <th>Mes</th>
                                        <th>Fecha alta</th>
                                        <th>Importe Bruto</th>
                                        <th>Mostrar nómina</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($salaries as $salary)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $salary->year}}</td>
                                            <td>{{ $salary->name}}</td>
                                            <td>{{ \Carbon\Carbon::parse($salary->created_at)->format('d/m/Y H:m')}}</td>
                                            <td>{{ $salary->total}}</td>
                                            <td>
                                                <div>
                                                    {{-- {{ url(salary->url) }} --}}
                                                    <a class="btn btn-mewy btn-sm" href="../../storage/uploads/nomina.png">Mostrar</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $salaries->links() }}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer text-center">
        Portal del empleado: NÓMINAS - Desarrollo de aplicaciones web 2021 - María Castro Juíz
    </footer>
</div>

@endsection


