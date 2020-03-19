@extends('layouts.app')

@section('content')
<form action="/problems/{{$problem->id}}" method="POST">
  @csrf
  @method('PUT')
  <h1>Edit Problem</h1>
  <hr>
  <h4>Question</h4>
  <textarea id="article-ckeditor" name="question" id="" cols="30" rows="10" placeholder="Enter Question">{{$problem->question}}</textarea>
  <hr>
  <div>
    <h3>Enter Choices</h3>
    <h4>Answer</h4>
    <textarea id="article-ckeditor" cols="30" rows="10" name="answer" placeholder="Enter Answer">{{$problem->answer}}</textarea>
    <h4>Choice A</h4>
    <textarea id="article-ckeditor" cols="30" rows="10" name="choices[]" placeholder="Enter Choice A">{{$choices[0]}}</textarea>
    <h4>Choice B</h4>
    <textarea id="article-ckeditor" cols="30" rows="10" name="choices[]" placeholder="Enter Choice B">{{$choices[1]}}</textarea>
    <h4>Choice C</h4>
    <textarea id="article-ckeditor" cols="30" rows="10" name="choices[]" placeholder="Enter Choice C">{{$choices[2]}}</textarea>
    <h4>Choice D</h4>
    <textarea id="article-ckeditor" cols="30" rows="10" name="choices[]" placeholder="Enter Choice D">{{$choices[3]}}</textarea>
    <h4>Choice E</h4>
    <textarea id="article-ckeditor" cols="30" rows="10" name="choices[]" placeholder="Enter Choice E">{{$choices[4]}}</textarea>
  </div>
  <button class="btn btn-outline-success" type="submit">Submit</button>
  <a class="btn btn-outline-danger" href="/tests/{{$problem->test_id}}">Cancel</a>
</form>
@endsection
