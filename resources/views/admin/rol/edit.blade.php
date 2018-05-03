@extends('layouts.app')
@section('content')
<div class="container" style="width:40%">
<div class="panel panel-default">
<div class="panel-heading">
<h1>Rol</h1>  
<h4>Editar</h4>
  @include('partials.error')
</div>
<div class="panel-body">
<form method="post" action="/rol/{{ $rol->id }}"  >
  <div class="form-group">
    <label for="nombres">Nombres</label>
    <input type="text" name="nombre" class="form-control" value="{{ $rol->name }}" >
    <input type="hidden" name="_method" value="PUT" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  </div>
  
  <!--fieldset class="form-group">
      <div class="row">
        <lavel class="col-form-legend col-sm-3">Estado</lavel>
        <div class="col-sm-9">
          <div class="form-check">
            <label class="form-check-label" for="estado">
              <input class="form-check-input" type="radio" name="estado" value="C" 
              {{ old('type', $rol->estado_civil) === 'C' ? 'checked' : '' }} >
              Casado
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label" for="estado">
              <input class="form-check-input" type="radio" name="estado" value="S"
              {{ old('type', $rol->estado_civil) === 'S' ? 'checked' : '' }}>
              Soltero
            </label>
          </div>
        </div>
      </div>
    </fieldset-->
    
  <input type="submit" class="btn btn-success" value="Guardar">
  <a href="{{ route('rol.index')}}" class="btn btn-danger">Regresar | Listar Rol</a>
</form>
</div>
    </div>
  </div>
</div>
@endsection
