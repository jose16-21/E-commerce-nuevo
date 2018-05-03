@extends('layouts.app')
@section('content')
<div class="container" style="width:40%">
  <div class="panel panel-default">
  <div class="panel-heading">
  <h1>Rol</h1>  
  <h4>Crear</h4>
    @include('partials.error')
  </div>
  <div class="panel-body">
<form method="post" action="/rol">
<div class="form-group">
<label for="nombres">Nombres</label>
<input type="text" name="name" class="form-control" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">
</div>

<input type="submit" class="btn btn-success" value="Guardar">
<a class="btn btn-danger" href="{{ route('rol.index')}}">Regresar | Listar Roles</a>
</form>
    
    </div>
    </div>
  </div>
</div>
@endsection