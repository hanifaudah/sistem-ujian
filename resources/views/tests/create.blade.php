@extends('layouts.app')

@section('content')
<form action="/tests" method="POST">
  <h1>Create Test</h1>
  @csrf
  <label for="name">Test Name</label>
  <input class="form-control" type="text" name="name" placeholder="Enter Test Name...">
  <label for="duration">Enter Test Duration (minutes)</label>
  <input class="form-control" type="text" name="duration" placeholder="Enter Test Duration...">
  <button class="btn btn-outline-success" type="submit">Submit Test</button>
  <a class="btn btn-outline-danger" href="/tests">Cancel</a>
</form>
@endsection
