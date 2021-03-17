
<div class="border-top">
    <div class="card-body">
        <button type="submit" class="btn btn-mewy">Aceptar</button>
        <a class="btn btn-mewy" href="{{url('/departments') }}">Cancel</a>
    </div>
    <div class="card-body">
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
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="form-group row">
                <label for="user_id" class="col-sm-1 text-right control-label col-form-label">{{ 'Responsable' }}</label>
                <div class="col-sm-6">

                    <select class="select2 form-control custom-select" name="user_id" id="user_id" style="width: 100%; height:36px;" value="">
                        {{-- <option value="">{{ Seleccionar responsable de departamento... }}</option> --}}
                        @foreach ($users as $user)
                            @if ($Accion=='Alta')
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @else
                                @if ($department->user_id == $user->id )
                                    <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                @else
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endif
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="user_id" class="col-sm-1 text-right control-label col-form-label">{{ 'Descripción' }}</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" id="name" value="{{ isset($department->name)?$department->name:'' }}" required>
                </div>
            </div>
            @if ($Accion=='Alta')
                <input type="hidden" class="form-control" name="created_at" id="created_at" value="{{ now() }}" required>
            @endif
            <input type="hidden" class="form-control" name="updated_at" id="updated_at" value="{{ now() }}" required>
        </div>
    </div>
</div>
