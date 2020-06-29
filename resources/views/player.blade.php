@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Player Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form>
                        <div class="form-group">
                                <label for="exampleFormControlSelect1">Team Name</label>
                                <select class="form-control" name="teamId">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">First Name</label>
                            <input type="text" name="firstName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Last Name</label>
                            <input type="text" name="lastName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Logo</label>
                            <input type="file" name="logoUri" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Player Jersey Number</label>
                            <input type="text" name="playerJerNo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Country</label>
                            <input type="text" name="country" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Player History</label>
                            <textarea type="text" name="playerHistory" class="form-control" rows="5"></textarea>
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
