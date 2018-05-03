@extends('layouts.app')
@section('content')

<form style="width:40%" class="container-fluid">
<div class="page-header">
  <h1>{{$data->nombre}}</h1>
</div> 
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-4 col-form-label">Estado</label>
    <div class="col-sm-8">
     {{$data->estado->nombre}}
    </div>
  </div>
  <a class="btn btn-danger" href="{{route('imagen-categoria.index')}}">Listar Categoria</a>  
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
                            @foreach($data->imagen as $thumbnail)
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="/thumbnails/thumb_{{$thumbnail->nombre}}" alt="{{$thumbnail->nombre}}">
                                    <div class="caption">
                                        <h3>{{$thumbnail->descripcion}}</h3>
                                        <h4>{{$thumbnail->estado->nombre}}</h4>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
