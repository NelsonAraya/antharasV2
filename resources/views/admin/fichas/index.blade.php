@extends('layouts.main')
@section('titulo')
    Ficha Clinica
@endsection
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Listado de Usuarios</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tbl_rrhh" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Cargo Actual</th>
                        <th>Dotacion</th>
                        <th>Ver Ficha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usu as $row)
                        <tr>
                            <td>{{ $row->nombreSimple() }} </td>
                            <td>{{ $row->cargo->nombre }} </td>
                            <td>{{ $row->cia->nombreCompleto() }} </td>
                            <td width="10%"><a href="{{ route('ficha.edit',$row->id) }}" class="btn btn-info justify-content-center"><i class="fas fa-fw fa-eye"></i></a> </td>
                        </tr>                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>                    
@endsection
@section('js')
<script>
$(document).ready(function() {
  $('#tbl_rrhh').DataTable();
});
</script>
@endsection