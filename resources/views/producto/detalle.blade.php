@extends('layouts.app')
@section('content')


<form style="width:40%" class="container-fluid">
<div class="page-header">
  <h1>{{ $persona->nombre}}</h1>
</div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Descripcion</label>
    <div class="col-sm-8">
      {{ $persona->descripcion }}
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Categoria</label>
    <div class="col-sm-8">
    {{ $persona->subcategoria->categoria->nombre }} 
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Sub Categoria</label>
    <div class="col-sm-8">
    {{ $persona->subcategoria->nombre }} 
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Estado</label>
    <div class="col-sm-8">
 {{ $persona->estado->nombre }}
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Ofertado</label>
    <div class="col-sm-8">
    {{ $persona->getOferta()}} 
    </div>
  </div>
  <a class="btn btn-danger" href="{{ route('producto.index')}}">Regresar | Listar Productos</a>
</form>
@endsection