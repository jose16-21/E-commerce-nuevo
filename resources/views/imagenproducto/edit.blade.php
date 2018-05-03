@extends('layouts.app')

@if (count($imagen))
@section('content')
@foreach($imagen as $row)
@if ($loop->first)
<div style="width:40%" class="container-fluid">
<div class="page-header">
  <h1>{{$row->producto->nombre}}</h1>
</div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Descripcion</label>
    <div class="col-sm-8">
     {{$row->producto->descripcion}}
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Categoria</label>
    <div class="col-sm-8">
     {{$row->producto->subcategoria->categoria->nombre}}
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Sub Categoria</label>
    <div class="col-sm-8">
     {{$row->producto->subcategoria->nombre}}
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Estado</label>
    <div class="col-sm-8">
    {{$row->producto->estado->nombre}}
    </div>
  </div>
</div>
    @endif
@endforeach


<div class="container">
<form method="post" action="/imagen-producto/{{ $row->producto_id }}"  >
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Listado
                    </div>
                    @include('partials.error')
                    <div class="panel-body">
                    <input type="hidden" name="_method" value="PUT" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            @foreach($imagen as $thumbnail)
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="/thumbnails/thumb_{{$thumbnail->imagen->nombre}}" alt="{{$thumbnail->imagen->nombre}}">
                                    
                                    <fieldset class="form-group">
      <div class="row">
      <br>
        <lavel class="col-form-legend col-sm-2">.</lavel>
        <div class="col-sm-9">
          <div class="form-check">
            <label class="form-check-label" for="estado">      
              <input class="form-check-input" type="radio" name="estado{{ $loop->iteration }}" value="1-{{$thumbnail->id}}" 
              {{ old('type', $thumbnail->estado_id) === '1' ? 'checked' : '' }}>
              Activo
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label" for="estado">
              <input class="form-check-input" type="radio" name="estado{{ $loop->iteration }}" value="2-{{$thumbnail->id}}"
              {{ old('type', $thumbnail->estado_id) === '2' ? 'checked' : '' }}>
              Inactivo
            </label>
          </div>
          <div class="checkbox">
      <label for="eliminar">
      <input type="checkbox" name="eliminar{{ $loop->iteration }}" value="{{$thumbnail->id}}"
        > Eliminar</label>
</div>

        </div>
      </div>
    </fieldset>
                                </div>
                            </div>
                            @endforeach
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
