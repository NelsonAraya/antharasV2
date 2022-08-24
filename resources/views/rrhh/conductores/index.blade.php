@extends('layouts.main')
@section('titulo')
    Lista de Conductores
@endsection
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">RRHH Conductores</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tbl_rrhh" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Rut </th>
                        <th>Dotacion</th>
                        <th>Cargo Actual</th>
                        <th>Acciones</th>
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
  $('#tbl_rrhh').DataTable({
    ajax: "{{route('conductor.all')}}",
    columns: [
            {    "data": null,
                 render: function ( data, type, row ) {
                    return "<img class='img-profile rounded-circle' src='{{ asset('plugins/img/profile.svg') }}'  style='max-height: 50px; max-width: 50px;'> " + row.nombreSimple ;
                }
             },
            { data: 'runCompleto' },
            { data: 'nom_cia' },
            { data: 'nom_cargo' },
            {    "data": null,
                 "width": "10%",
                 render: function ( data, type, row ) {

                    let x= '<a href="{{ route("conductor.show", "xid" ) }}" class="btn btn-success justify-content-center"><i class="fas fa-fw fa-list"></i></a><a href="#" class="btn btn-info justify-content-center"><i class="fas fa-fw fa-eye"></i></a>';
                    let botones = x.replace('xid',row.id);
                   return botones;
                }
             },
             
    ]
  });
});
</script>
@endsection