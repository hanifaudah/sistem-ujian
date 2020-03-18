@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
            <div class="card">
                <div class="card-header">Welcome, {{ $user->name }}!</div>
                
                <div class="card-body">
                  <h1>Test Control Panel</h1>
                  <a href="/tests/create" class="btn btn-outline-secondary">New Test</a>
                  <div class="mt-3">
                    @foreach ($tests as $test)
                      <div class="card bg-light p-2 my-3 d-flex flex-row justify-content-between">
                        <div>
                          <h5>{{$test->name}}</h5>
                          <small>Duration: {{$test->duration}}</small>
                          <small>Questions: {{$test->numberOfQuestions}}</small>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                          <a class="btn btn-outline-secondary mr-3" href="/tests/{{$test->id}}">Edit Problems</a>
                          <form action="/tests/{{$test->id}}" method="POST">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
            </div>
    </div>
</div>
@endsection
