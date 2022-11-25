@extends('layouts.app')

@section('content')
<div class="container-fluid" style="height:300px;">
    <div class="row mt-5">
        <div class="col-md-3">
            <div class="card text-center mt-5" style="border:0px solid black">
                <h2 class="mt-3">DashBoard</h2>

                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('home')}}" id="nav">
                        <i class="fa-sharp fa-solid fa-user"></i>    
                        <span class="item text-black">Home</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('user1')}}" id="nav">
                        <i class="fa-sharp fa-solid fa-user"></i>    
                        <span class="item text-black">Profile</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('user')}}" id="nav">
                        <i class="fa-sharp fa-solid fa-user"></i>    
                        <span class="item text-black">All Users</span></a>
                    </li>
                </ul>
            </div>
        </div>
   
        <div class="col-md-7 mt-5">
            <h2 class="text-center">{{ __('Welcome') }}</h2>
            <div class="card">
                <div class="card-body" style="font-size:18px;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Hi You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

