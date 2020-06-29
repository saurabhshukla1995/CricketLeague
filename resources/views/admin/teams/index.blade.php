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
               <div class="table-responsive">
                  <div class="table-title">
                     <div class="row">
                        <div class="col-sm-8">
                           <h2>Team <b>Details</b></h2>
                        </div>
                        <div class="col-sm-4">
                           <a href="{{ route('admin.teams.create') }}" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</a>
                        </div>
                     </div>
                  </div>
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th>Id</th>
                           <th>Team Name</th>
                           <th>State Club</th>
                           <th>Point</th>
                           <th>Pictures</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        @if (count($teams) > 0)
                        @foreach ($teams as $team)
                        <tr>
                           <td>{{ ++$i }}</td>
                           <td>
                              <a href="javascript:void(0);" onclick="PlayerList({{ $team->id }})">
                              {{ $team->teamName }}
                              </a>
                           </td>
                           <td>{{ $team->clubState }}</td>
                           <td>{{ $team->point }}</td>
                           <td><img src="{{ URL::to('/') }}/images/{{ $team->logoUri }}" class="img-thumbnail" width="75" /></td>
                           <td>
                              <a href="{{ route('admin.teams.edit',[$team->id]) }}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                              <a href="{{ route('admin.teams.destroy',[$team->id]) }}" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                           </td>
                        </tr>
                        @endforeach
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
<script>
   function PlayerList(id)
   {
       $.ajax({
             type: 'POST',
             url: "{{url('admin/getData')}}/" + id,
             data: {"_token": "{{ csrf_token() }}" },
             dataType: 'html',
             success: function (results) {
                 swal({
                     title: "Player Details",
                     html:results,
                     showCancelButton: !0,
                     reverseButtons: !0
                  }).then(function (e) {
                     if (e.value === true) {
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                     } else {
                        e.dismiss;
                     }
                  }, function (dismiss) {
                     return false;
                  })
             }
         }); 
       
   }
</script>
@endsection