@extends('layouts.main')
@section('titulo')
    Enfermedades 
@endsection
@section('content')
<div class="form-group col-md-2">
    <a href="{{ route('enfermedad.new')}}" class="btn btn-info" role="button">Nueva Enfermedad</a>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Listado de Enfermedades</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="tbl_enfermedad" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Enfermedad</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                 <tbody>
                    @foreach($enf as $row)
                        <tr>
                            <td>{{ $row->nombre }} </td>
                            <td width="10%"><a href="{{ route('enfermedad.usuario',$row->id) }}" class="btn btn-info justify-content-center"><i class="fas fa-fw fa-eye"></i></a> </td>
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
  $('#tbl_enfermedad').DataTable();
});
</script>
@endsection