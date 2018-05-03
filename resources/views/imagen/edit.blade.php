@extends('layouts.app')
@section('content')
<div class="container-fluid" style="width:40%">
<h1>Imagen</h1>
<h4>Editar</h4>

<form method="post" action="/imagen/{{ $imagen->id }}"  >

<div class="thumbnail">
      <img src="/thumbnails/thumb_{{ $imagen->nombre }}" alt="">
             <div class="caption">
             <h3>{{ $imagen->descripcion }}</h3>
             </div>
  </div>
  @include('partials.error') 
  <div class="form-group">
  <label for="descripcion">Descripcion</label>
    <textarea name="descripcion"   class="form-control" rows="5">{{ $imagen->descripcion }}</textarea>
    <input type="hidden" name="nombre" value="{{ $imagen->nombre }}" >
    <input type="hidden" name="_method" value="PUT" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  </div>
  <div class="form-group">
  <fieldset class="form-group">
  <div class="row">
    <lavel class="col-form-legend col-sm-3">Estado</lavel>
    <div class="col-sm-9">
      <div class="form-check">
        <label class="form-check-label" for="estado">
          <input class="form-check-input" type="radio" name="estado" value="1" 
          {{ old('type', $imagen->estado_id) === '1' ? 'checked' : '' }}>
          Activo
        </label>
      </div>
      <div class="form-check">
        <label class="form-check-label" for="estado">
          <input class="form-check-input" type="radio" name="estado" value="2"
          {{ old('type', $imagen->estado_id) === '2' ? 'checked' : '' }}>
          Inactivo
        </label>
      </div>
      <div class="checkbox">
<label for="portada"><input type="checkbox" name="portada" value="1"
{{ old('type', $imagen->portada) === '1' ? 'checked' : '' }}  > Portada</label>
</div>
    </div>
  </div>
</fieldset>
  </div>
  <div class="form-group">
  <input type="submit"class="btn btn-success" value="Guardar">
  <a href="{{ route('imagen.index')}}" class="btn btn-danger">Regresar | Listar Productos</a>
</form>
</div>
@endsection
