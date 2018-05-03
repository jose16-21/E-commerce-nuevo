@extends('layouts.app')
@section('content')


<form style="width:40%" class="container-fluid">
<div class="page-header">
  <h1>{{ $rol->name}}</h1>
</div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Estado</label>
    <div class="col-sm-8">
    Activo
    </div>
  </div>
  
  
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Creado</label>
    <div class="col-sm-8">
    {{ $rol->created_at }}
    </div>
  </div>
  
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Modificado</label>
    <div class="col-sm-8">
    {{ $rol->updated_at }}
    </div>
  </div>
  <a href="{{ route('rol.index')}}" class="btn btn-danger">Regresar | Listar Roles</a>
</form>
@endsection