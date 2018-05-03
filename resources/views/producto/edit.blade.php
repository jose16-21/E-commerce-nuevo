@extends('layouts.app')
@section('content')
<div class="container" style="width:40%">
<div class="panel panel-default">
<div class="panel-heading">
<h1>Producto</h1>  
<h4>Editar</h4>
  @include('partials.error')
</div>
<div class="panel-body">
<form method="post" action="/producto/{{ $persona->id }}"  >
  <div class="form-group">
    <label for="nombre">Nombres</label>
    <input type="text" name="nombre" class="form-control" value="{{ $persona->nombre }}" >
    <input type="hidden" name="_method" value="PUT" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  </div>
  <div class="form-group">
    <label for="descripcion">Descripcion</label>
    <textarea name="descripcion"   class="form-control" rows="10">{{ $persona->descripcion }}</textarea>
  </div>
  <div class="form-group">
    <label for="edad">Precio</label>
    <input type="number" name="precio" class="form-control" value="{{ $persona->precio }}" >
  </div>
        <div class="form-group">
            <label for="subcategoria">Sub Categoria</label>
            <select name="subcategoria" class="form-control">
            @foreach($subcategoria as $row)
                <option value="{{$row->id}}"  {{ old('type', $row->id) === $persona->subcategoria_id ? 'selected' : '' }}> {{$row->nombre}}</option>
                @endforeach
            </select>
        </div>
  <fieldset class="form-group">
      <div class="row">
        <lavel class="col-form-legend col-sm-3">Estado</lavel>
        <div class="col-sm-9">
          <div class="form-check">
            <label class="form-check-label" for="estado">
              <input class="form-check-input" type="radio" name="estado" value="1" 
              {{ old('type', $persona->estado_id) === '1' ? 'checked' : '' }} >
              Activo
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label" for="estado">
              <input class="form-check-input" type="radio" name="estado" value="2"
              {{ old('type', $persona->estado_id) === '2' ? 'checked' : '' }}>
              Inactivo
            </label>
          </div>
          <div class="checkbox">
<label for="oferta"><input type="checkbox" name="oferta" value="1"
{{ old('type', $persona->oferta) === '1' ? 'checked' : '' }}  > Ofertado</label>
</div>
        </div>
      </div>
    </fieldset>
    
  
  <input type="submit" class="btn btn-success" value="Guardar">
  <a href="{{ route('producto.index')}}" class="btn btn-danger">Regresar | Listar Productos</a>
</form>
</div>
    </div>
  </div>
</div>
@endsection
