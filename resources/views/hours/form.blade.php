
<div class="border-top">
    <div class="card-body">
        <button type="submit" class="btn btn-mewy">Aceptar</button>
        <a class="btn btn-mewy" href="{{url('/hours') }}">Cancel</a>
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
                <label for="user_id" class="col-sm-1 text-right control-label col-form-label">{{ 'Descripción' }}</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" id="name" value="{{ isset($hour->name)?$hour->name:'' }}" required>
                </div>
            </div>
            @if ($Accion=='Alta')
                <input type="hidden" class="form-control" name="created_at" id="created_at" value="{{ now() }}" required>
            @endif
            <input type="hidden" class="form-control" name="updated_at" id="updated_at" value="{{ now() }}" required>
        </div>
    </div>
</div>
