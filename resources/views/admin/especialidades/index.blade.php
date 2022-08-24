@extends('layouts.main')
@section('titulo')
    Especialidades
@endsection
@section('content')
<div class="form-group col-md-2">
    <a href="{{ route('especialidad.create')}}" class="btn btn-info" role="button">Nueva Especialidad</a>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Listado de Especialidad</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tbl_esp" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Descripcion </th>
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
  $('#tbl_esp').DataTable({
    ajax: "{{route('especialidad.all')}}",
    columns: [
            { data: 'codigo' },
            { data: 'descripcion' },
            {    "data": null,
                 "width": "10%",
                 render: function ( data, type, row ) {

                    let x= '<a href="{{ route("especialidad.edit", "xid" ) }}" class="btn btn-success justify-content-center"><i class="fas fa-fw fa-cog"></i></a><a href="{{ route("especialidad.show", "xid2" ) }}" class="btn btn-primary justify-content-center"><i class="fas fa-fw fa-list"></i></a>';
                    let botones = x.replace('xid',row.id).replace('xid2',row.id);
                   return botones;
                }
             },
             
    ]
  });
});
</script>
@endsection