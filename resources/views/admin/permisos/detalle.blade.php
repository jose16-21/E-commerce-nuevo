@extends('layouts.app')
@section('content')
<form style="width:40%" class="container-fluid">
<div class="page-header">
  <h1>{{ $permisos->name}}</h1>
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
    {{ $permisos->created_at }}
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Modificado</label>
    <div class="col-sm-8">
    {{ $permisos->updated_at }}
    </div>
  </div>
  <a href="{{ route('permisos.index')}}" class="btn btn-danger">Regresar | Listar Permisos</a>
</form>
@endsection