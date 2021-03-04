
<div class="border-top">
    <div class="card-body">
        <button type="submit" class="btn btn-mewy">Aceptar</button>
        @if ($Accion=='Alta')
            <button type="reset" class="btn btn-mewy">Limpiar</button>
        @endif
        <a class="btn btn-mewy" href="{{url('/users') }}">Cancel</a>
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
                            <input type="text" class="form-control" name="name" id="name" value="{{ isset($user->name)?$user->name:'' }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cif" class="col-sm-3 text-right control-label col-form-label">{{ 'DNI' }}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="cif" id="cif" value="{{ isset($user->cif)?$user->cif:'' }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="adress" class="col-sm-3 text-right control-label col-form-label">{{ 'Dirección' }}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="adress" id="adress" value="{{ isset($user->adress)?$user->adress:'' }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 text-right control-label col-form-label">{{ 'Teléfono' }}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control form-control phone-inputmask" name="phone" id="phone" value="{{ isset($user->phone)?$user->phone:'' }}" required>
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
                            <input type="file" class="form-control" name="photo" id="photo" value="{{ isset($user->photo)?$user->photo:'' }}">
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
                        <input type="email" class="form-control" name="email" id="email" value="{{ isset($user->email)?$user->email:'' }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 text-right control-label col-form-label">{{ 'Contraseña' }}</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="password" id="password" value="{{ isset($user->password)?$user->password:'' }}" required>
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
                    <label for="department" class="col-sm-3 text-right control-label col-form-label">{{ 'Departamento' }}</label>
                    <div class="col-sm-9">
                        <select class="select2 form-control custom-select" id="department" style="width: 100%; height:36px;" value="{{ isset($user->department)?$user->department:'' }}" required>
                            <option>Select</option>
                            <option value="1">{{ 'Recursos Humanos' }}</option>
                            <option value="2">{{ 'Informática' }}</option>
                            <option value="3">{{ 'Dirección' }}</option>
                            <option value="4">{{ 'Administración' }}</option>
                            <option value="5">{{ 'Ventas' }}</option>
                            <option value="6">{{ 'Logística' }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="createdate" class="col-sm-3 text-right control-label col-form-label">{{ 'Fecha de alta' }}</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control date-inputmask" id="createdate"  value="{{ isset($user->created_at)?$user->created_at:'' }}" disabled>
                    </div>
                    <label for="lowdate" class="col-sm-3 text-right control-label col-form-label">{{ 'Fecha de baja' }}</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control date-inputmask" id="lowdate" value="{{ isset($user->lowdate)?$user->lowdate:'' }}" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
