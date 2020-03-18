@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
            <div class="card">
                <div class="card-header">Welcome, {{ $user->name }}!</div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 col-lg-3 bg-light">
                                <h5>{{$user->name}}</h5>
                                <h5>{{$user->email}}</h5>
                                <h5>Joined on {{$user->created_at}}</h5>
                            </div>
                            <div class="col-12 col-lg-9">
                                <h1>Available Tests</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
