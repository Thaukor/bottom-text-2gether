@extends('layouts.app')

@section('css_links')
<link href="{{ asset('css/estilos2.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="locationviewer">
        <h4 id="txt_well">¿Cuál es tu destino?</h4>
        <input type="text" class="textstyle" id="txt1" placeholder="Tu destino...">
        <div class="mt-2">
            <div class="text-center">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#lookForGroupModal">Buscar grupos</button>
            </div>
        </div>
        
    </div>
    <div class="modal" id="lookForGroupModal" tabindex="-1" aria-labelledby="lookForGroupModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lookForGroupModalLabel">Buscar grupo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
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
