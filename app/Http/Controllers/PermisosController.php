<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class PermisosController extends Controller
{
    private $path = 'admin.permisos.';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permisos = Permission::paginate(10);
        return view($this->path.'index', compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->path.'create');
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
            Permission::create([
                'name'=> $request->nombre,
            ]);
            return back()->with('success','Agregado exitosamente');
        }catch(\Exception $e ){
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
        
        $permisos = Permission::findOrFail($id);
        return view($this->path.'detalle', compact('permisos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $permisos = Permission::findOrFail($id);
        return view($this->path.'edit', compact('permisos'));
       
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
        $permisos = Permission::findOrFail($id);
        $permisos->name = $request->nombre;
        $permisos->save();
        return redirect()->route('permisos.index')->with('success',"Modificado correctamente");  
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
            $permiso = Permission::findOrFail($id);
            $permiso->delete();
            return back()->with('success', "Eliminado correctamente");
        } catch (\Exception $e) {
            return back()->with('error', "Error interno al eliminar codigo: ".$e->getcode());
        }
    }
}
