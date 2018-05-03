<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolController extends Controller
{
    private $path = 'admin.rol.';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rol = Role::paginate(10);
        return view($this->path.'index', compact('rol'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->path.'create');//, co
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    try{
        Role::create([
            'name'=> $request->name
            //'sender_id'=> auth()->id(),
        ]);
        return back()->with('success','Tu mensaje fue enviado');
    } catch (\Exception $e) {
        return back()->with('error', "Error interno al eliminar codigo: ".$e->getcode());
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
        $rol = Role::findOrFail($id);
        return view($this->path.'detalle', compact('rol'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rol = Role::findOrFail($id);
        return view($this->path.'edit', compact('rol'));
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
        $rol = Role::findOrFail($id);
        $rol->name = $request->nombre;
        $rol->save();
        return redirect()->route('rol.index')->with('success',"Modificado correctamente");
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
            $rol = Role::findOrFail($id);
            $rol->delete();
            return back()->with('success', "Eliminado correctamente");
        } catch (\Exception $e) {
            return back()->with('error', "Error interno al eliminar codigo: ".$e->getcode());
        }
    }
}
