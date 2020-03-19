@extends('layouts.app')

@section('content')
<form action="/problems/{{$test_id}}" method="POST">
  <h1>Add Problem</h1>
  @csrf
  <hr>
  <h4>Question</h4>
  <textarea id="article-ckeditor" name="question" id="" cols="30" rows="10" placeholder="Enter Question"></textarea>
  <hr>
  <div>
    <h3>Enter Choices</h3>
    <h4>Answer</h4>
    <textarea cols="30" rows="10" name="answer" placeholder="Enter Answer"></textarea>
    <h4>Choice A</h4>
    <textarea cols="30" rows="10" name="choices[]" placeholder="Enter Choice A"></textarea>
    <h4>Choice B</h4>
    <textarea cols="30" rows="10" name="choices[]" placeholder="Enter Choice B"></textarea>
    <h4>Choice C</h4>
    <textarea cols="30" rows="10" name="choices[]" placeholder="Enter Choice C"></textarea>
    <h4>Choice D</h4>
    <textarea cols="30" rows="10" name="choices[]" placeholder="Enter Choice D"></textarea>
    <h4>Choice E</h4>
    <textarea cols="30" rows="10" name="choices[]" placeholder="Enter Choice E"></textarea>
  </div>
  <button class="btn btn-outline-success" type="submit">Submit Problem</button>
  <a class="btn btn-outline-danger" href="/tests/{{$test_id}}">Cancel</a>
</form>
@endsection
