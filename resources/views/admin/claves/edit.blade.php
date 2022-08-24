@extends('layouts.main')

@section('titulo')
    Agregar nueva Clave
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
<form method="POST" action="{{ route('clave.update',$clave->id) }}">
{{ csrf_field() }}
{{ method_field('PUT') }}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Agregar Tipificacion de Emergencia</h6>
        </div>
        <div class="card-body">
            <div class="form-group row">
                    <div class="col-md-1">
                        <label for="clave">CLAVE</label>
                        <input id="clave" name="clave" class="form-control" autocomplete="off" autofocus
                        value="{{ $clave->clave }}"
                         required>
                    </div>
                    <div class="col-md-3">
                        <label for="descripcion">DESCRIPCION</label>
                        <input id="descripcion" name="descripcion" class="form-control" autocomplete="off"
                        value="{{ $clave->descripcion }}" 
                        required>
                    </div>                   
            </div>  
            <div class="form-group row">
                  <div class="col-md-1">
                            ASISTENCIA
                    <label class="switch checkbox-inline">
                        <input type="checkbox" name="asistencia" @if($clave->tipo=='A') checked="checked" @endif value="A">
                        <span class="slider round"></span>
                    </label>
                  </div>
                    <div class="col-md-1">
                    	ESTADO
		  				          <label class="switch checkbox-inline">
                            <input type="checkbox" name="estado"  @if($clave->estado=='A') checked="checked" @endif value="A">
		  					          <span class="slider round"></span>
		  				          </label>
		  			        </div>
                    <div class="col-md-1">
                        <label for="">Actualizar</label>
                        <button type="submit" class="btn btn-warning">Actualizar</button>
                    </div>
            </div>				
        </div>
    </div>
</form>                 
@endsection