@extends('layouts.app')
@section('content')
<div class="container" style="width:40%">
<div class="panel panel-default">
<div class="panel-heading">
<h1>permisos</h1>  
<h4>Editar</h4>
  @include('partials.error')
</div>
<div class="panel-body">
<form method="post" action="/permisos/{{ $permisos->id }}"  >
  <div class="form-group">
    <label for="nombres">Nombres</label>
    <input type="text" name="nombre" class="form-control" value="{{ $permisos->name }}" >
    <input type="hidden" name="_method" value="PUT" >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  </div>
  
  
    <!--fieldset class="form-group">
      <div class="row">
        <lavel class="col-form-legend col-sm-3">Genero</lavel>
        <div class="col-sm-9">
          <div class="form-check">
            <label class="form-check-label" for="genero">
              <input class="form-check-input" type="radio" name="genero" value="M" 
              {{ old('type', $permisos->sexo) === 'M' ? 'checked' : '' }}>
              Masculino
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label" for="genero">
              <input class="form-check-input" type="radio" name="genero" value="F"
              {{ old('type', $permisos->sexo) === 'F' ? 'checked' : '' }}>
              Femenino
            </label>
          </div>
        </div>
      </div>
    </fieldset-->
  <input type="submit" class="btn btn-success" value="Guardar">
  <a href="{{ route('permisos.index')}}" class="btn btn-danger">Regresar | Listar permisoss</a>
</form>
</div>
    </div>
  </div>
</div>
@endsection
