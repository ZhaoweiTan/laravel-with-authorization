@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @foreach($paperInfo as $paper)
                            <h2>{{$paper->title}}</h2>
                            <p>{{$paper->conf}} ({{$paper->abbreviation}}), {{$paper->page}}, {{$paper->year}}</p>
                            <p>Topic: {{$paper->topic}}</p>
                            <p>Abstract: {{$paper->abstract}}</p>
                            <p>整理人: {{$paper->people}}</p>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
