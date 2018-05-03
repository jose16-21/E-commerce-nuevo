@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Lista de Roles</h3>
            @include('partials.error')
            <h4><a type="button" class="btn btn-success" href="{{route('rol.create')}}">Agregar nuevo Rol</a></h4>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>creado</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($rol as $row)
                    <tr >
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->created_at}}</td>
                        <td><a class="btn btn-warning" href="{{ route('rol.edit',$row->id)}}">Editar</a></td>
      <td><a class="btn btn-info" href="{{ route('rol.show',$row->id)}}">ver</a></td>
      <td>
        <form  action="{{ route('rol.destroy',$row->id)}}" method="post">
        <input name="_method" type="hidden" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token()}}">
        <button class="btn btn-danger" type="submit">eliminar</button>
        </form>
      </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="5">No results</td>
                        </tr>
                    @endforelse
                </tbody>
                {{$rol->links()}}
            </table>
        </div>
    </div>
</div>
@endsection
