@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
            <div class="card">
                <div class="card-header">Welcome, {{ auth()->user()->name }}!</div>
                
                <div class="card-body">
                  <h1>Problems in {{$test->name}}</h1>
                  <a href="/problems/create/{{$test->id}}" class="btn btn-outline-secondary">New Problem</a>
                  <div class="mt-3">
                    @foreach ($problems as $problem)
                      <div class="card bg-light p-2 my-3 d-flex flex-row justify-content-between">
                        <div>
                          <a href="/problems/{{$problem->id}}/{{$loop->index+1}}">{{ $loop->index+1 }}. {!! $problem->question !!}</a>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                          <a class="btn btn-outline-secondary mr-3" href="/problems/{{$problem->id}}/edit">Edit Question</a>
                          <form action="/problems/{{$test->id}}" method="POST">
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
