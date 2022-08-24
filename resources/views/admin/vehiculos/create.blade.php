@extends('layouts.main')

@section('titulo')
    Crear Material Mayor
@endsection
@section('content')
<form method="POST" action="{{ route('vehiculo.store') }}">
{{ csrf_field() }}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Nuevo Material Mayor</h6>
        </div>
        <div class="card-body">
            <div class="form-group row">
                    <div class="col-md-1">
                        <label for="patente">PATENTE</label>
                        <input id="patente" name="patente" class="form-control" autocomplete="off" autofocus required>
                    </div>
                    <div class="col-md-1">
                        <label for="clave">CLAVE</label>
                        <input id="clave" name="clave" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="col-md-2">
                        <label for="modelo">MODELO</label>
                        <input id="modelo" name="modelo" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="col-md-2">
                        <label for="marca">MARCA</label>
                        <input id="marca" name="marca" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="col-md-1">
                        <label for="anio">AÑO</label>
                        <input id="anio" name="anio" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="col-md-3">
                        <label for="cia">DOTACION</label>
                        <select id="cia" name="cia" class="form-control" required>
                            <option value="">--Seleccione--</option>
                            @foreach($cia as $key)
                                <option value="{{ $key->id }}"> {{ $key->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="orden">ORDEN</label>
                        <select id="orden" name="orden" class="form-control" required>
                            <option value="">--Seleccione--</option>
                                <option value="1">PRIMERO</option>
                                <option value="2">SEGUNDO</option>
                                <option value="3">TERCERO</option>
                                <option value="4">CUARTO</option>
                        </select>
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