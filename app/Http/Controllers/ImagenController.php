<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests;
use App\Http\Requests\ValidaForm;
use App\Producto;
use App\Imagen;

class ImagenController extends Controller
{
    private $path = 'imagen';
            
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
        $data = Imagen::orderBy('created_at', 'desc') ->paginate(10);
        return view($this->path.'.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$producto = Producto::all();
        return view('imagen.create');//, compact('producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidaForm $request)
    {
      
        $file = $request->image;
        //Creamos una instancia de la libreria instalada   
        $image = \Image::make($request->image);
        //Ruta donde queremos guardar las imagenes
        $path = public_path().'/thumbnails/';
        // Guardar Original
        $image->save($path.$file->getClientOriginalName());
        // Cambiar de tamaño
        $image->resize(240,200);
        // Guardar
        $image->save($path.'thumb_'.$file->getClientOriginalName());
         // Cambiar de tamaño
         $image->resize(480,400);
         // Guardar
         $image->save($path.'thumbx2_'.$file->getClientOriginalName());
        //Guardamos nombre y nombreOriginal en la BD
        $nombre = explode('.',$file->getClientOriginalName());
        $thumbnail = new Imagen();
        $thumbnail->descripcion = $nombre[0];
        $thumbnail->nombre = $file->getClientOriginalName();
        $thumbnail->size = $file->getSize();
        $thumbnail->tipo = $file->getMimeType();
        $thumbnail->usuario_id = 1;/*Auth::id();*/
        $thumbnail->estado_id = 1;
        //$thumbnail->producto_id = $request->producto;
        $thumbnail->save();
        return back()->with('success', $request->nombres." fue agregado");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imagen = Imagen::findOrFail($id);
        return view($this->path.'.detalle', compact('imagen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imagen = Imagen::findOrFail($id);
        return view($this->path.'.edit', compact('imagen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidaForm $request, $id)
    {
        $imagen = Imagen::findOrFail($id);
        $imagen->descripcion =$request->descripcion;
        $imagen->usuario_id = 1;
        $imagen->estado_id = $request->estado;
        $imagen->portada = $request->portada;
        $imagen->save();
        return redirect()->route('imagen.index')->with('success',"Modificado correctamente");
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
            $imagen = Imagen::findOrFail($id);
            $imagen->delete();
            return redirect()->route('imagen.index')->with('success',"Eliminado correctamente");
        } catch (\Exception $e) {
            return back()->with('error',"Error interno al eliminar codigo: ".$e->getcode());
         }
    }
}
