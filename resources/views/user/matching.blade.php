@extends('layouts.app')

@section('css_links')
<link href="{{ asset('css/estilos2.css') }}" rel="stylesheet">
<link href="{{ asset('css/chatstyle.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/match.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<style>
    .bigger-text {
        font-weight: bold;
        font-size: large;
    }
</style>
@endsection

@section('content')


<div class="row">
    <div class="col-md-1"></div>
    
    <div class="col-md-4">
        <div class="row">
            <h2 id="title-group" class="text-center">Buscando grupo</h2>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <p>Destino: {{$data['loc']}}</p>
            </div>
            <div class="col-md-6">
                <p><span class="bigger-text">Actualmente estás: </span> <span id="status">Buscando grupo</span></p>
            </div>    
        </div>
        <form id="check-groups" action="{{ route('match.store') }}" method="post">
            @csrf
            <input type="hidden" name="day" value="{{ $data['day'] }}">
            <input type="hidden" name="destination" value="{{ $data['destination_id'] }}">
            <btn id="search-btn" class="btn btn-success" onclick="start_group_search()"> Buscar grupo </btn>
            <p id="results"></p>
        </form>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-12">
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <form id="user-status" action="" method="post">
                            @csrf
                            <input type="submit" id="user-status-btn" value="Estoy en camino" class="btn btn-warning">
                        </form>
                    </div>
                    <div class="col-md-4">
                        <form id="leave-group-form" action="" method="DELETE">
                            @csrf
                            <input type="submit" value="Salir del grupo" class="btn btn-danger">
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-12">
                <hr>
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Participantes del grupo</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tbody id="group-container">
                                
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        
        <div class="col-md-11">
            <!--...-->
            <section style="background-color: #eee;">
                <div class="container" id="cont_general">
                    
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center p-3"
                                style="border-top: 4px solid plum;">
                                <h5 class="mb-0">Chat de grupo</h5>
                                
                                
                                
                            </div>
                            <div id="msg-container" class="card-body" data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px">
                                
                                <!--  OTRO PARTICIPANTE sussy baka -->
                                
                                <!-- termina el mensaje del OTRO PARTICIPANTE-->
                                
                                <!-- EMPIEZA MSG USUARIO-->
                                
                            </div>
                            <!-- TERMINA LA WEA-->
                            
                            
                            <!-- EMPIEZA EL BOTON Y EL CAMPO-->
                            <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                                <form id="message-form" class="input-group mb-0" method="post">
                                    @csrf
                                    <input id="msg" type="text" class="form-control" name="msg" placeholder="Escribe un mensaje"
                                    aria-label="Recipient's username" aria-describedby="button-addon2" />
                                    <input type="submit" value="Enviar" class="btn btn-warning" style="padding-top: .55rem;" id="user_msg">
                                    <!-- <button class="btn btn-warning" type="button" id="user_msg" style="padding-top: .55rem;" >
                                        Enviar
                                    </button> -->
                                </form>
                            </div>
                            
                            <!-- TERMINA ESA SECCION-->
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </section>
        <!--...-->      
    </div>
    
    
</div>





