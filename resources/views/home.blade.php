@extends('layouts.app')

@section('css_links')
<link href="{{ asset('css/estilos2.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
<div class="container main-content">
    <div class="row">
        <div class="locationviewer">
            <h4 id="txt_well">¿Cuál es tu destino?</h4>
            <input type="text" id="txt1" placeholder="Tu destino...">
            <div class="mt-2">
                <div class="text-center">
                    <button class="btn btn-success" data-bs-toggle="modal" onclick="getLocation()" data-bs-target="#lookForGroupModal">Buscar grupos</button>
                </div>
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
                <form method="post" action="{{ route('schedule.store') }}" id="add-schedule">
                    <div class="modal-body">
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
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Modal end -->
    <br><br><br><br><br>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="schedule_list">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr class="text-center">
                            <td colspan="4" width="100%"><h2>Revisa tus entradas creadas</h2></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center" width="40%">
                                <span class="destination">destination_replace</span>
                                <br>
                                <span class="day">day_replace</span>
                            </td>
                            <td>time_replace</td>
                            <td width="10%"><a href="url_replace" class="btn btn-success">Ir</a></td>
                            <td width="10%"><button onclick="delete_schedule_on( delete_replace )" class="btn btn-danger">Eliminar</button></td>
                        </tr><tr>
                            <td class="text-center" width="40%">
                                <span class="destination">destination_replace</span>
                                <br>
                                <span class="day">day_replace</span>
                            </td>
                            <td>time_replace</td>
                            <td width="10%"><a href="url_replace" class="btn btn-success">Ir</a></td>
                            <td width="10%"><button onclick="delete_schedule_on( delete_replace )" class="btn btn-danger">Eliminar</button></td>
                        </tr><tr>
                            <td class="text-center" width="40%">
                                <span class="destination">destination_replace</span>
                                <br>
                                <span class="day">day_replace</span>
                            </td>
                            <td>time_replace</td>
                            <td width="10%"><a href="url_replace" class="btn btn-success">Ir</a></td>
                            <td width="10%"><button onclick="delete_schedule_on( delete_replace )" class="btn btn-danger">Eliminar</button></td>
                        </tr><tr>
                            <td class="text-center" width="40%">
                                <span class="destination">destination_replace</span>
                                <br>
                                <span class="day">day_replace</span>
                            </td>
                            <td>time_replace</td>
                            <td width="10%"><a href="url_replace" class="btn btn-success">Ir</a></td>
                            <td width="10%"><button onclick="delete_schedule_on( delete_replace )" class="btn btn-danger">Eliminar</button></td>
                        </tr><tr>
                            <td class="text-center" width="40%">
                                <span class="destination">destination_replace</span>
                                <br>
                                <span class="day">day_replace</span>
                            </td>
                            <td>time_replace</td>
                            <td width="10%"><a href="url_replace" class="btn btn-success">Ir</a></td>
                            <td width="10%"><button onclick="delete_schedule_on( delete_replace )" class="btn btn-danger">Eliminar</button></td>
                        </tr><tr>
                            <td class="text-center" width="40%">
                                <span class="destination">destination_replace</span>
                                <br>
                                <span class="day">day_replace</span>
                            </td>
                            <td>time_replace</td>
                            <td width="10%"><a href="url_replace" class="btn btn-success">Ir</a></td>
                            <td width="10%"><button onclick="delete_schedule_on( delete_replace )" class="btn btn-danger">Eliminar</button></td>
                        </tr><tr>
                            <td class="text-center" width="40%">
                                <span class="destination">destination_replace</span>
                                <br>
                                <span class="day">day_replace</span>
                            </td>
                            <td>time_replace</td>
                            <td width="10%"><a href="url_replace" class="btn btn-success">Ir</a></td>
                            <td width="10%"><button onclick="delete_schedule_on( delete_replace )" class="btn btn-danger">Eliminar</button></td>
                        </tr><tr>
                            <td class="text-center" width="40%">
                                <span class="destination">destination_replace</span>
                                <br>
                                <span class="day">day_replace</span>
                            </td>
                            <td>time_replace</td>
                            <td width="10%"><a href="url_replace" class="btn btn-success">Ir</a></td>
                            <td width="10%"><button onclick="delete_schedule_on( delete_replace )" class="btn btn-danger">Eliminar</button></td>
                        </tr><tr>
                            <td class="text-center" width="40%">
                                <span class="destination">destination_replace</span>
                                <br>
                                <span class="day">day_replace</span>
                            </td>
                            <td>time_replace</td>
                            <td width="10%"><a href="url_replace" class="btn btn-success">Ir</a></td>
                            <td width="10%"><button onclick="delete_schedule_on( delete_replace )" class="btn btn-danger">Eliminar</button></td>
                        </tr><tr>
                            <td class="text-center" width="40%">
                                <span class="destination">destination_replace</span>
                                <br>
                                <span class="day">day_replace</span>
                            </td>
                            <td>time_replace</td>
                            <td width="10%"><a href="url_replace" class="btn btn-success">Ir</a></td>
                            <td width="10%"><button onclick="delete_schedule_on( delete_replace )" class="btn btn-danger">Eliminar</button></td>
                        </tr><tr>
                            <td class="text-center" width="40%">
                                <span class="destination">destination_replace</span>
                                <br>
                                <span class="day">day_replace</span>
                            </td>
                            <td>time_replace</td>
                            <td width="10%"><a href="url_replace" class="btn btn-success">Ir</a></td>
                            <td width="10%"><button onclick="delete_schedule_on( delete_replace )" class="btn btn-danger">Eliminar</button></td>
                        </tr><tr>
                            <td class="text-center" width="40%">
                                <span class="destination">destination_replace</span>
                                <br>
                                <span class="day">day_replace</span>
                            </td>
                            <td>time_replace</td>
                            <td width="10%"><a href="url_replace" class="btn btn-success">Ir</a></td>
                            <td width="10%"><button onclick="delete_schedule_on( delete_replace )" class="btn btn-danger">Eliminar</button></td>
                        </tr><tr>
                            <td class="text-center" width="40%">
                                <span class="destination">destination_replace</span>
                                <br>
                                <span class="day">day_replace</span>
                            </td>
                            <td>time_replace</td>
                            <td width="10%"><a href="url_replace" class="btn btn-success">Ir</a></td>
                            <td width="10%"><button onclick="delete_schedule_on( delete_replace )" class="btn btn-danger">Eliminar</button></td>
                        </tr><tr>
                            <td class="text-center" width="40%">
                                <span class="destination">destination_replace</span>
                                <br>
                                <span class="day">day_replace</span>
                            </td>
                            <td>time_replace</td>
                            <td width="10%"><a href="url_replace" class="btn btn-success">Ir</a></td>
                            <td width="10%"><button onclick="delete_schedule_on( delete_replace )" class="btn btn-danger">Eliminar</button></td>
                        </tr><tr>
                            <td class="text-center" width="40%">
                                <span class="destination">destination_replace</span>
                                <br>
                                <span class="day">day_replace</span>
                            </td>
                            <td>time_replace</td>
                            <td width="10%"><a href="url_replace" class="btn btn-success">Ir</a></td>
                            <td width="10%"><button onclick="delete_schedule_on( delete_replace )" class="btn btn-danger">Eliminar</button></td>
                        </tr><tr>
                            <td class="text-center" width="40%">
                                <span class="destination">destination_replace</span>
                                <br>
                                <span class="day">day_replace</span>
                            </td>
                            <td>time_replace</td>
                            <td width="10%"><a href="url_replace" class="btn btn-success">Ir</a></td>
                            <td width="10%"><button onclick="delete_schedule_on( delete_replace )" class="btn btn-danger">Eliminar</button></td>
                        </tr><tr>
                            <td class="text-center" width="40%">
                                <span class="destination">destination_replace</span>
                                <br>
                                <span class="day">day_replace</span>
                            </td>
                            <td>time_replace</td>
                            <td width="10%"><a href="url_replace" class="btn btn-success">Ir</a></td>
                            <td width="10%"><button onclick="delete_schedule_on( delete_replace )" class="btn btn-danger">Eliminar</button></td>
                        </tr><tr>
                            <td class="text-center" width="40%">
                                <span class="destination">destination_replace</span>
                                <br>
                                <span class="day">day_replace</span>
                            </td>
                            <td>time_replace</td>
                            <td width="10%"><a href="url_replace" class="btn btn-success">Ir</a></td>
                            <td width="10%"><button onclick="delete_schedule_on( delete_replace )" class="btn btn-danger">Eliminar</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    locations = []
    @foreach ($locations as $location)
    locations.push("{{$location->location}}");
    @endforeach
    
    $( function() {
        $('#txt1').autocomplete({
            source: locations
        });
    });
    
    function formatScheduleEntryHTML(destination, day, url, id) {
        sFormat = ```
        <tr>
            <td class="text-center" width="40%">
                <span class="destination">destination_replace</span>
                <br>
                <span class="day">day_replace</span>
            </td>
            <td>time_replace</td>
            <td width="10%"><a href="url_replace" class="btn btn-success">Ir</a></td>
            <td width="10%"><button onclick="delete_schedule_on( delete_replace )" class="btn btn-danger">Eliminar</button></td>
        </tr>
        ```
    }

    function getLocation() {
        $.ajax({
            type:'GET',
            url:'/location/' + $('#txt1').val(),
            data:'_token = <?php echo csrf_token() ?>',
            
            success: function(data) {
                $('#destination option[value="' + data + '"').prop('selected', true);
            },
            error: function (err) {
                console.log('Destino no reconocido, por favor selecciona uno de la lista');
            }
        });
    }
    
    $(document).ready(function() {
        getUserSchedule();
    });
    
    function getUserSchedule() {
        url = '{{ route("schedule.index") }}';
        
        $.ajax({
            url: url,
            method: 'GET',
            success: function(response) {
                console.log(response);
                uptadeUserSchedule();
            },
            error: function(response) {
                alert('Ocurrió un error al recuperar la lista de destinos del usuario:(\nIntenta recargar la página');
                console.log(response);
            }
        });
    }
    
    function uptadeUserSchedule() {
        
    }
    
    $('#add-schedule').on('submit', function(event) {
        event.preventDefault();
        
        var url = '{{ route("schedule.store") }}';
        
        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                console.log(response.success);
            },
            error: function(response) {
                console.log(response);
            }
        })
    });
</script>

@endsection

@section('footer')
<footer class="footer1">
    <img src="{{ asset('img/logbom.png') }}" alt="hol4"  id="dog" onpointerover="play()" onclick="rickroll('https://www.youtube.com/watch?v=dQw4w9WgXcQ')">
    <p id="bt">bottom text</p>
</footer>
@endsection
