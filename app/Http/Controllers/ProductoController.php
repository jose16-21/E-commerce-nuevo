<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ValidaProducto;
use Illuminate\Support\Str as Str;
use App\Producto;
use App\Categoria;
use App\SubCategoria;


class ProductoController extends Controller
{
    private $path = 'producto';
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
        
        $data = Producto::orderBy('created_at', 'desc') ->paginate(10);
        return view($this->path.'.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = Categoria::all();
        $subcategoria = SubCategoria::all();
        return view($this->path.'.create', compact('subcategoria','categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidaProducto $request)
    {
        
        try {
                       $slug = Str::slug($request->nombre);
            $persona = new Producto();
            $persona->nombre = $request->nombre;        
            $persona->descripcion =$request->descripcion;
            $persona->precio = $request->precio;
            $persona->subcategoria_id = $request->subcategoria;
            $persona->usuario_id = 1;
              $persona->slug  = $slug;
            $persona->estado_id = $request->estado;
            $persona->oferta =$request->oferta;
            $persona->save();
            return back()->with('success', $request->nombres." fue agregado");
        } catch (Exception $e) {
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
        $persona = Producto::findOrFail($id);
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
        if(!Auth::check() === null){
            return redirect()->route('login');
        }else{
        $categoria = Categoria::all();
        $subcategoria = SubCategoria::all();
        $persona = Producto::findOrFail($id);
        return view($this->path.'.edit', compact('persona','subcategoria','categoria'));}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidaProducto $request, $id)
    {
        $persona = Producto::findOrFail($id);
        $persona->nombre = $request->nombre;        
        $persona->descripcion =$request->descripcion;
        $persona->precio = $request->precio;
        $persona->subcategoria_id = $request->subcategoria;
        $persona->usuario_id = 1;
        $persona->estado_id = $request->estado;
        $persona->oferta =$request->oferta;
        $persona->save();
        return redirect()->route('producto.index')->with('success',"Modificado correctamente");
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
            $persona = Producto::findOrFail($id);
            $persona->delete();
            return redirect()->route('producto.index')->with('success',"Eliminado correctamente");
        } catch (\Exception $e) {
            return back()->with('error',"Error interno al eliminar codigo: ".$e->getcode());
        }
    }
}
