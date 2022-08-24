@extends('layouts.main')

@section('titulo')
    Ficha Clinica 
@endsection

@section('content')
<form method="POST" action="{{ route('ficha.update',$usu->id) }}">
{{ csrf_field() }}
{{ method_field('PUT') }}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ficha Clinica  -- {{ $usu->nombreSimple()}} </h6>
        </div>
        <div class="card-body">
			<div class="form-group row">
				<div class="col-md-2">
					<label>RUN</label>
					<br>
					<span>{{ $usu->runCompleto() }}</span>
				</div>
				<div class="col-md-1">
					<label for="rol">ROL</label>
					<br>
					<span>{{ $usu->rol }}</span>
				</div>
				<div class="col-md-3">
					<label for="nombres">NOMBRE</label>
					<br>
					<span>{{ $usu->nombreSimple() }}</span>
				</div>
				<div class="col-md-2">
					<label for="nacimiento">NACIMIENTO</label>
					<br>
					<span>{{ date("d-m-Y", strtotime($usu->fecha_nacimiento)) }}</span>
				</div>
				<div class="col-md-2">
					<label for="cia">DOTACION</label>
					<br>
					<span> {{ $usu->cia->nombre.' N°'.$usu->cia->numero }} </span>
				</div>
				<div class="col-md-2">
					<label for="cargo">CARGO</label>
					<br>
					<span>{{ $usu->cargo->nombre }}</span>
				</div>
			</div>
            <div class="form-group row">				
				<div class="col-md-1">
					<label for="fono">EDAD</label>
					<br>
					<span>{{ $usu->edad() }}</span>
				</div>
				<div class="col-md-3">
					<label for="dire">DIRECCION</label>
					<br>
					<span>{{ $usu->direccion }}</span>
				</div>
				<div class="col-md-2">
					<label for="fono">TELEFONO</label>
					<br>
					<span>{{ $usu->telefono }}</span>
				</div>
				<div class="col-md-2">
					<label for="sanguineo">GRUPO SANGUINEO</label>
					<br>
					<span>{{ $usu->grupoSanguineo->nombre }}</span>
				</div>			
			</div>
			<div class="form-group row">
				<div class="col-md-1">
					<label for="peso">PESO</label>
					<input id="peso" name="peso" class="form-control" autocomplete="off"
					 value="@if($usu->fichaClinica != null ) {{ $usu->fichaClinica->peso }}  @endif">
				</div>
				<div class="col-md-1">
					<label for="talla">TALLA</label>
					<input id="talla" name="talla" class="form-control" autocomplete="off"
					value="@if($usu->fichaClinica != null ) {{ $usu->fichaClinica->talla }}  @endif">
				</div>
				<div class="col-md-1">
					<label for="imc">IMC</label>
					<input id="imc" name="imc" class="form-control" autocomplete="off"
					value="@if($usu->fichaClinica != null ) {{ $usu->fichaClinica->imc }}  @endif">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-4">
					<label for="ct1">NOMBRE CONTACTO</label>
					<input id="ct1" name="contacto1" class="form-control" autocomplete="off"
					value="@if($usu->fichaClinica != null ){{ $usu->fichaClinica->contacto1 }} @endif">
				</div>
				<div class="col-md-2">
					<label for="fono1">TELEFONO CONTACTO</label>
					<input id="fono1" name="fono1" class="form-control" autocomplete="off"
					value="@if($usu->fichaClinica != null ){{ $usu->fichaClinica->fono1 }} @endif">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-4">
					<label for="ct2">NOMBRE CONTACTO</label>
					<input id="ct2" name="contacto2" class="form-control" autocomplete="off"
					value="@if($usu->fichaClinica != null ){{ $usu->fichaClinica->contacto2 }} @endif">
				</div>
				<div class="col-md-2">
					<label for="fono2">TELEFONO CONTACTO</label>
					<input id="fono2" name="fono2" class="form-control" autocomplete="off"
					value="@if($usu->fichaClinica != null ){{ $usu->fichaClinica->fono2 }} @endif">
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-6">
					<label for="quiru">ANTECEDENTES QUIRURGICO</label>
  					<textarea class="form-control" name="quiru" rows="3" id="quiru" 
  					style="overflow:auto;resize:none">@if($usu->fichaClinica != null ) {{ $usu->fichaClinica->quirurgicos }}  @endif</textarea>
				</div>
				<div class="col-md-6">
					<label for="alergia">ALERGIAS</label>
  					<textarea class="form-control" name="alergia" rows="3" id="alergia" 
  					style="overflow:auto;resize:none">@if($usu->fichaClinica != null ){{ $usu->fichaClinica->alergias }}  @endif</textarea>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-12">
					<label for="trata">TRATAMIENTO FARMACOLOGICO</label>
  					<textarea class="form-control" name="trata" rows="3" id="trata" 
  					style="overflow:auto;resize:none">@if($usu->fichaClinica != null ) {{ $usu->fichaClinica->tratamientos }}  @endif</textarea>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-12">
					<label for="enfermedad">ENFERMEDADES</label>
					<select id="enfermedad" data-placeholder="Seleccione Enfermedades" 
					name="enfermedad[]" class="form-control chosen-container" multiple>
						@foreach($enf as $key)
							@php $control=false;  @endphp
							@foreach($usu->enfermedades as $row)
									 @if($row->id==$key->id)
									 	@php $control=true;  @endphp
									 @endif
								@endforeach
							<option @if($control) selected @endif value="{{ $key->id }}"> {{ $key->nombre }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-12">
					<label for="otras">OTRAS ENFERMEDADES</label>
  					<textarea class="form-control" name="otras" rows="3" id="otras" 
  					style="overflow:auto;resize:none">@if($usu->fichaClinica != null ) {{ $usu->fichaClinica->otras }}  @endif</textarea>
				</div>
			</div>
            <div class="form-group row">
                    <div class="col-md-1">
                        <label for="">Actualizar </label>
                        <button type="submit" class="btn btn-success">Actualizar</button>
                    </div>
            </div>				
        </div>
    </div>
</form>                 
@endsection
@section('js')
<script>
	$("#enfermedad").chosen({
		width: "100%"
	}); 
</script>
@endsection