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
                           <h2>Matche <b>Details</b></h2>
                        </div>
                        <div class="col-sm-4">
                           <a href="{{ route('admin.matches.create') }}" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</a>
                        </div>
                     </div>
                  </div>
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th>Id</th>
                           <th>Team1</th>
                           <th>Team2</th>
                           <th>Winner</th>
                        </tr>
                     </thead>
                     <tbody>
                        @if (count($matches) > 0)
                        @foreach ($matches as $matche)
                        <tr>
                           <td>{{ ++$i }}</td>
                           <td>{{ $matche->team1 }}</td>
                           <td>{{ $matche->team2 }}</td>
                           <td>
                              @if($matche->result =='')         
                              Not Declared        
                              @else
                              {{ $matche->result }}     
                              @endif
                           </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                           <td colspan="3"></td>
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