<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Chat messages base HTML
    other_message_base_HTML = `
    <div class="d-flex justify-content-between">
        <p class="small mb-1">user_name_replace</p>
        <p class="small mb-1 text-muted">time_replace</p>
    </div>
    <div class="d-flex flex-row justify-content-start">
        <img src="{{ asset('img/chola.jpg') }}"
        alt="avatar 1" style="width: 45px; height: 100%;">
        <div>
            <p class="small p-2 ms-3 mb-3 rounded-3" style="background-color: #f5f6f7;">msg_replace</p>
        </div>
    </div>
    `
    
    my_message_base_HTML = `
    <div class="d-flex justify-content-between">
        <p class="small mb-1 text-muted">time_replace</p>
        <p class="small mb-1">user_name_replace</p>
    </div>
    <div class="d-flex flex-row justify-content-end mb-4 pt-1">
        <div>
            <p class="small p-2 me-3 mb-3 text-white rounded-3 bg-warning" id="user_msg">msg_replace</p>
        </div>
        <img src="{{ asset('img/petrol.jpg') }}"
        alt="avatar 1" style="width: 45px; height: 100%;">
    </div>
    `
    
    $('#message-form').on('submit', function (event) {
        event.preventDefault();

        url = '{{ route("chat.store") }}';

        $.ajax({
            url: url,
            method: 'POST',
            data: {
                '_token': '{{ csrf_token() }}',
                'msg': $('#msg').val(),
                'group_id': group_id
            },
            dataType: 'JSON',
            success: function(response){
                console.log(response);
                $('#msg').val('');
            },
            error: function(response) {
                console.log(response);
            }
        });
    });
    
    function get_msg() {
        url = '{{ url("chat") }}/' + group_id;
        $.ajax({
            url: url,
            method: 'GET',
            success: function(response) {
                show_msg(response);
            },
            error: function(response) {
                console.log(response);
            }
        });
    }
    
    function format_msg(message, base_HTML) {
        final_HTML = ((base_HTML.replace('time_replace', ' ')).replace('user_name_replace', message['name'])).replace('msg_replace', message['message']);
        
        return final_HTML;
    }
    
    function show_msg(messages) {
        html_to_add = "";
        
        // Go through all the messages
        messages.forEach(message => {
            // Check if the message is from the user
            add = other_message_base_HTML;
            if (message['user_id'] == {{ Auth::user()->id }}) {
                add = my_message_base_HTML;
            }
            
            html_to_add = format_msg(message, add) + html_to_add;
        });
        
        $('#msg-container').html(html_to_add);
    }
    
    function update_members(members) {
        var html_to_add = "";
        
        members.forEach(element => {
            id = element['user_id'];
            html_to_add += "<tr><td>" + element['name'] + "</td><td> <a href= '{{ url('profile')}}/" + id + "' class='btn btn-primary'> Ver perfil </td></tr>";
            });
            
        $('#group-container').html(html_to_add);
        
    }
    
    group_id = -1;
    group_found = false;
    var interval;
    var chat_interval;
    
    function start_group_search() {
        $('#check-groups').submit();
        $('#search-btn').prop('disabled', true);
        $('#search-btn').addClass('disabled');
        $('#search-btn').html('Buscando');
        
        interval = setInterval(update_group, 5000);
        chat_interval = setInterval(get_msg, 5000);
    }
    
    function update_group() {
        $('#check-groups').submit();
    }
    
    $('#check-groups').on('submit', function(event) {
        event.preventDefault();
        var url = '{{ route("match.store") }}';
        
        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                update_members(response.members);
                if (!group_found) {
                    group_found = true;
                    $('#status').html('Esperando');
                    $('#title-group').html('Grupo');
                    
                    group_id = response.group_id;
                }
            },
            error: function(response) {
                console.log(response);
            }
        });
    });
    
    $('#leave-group-form').on('submit', function(event) {
        event.preventDefault();
        // Stop auto update
        clearInterval(interval);
        clearInterval(chat_interval);

        // Enable search group btn
        $('#search-btn').prop('disabled', false);
        $('#search-btn').html('Buscar grupo');
        $('#search-btn').removeClass('disabled');
        
        var url = '/match/' + group_id;
        console.log(url)
        console.log(group_id);
        
        $.ajax({
            url: url,
            type: 'DELETE',
            data: {
                'id': group_id,
                '_token': '{{ csrf_token() }}',
            },
            dataType: 'JSON',
            success: function(response) {
                console.log(response);
                update_members([]);
            },
            error: function(response) {
                console.log(response);
            }
        });
    });
    
    $('#user-status').on('submit', function(event) {
        event.preventDefault();
        
        btn = $('#user-status-btn');
        status = $('#status');
        if (btn.val() == 'Estoy en camino') {
            $('#status').html('En camino a tu destino...');
            
            btn.val('Llegué');
            btn.removeClass('btn-warning');
            btn.addClass('btn-success');
        } else if (btn.val() == 'Llegué') {
            $('#status').html('Llegaste a tu destino');
            
            btn.removeClass('btn-success');
            btn.addClass('btn-warning');
            btn.val('Estoy en camino');
        }
    });
</script>

@endsection