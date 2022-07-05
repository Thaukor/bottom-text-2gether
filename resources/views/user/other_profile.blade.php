@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Perfil de usuario</h3>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="https://pwco.com.sg/wp-content/uploads/2020/05/Generic-Profile-Placeholder-v3-800x800.png" class="img-fluid" width="" height="" alt="User profile photo">
                        </div>
                        <div class="col-md-9">
                            <h4 class="user-name">{{ $data->name }}</h4>
                            <hr>
                            <p><b>Fecha nacimiento: </b>3/11/2000 <br>
                                <b>Celular: </b> +56{{ $data->phone }} <br>
                                <b>Bio: </b> {{ $data->bio }} <br>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            
        </div>  
        
    </div>
</div>
@endsection
