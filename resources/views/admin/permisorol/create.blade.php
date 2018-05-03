
@extends('layouts.app')


@section('content')
<form method="post" action="/permiso-rol"  >
<div style="width:40%" class="container-fluid">
<div class="page-header">
  <h1>Agregar</h1>
</div>
@include('partials.error') 
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Rol</label>
    <div class="col-sm-8">
    <select class="form-control" name="rol">
            @foreach($rol as $row)
            <option value="{{$row->id}}">{{$row->name}}</option>
            @endforeach
        </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Descripcion</label>
    <div class="col-sm-8">
    Selecciona un Rol al que le asignaras permisos.
    </div>
  </div>
</div>
<div class="container">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Listado
                    </div>
                    <div class="panel-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            @foreach($permisos as $row)
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <fieldset class="form-group">
      <div class="row">
      <br>
        <lavel class="col-form-legend col-sm-2">.</lavel>
        <div class="col-sm-9">
        <label><b>{{ $row->name }}</b></label>
       <div class="checkbox">
      <label for="imagen">
      <input type="checkbox" name="name[]" value="{{$row->name}}"
        > Agregar</label>
</div>

        </div>
      </div>
    </fieldset>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <input type="submit" class="btn btn-success" value="Guardar">
  <a class="btn btn-danger" href="{{route('permiso-rol.index')}}">Listar Rol</a>  
                    </div>
    
                </div>
    
            </div>
    
        </div>
    
        </form>
    
    </div>
    
    </div>
@endsection
