@extends('layouts.app')

@section('css_links')
<link href="{{ asset('css/estilos2.css') }}" rel="stylesheet">
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
            <input class="btn btn-success" type="submit" value="Recargar">
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
        <h4 class="text-center">Participantes del grupo</h4>
        <div id="group-container">

        </div>
    </div>
</div>



<script>
    function update_members(members) {
        var html_to_add = ""

        members.forEach(element => {
            html_to_add += element['name'] + "<br>";
        });

        $('#group-container').html(html_to_add);

    }
    group_id = -1;
    group_found = false;

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