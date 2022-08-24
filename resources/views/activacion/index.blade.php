@extends('layouts.main')
@section('titulo')
    Activacion de Unidades
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
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Unidades Asignadas </h6>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-3">
                        <label>
                            TIPO DE CONDUCTOR : @if($usu->tipo_conductor=='C') CUARTELERO @else BOMBERO @endif
                        </label>
                        <div class="btn-group">
                            <a 
                            @if($usu->tipo_conductor=='C')
                              href="{{ route('activacion.tipo',[$usu->id,'B']) }}"
                              class="btn btn-primary justify-content-center"
                              @else
                              href="#"
                              class="btn btn-primary justify-content-center disabled"
                            @endif
                              >BOMBERO</a>
                            <a 
                             @if($usu->tipo_conductor=='B')
                              href="{{ route('activacion.tipo',[$usu->id,'C']) }}"
                              class="btn btn-success justify-content-center"
                              @else
                              href="#"
                              class="btn btn-success justify-content-center disabled"
                            @endif
                             >CUARTELERO</a>
                        </div>
                    </div>
                </div>               
                @foreach($usu->vehiculos as $row)
                    <div class="row">
                        <div class="col-xl-8 col-lg-7">
                            <div class="card mb-4 py-3 border-bottom-primary">
                                <div class="card-body">
                                    <label>UNIDAD : </label> <label class=" font-weight-bold text-primary">{{ $row->clave }}</label>
                                    <br>
                                    <label>CONDUCTOR: 
                                       @if($row->lastActivacion()!== null )
                                         @if($row->lastActivacion()->estado=='S') 
                                        <label class=" font-weight-bold">  {{ $row->lastActivacion()->usuario->nombreSimple() }} </label>
                                          @endif 
                                      @endif 
                                    </label>
                                    <br>  
                                    <label>ESTADO:</label> 
                                      @if($row->lastActivacion()!== null )
                                         @if($row->lastActivacion()->estado=='S') 
                                         <label class=" font-weight-bold text-success">  ACTIVADA</label> 
                                          @else
                                          <label class=" font-weight-bold text-danger">  DESACTIVADA</label>
                                          @endif
                                       @else
                                          <label class=" font-weight-bold text-danger">  DESACTIVADA</label>
                                      @endif 
                                    <br>
                                    <a 
                                    @if($row->lastActivacion()!== null )
                                       @if($row->lastActivacion()->estado=='N')
                                          href="{{ route('activacion.activacion',[$usu->id,$row->id,'S']) }}"
                                          class="btn btn-success justify-content-center"
                                        @else
                                          href="#"
                                          class="btn btn-success justify-content-center disabled"
                                       @endif
                                    @endif
                                     >ACTIVAR</a>
                                    <a 
                                     @if($row->lastActivacion()!== null )
                                        @if($row->lastActivacion()->estado=='S')
                                          href="{{ route('activacion.activacion',[$usu->id,$row->id,'N']) }}"
                                          class="btn btn-danger justify-content-center"
                                        @else
                                          href="#"
                                          class="btn btn-danger justify-content-center disabled"
                                        @endif
                                     @endif                                    
                                     >DESACTIVAR</a>
                                    <a @if($row->lastActivacion()!== null )
                                        @if($row->lastActivacion()->estado=='S')
                                          href="#"
                                          class="btn btn-warning justify-content-center"
                                        @else
                                          href="#"
                                          class="btn btn-warning justify-content-center disabled"
                                        @endif
                                     @endif   
                                     >CAMBIO</a>
                                </div>
                            </div>
                         </div>   
                    </div>
                @endforeach
            </div>
        </div>                                     
@endsection
