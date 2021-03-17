
<div class="border-top">
    <div class="card-body">
        <button type="submit" class="btn btn-mewy">Aceptar</button>
        <a class="btn btn-mewy" href="{{url('/absences') }}">Cancel</a>
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
                <label for="user_id" class="col-sm-1 text-right control-label col-form-label">{{ 'Tipo de ausencia' }}</label>
                <div class="col-sm-5">

                    <select class="select2 form-control custom-select" name="hour_id" id="hour_id" style="width: 100%; height:36px;" value="">
                        @foreach ($hours as $hour)
                            @if ($Accion=='Alta')
                                <option value="{{ $hour->id }}">{{ $hour->name }}</option>
                            @else
                                @if ($absence->hour_id == $hour->id )
                                    <option value="{{ $hour->id }}" selected>{{ $hour->name }}</option>
                                @else
                                    <option value="{{ $hour->id }}">{{ $hour->name }}</option>
                                @endif
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="startdate" class="col-sm-1 text-right control-label col-form-label">{{ 'Fecha/hora desde' }}</label>
                <div class="col-sm-2">
                    <input type="date" class="form-control" name="startdate" id="startdate" value="{{ isset($absence->startdate)?$absence->startdate:'' }}" required>
                </div>
                <label for="enddate" class="col-sm-1 text-right control-label col-form-label">{{ 'Fecha/hora hasta' }}</label>
                <div class="col-sm-2">
                    <input type="date" class="form-control" name="enddate" id="enddate" value="{{ isset($absence->enddate)?$absence->enddate:'' }}" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="validate" class="col-sm-1 text-right control-label col-form-label">{{ 'Validada' }}</label>
                <div class="col-sm-2">
                    <select class="select2 form-control custom-select" name="validate" id="validate" style="width: 100%; height:36px;" value="" {{ (Auth::user()->is_admin == 0 || $Accion=='Alta') ? 'disabled' : '' }}>
                        @if ($Accion=='Alta')
                            <option value="{{ 0 }}">NO</option>
                        @else
                            @if ($absence->validate == 'SI' )
                                <option value="{{ 0 }}">NO</option>
                                <option value="{{ 1 }}" selected>SI</option>
                            @else
                                <option value="{{ 0 }}" selected>NO</option>
                                <option value="{{ 1 }}">SI</option>
                            @endif
                        @endif
                    </select>
                </div>
            </div>
            @if ($Accion=='Alta')
                <input type="hidden" class="form-control" name="created_at" id="created_at" value="{{ now() }}" required>
            @endif
            <input type="hidden" class="form-control" name="updated_at" id="updated_at" value="{{ now() }}" required>
        </div>
    </div>
</div>
