<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Persona;


class PersonaController extends Controller
{
    private $path = 'persona';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
     {
         $this->middleware('auth');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
            $data = Persona::all();
            return view($this->path.'.index', compact('data'));
    
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->path.'.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $persona = new Persona();
            $persona->nombres = $request->nombres;        
            $persona->apellidos =$request->apellidos;
            $persona->email = $request->email;
            $persona->sexo = $request->genero;
            $persona->estado_civil =$request->estado;
            $persona->usuario_id = 0;
            $persona->edad = $request->edad;
            $persona->estado_id = 1;
            $persona->save();
            return back()->with('success', $request->nombres." fue agregado");
        } catch (\Exception $e) {
            return "Error Fatal ".$e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $persona = Persona::findOrFail($id);
        return view($this->path.'.detalle', compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persona = Persona::findOrFail($id);
        return view($this->path.'.edit', compact('persona'));
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
        $persona = Persona::findOrFail($id);
        $persona->nombres = $request->nombres;        
        $persona->apellidos =$request->apellidos;
        $persona->email = $request->email;
        $persona->sexo = $request->genero;
        $persona->estado_civil =$request->estado;
        $persona->usuario_id = 0;
        $persona->edad = $request->edad;
        $persona->estado_id = 1;
        $persona->save();
        return redirect()->route('persona.index')->with('success',"Modificado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $persona = Persona::findOrFail($id);
            $persona->delete();
            return redirect()->route('persona.index')->with('success',"Eliminado correctamente");
        } catch (\Exception $e) {
           return back()->with('error',"Error interno al eliminar codigo: ".$e->getcode());
        }
    }
}
