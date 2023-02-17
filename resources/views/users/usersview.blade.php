@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        @include('sidebar')
        <div class="col-md-9">
            <div class="card">

                <div class="card-header">{{ __('Dashboard') }}</div>
            </div>
             <div class="row">
                <div class="col-md-12">
                   @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                  
                    <table class="table table-stripped">
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                         @foreach($userdata as $userdt)
                        <tr>
                           <td>{{$loop->iteration}}</td>
                           <td>{{$userdt->name}}</td>
                           <td>{{$userdt->email}}</td>
                           <td> 
                                @if(Auth::user()->role==1)
                                <a class="btn  {{($userdt->role==1) ? 'btn-success' : 'btn-info'}}" href="{{route($rolechange,[\Crypt::encrypt($userdt->id)])}}">{{($userdt->role==1) ? 'Admin' : 'User'}}</a>
                                @else
                                 <a class="btn btn-success" href="#">{{($userdt->role==1) ? 'Admin' : 'User'}}</a>
                                @endif
                           </td>
                           <td> @if(Auth::user()->role==1)
                                <a class="btn {{($userdt->status==1) ? 'btn-warning' : 'btn-secondary'}} " href="{{route($statususer,[\Crypt::encrypt($userdt->id)])}}">{{($userdt->status==1) ? 'Active' : 'Inactive'}}</a>
                                @else
                                 <a class="btn {{($userdt->status==1) ? 'btn-warning' : 'btn-secondary'}} " >{{($userdt->status==1) ? 'Active' : 'Inactive'}}</a>
                                @endif</td>
                           <td>
                                <a class="btn btn-primary" href="{{route($edituser,[\Crypt::encrypt($userdt->id)])}}">Edit</a>
                                @if(Auth::user()->role==1)
                                <a  class="btn btn-danger" href="{{route($deleteuser,[\Crypt::encrypt($userdt->id)])}}">Delete</a>

                                @endif
                           </td>

                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection