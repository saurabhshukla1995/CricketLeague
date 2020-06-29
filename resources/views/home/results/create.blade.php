@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Matche Dashboard Create</div>
                    <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('macthes'))
                        <div class="alert alert-warning" role="alert">
                            {{ session('macthes') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('admin.matches.store') }}" enctype="multipart/form-data">
                        @csrf                        
                        <div class="form-group">
                                <label for="exampleFormControlSelect1">Team Name</label>
                                <select class="form-control team" name="team1">
                                    <option selected="selected" disabled="disabled"> Select Team Name</option>           

                                    @foreach($matches as $match)
                                    <option value="{{ $match->team1 }} VS {{ $match->team2 }}">{{ $match->team1 }} VS {{ $match->team2 }}</option>
                                    @endforeach
                                </select>
                                @error('team1')
                                  <div class="alert alert-danger">{{ $message }}</div>
                               @enderror
                        </div>
                        <div class="form-group">
                                <label for="exampleFormControlSelect1">Select Winner</label>
                                <select class="form-control" name="AllTeam" id="AllTeam">
                                    
                                </select>
                                @error('team2')
                                  <div class="alert alert-danger">{{ $message }}</div>
                               @enderror
                        </div>
                        <div class="form-group">
                            {!! Form::submit(('Submit'), ['class' => 'btn btn-success']) !!}
                        </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("select.team").on('change', function () {
        var selectedTeam = $(".team option:selected").val();
        var numbersArray = selectedTeam.split('VS');
        var team1 = numbersArray[0];
        var team2 = numbersArray[1];
        var myOptions = {
            team1 : numbersArray[0],
            team2 : numbersArray[1]
        };
        var mySelect = $('#AllTeam');
        $('#AllTeam')
            .find('option')
            .remove()
            .end();
        
        $.each(myOptions, function(val, text) {
            mySelect.append(
                $('<option></option>').val(val).html(text)
            );
        });
    });
});
</script>
@endsection
