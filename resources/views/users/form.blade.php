
{{-- Un usuario que no es del dpto dew RRHH no puede dar de alta el usuario --}}
@if ($Accion=='Alta' && Auth::user()->is_admin == false)
    No tiene permiso para acceder a esta página
@else

    <div class="border-top">
        <div class="card-body">
            <button type="submit" class="btn btn-mewy">Aceptar</button>
            @if ($Origen=='Perfil')
                {{-- No mostramos nungun boton en el perfil dado que solo es consulta y para cambiar el pass se hace desde el dov de contraseña --}}
            @else
                <a class="btn btn-mewy" href="{{url('/users') }}">Cancel</a>
            @endif
            @if ($Accion=='Alta')
                <button type="reset" class="btn btn-mewy">Limpiar</button>
            @endif

        </div>
        <div class="card-body">
            @if (Session::has('Mensaje'))
                <span class="card-body">
                    {{ Session::get('Mensaje') }}
                </span>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="form-horizontal">
                    <div class="card-body">
                        <h5 class="card-title">{{ 'Datos personales' }}</h5>
                        <hr>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 text-right control-label col-form-label">{{ 'Nombre completo' }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="name" value="{{ isset($user->name)?$user->name:'' }}" required {{ (Auth::user()->is_admin == false) ? 'disabled' : ''}}>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cif" class="col-sm-3 text-right control-label col-form-label">{{ 'DNI' }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="cif" id="cif" value="{{ isset($user->cif)?$user->cif:'' }}" required {{ (Auth::user()->is_admin == false) ? 'disabled' : ''}}>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="adress" class="col-sm-3 text-right control-label col-form-label">{{ 'Dirección' }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="adress" id="adress" value="{{ isset($user->adress)?$user->adress:'' }}" {{ (Auth::user()->is_admin == false) ? 'disabled' : ''}}>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-3 text-right control-label col-form-label">{{ 'Teléfono' }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control phone-inputmask" name="phone" id="phone" value="{{ isset($user->phone)?$user->phone:'' }}" required maxlength="9" {{ (Auth::user()->is_admin == false) ? 'disabled' : ''}}>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="photo" class="col-sm-3 text-right control-label col-form-label">{{ 'Fotografía' }}</label>

                            <div class="col-sm-9">
                                @if(isset($user->photo))
                                    <br/>
                                    <img class="img-thumbnail" src="{{ asset('storage').'/'.$user->photo}}" alt="Fotografía de perfil" width="150" height="150">
                                    <br/>
                                @endif
                                @if (Auth::user()->department == 1)
                                    <input type="file" class="form-control" name="photo" id="photo" value="{{ isset($user->photo)?$user->photo:'' }}">
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ 'Datos acceso' }}</h4>
                    <hr>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 text-right control-label col-form-label">{{ 'Email' }}</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" id="email" value="{{ isset($user->email)?$user->email:'' }}" required {{ ($Accion!='Alta') ? 'disabled' : ''}}>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 text-right control-label col-form-label">{{ 'Contraseña' }}</label>
                        <div class="col-sm-9">
                            {{-- Permitirmos modifcar la contraseña solo si elperfil es el del usuario autenticado --}}
                            @if ($Accion=='Alta')
                                <input type="password" class="form-control" name="password" id="password" value="{{ isset($user->password)?$user->password:'' }}" required>
                            @else
                                <input type="password" class="form-control" name="password" id="password" value="{{ isset($user->password)?$user->password:'' }}" required>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ 'Datos empresa' }}</h5>
                    <hr>
                    <div class="form-group row">
                        <label for="user_id" class="col-sm-3 text-right control-label col-form-label">{{ 'Departamento' }}</label>
                        <div class="col-sm-9">

                            <select class="select2 form-control custom-select" name="department" id="department" style="width: 100%; height:36px;" value="" {{ (Auth::user()->is_admin == false) ? 'disabled' : ''}}>
                                @foreach ($departments as $department)
                                    @if ($Accion=='Alta')
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @else
                                        @if ($user->department == $department->id )
                                            <option value="{{ $department->id }}" selected>{{ $department->name }}</option>
                                        @else
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endif
                                    @endif
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="created_at" class="col-sm-3 text-right control-label col-form-label">{{ 'Fecha de alta' }}</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control date-inputmask" id="created_at" name= "created_at"
                                value="{{ isset($user->created_at)?\Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:m:s'):'' }}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lowdate" class="col-sm-3 text-right control-label col-form-label">{{ 'Fecha de baja' }}</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control date-inputmask" id="lowdate"
                                value="{{ isset($user->lowdate)?\Carbon\Carbon::parse($user->lowdate)->format('d/m/Y H:m:s'):'' }}" disabled>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label for="is_admin" class="col-sm-3 text-right control-label col-form-label">{{ 'Perfil administrador' }}</label>
                        <div class="col-sm-1">
                            <input type="checkbox" class="form-control date-inputmask" id="is_admin" name= "is_admin" value="is_admin" {{ (Auth::user()->is_admin == 0) ? 'disabled' : '' }}  {{ isset($user->is_admin)?($user->is_admin==1 ? 'checked' : ''):''}}>

                            {{-- <input type="hidden" class="form-control date-inputmask" id="is_admin" name= "is_admin" value="is_adminmask.value"> --}}
                        {{-- </div>
                    </div>  --}}
                    <div class="form-group row">
                        <label for="is_admin" class="col-sm-3 text-right control-label col-form-label">{{ 'Perfil administrador' }}</label>
                        <div class="col-sm-4">
                            <select class="select2 form-control custom-select" name="is_admin" id="is_admin" style="width: 100%; height:36px;" value="" {{ (Auth::user()->is_admin == 0) ? 'disabled' : '' }}>
                                @if ($Accion=='Alta')
                                    <option value="{{ 0 }}">NO</option>
                                    <option value="{{ 1 }}">SI</option>
                                @else
                                    @if ($user->is_admin == 0 )
                                        <option value="{{ 0 }}" selected>NO</option>
                                        <option value="{{ 1 }}">SI</option>
                                    @else
                                        <option value="{{ 0 }}">NO</option>
                                        <option value="{{ 1 }}" selected>SI</option>
                                    @endif
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
