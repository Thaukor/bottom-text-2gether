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
                <p>Destino: {{$data}}</p>
            </div>    
        </div>
    </div>

    <form id="check-groups" action="{{ route('match.store') }}" method="post">
        @csrf
        <input class="btn btn-success" type="submit" value="Recargar">
        <p id="results"></p>
    </form>

</div>



<script>
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
            },
            error: function(response) {
                console.log(response);
            }
        })
    });
</script>

@endsection