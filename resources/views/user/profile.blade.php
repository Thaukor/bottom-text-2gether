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
                            <h4 class="user-name">{{ Auth::user()->name }}</h4>
                            <hr>
                            <p><b>Fecha nacimiento: </b>3/11/2000 <br>
                                <b>Celular: </b> +56912345678 <br>
                                <b>Bio: </b> {{ Auth::user()->bio }} <br>
                                <b>Correo: </b>{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        
                        <div class="row pt-4">
                            <div class="col-md-12">
                                <button class="btn btn-primary text-center">Editar</button>
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
                        
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNew">Editar</button>
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
                                        @csrf
                                        <div class="justify-content-center row mb-2">
                                            <div class="col-md-3">
                                                <label for="day">Día</label>
                                                <select name="day" id="day" class="form-control">
                                                    <option value="1">Lunes</option>
                                                    <option value="2">Martes</option>
                                                    <option value="3">Miércoles</option>
                                                    <option value="4">Jueves</option>
                                                    <option value="5">Viernes</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1"></div>
                                            <div class="col-md-3">
                                                <label for="time">Hora</label>
                                                <input type="time" name="time" id="time">
                                            </div>
                                        </div>
                                        <div class="row justify-content-center mb-3">
                                            <div class="col-md-7">
                                                <label for="destination">Destino</label>
                                                <select name="destination" id="destination" class="form-control">
                                                    @foreach ($locations as $location)
                                                        <option value="{{ $location->id }}">{{ $location->location }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-md-7">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="repeat" id="repeat">
                                                    <label class="form-check-label" for="repeat">Repetir</label>
                                                </div>
                                            </div>
                                        </div>
                                        
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
    