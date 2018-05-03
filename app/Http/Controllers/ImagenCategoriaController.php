<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imagen;
use App\Categoria;
use App\ImagenCategoria;

class ImagenCategoriaController extends Controller
{
    private $path = 'imagencategoria';
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
        $data = Categoria::all();
        return view($this->path.'.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $imagen = Imagen::paginate(9);
        $producto = Categoria::all();
        return view($this->path.'.create', compact('imagen','producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = count($request->input("imagen"));
        $nombre = $request->input("imagen");
        for ($i = 0; $i < $input; $i++){
            $persona = new ImagenCategoria();
            $persona->categoria_id = $request->producto;
            $persona->imagen_id = $nombre[$i];
            $persona->estado_id = 1;
            $persona->save();
            
        }
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
        $data= Categoria::find($id);
        return view($this->path.'.detalle', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imagen = ImagenCategoria::where('categoria_id',$id)->get();
        return view($this->path.'.edit',compact("imagen"));
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
        $input = count($request->input());
        $nombre = "estado";
        $eliminar = "eliminar";
        for ($i = 1; $i < $input; $i++){
            if($request->input($eliminar.$i)){
                
                ImagenCategoria::findOrFail($request->input($eliminar.$i))->delete();

            }
            elseif($request->input($nombre.$i)){

                $dat=explode("-",$request->input($nombre.$i));
                $persona=ImagenCategoria::findOrFail($dat[1]);
                $persona->estado_id = $dat[0];
                $persona->save();
            }
        }

        return redirect()->route('imagen-categoria.index')->with('success',"Modificado correctamente");
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
            $imagen = ImagenCategoria::where('categoria_id','=',$id);
            $imagen->delete();
            return redirect()->route('imagen-categoria.index')->with('success',"Eliminado correctamente");
        } catch (\Exception $e) {
            return back()->with('error',"Error interno al eliminar codigo: ".$e->getcode());
         }
    }
}
