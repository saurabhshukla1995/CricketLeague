@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Player Dashboard Create</div>
                    <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('admin.players.store') }}" enctype="multipart/form-data">
                        @csrf                        
                        <div class="form-group">
                                <label for="exampleFormControlSelect1">Team Name</label>
                                <select class="form-control" name="teamId">
                                    @foreach($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->teamName }}</option>
                                    @endforeach
                                </select>
                                @error('teamId')
                                  <div class="alert alert-danger">{{ $message }}</div>
                               @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">First Name</label>
                            <input type="text" name="firstName" class="form-control">
                            @error('firstName')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Last Name</label>
                            <input type="text" name="lastName" class="form-control">
                            @error('lastName')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Player Jersey Number</label>
                            <input type="text" name="playerJerNo" class="form-control">
                            @error('playerJerNo')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Country</label>
                            <input type="text" name="country" class="form-control">
                            @error('country')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Player History</label>
                            <textarea type="text" name="playerHistory" class="form-control" rows="5"></textarea>
                            @error('playerHistory')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Logo</label>
                            <input type="file" name="imageUri" class="form-control-file">
                            @error('imageUri')
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
