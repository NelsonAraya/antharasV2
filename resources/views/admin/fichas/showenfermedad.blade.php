@extends('layouts.main')
@section('titulo')
    Enfermedades
@endsection
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Usuarios de Enfermedad -- {{ $enf->nombre }}</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tbl" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Cargo </th>
                        <th>Dotacion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($enf->usuarios as $row)
                        <tr>
                            <td>{{ $row->nombreSimple() }} </td>
                            <td>{{ $row->cargo->nombre }} </td>
                            <td>{{ $row->cia->nombreCompleto() }} </td>
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
  $('#tbl').DataTable();
});
</script>
@endsection