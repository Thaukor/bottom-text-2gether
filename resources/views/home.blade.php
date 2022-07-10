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
                        <input id="add-entry-submit" type="submit" class="btn btn-primary" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Modal end -->

    <div class="modal" id="savedEntryModal" tabindex="-1" aria-labelledby="savedEntryModal" aria-hidden="true">
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
                        <input id="add-entry-submit" type="submit" class="btn btn-primary" value="Guardar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- other modal end  -->
    <div></div>

    <br><br><br><br><br>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="schedule-list">
                <table class="table table-striped align-middle">
                    <thead>
                        <tr class="text-center">
                            <td colspan="4" width="100%"><h2>Revisa tus entradas creadas</h2></td>
                        </tr>
                    </thead>
                    <tbody id="schedule-body">
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <!-- Pagination -->
                            <td colspan="4" class="">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item">
                                        <button class="page-link active" onclick="paginate(1)">Lunes</button>
                                    </li>
                                    <li class="page-item">
                                        <button class="page-link" onclick="paginate(2)">Martes</button>
                                    </li>
                                    <li class="page-item">
                                        <button class="page-link" onclick="paginate(3)">Miércoles</button>
                                    </li>
                                    <li class="page-item">
                                        <button class="page-link" onclick="paginate(4)">Jueves</button>
                                    </li>
                                    <li class="page-item">
                                        <button class="page-link" onclick="paginate(5)">Viernes</button>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    </tfoot>
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
    
    var schedule = {
        1: [
            {'id': 1, 'location': 'Prueba', 'time': '16:34:00'}, {'id': 2, 'location': 'Prueba 3', 'time': '16:34:00'}, 
        ],
        2: [
            {'id': 1, 'location': 'Prueba 2', 'time': '16:35:00'}
        ],
        3: [],
        4: [],
        5: []
    }

    function paginate(day) {
        // SUSSY
        for (let index = 1; index < 6; index++) {
            if (index == day) {
                // Show this days entries
                $('.day' + index).show();
            } else {
                $('.day' + index).hide();
            }
        }
    }

    function formatScheduleEntryHTML(destination, day, time, url, id) {
        sFormat = `
        <tr class='day_replace'>
            <td class="text-center" width="40%">
                <span class="destination">destination_replace</span>
                <br>
            </td>
            <td>time_replace</td>
            <td width="10%"><a href="url_replace" class="btn btn-success">Ir</a></td>
            <td width="10%"><button onclick="delete_schedule_on( delete_replace )" class="btn btn-danger">Eliminar</button></td>
        </tr>
        `
        // Worst replace ever
        fFormat = ((((sFormat.replace('day_replace', 'day' + day)).replace('destination_replace', destination)).replace('url_replace', url)).replace('delete_replace', id)).replace('time_replace', time);
        return fFormat;
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
                alert('Destino no reconocido, por favor selecciona uno de la lista');
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
                uptadeUserSchedule(response);
            },
            error: function(response) {
                alert('Ocurrió un error al recuperar la lista de destinos del usuario:(\nIntenta recargar la página');
                console.log(response);
            }
        });
    }
    
    function uptadeUserSchedule(elements) {
        // Reset schedule data
        schedule = {
            1: [], 2: [], 3: [], 4: [], 5: []
        };

        final_html = "" // Replace table rows with this
        elements.forEach(el => {
            id = el['id'];
            url = "{{ url('/match') }}" + '/' + id;
            console.log(url);
            final_html += formatScheduleEntryHTML(el['location'], el['day'], el['time'], url, id);
        });

        $('#schedule-body').html(final_html);
        paginate(1);
    }
    
    function delete_schedule_on( id ) {
        url = '{{ url("/schedule") }}/' + id;

        $.ajax({
            url: url,
            method: 'DELETE',
            data: {'_token':'{{ csrf_token() }}'},
            success: function(response) {
                console.log(response);
                getUserSchedule();
                alert('Entrada eliminida exitosamente');
            },
            error: function(response) {
                console.log(response);
                alert('Ocurrió un error al eliminar la entrada');
            }
        });
    }

    $('#add-schedule').on('submit', function(event) {
        event.preventDefault();
        $('#add-entry-submit').prop('disabled', true);
        $('#add-entry-submit').val('Guardando...');

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
                getUserSchedule();
            },
            error: function(response) {
                console.log(response);
            },
            complete: function() {
                alert('Entrada creada exitosamente');

                $('#add-entry-submit').val('Guardar');
                $('#add-entry-submit').prop('disabled', false);
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
