@extends('layouts.app')

@section('css_links')
<link href="{{ asset('css/estilos2.css') }}" rel="stylesheet">
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
    <div class="col-md-4"></div>
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
    </div>
</div>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <hr>
        <div class="row">
            <div class="col-md-4">
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
    <div class="col-md-4"></div>
    <div class="col-md-4">
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



<script>
    function update_members(members) {
        var html_to_add = "";
        
        members.forEach(element => {
            console.log(element);
            id = element['user_id'];
            html_to_add += "<tr><td>" + element['name'] + "</td><td> <a href= '{{ url('profile')}}/" + id + "' class='btn btn-primary'> Ver perfil </td></tr>";
        });
        
        $('#group-container').html(html_to_add);
        
    }
    group_id = -1;
    group_found = false;
    var interval

    function start_group_search() {
        $('#check-groups').submit();
        $('#search-btn').prop('disabled', true);
        $('#search-btn').addClass('disabled');
        $('#search-btn').html('Buscando');

        interval = setInterval(update_group, 5000);
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
                console.log(response);
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
        clearInterval(interval)
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