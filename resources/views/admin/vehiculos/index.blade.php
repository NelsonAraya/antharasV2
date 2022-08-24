@extends('layouts.main')
@section('titulo')
    Lista de Material Mayor
@endsection
@section('content')
<div class="form-group col-md-2">
    <a href="{{ route('vehiculo.create')}}" class="btn btn-info" role="button">Nuevo Material Mayor</a>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Material Mayor</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tbl_vehiculo" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Patente</th>
                        <th>Clave </th>
                        <th>Modelo</th>
                        <th>Marca</th>
                        <th>Cia Asignada</th>
                        <th>Estado</th>
                        <th>Accion</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>                    
@endsection
@section('js')
<script>
$(document).ready(function() {
  $('#tbl_vehiculo').DataTable({
    ajax: "{{route('vehiculo.all')}}",
    columns: [
            { data: 'patente' },
            { data: 'clave' },
            { data: 'modelo' },
            { data: 'marca' },
            { data: 'dotacion' },
            { data: 'estado' },
            {    "data": null,
                 "width": "10%",
                 render: function ( data, type, row ) {

                    let x= '<a href="{{ route("vehiculo.edit", "xid" ) }}" class="btn btn-success justify-content-center"><i class="fas fa-fw fa-cog"></i></a>';
                    let botones = x.replace('xid',row.id);
                   return botones;
                }
             },
             
    ]
  });
});
</script>
@endsection