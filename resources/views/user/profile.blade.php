@extends('layouts.app')

@section('content')
<link href="{{ asset('css/perfil.css') }}" rel="stylesheet">
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
                            <img src="{{ asset('img/petrol.jpg') }}" class="img-fluid" width="" height="" alt="User profile photo" id="user_photo">
                        </div>
                        <div class="col-md-9">
                            <h4 class="user-name">{{ Auth::user()->name }}</h4>
                            <hr>
                            <p><b>Fecha nacimiento: </b>3/11/2000 <br>
                                <b>Celular: </b> +56{{ Auth::user()->phone }} <br>
                                <b>Bio: </b> {{ Auth::user()->bio }} <br>
                                <b>Correo: </b>{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        
                        <div class="row pt-4">
                            <div class="col-md-12">
                                <button class="btn btn-primary text-center" id="edit_btn">Editar</button>
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
                        
                        <button class="btn btn-primary" id="edit_btn" data-bs-toggle="modal" data-bs-target="#addNew" disabled>Editar</button>
                    </div>
                    
                    <!-- User schedule modal -->
                    <div class="modal fade" id="addNew" tabindex="-1" aria-labelledby="addNewLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addNewLabel">Nueva entrada</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="POST">
                                        
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Schedule modal end -->
                    
                </div>
            </div>
        </div>
        
        
        
    </div>
    @endsection
    