<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Cia;
class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.vehiculos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cia = Cia::all();
        return view('admin.vehiculos.create')
                ->with('cia',$cia);
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
            'patente' => 'required',
            'clave' => 'required|string',
            'modelo' => 'required',
            'marca' => 'required',
            'anio' => 'required',
            'cia' => 'required',
            'orden' => 'required'
        ]);

        $veh = new Vehiculo();

        $veh->patente=strtoupper($request->patente);
        $veh->clave=strtoupper($request->clave);
        $veh->modelo=strtoupper($request->modelo);
        $veh->marca=strtoupper($request->marca);
        $veh->anio=$request->anio;
        $veh->cia_id=$request->cia;
        $veh->orden=$request->orden;
        
        $veh->save();

        session()->flash('success', 'Material Mayor Patente : '.$veh->patente.' Clave : '. $veh->clave .' ha sido creado con Exito!');

        return redirect()->route('vehiculo.index');

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
        $veh = Vehiculo::FindOrFail($id);
        $cia = Cia::all();
        return view('admin.vehiculos.edit')
                ->with('cia',$cia)
                ->with('veh',$veh);
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
        $veh = Vehiculo::FindOrFail($id);

        $veh->patente=strtoupper($request->patente);
        $veh->clave=strtoupper($request->clave);
        $veh->modelo=strtoupper($request->modelo);
        $veh->marca=strtoupper($request->marca);
        $veh->anio=$request->anio;
        $veh->cia_id=$request->cia;
        $veh->orden=$request->orden;

        if(isset($request->estado)){
            $veh->estado='A';
        }else{
            $veh->estado='I';
        }
        
        $veh->save();

        session()->flash('success', 'Material Mayor Patente : '.$veh->patente.' Clave : '. $veh->clave .' ha sido actualizado con Exito!');

        return redirect()->route('vehiculo.index');
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
    public function showVehiculos(){

        $veh = Vehiculo::all();
        foreach($veh as $row){
           $row->dotacion = $row->cia->nombre;
           if($row->estado =='A'){
                $row->estado ="En Servicio";
           }else{
                $row->estado ="Fuera de Servicio";
           }
        }
        $response = array(
            "aaData" => $veh
         );
        return response()->json($response);
    }
}
