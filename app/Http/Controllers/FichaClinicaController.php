<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enfermedad;
use App\Models\FichaClinica;
use App\Models\Usuario;
class FichaClinicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usu = Usuario::all();
        return view ('admin.fichas.index')
                    ->with('usu',$usu);
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
        $usu = Usuario::FindOrFail($id);
        $enf = Enfermedad::all();
        return view('admin.fichas.edit')
                ->with('usu',$usu)
                ->with('enf',$enf);
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
        $usu = Usuario::FindOrFail($id);
        if($usu->fichaClinica==null){
            $ficha = new FichaClinica();
            $ficha->peso = $request->peso;
            $ficha->talla = $request->talla;
            $ficha->imc = $request->imc;
            $ficha->quirurgicos = $request->quiru;
            $ficha->alergias = $request->alergia;
            $ficha->tratamientos = $request->trata;
            $ficha->otras = $request->otras;
            $ficha->contacto1 = $request->contacto1;
            $ficha->fono1 = $request->fono1;
            $ficha->contacto2 = $request->contacto2;
            $ficha->fono2 = $request->fono2;
            $usu->fichaClinica()->save($ficha);
        }else{
            $usu->fichaClinica->peso = ($request->peso)? $request->peso: null;
            $usu->fichaClinica->talla = ($request->talla)? $request->talla: null;
            $usu->fichaClinica->imc = ($request->imc)? $request->imc: null;
            $usu->fichaClinica->quirurgicos = ($request->quiru)? $request->quiru: null;
            $usu->fichaClinica->alergias = ($request->alergia)? $request->alergia: null;
            $usu->fichaClinica->tratamientos = ($request->trata)? $request->trata: null;
            $usu->fichaClinica->otras = ($request->otras)? $request->otras: null;
            $usu->fichaClinica->contacto1 = ($request->contacto1)? $request->contacto1: null; 
            $usu->fichaClinica->fono1 = ($request->fono1)? $request->fono1: null;
            $usu->fichaClinica->contacto2 = ($request->contacto2)? $request->contacto2: null;
            $usu->fichaClinica->fono2 = ($request->fono2)? $request->fono2: null;
            $usu->fichaClinica->save();
        }
        $usu->save();
        
        $usu->enfermedades()->detach();

        foreach ((array)$request->enfermedad as $row){
              $usu->enfermedades()->attach($row);
        }

        session()->flash('success', 'Se ha Modificado Ficha Clinica al Usuario : '.$usu->nombreSimple());

        return redirect()->route('ficha.index');
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
    public function showEnfermedades(){
        $enfermedad = Enfermedad::all();
        return view ('admin.fichas.enfermedades')
                ->with('enf',$enfermedad);
    }
    public function newEnfermedad(){
        
        return view ('admin.fichas.newenfermedad');   
    }
    public function setEnfermedad(Request $request)
    {
        $request->validate([
            'enfermedad' => 'required|string'
        ]);
        $en = new Enfermedad();
        $en->nombre = strtoupper($request->enfermedad);
        $en->save();

        session()->flash('success', 'Enfermedad : '.$en->nombre.' ha sido creada con Exito!');

        return redirect()->route('enfermedad.all');
    }
    public function showEnfermedadUsuarios($id)
    {
        $enf = Enfermedad::FindOrFail($id);
        return view('admin.fichas.showenfermedad')
                ->with('enf',$enf);
    }
}
