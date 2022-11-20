@extends('layouts.main')
@section('titulo')
    Lista de Emergencias
@endsection
@section('content')
<div class="form-group col-md-2">
    <a href="{{ route('emergencia.create') }}" class="btn btn-info" role="button">Nueva Emergencia</a>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Listado de Emergencias ANTHARAS</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tbl_emergencia" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Clave</th>
                        <th>Fecha </th>
                        <th>Hora</th>
                        <th>Direccion</th>
                        <th>Compañias</th>
                        <th>Partes</th>
                        <th>Ver</th>
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
  $('#tbl_emergencia').DataTable({

    ajax: "{{route('emergencia.all')}}",
    columns: [
            { data: 'clave_nombre' },
            { data: 'fecha_emergencia' },
            { data: 'hora_emergencia' },
            { data: 'direccion' },
            { data: 'comuna' },
            { data: 'comuna' },
            {    "data": null,
                 "width": "10%",
                 render: function ( data, type, row ) {

                    let x= '<a href="{{ route("usuario.rol", "permiso" ) }}" class="btn btn-warning justify-content-center"><i class="fas fa-fw fa-cog"></i></a><a href="{{ route("usuario.edit", "xid" ) }}" class="btn btn-success justify-content-center"><i class="fas fa-fw fa-edit"></i></a><a href="#" class="btn btn-info justify-content-center"><i class="fas fa-fw fa-eye"></i></a><a href="{{ route("usuario.especialidad", "xid2" ) }}" class="btn btn-primary justify-content-center"><i class="fas fa-fw fa-list"></i></a>';
                    let botones = x.replace('xid',row.id).replace('xid2',row.id).replace('permiso',row.id);
                   return botones;
                }
             },
            ]
  });
});
</script>
@endsection