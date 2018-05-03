@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>User list</h3>
            @include('partials.error')
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    <tr class="{{ ($user->active == 0) ? 'danger' : '' }}">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->roles['0']->name }}</td>
                        <td>
                                @if (Auth::id() != $user->id)
                                <button type="button" class="btn-modal-change-role btn btn-info btn-sm" data-userid="{{ $user->id }}" data-userrole="{{ $user->role }}">Change role</button>
                               <form method="POST" action="route('permiso-usuario.active_deactive')">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
                                <input type="submit" name="submit" class="btn btn-warning btn-sm" >
                                </form>
                                
                               

                                @endif
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="5">No results</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="roleModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Cambiar Rol </h3>
            </div>
            <div class="modal-body">
                <form action="route('permiso-usuario.change_role') " method="POST">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <input type="text" name="user_id" id="user_id" >
                   <select class="form-control" name="role">
                        @foreach($roles as $row)
                            <Option>{{$row->name}}</Option>    
                        @endforeach
                    </select> 
                    <button class="btn btn-success btn-block btn-change-role">Cambiar Role</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
