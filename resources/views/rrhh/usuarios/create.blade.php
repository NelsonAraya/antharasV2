@extends('layouts.main')

@section('titulo')
    Crear usuario
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
<form method="POST" id="myform" action="{{ route('usuario.store') }}">
{{ csrf_field() }}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Nuevo Ingreso</h6>
        </div>
        <div class="card-body">
            <div class="form-group row">
                    <div class="col-md-2">
                        <label for="run">RUN</label>
                        <input id="run" name="run" class="form-control" autocomplete="off" autofocus required>
                    </div>
                    <div class="col-md-1">
                        <label for="rol">ROL</label>
                        <input id="rol" name="rol" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="col-md-3">
                        <label for="nombres">NOMBRES</label>
                        <input id="nombres" name="nombres" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="col-md-2">
                        <label for="paterno">PATERNO</label>
                        <input id="paterno" name="apellidop" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="col-md-2">
                        <label for="materno">MATERNO</label>
                        <input id="materno" name="apellidom" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="col-md-2">
                        <label for="nacimiento">NACIMIENTO</label>
                        <input type="date" name="fecha_nacimiento" id="nacimiento" class="form-control" required>	
                    </div>
            </div>
            <div class="form-group row">
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
                        <label for="fono">TELEFONO</label>
                        <input id="fono" name="telefono" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="col-md-4">
                        <label for="dire">DIRECCION</label>
                        <input id="dire" name="direccion" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="col-md-3">
                        <label for="mail">EMAIL</label>
                        <input id="mail" name="email" class="form-control" autocomplete="off" required>
                    </div>
            </div>    
            <div class="form-group row">
                    <div class="col-md-3">
                        <label for="cargo">CARGO</label>
                        <select id="cargo" name="cargo" class="form-control" required>
                            <option value="">--Seleccione--</option>
                            @foreach($cargo as $key )
                                <option value="{{ $key->id }}"> {{ $key->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="sanguineo">GRUPO SANGUINEO</label>
                        <select id="sanguineo" name="sanguineo" class="form-control" required>
                            <option value="">--Seleccione--</option>
                            @foreach($sanguineo as $key )
                                <option value="{{ $key->id }}"> {{ $key->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="licencia">LICENCIA</label>
                        <input type="date" name="fecha_licencia" id="licencia" class="form-control">	
                    </div>
                    <div class="col-md-2">
                        <label for="ingreso">INGRESO CB</label>
                        <input type="date" name="fecha_ingreso" id="ingreso" class="form-control" required>	
                    </div>		
            </div>
            <div class="form-group row">
                    <div class="col-md-1">
                    	OPERATIVO
		  				<label class="switch checkbox-inline">
                            <input type="checkbox" name="operativo" value="S">
		  					<span class="slider round"></span>
		  				</label>
		  			</div>
                    <div class="col-md-1">
                    	CONDUCTOR
		  				<label class="switch checkbox-inline">
                            <input type="checkbox" name="conductor" value="S">
		  					<span class="slider round"></span>
		  				</label>
		  			</div>
                    <div class="col-md-1">
                        <label for="">Registrar</label>
                        <button type="submit" class="btn btn-success">Registrar</button>
                    </div>
            </div>				
        </div>
    </div>
</form>                 
@endsection