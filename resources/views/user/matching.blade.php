@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="row">
            <h2 class="text-center">Buscando grupo</h2>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <p>Destino: {{$data['loc']}}</p>
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
                update_members(response);
            },
            error: function(response) {
                console.log(response);
            }
        })
    });
</script>

@endsection