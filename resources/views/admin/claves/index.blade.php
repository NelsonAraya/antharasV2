@extends('layouts.main')
@section('titulo')
    Clasificacion de Emergencias 
@endsection
@section('content')
<div class="form-group col-md-2">
    <a href="{{ route('clave.create') }}" class="btn btn-info" role="button">Nueva Clave</a>
</div>
<div class="row">
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Listado de clasificacion de Emergencias</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tbl_claves" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Clave</th>
                                <th>Descripcion </th>
                                <th>Estado</th>
                                <th>Tipo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Cantidad de Abonos por lista </h6>
            </div>
            <div class="card-body">
                <form method="POST" id="myform" action="{{ route('clave.setabono') }}">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="cantidad">CANTIDAD</label>
                            <input id="cantidad" name="cantidad" class="form-control" autocomplete="off" autofocus required>
                        </div>
                        <div class="col-md-3">
                            <label for="anio">AÑO</label>
                            <input id="anio" date="year" name="anio" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="col-md-1">
                            <label for="">Agregar</label>
                            <button type="submit" class="btn btn-success">Agregar</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered" id="tbl_abono" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Cantidad</th>
                                <th>Año </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>   
</div>                      
                   
@endsection
@section('js')
<script>
$(document).ready(function() {
  $('#tbl_claves').DataTable({
    ajax: "{{route('clave.all')}}",
    columns: [
            { data: 'clave' },
            { data: 'descripcion' },
            { data: 'estado' },
            { data: 'tipo' },
            {    "data": null,
                 "width": "10%",
                 render: function ( data, type, row ) {

                    let x= '<a href="{{ route("clave.edit", "xid" ) }}" class="btn btn-success justify-content-center"><i class="fas fa-fw fa-edit"></i></a>';
                    let botones = x.replace('xid',row.id);
                   return botones;
                }
             },
             
    ]
  });

  $('#tbl_abono').DataTable({
    ajax: "{{route('clave.abono')}}",
    columns: [
            { data: 'cantidad' },
            { data: 'anio' }
             
    ]
  });


});
</script>
@endsection