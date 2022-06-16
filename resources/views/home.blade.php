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
                <button class="btn btn-success" data-bs-toggle="modal" onclick="getLocation()" data-bs-target="#lookForGroupModal">Buscar grupos</button>
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
                    <form method="post" action="{{ route('schedule.store') }}" id="add-schedule">
                        @csrf
                        <div class="justify-content-center row mb-2">
                            <div class="col-md-3">
                                <!-- TODO: Default to current day -->
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Guardar</button>
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

<script>
    function getLocation() {
        $.ajax({
            type:'GET',
            url:'/location/' + $('#txt1').val(),
            data:'_token = <?php echo csrf_token() ?>',

            success: function(data) {
                $('#destination option[value="' + data + '"').prop('selected', true);
            },
            error: function (err) {
                alert(err);
            }
        });
    }
</script>

@endsection
