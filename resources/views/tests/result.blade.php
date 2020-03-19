@extends('layouts.app')
@section('title', "$test->name results")
@section('content')
<div class="d-flex jumbotron flex-column align-items-center">
    <h1 class="display-4 border-bottom border-dark">{{$test->name}} Results</h1>
    <p>You Scored:</p>
    <h2>{{number_format($grade, 2)}}%</h2>
    <p class="lead">
        <a class="btn btn-outline-secondary btn-lg" href="/home" role="button">Go to dashboard</a>
    </p>
</div>
@endsection