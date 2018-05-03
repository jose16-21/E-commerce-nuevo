@extends('layouts.app')
@section('content')


<form style="width:40%" class="container-fluid">
<div class="page-header">
  <h1>{{ $persona->full_name}}</h1>
</div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Email</label>
    <div class="col-sm-8">
      {{ $persona->email }}
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Edad</label>
    <div class="col-sm-8">
    {{ $persona->edad }} años
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Sexo</label>
    <div class="col-sm-8">
    {{ $persona->getSexo() }}
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Estado Civil</label>
    <div class="col-sm-8">
    {{ $persona->getGenero() }}
    </div>
    
  </div>

  <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Estado Persona</label>
    <div class="col-sm-8">
    {{ $persona->estado->nombre }}
    </div>
  </div>
  
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Creado</label>
    <div class="col-sm-8">
    {{ $persona->created_at }}
    </div>
  </div>
  
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Modificado</label>
    <div class="col-sm-8">
    {{ $persona->updated_at }}
    </div>
  </div>
  <a href="{{ route('persona.index')}}" class="btn btn-danger">Regresar | Listar Personas</a>
</form>
@endsection