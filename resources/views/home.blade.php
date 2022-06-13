@extends('layouts.app')

@section('css_links')
<link href="{{ asset('css/estilos2.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="locationviewer">
        <h4 id="txt_well">¿Cuál es tu destino?</h4>
        <input type="text" class="textstyle" id="txt1" placeholder="Tu destino...">
        <div class="text-center mt-2">
            <button class="btn btn-success">Buscar grupos</button>
        </div>
    
    </div>

    <div class="d-flex justify-content-center h-100">
 
    </div>
</div>
<footer class="footer1">
    <img src="{{ asset('img/logbom.png') }}" alt="hol4"  id="dog" onpointerover="play()" onclick="rickroll('https://www.youtube.com/watch?v=dQw4w9WgXcQ')">
    <p id="bt">bottom text</p>
</footer>
@endsection
