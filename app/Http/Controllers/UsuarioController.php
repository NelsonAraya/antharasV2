<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Cia;
use App\Models\Cargo;
use App\Models\Vehiculo;
use App\Models\Especialidad;
use App\Models\Role;
use App\Models\GrupoSanguineo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rrhh.usuarios.index');
    }
    public function indexConductor()
    {
        return view('rrhh.conductores.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cia = Cia::all();
        $cargo = Cargo::all();
        $sanguineo = GrupoSanguineo::all();
        return view('rrhh.usuarios.create')
                ->with('cia',$cia)
                ->with('cargo',$cargo)
                ->with('sanguineo',$sanguineo);
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
            'run' => 'required',
            'nombres' => 'required|string',
            'apellidop' => 'required',
            'apellidom' => 'required',
            'cia' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'cargo' => 'required',
            'fecha_nacimiento' => 'required',
            'fecha_ingreso' => 'required',
            'sanguineo' => 'required'
        ]);

        $usu = new Usuario();
        
        if(isset($request->conductor)){
            $usu->conductor='S';
        }else{
            $usu->conductor='N';
        }
        if(isset($request->operativo)){
            $usu->operativo='S';
        }else{
            $usu->operativo='N';
        }
        if(isset($request->email)){
            $usu->email = strtolower($request->email);
        }else{
            $usu->email= null;
        }

        if(isset($request->rol)){
            $usu->rol = $request->rol;
        }else{
            $usu->rol= null;
        }

        $usu->nombres = strtolower($request->nombres);
        $usu->apellidop = strtolower($request->apellidop);
        $usu->apellidom = strtolower($request->apellidom);
        $usu->direccion = strtolower($request->direccion);

        $run = str_replace('.','',$request->run);
        $run = str_replace('-','',$run);

        $dv = substr($run, -1);
        $id = substr($run, 0, -1);

        $usu->id=$id;
        $usu->dv= $dv;
        $usu->password =Hash::make($id);
        $usu->fecha_nacimiento = $request->fecha_nacimiento;
        $usu->telefono = $request->telefono;
        $usu->direccion = $request->direccion;
        $usu->cia_id = $request->cia;
        $usu->cargo_id = $request->cargo;
        $usu->fecha_ingreso = $request->fecha_ingreso;
        $usu->fecha_licencia = $request->fecha_licencia;
        $usu->sanguineo_id = $request->sanguineo;
        $usu->save();

        session()->flash('success', 'El usuario '.$usu->nombreSimple().' ha sido creado con Exito!');

        return redirect()->route('usuario.index');
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
        $usuario = Usuario::FindOrFail($id);
        $cia = Cia::all();
        $cargo = Cargo::all();
        $sanguineo = GrupoSanguineo::all();
        return view('rrhh.usuarios.edit')
                ->with('cia',$cia)
                ->with('cargo',$cargo)
                ->with('usu',$usuario)
                ->with('sanguineo',$sanguineo);
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
        $request->validate([
            'nombres' => 'required|string',
            'apellidop' => 'required',
            'apellidom' => 'required',
            'cia' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'cargo' => 'required',
            'fecha_nacimiento' => 'required',
            'fecha_ingreso' => 'required'
        ]);

        $usu = Usuario::FindOrFail($id);
        
        if(isset($request->conductor)){
            $usu->conductor='S';
        }else{
            $usu->conductor='N';
        }
        if(isset($request->operativo)){
            $usu->operativo='S';
        }else{
            $usu->operativo='N';
        }
        if(isset($request->email)){
            $usu->email = strtolower($request->email);
        }else{
            $usu->email= null;
        }

        if(isset($request->rol)){
            $usu->rol = $request->rol;
        }else{
            $usu->rol= null;
        }

        $usu->nombres = strtolower($request->nombres);
        $usu->apellidop = strtolower($request->apellidop);
        $usu->apellidom = strtolower($request->apellidom);
        $usu->direccion = strtolower($request->direccion);

        $usu->fecha_nacimiento = $request->fecha_nacimiento;
        $usu->telefono = $request->telefono;
        $usu->direccion = $request->direccion;
        $usu->cia_id = $request->cia;
        $usu->cargo_id = $request->cargo;
        $usu->fecha_ingreso = $request->fecha_ingreso;
        $usu->fecha_licencia = $request->fecha_licencia;
        $usu->save();

        session()->flash('info', 'El usuario '.$usu->nombreSimple().' ha sido modificado Con Exito!!');

        return redirect()->route('usuario.index');
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

    public function showUsuario(){
        $usu = Usuario::all();
        foreach($usu as $row){
           $row->nombreSimple = $row->nombreSimple();
           $row->runCompleto = $row->runCompleto();
           $row->nom_cia = $row->cia->nombre;
           $row->nom_cargo = $row->cargo->nombre;
        }
        $response = array(
            "aaData" => $usu
         );
        return response()->json($response);
    }
    public function showConductor(){
        $usu = Usuario::where('conductor','S')->orderBy('rol','Asc')->get();
        foreach($usu as $row){
           $row->nombreSimple = $row->nombreSimple();
           $row->runCompleto = $row->runCompleto();
           $row->nom_cia = $row->cia->nombre;
           $row->nom_cargo = $row->cargo->nombre;
        }
        $response = array(
            "aaData" => $usu
         );
        return response()->json($response);
    }
    public function myVehiculo($id){
        $usu = Usuario::FindOrFail($id);
        $veh = Vehiculo::all();
        return view('rrhh.conductores.show')
                ->with('usu',$usu)
                ->with('veh',$veh);
     }
     public function updateConductor(Request $request, $id){
        $usu = Usuario::FindOrFail($id);

        $usu->vehiculos()->detach();

        foreach ((array)$request->vehiculos as $row){
              $usu->vehiculos()->attach($row);
        }

        session()->flash('info', 'El usuario '.$usu->nombreSimple().' ha sido modificado Con Exito!!');

        return redirect()->route('conductor.index');
    }
    public function myEspecialidades($id){

        $usu = Usuario::FindOrFail($id);
        $esp = Especialidad::all();
        return view('rrhh.usuarios.especialidades')
                ->with('usu',$usu)
                ->with('esp',$esp);

    }
    public function updateEspecialidad(Request $request, $id){
        $usu = Usuario::FindOrFail($id);

        $usu->especialidades()->detach();

        foreach ((array)$request->especialidad as $row){
              $usu->especialidades()->attach($row);
        }

        session()->flash('info', 'Las Especialidades de '.$usu->nombreSimple().' han sido modificadas Con Exito!!');

        return redirect()->route('usuario.index');
    }
    public function login (Request $request){
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
 
            return redirect()->route('home');
        }else{

            session()->flash('danger', 'las Credenciales no coinciden !!!');

            return redirect()->route('usuario.login');
        }
        
    }
    public function logout(){

        Auth::logout();
        return redirect('/');

    }
    public function showLogin(){
        
        if (Auth::check()) {
           return redirect()->route('home');
        }else{
             return view('login');
        }
    }

    public function permisoUsuario($id){
        $usu = Usuario::FindOrFail($id);
        $rol = Role::all();
        return view('rrhh.usuarios.role')
                ->with('usu',$usu)
                ->with('rol',$rol);

    }

    public function updatePermiso(Request $request, $id){
        $usu = Usuario::FindOrFail($id);

        $usu->roles()->detach();

        foreach ((array)$request->roles as $row){
              $usu->roles()->attach($row);
        }

        session()->flash('info', 'Los Permisos de '.$usu->nombreSimple().' han sido modificados Con Exito!!');

        return redirect()->route('usuario.index');
    }
}
