<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Activacion;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\Auth;

class ActivacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Usuario::FindOrFail(Auth::user()->id);
        return view ('activacion.index')
                ->with('usu',$usuario);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function activacion($id,$veh,$estado){
        $vehiculo = Vehiculo::FindOrFail($veh);
        $usu = Usuario::FindOrFail($id);
        $acti = new Activacion();

        $acti->usuario_id=$id;
        $acti->vehiculo_id=$veh;
        $acti->estado=$estado;
        $acti->tipo_activacion=$usu->tipo_conductor;
        $acti->save();

        $vehiculo->activacion=$estado;
        $vehiculo->save();

        $usu->activado = $estado;
        $usu->activado_conductor = $estado;
        $usu->save();

        if($estado == 'S'){
            $a="Activado";
        }else{
            $a="Desactivado";
        }

        session()->flash('info', 'Unidad '.$vehiculo->clave.' ha sido '.$a.' correctamente');
     
        return redirect()->route('activacion.index');

    }
    public function tipoConductor($usuario,$tipo){
        
        $u = Usuario::FindOrFail($usuario);
        $u->tipo_conductor = $tipo;
        $u->save();
        if($tipo=='C'){
           $t="Cuartelero";
        }
        else {
            $t="Bombero";
        }
        session()->flash('info', 'Su estado de Conductor ahora es '.$t);

       return redirect()->route('activacion.index');
       
   }
   public function cambioConductor($id,$veh){

    $usu = Usuario::FindOrFail($id);
    $usu_cambio = Usuario::FindOrFail(Auth::user()->id);
    $acti = new Activacion();
    $new_acti = new Activacion();
    $vehiculo = Vehiculo::FindOrFail($veh);

    $acti->usuario_id=$id;
    $acti->vehiculo_id=$veh;
    $acti->estado='C';
    $acti->usuario_cambio_id=Auth::user()->id;
    $acti->tipo_activacion=$usu->tipo_conductor;
    $acti->save();

    $new_acti->usuario_id=Auth::user()->id;
    $new_acti->vehiculo_id=$veh;
    $new_acti->estado='S';
    $new_acti->tipo_activacion=Auth::user()->tipo_conductor;
    $new_acti->save();

    $usu->activado = 'N';
    $usu->activado_conductor ='N';
    $usu->save();

    $usu_cambio->activado = 'S';
    $usu_cambio->activado_conductor = 'S';
    $usu_cambio->save();

    session()->flash('info', 'Ha realizado un cambio de Conductor  Unidad :'.$vehiculo->clave);
 
    return redirect()->route('activacion.index');

}   
}
