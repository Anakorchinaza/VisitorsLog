@extends('layouts.app')

@section('pagetitle', '$pagetitle')

@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-2">
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

            <div class="col-md-10 mt-5">
                <h2 class="text-center mt-4 mb-3">{{$pagetitle}}</h2>
                @include('partials.success')
                @include('partials.error')

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Lastname</th>
                                <th>Firstname</th>
                                <th>Email Address</th>
                                <th>Gender</th>
                                <th>Date of Birth</th>
                                <th>Phone Number</th>
                                <th>Last Seen</th>
                                <th>Status</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $kounter = 0;
                           ?>
                            @foreach($users as $key=>$value)
                            <tr>
                                <td><?php echo ++$kounter ?></td>
                                <td>{{$value->firstname}}</td>
                                <td>{{$value->lastname}}</td>
                                <td>{{$value->email}}</td>
                                <td>{{$value->gender}}</td>
                                <td>{{$value->dob}}</td>
                                <td>{{$value->phonenumber}}</td>
                                <td>{{Carbon\Carbon::parse($value->last_seen)->diffForHumans() }}</td>
                                <td>
                                    @if(Cache::has('user-is-online' . $value->users_id))
                                        <label class="btn btn-success">Signed In</label>
                                    @else
                                        <label class="btn btn-secondary">Signed Out</label>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection