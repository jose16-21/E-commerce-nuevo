<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Categoria;
use App\SubCategoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $categoria = Categoria::all();
        $subcategoria = SubCategoria::all();
        
        return view('form', compact('categoria','subcategoria'));
    }

    public function show($id)
    {
dd($id);
        
    }

}
