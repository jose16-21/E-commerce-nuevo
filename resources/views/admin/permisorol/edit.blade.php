@extends('layouts.app')
@section('content')
<div class="container" style="width:40%">
<div class="panel panel-default">
<div class="panel-heading">
<h1>{{ $permisos->name }}</h1>  
<h4>Editar</h4>
  
</div>
<div class="panel-body">
<form method="post" action="/persona/{{ $permisos->id }}"  >
  

  <input type="submit" class="btn btn-success" value="Guardar">
  <a href="{{ route('permiso-rol.index')}}" class="btn btn-danger">Regresar | Listar Personas</a>
</form>
</div>
    </div>
  </div>
</div>
@endsection
