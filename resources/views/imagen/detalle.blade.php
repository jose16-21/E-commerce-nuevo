@extends('layouts.app')
@section('content')

<form style="width:40%" class="container-fluid">
<div class="page-header">
  <h1>  {{ $imagen->descripcion }}</h1>
</div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Descripcion</label>
    <div class="col-sm-8">
    {{ $imagen->descripcion }}
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Estado</label>
    <div class="col-sm-8">
{{ $imagen->estado->nombre }} 
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Tamaño</label>
    <div class="col-sm-8">
    {{ $imagen->size }}
    </div>
  </div>
  <a class="btn btn-danger" href="{{ route('imagen.index')}}">Listar Imagenes</a>
</form>
<br>
<div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Listado
                        
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="/thumbnails/thumb_{{ $imagen->nombre }}" alt="">
                                    <div class="caption">
                                        <h3>{{ $imagen->descripcion }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
