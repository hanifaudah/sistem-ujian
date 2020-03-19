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
                                @foreach ($tests as $test)
                                    <div class="card bg-light p-2 my-3 d-flex flex-row justify-content-between align-items-center">
                                        <div>
                                            <h5><a href="/takeTest/{{$test->id}}">{{$test->name}}</a></h5>
                                            <small>Duration: {{$test->duration}}</small>
                                            <small>Questions: {{count(App\Problem::where('test_id', $test->id)->get())}}</small>
                                        </div>
                                        <a href="/takeTest/{{$test->id}}" class="btn btn-outline-success">Take Test</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
