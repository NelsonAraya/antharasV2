@extends('layouts.main')

@section('titulo')
    Crear Emergencia
@endsection

@section('content')
<form method="POST" id="myform" action="{{ route('emergencia.store') }}">
{{ csrf_field() }}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Nueva Emergencia ANTHARAS</h6>
        </div>
        <div class="card-body">
            <div class="form-group row">
                    <div class="col-md-2">
                        <label for="fecha">FECHA</label>
                        <input id="fecha" name="fecha" type="date" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="col-md-1">
                        <label for="hora">HORA</label>
                        <input id="hora" type="time" name="hora" class="form-control" autocomplete="off" required>
                    </div>
                    <div class="col-md-9">
                        <label for="direccion">DIRECCION</label>
                        <input id="direccion" name="direccion" class="form-control" autocomplete="off" required>
                    </div>
            </div>
            <div class="form-group row">
                    <div class="col-md-2">
                        <label for="clave">CLAVE EMERGENCIA</label>
                        <select id="clave" name="clave" class="form-control" required>
                            <option value="">--Seleccione--</option>
                            @foreach($clave as $key)
                                <option value="{{ $key->id }}"> {{ $key->clave }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="comuna">COMUNA</label>
                        <select id="comuna" name="comuna" class="form-control" required>
                            <option value="">--Seleccione--</option>
                            <option value="IQUIQUE">IQUIQUE</option>
                            <option value="ALTO HOSPICIO">ALTO HOSPICIO</option>
                            <option value="CAMIÑA">CAMIÑA</option>
                            <option value="COLCHANE">COLCHANE</option>
                            <option value="HUARA">HUARA</option>
                            <option value="PICA">PICA</option>
                            <option value="POZO ALMONTE">POZO ALMONTE</option>
                        </select>
                    </div>              
            </div> 
            <div class="form-group row">
				<div class="col-md-12">
					<label for="cias">COMPAÑIAS ASISTENTES</label>
					<select id="cias" data-placeholder="Seleccione Compañias Asistentes" 
					name="cia[]" class="form-control chosen-container" multiple>
						@foreach($cia as $key)
                            @if($key->numero!=100)
							    <option  value="{{ $key->id }}"> {{ $key->nombre }}</option>
                            @endif
						@endforeach
					</select>
				</div>
			</div>
            <div class="form-group row">
				<div class="col-md-12">
					<label for="unis">UNIDADES ASISTENTES</label>
					<select id="unis" data-placeholder="Seleccione Unidades Asistentes" 
					name="uni[]" class="form-control chosen-container" multiple>
						@foreach($veh as $key)
                            @if($key->uniActiva())
							    <option  value="{{ $key->id }}"> {{ $key->clave }}</option>
                            @endif
						@endforeach
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
@section('js')
<script>
	$("#cias").chosen({
		width: "100%"
	});
    $("#unis").chosen({
		width: "100%"
	});  
</script>
@endsection