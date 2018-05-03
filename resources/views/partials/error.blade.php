    @if($errors->any())
                <div class="alert alert-danger" >
                <h4>ERROR :</h4>
                <ul>
                @foreach($errors->all() as $error )
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
                </div>
     @endif
     @if(session()->has('success'))
                <div class="alert alert-success">
                <h4>EXITO !!!</h4>
                    {{ session()->get('success') }}
                </div>
    @endif
    @if(session()->has('error'))
                <div class="alert alert-danger">
                <h4>ERROR :</h4>
                    {{ session()->get('error') }}
                </div>
    @endif