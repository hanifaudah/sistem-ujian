@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
            <div class="card">
                <div class="card-header">Solve the question below!</div>
                <div class="card-body">
                  <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-lg-3 bg-light py-3">
                            @for($i = 0; $i < $count; $i++)
                              @if($i == $index)
                                <a class="question-tab current" href="/startTest/{{$test_id}}/{{$i}}">{{$i+1}}</a>
                              @else
                                <a class="question-tab" href="/startTest/{{$test_id}}/{{$i}}">{{$i+1}}</a>
                              @endif
                            @endfor
                        </div>
                        <div class="col-12 col-lg-9">
                            <h4>{{$index+1}}. {!! $problem->question !!}</h4>
                            <form action="/storeGrade/{{$test_id}}/{{$problem->id}}/{{$index}}" method="POST">
                              @csrf
                              @foreach (json_decode($problem->choices) as $choice)
                                @if ($choice == $selected)
                                  <input type="radio" id="{{$loop->index}}" name="choices" value="{{$choice}}" checked>
                                @else
                                  <input type="radio" id="{{$loop->index}}" name="choices" value="{{$choice}}">
                                @endif
                                <label for="{{$loop->index}}">{{$choice}}</label><br>
                              @endforeach
                              <button type="submit">Submit Answer</button>
                            </form>
                            <div class="d-flex justify-content-end mt-3">
                              <div>
                                @if ($index > 0)
                                <a href="/startTest/{{$test_id}}/{{$index-1}}" class="btn btn-outline-secondary mr-3">Previous Question</a>
                                @endif
                                @if ($index == $count-1 )
                                  <a href="/startTest/{{$test_id}}/{{$index+1}}" class="btn btn-outline-secondary">Next Question</a>
                                  <a href="/results/{{$test_id}}" class="btn btn-success">Finish Test</a>
                                @endif
                              </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
    </div>
</div>
@endsection
