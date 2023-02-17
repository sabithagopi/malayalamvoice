@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        @include('sidebar')
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" >
                              <div class="card-body">
                                <h5 class="card-title">Users</h5>
                                <p class="card-text"><strong>Total</strong> {{$countusers}} users registered</p>
                                <a href="{{url($userslist)}}" class="btn btn-primary">Users List</a>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" >
                              <div class="card-body">
                                <h5 class="card-title">Articles</h5>
                                <p class="card-text"><strong>Total</strong> {{$countarticle}} Articles</p>
                                <a href="#" class="btn btn-primary">Article list</a>
                              </div>
                            </div>
                        </div>                       
                        <div class="col-md-4">
                           <div class="card" >
                              <div class="card-body">
                                <h5 class="card-title">Breaking News</h5>
                                 <p class="card-text"><strong>Total</strong> {{$countbreakingnews}} Breaking News</p>
                                <a href="#" class="btn btn-primary">Breaking News list</a>
                              </div>
                            </div>
                        </div>   
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" >
                              <div class="card-body">
                                <h5 class="card-title">Banners</h5>
                                <p class="card-text"><strong>Total</strong> {{$countbanner}} Banners</p>
                                <a href="#" class="btn btn-primary">Banners</a>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" >
                              <div class="card-body">
                                <h5 class="card-title">Audiance Poll</h5>
                                <p class="card-text"><strong>Total</strong> {{$countaudiencepoll}} Audiance Poll</p>
                                <a href="#" class="btn btn-primary">Audiance Poll list</a>
                              </div>
                            </div>
                        </div>                       
                        <div class="col-md-4">
                           <div class="card" >
                              <div class="card-body">
                                <h5 class="card-title">Video Stories</h5>
                                 <p class="card-text"><strong>Total</strong> {{$countVideostories}} Video Stories</p>
                                <a href="#" class="btn btn-primary">Video Stories list</a>
                              </div>
                            </div>
                        </div>   
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
