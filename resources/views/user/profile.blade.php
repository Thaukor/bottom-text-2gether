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
                            <h4 class="user-name">Nombre Apellido</h4>
                            <hr>
                            <p><b>Fecha nacimiento: </b>3/11/2000 <br>
                            <b>Celular: </b> +56912345678 <br>
                            <b>Bio: </b> {{ $test }} <br>
                            <b>Correo: </b>ejemplo@pregrado.uoh.cl</p>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-md-12">
                            <button class="btn btn-primary text-center">Modificar visibilidad información</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
    <div class="row justify-content-center pt-4">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <strong>Solo tú puedes ver esta información</strong>
                </div>
            </div>
            <!-- Fecha y hora de salida -->

            <div class="py-2"></div>

            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Días y horas de salida</h4>
                </div>
                <div class="card-body">
                    <div class="date-block">
                        <strong>Lunes: </strong> <span class="date-block-time">13:30</span><br>
                        <strong>Martes: </strong> <span class="date-block-time">13:30</span><br>
                        <strong>Miércoles: </strong> <span class="date-block-time">13:30</span><br>
                        <strong>Jueves: </strong> <span class="date-block-time">13:30</span><br>
                        <strong>Viernes: </strong> <span class="date-block-time">13:30</span><br>
                    </div>

                    <hr>

                    <button class="btn btn-primary">Editar</button>
                </div>
            </div>
        </div>
    </div>



</div>
@endsection
