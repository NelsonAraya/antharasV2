@extends('layouts.main')

@section('titulo')
    nueva Enfermedad
@endsection
@section('content')
<form method="POST" action="{{ route('enfermedad.setenfermedad') }}">
{{ csrf_field() }}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Nueva Enfermedad </h6>
        </div>
        <div class="card-body">
            <div class="form-group row">
                    <div class="col-md-1">
                        <label for="enfermedad">ENFERMEDAD</label>
                        <input id="enfermedad" name="enfermedad" class="form-control" autocomplete="off" autofocus required>
                    </div>    
            </div>  
            <div class="form-group row">
                    <div class="col-md-1">
                        <label for="">Registrar</label>
                        <button type="submit" class="btn btn-success">Registrar</button>
                    </div>
            </div>				
        </div>
    </div>
</form>                 
@endsection