@extends('layouts.app')
@section('title', $test->name)
@section('content')
<div class="d-flex jumbotron flex-column align-items-center">
    <h1 class="display-4 border-bottom border-dark">{{$test->name}}</h1>
    <p>You have {{$test->duration}} minutes to complete this test</p>
    <p>Good Luck!</p>
    <p class="lead">
        <a class="btn btn-success btn-lg" href="/startTest/{{$test->id}}/0" role="button">Start Test</a>
        <a class="btn btn-warning btn-lg" href="/home" role="button">Go back</a>
    </p>
</div>
@endsection