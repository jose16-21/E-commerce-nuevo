@extends('layouts.app')

@if (count($imagen))
@section('content')
<form method="post" action="/imagen-producto"  >
<div style="width:40%" class="container-fluid">
<div class="page-header">
  <h1>Agregar</h1>
</div>
@include('partials.error') 
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Categoria</label>
    <div class="col-sm-8">
    <select class="form-control" name="producto">
            @foreach($producto as $row)
            <option value="{{$row->id}}">{{$row-> nombre}}</option>
            @endforeach
        </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Descripcion</label>
    <div class="col-sm-8">
    Selecciona las Imagenes de tus productos, si estan descativas no apareceran al menos que las actives en la seccion de imagenes.
    </div>
  </div>
</div>
<div class="container">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Listado
                    </div>
                    <div class="panel-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            @foreach($imagen as $thumbnail)
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="/thumbnails/thumb_{{$thumbnail->nombre}}" alt="{{$thumbnail->nombre}}">
                                    
                                    <fieldset class="form-group">
      <div class="row">
      <br>
        <lavel class="col-form-legend col-sm-2">.</lavel>
        <div class="col-sm-9">
        <lavel>Estado: <b> {{ $thumbnail->estado->nombre }} </b></lavel>
       <div class="checkbox">
      <label for="imagen">
      <input type="checkbox" name="imagen[]" value="{{$thumbnail->id}}"
        > Agregar</label>
</div>

        </div>
      </div>
    </fieldset>
                                </div>
                            </div>
                            @endforeach
                                {{ $imagen->links()}}
                        </div>
                        <input type="submit" class="btn btn-success" value="Guardar">
  <a class="btn btn-danger" href="{{route('imagen-producto.index')}}">Listar Productos</a>  
                    </div>
    
                </div>
    
            </div>
    
        </div>
    
        </form>
    

    </div>
    
    </div>
    
@endsection
@else
@section('content')
<div class="container">
<h1>No existen registros !!!!..</h1>
</div>
@endsection
@endif
