@extends('layouts.layout')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">Team Details</div>
            <div class="card-body">
               @if (session('status'))
               <div class="alert alert-success" role="alert">
                  {{ session('status') }}
               </div>
               @endif
               <div class="table-responsive">
                  <div id="player_detail">  
                  </div>
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th>Id</th>
                           <th>Team Name</th>
                           <th>State Club</th>
                           <th>Point</th>
                           <th>Pictures</th>
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
             url: "{{url('/getData')}}/" + id,
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