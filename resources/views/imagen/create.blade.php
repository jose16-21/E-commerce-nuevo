@extends('layouts.app')
@section('content')


<div class="container" style="width:40%">
<div class="page-header">
  <h1>Imagen</h1>
  <h4>Subir</h4>
  @include('partials.error')
</div
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Imagen de Productos</div>
                
                <div class="panel-body">
                        <form method="POST" action="{{ route('imagen.store')}}" enctype="multipart/form-data">
                        <div class="form-group">
                            <!--label for="name">Nombre</label-->
                            <input type="hidden" value="1" name="nombre" class="form-control">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                        <div class="form-group">
                        <label for="name">Imagen</label>
                        <input type="file" name="image" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Guardar Banner</button>
                        <a class="btn btn-danger" href="{{ route('imagen.index')}}">Listar Productos</a>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</form>
@endsection