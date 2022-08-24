<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClaveEmergencia;
use App\Models\AbonoAsistencia;

class ClaveEmergenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.claves.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.claves.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clave = new ClaveEmergencia();
        $clave->clave=$request->clave;
        $clave->descripcion=$request->descripcion;
        if(isset($request->asistencia)){
            $clave->tipo='A';
            $tipo="ASISTENCIA";
        }else{
            $clave->tipo='B';
            $tipo="ABONO ASISTENCIA";
        }

        $clave->save();

        session()->flash('success', 'El ha Generado una nueva Clave : '. $clave->clave.' de Tipo : '.$tipo);

        return redirect()->route('clave.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clave = ClaveEmergencia::FindOrFail($id);
        return view('admin.claves.edit')
                ->with('clave',$clave);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clave = ClaveEmergencia::FindOrFail($id);

        $clave->clave=$request->clave;
        $clave->descripcion=$request->descripcion;
        if(isset($request->asistencia)){
            $clave->tipo='A';
            $tipo="ASISTENCIA";
        }else{
            $clave->tipo='B';
            $tipo="ABONO ASISTENCIA";
        }
        if(isset($request->estado)){
            $clave->estado='A';
        }else{
            $clave->estado='I';
        }

        $clave->save();

        session()->flash('info', 'Se ha Actualizado la Clave : '. $clave->clave.' de Tipo : '.$tipo);

        return redirect()->route('clave.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function showClaves(){
        
        $clave = ClaveEmergencia::all();
        foreach($clave as $row){
            if($row->estado=='A'){
                $row->estado='Activo';
            }else{
                $row->estado='Inactivo';
            }
            if($row->tipo=='A'){
                $row->tipo='Asistencia';
            }else{
                $row->tipo='Abono Asistencia';
            }

         }
        $response = array(
            "aaData" => $clave
         );
        return response()->json($response);
    }
    public function showAbonos(){
        
        $abono = AbonoAsistencia::all();
        $response = array(
            "aaData" => $abono
         );
        return response()->json($response);
    }

    public function seetAbono(Request $request)
    {
        $abono = new AbonoAsistencia();
        $abono->cantidad=$request->cantidad;
        $abono->anio=$request->anio;

        $abono->save();

        session()->flash('success', 'El ha Generado una Cantidad de : '. $abono->cantidad.' Abono por Lista para el Año : '.$abono->anio);

        return redirect()->route('clave.index');
    }
}
