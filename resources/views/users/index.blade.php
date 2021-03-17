@extends('layouts.app')

@section('content')

    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">LISTADO DE USUARIOS</h4>
                    <div class="ml-auto text-right">

                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            {{-- Un usuario que no es del dpto dew RRHH no puede dar de alta el usuario --}}
            @if (Auth::user()->is_admin != 1)
                No tiene permiso para acceder a esta página
            @else
                <div class="border-top">
                    <div class="card-body">
                        <a class="btn btn-mewy" href="{{ url('/users/create') }}">Nuevo Usuario</a>
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
                                                <th>Nombre completo</th>
                                                <th>DNI</th>
                                                <th>Teléfono</th>
                                                <th>Email</th>
                                                <th>Departamento</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    {{-- <td>
                                                        <img src="{{ asset('storage').'/'.$user->photo}}" alt="Fotografía de perfil" width="200">
                                                    </td> --}}
                                                    <td>{{ $user->name}}</td>
                                                    <td>{{ $user->cif}}</td>
                                                    <td>{{ $user->phone}}</td>
                                                    <td>{{ $user->email}}</td>
                                                    <td>{{ $user->departmentName}}</td>
                                                    <td>
                                                        <div>
                                                            <a class="btn btn-mewy btn-sm" href="{{ url('/users/'.$user->id.'/edit') }}">Editar</a>
                                                            <form method="post" action="{{ url('/users/'.$user->id) }}" style="display: inline">
                                                                {{-- Como enviamos la informacion de un formulario, usamos el token --}}
                                                                {{csrf_field() }}
                                                                {{-- Accedemos directamente al método destroy del controlador del usuario --}}
                                                                {{ method_field('DELETE') }}
                                                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Desea borrar el usuario?');">Eliminar</button>

                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <footer class="footer text-center">
            Portal del empleado: USUARIOS - Desarrollo de aplicaciones web 2021 - María Castro Juíz
        </footer>
    </div>


@endsection

