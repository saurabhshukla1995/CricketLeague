@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Team Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Team Name</label>
                            <input type="text" name="teamName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Club State</label>
                            <input type="text" name="clubState" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Logo</label>
                            <input type="file" name="logoUri" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-success">Submit</button>
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
