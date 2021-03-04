@extends('layout')


@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">NÓMINAS</h4>
                <div class="ml-auto text-right">
                    {{-- <div class="container-fluid">
                        <div class="border-top">
                        </div>
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
                                                        <th>Importe total</th>
                                                        <th>Descarga</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($salary as $salary)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{ $salary->year}}</td>
                                                            <td>{{ $salary->month}}</td>
                                                            <td>{{ $salary->total}}</td>
                                                            <td>{{ $salary->url}}</td>
                                                            <td>
                                                                <div>
                                                                    <a class="btn btn-mewy btn-sm" href="{{ www.googl.es }}">Descargar</a>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            {{--
                                                echo $user->name;
                                            @endforeach --}}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">NÓMINAS</h4>
                        <div class="material-icon-list-demo">
                            Aqui van las nóminas
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
