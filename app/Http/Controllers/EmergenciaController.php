<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClaveEmergencia;
use App\Models\Vehiculo;
use App\Models\Cia;
use App\Models\Emergencia;
use App\Models\EmergenciaCia;
use App\Models\EmergenciaUnidad;
use Illuminate\Support\Facades\Auth;
class EmergenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('emergencia.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clave = ClaveEmergencia::all();
        $cia = Cia::all();
        $veh = Vehiculo::all();
        return view('emergencia.create')
                ->with('clave',$clave)
                ->with('cia',$cia)
                ->with('veh',$veh);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required',
            'hora' => 'required',
            'direccion' => 'required',
            'clave' => 'required',
            'comuna' => 'required'
        ]);

        $eme = new Emergencia();
        $eme->fecha_emergencia = $request->fecha;
        $eme->hora_emergencia = $request->hora;
        $eme->direccion = $request->direccion;
        $eme->usuario_id = Auth::user()->id;
        $eme->clave_id = $request->clave;
        $eme->comuna = $request->comuna;
        $eme->save();

        foreach ($request->cia as  $row) {
            $eme_cia = new EmergenciaCia();
            $eme_cia->emergencia_id=$eme->id;
            $eme_cia->cia_id=$row;
            $eme_cia->save();
        }

        foreach ($request->uni as  $row) {
            $uni_cia = new EmergenciaUnidad();
            $uni_cia->emergencia_id=$eme->id;
            $uni_cia->vehiculo_id=$row;
            $uni_cia->save();
        }

        session()->flash('info', 'Emergencia ha sido creada Con Exito!!');

        return redirect()->route('emergencia.index');


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
        //
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
        //
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
    public function showEmergencia(){
        $eme = Emergencia::all();
        foreach($eme as $row){
           $row->clave_nombre = $row->clave->clave;
        }
        $response = array(
            "aaData" => $eme
         );
        return response()->json($response);
    }
}
