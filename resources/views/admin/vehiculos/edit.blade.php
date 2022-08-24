@extends('layouts.main')

@section('titulo')
    Editar Material Mayor
@endsection
@section('css')
<style type="text/css">
	/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
@endsection
@section('content')
<form method="POST" action="{{ route('vehiculo.update',$veh->id) }}">
{{ csrf_field() }}
{{ method_field('PUT') }}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Editar Material Mayor</h6>
        </div>
        <div class="card-body">
            <div class="form-group row">
                    <div class="col-md-1">
                        <label for="patente">PATENTE</label>
                        <input id="patente" name="patente" class="form-control" autocomplete="off" autofocus
                        value="{{ $veh->patente }}"
                         required>
                    </div>
                    <div class="col-md-1">
                        <label for="clave">CLAVE</label>
                        <input id="clave" name="clave" class="form-control" autocomplete="off" 
                        value="{{ $veh->clave }}"
                        required>
                    </div>
                    <div class="col-md-2">
                        <label for="marca">MARCA</label>
                        <input id="marca" name="marca" class="form-control" autocomplete="off" 
                        value="{{ $veh->marca }}"
                        required>
                    </div>
                    <div class="col-md-2">
                        <label for="modelo">MODELO</label>
                        <input id="modelo" name="modelo" class="form-control" autocomplete="off"
                        value="{{ $veh->modelo }}"
                         required>
                    </div>
                    <div class="col-md-1">
                        <label for="anio">AÑO</label>
                        <input id="anio" name="anio" class="form-control" autocomplete="off" 
                        value="{{ $veh->anio }}"
                        required>
                    </div>
                    <div class="col-md-3">
                        <label for="cia">DOTACION</label>
                        <select id="cia" name="cia" class="form-control" required>
                            <option value="">--Seleccione--</option>
                            @foreach($cia as $key)
                                 @if($veh->cia_id== $key->id)
								    <option value="{{ $key->id }}" selected> {{ $key->nombre }}</option>
							    @else
								    <option value="{{ $key->id }}"> {{ $key->nombre }}</option>
							    @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="orden">ORDEN</label>
                        <select id="orden" name="orden" class="form-control" required>
                            <option value="">--Seleccione--</option>
                                <option value="1" @if($veh->orden=='1') selected  @endif >PRIMERO</option>
                                <option value="2" @if($veh->orden=='2') selected  @endif >SEGUNDO</option>
                                <option value="3" @if($veh->orden=='3') selected  @endif >TERCERO</option>
                                <option value="4" @if($veh->orden=='4') selected  @endif >CUARTO</option>
                        </select>
                    </div>
                    
            </div>  
            <div class="form-group row">
                <div class="col-md-1">
                    	ACTIVO
                    <label class="switch checkbox-inline">
                    <input type="checkbox" name="estado"  @if($veh->estado=='A') checked="checked" @endif value="A">
                      <span class="slider round"></span>
                    </label>
		  			    </div>
                <div class="col-md-1">
                      <label for="">Actualizar </label>
                      <button type="submit" class="btn btn-warning">Actualizar</button>
                </div>
            </div>				
        </div>
    </div>
</form>                 
@endsection