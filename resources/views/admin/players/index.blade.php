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
               <div class="table-responsive">
                  <div class="table-title">
                     <div class="row">
                        <div class="col-sm-8">
                           <h2>Player <b>Details</b></h2>
                        </div>
                        <div class="col-sm-4">
                           <a href="{{ route('admin.players.create') }}" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</a>
                        </div>
                     </div>
                  </div>
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th>Id</th>
                           <th>First Name</th>
                           <th>Last Name</th>
                           <th>Player Jersey Number</th>
                           <th>Country</th>
                           <th>Player History</th>
                           <th>Logo</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        @if (count($players) > 0)
                        @foreach ($players as $player)
                        <tr>
                           <td>{{ ++$i }}</td>
                           <td>{{ $player->firstName }}</td>
                           <td>{{ $player->lastName }}</td>
                           <td>{{ $player->playerJerNo }}</td>
                           <td>{{ $player->country }}</td>
                           <td>{{ $player->playerHistory }}</td>
                           <td><img src="{{ URL::to('/') }}/images/{{ $player->imageUri }}" class="img-thumbnail" width="75" /></td>
                           <td>
                              <a href="{{ route('admin.players.edit',[$player->id]) }}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                              <a href="{{ route('admin.players.destroy',[$player->id]) }}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                           </td>
                        </tr>
                        @endforeach
                        <td style="background: none;border: none;">
                           {!! $players->render() !!}
                        </td>
                        @else
                        <tr>
                           <td colspan="4"></td>
                        </tr>
                        @endif 
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection