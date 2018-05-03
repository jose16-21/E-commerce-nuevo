@extends('layouts.app')
@section('content')
<div class="container" style="width:40%">
  <div class="panel panel-default">
  <div class="panel-heading">
  <h1>Persona</h1>  
  <h4>Crear</h4>
    @include('partials.error')
  </div>
  <div class="panel-body">
<form method="post" action="/persona">
<div class="form-group">
<label for="nombres">Nombres</label>
<input type="text" name="nombres" class="form-control" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">
</div>
<div class="form-group">
<label for="apellidos">Apellidos</label>
<input type="text" name="apellidos" class="form-control" >
</div>
<div class="form-group">
<label for="email">Email</label>
<input type="email" name="email" class="form-control"  >
</div>
<div class="form-group">
<label for="edad">Edad</label>
<input type="number" name="edad" class="form-control"  >
</div>
<fieldset class="form-group">
  <div class="row">
    <lavel class="col-form-legend col-sm-3">Estado</lavel>
    <div class="col-sm-9">
      <div class="form-check">
        <label class="form-check-label" for="estado">
          <input class="form-check-input" type="radio" name="estado" value="C">
          Casado
        </label>
      </div>
      <div class="form-check">
        <label class="form-check-label" for="estado">
          <input class="form-check-input" type="radio" name="estado" value="S">
          Soltero
        </label>
      </div>
    </div>
  </div>
</fieldset>
<fieldset class="form-group">
  <div class="row">
    <lavel class="col-form-legend col-sm-3">Genero</lavel>
    <div class="col-sm-9">
      <div class="form-check">
        <label class="form-check-label" for="genero">
          <input class="form-check-input" type="radio" name="genero" value="M">
          Masculino
        </label>
      </div>
      <div class="form-check">
        <label class="form-check-label" for="genero">
          <input class="form-check-input" type="radio" name="genero" value="F">
          Femenino
        </label>
      </div>
    </div>
  </div>
</fieldset>
<input type="submit" class="btn btn-success" value="Guardar">
<a class="btn btn-danger" href="{{ route('persona.index')}}">Regresar | Listar Personas</a>
</form>
    
    </div>
    </div>
  </div>
</div>
@endsection