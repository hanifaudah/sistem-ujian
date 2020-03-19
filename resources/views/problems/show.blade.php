@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
            <div class="card">
                <div class="card-header">Welcome, {{ auth()->user()->name }}!</div>
                
                <div class="card-body">
                  <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-lg-3 bg-light flex-row">
                            @for($i = 1; $i < $count; $i++)
                              @if($i == $index)
                                <div class="question-tab-current">{{$i}}</div>
                              @else
                                <div class="question-tab">{{$i}}</div>
                              @endif
                            @endfor
                        </div>
                        <div class="col-12 col-lg-9">
                            <h4>{!! $problem->question !!}</h4>
                            <form action="" method="POST">
                              @foreach (json_decode($problem->choices) as $choice)
                                <input type="radio" id="{{$loop->index}}" name="choices">
                                <label for="{{$loop->index}}">{{$choice}}</label><br>
                              @endforeach
                            </form>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
    </div>
</div>
@endsection
