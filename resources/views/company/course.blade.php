
@extends('layouts.app')

@section('content')

    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">CURSOS IMPARTIDOS POR LA EMPRESA</h4>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row el-element-overlay">


                @foreach ($companies as $company)
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="{{ asset('storage').'/'.$company->img}}" alt="foto de la noticia" />
                                    <div class="el-overlay">
                                        <ul class="list-style-none el-info">
                                            <li class="el-item"><a class="btn default btn-outline el-link" href="{{ url('/company/show') }}"><i class="mdi mdi-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="el-card-content">
                                    <h4 class="m-b-0">{{ $company->title}}</h4> <span class="text-muted">{{ $company->text}}</span>
                                    <div class="el-card-content">
                                        <h6 class="m-b-0 text-muted">{{ \Carbon\Carbon::parse($company->created_at)->format('d/m/Y')}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <footer class="footer text-center">
            Portal del empleado: CURSOS - Desarrollo de aplicaciones web 2021 - María Castro Juíz
        </footer>
    </div>


@endsection
