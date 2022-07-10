@extends('layouts.applog')

@section('css_links')
<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
@endsection

@section('content')
<div class="container overflow: hidden">
    <div class="d-flex justify-content-center h-100">
        <div class="card ">
            <div class="card-header">
                <img src="{{ asset('img/logo2gether.png') }}" alt="asd">
                <h3 class="text-center">Iniciar sesión</h3>
                <div class="d-flex justify-content-end social_icon">
                    
                    <!-- <span><img id="google" src="{{ asset('img/google.png.opdownload') }}" ></span>  -->
                    
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i >
                                <img  class="monito" src="{{ asset('img/194279.png') }}" alt="log">
                            </i></span>
                        </div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="ejemplo@pregrado.uoh.cl">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        
                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-key">
                                    <img  class="monito" src="{{ asset('img/key.png') }}" alt="log">
                                </i></span>
                            </div>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="">
                            
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div id="remembertop" class="row remember justify-content-center">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn float-right login_btn" value="Ingresar">
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        ¿No tienes cuenta?<a href="{{ route('register') }}">Registrarse</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('password.request') }}">Olvidé mi contraseña</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @endsection
    