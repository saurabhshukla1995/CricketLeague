@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Team Dashboard</div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('admin.teams.update',[$team->id]) }}" enctype="multipart/form-data" accept-charset="UTF-8">
                        <input type="hidden" name="_method" value="PUT" />

                        @csrf
                        <div class="form-group">
                            <label for="Team Name">Team Name*</label>
                            <input type="text" value="{{ $team->teamName }}" name="teamName" class="form-control">
                            @error('teamName')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Club State">Club State*</label>
                            <input type="text" value="{{ $team->clubState }}" name="clubState" class="form-control">
                            @error('clubState')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Logo">Logo*</label>
                            <input type="file" name="logoUri" class="form-control-file">
                            <td><img src="{{ URL::to('/') }}/images/{{ $team->logoUri }}" class="img-thumbnail" width="150" /></td>
                            @error('logoUri')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
