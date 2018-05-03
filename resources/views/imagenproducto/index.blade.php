@extends('layouts.app')
@section('content')
<div  class="container"style="width:80%" >
<h1>Imagenes de Productos</h1>
<h4><a class="btn btn-success" href="{{route('imagen-producto.create')}}">Registrar nuevo </a></h4>
@include('partials.error')
<table  class="table container-fluid">
  <thead>
    <tr>
      <th>#</th>
      <th>Producto</th>
      <th>Ultima Actualizacion</th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $row)
  <tr>
      <th scope="row">{{$row->id}}</th>
      <td>{{$row->nombre}}</td>
      <td>{{$row->created_at}}</td>
      <td><a class="btn btn-warning" href="{{ route('imagen-producto.edit',$row->id)}}">Editar</a></td>
      <td><a class="btn btn-info" href="{{ route('imagen-producto.show',$row->id)}}">ver</a></td>
      <td>
        <form  action="{{ route('imagen-producto.destroy',$row->id)}}" method="post">
        <input name="_method" type="hidden" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token()}}">
        <button class="btn btn-danger" type="submit">eliminar</button>
        </form>
      </td>
  </tr>
  @endforeach
  </tbody>
</table>
{{$data->links()}}
</div>
@endsection

