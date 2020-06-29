@extends('layouts.app')
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
                                <select class="form-control" name="team1">
                                    @foreach($teams as $team)
                                    <option value="{{ $team->teamName }}">{{ $team->teamName }}</option>
                                    @endforeach
                                </select>
                                @error('team1')
                                  <div class="alert alert-danger">{{ $message }}</div>
                               @enderror
                        </div>
                        <div class="form-group">
                                <label for="exampleFormControlSelect1">Team Name</label>
                                <select class="form-control" name="team2">
                                    @foreach($teams as $team)
                                    <option value="{{ $team->teamName }}">{{ $team->teamName }}</option>
                                    @endforeach
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
@endsection
