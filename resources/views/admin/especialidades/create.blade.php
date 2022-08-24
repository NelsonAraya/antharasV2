@extends('layouts.main')

@section('titulo')
    Nueva Especialidad
@endsection

@section('content')
<form method="POST" action="{{ route('especialidad.store')}}">
{{ csrf_field() }}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Agregar Especialidad </h6>
        </div>
        <div class="card-body">
            <div class="form-group row">
                    <div class="col-md-1">
                        <label for="codigo">CODIGO</label>
                        <input id="codigo" name="codigo" class="form-control" autocomplete="off" autofocus
                         required>
                    </div>
                    <div class="col-md-3">
                        <label for="descripcion">DESCRIPCION</label>
                        <input id="descripcion" name="descripcion" class="form-control" autocomplete="off" 
                        required>
                    </div>                   
            </div>  
            <div class="form-group row">
                    <div class="col-md-1">
                        <label for="">Guardar </label>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
            </div>				
        </div>
    </div>
</form>                 
@endsection