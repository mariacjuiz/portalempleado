@extends('layouts.app')

@section('content')

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">LISTADO DE DEPARTAMENTOS</h4>
                <div class="ml-auto text-right">

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="border-top">
            <div class="card-body">
                <a class="btn btn-mewy" href="{{ url('/departments/create') }}">Nuevo Departamento</a>
            </div>
            <span class="card-body">
                @if (Session::has('Mensaje')) {{
                    Session::get('Mensaje')
                }}
                @endif
            </span>
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
                                        {{-- <th>Foto</th> --}}
                                        <th>Descripción</th>
                                        <th>Responsable departamento</th>
                                        <th>Fecha creación</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($departments as $department)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            {{-- <td>
                                                <img src="{{ asset('storage').'/'.$department->photo}}" alt="Fotografía de perfil" width="200">
                                            </td> --}}
                                            <td>{{ $department->name}}</td>
                                            <td>{{ $department->userName}}</td>
                                            <td>{{ $department->created_at}}</td>
                                            <td>
                                                <div>
                                                    <a class="btn btn-mewy btn-sm" href="{{ url('/departments/'.$department->id.'/edit') }}">Editar</a>
                                                    <form method="post" action="{{ url('/departments/'.$department->id) }}" style="display: inline">
                                                        {{-- Como enviamos la informacion de un formulario, usamos el token --}}
                                                        {{csrf_field() }}
                                                        {{-- Accedemos directamente al método destroy del controlador del usuario --}}
                                                        {{ method_field('DELETE') }}
                                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Desea borrar el departamento?');">Eliminar</button>

                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $departments->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer text-center">
        Portal del empleado: DEPARTAMENTOS - Desarrollo de aplicaciones web 2021 - María Castro Juíz
    </footer>
</div>

@endsection


