@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @foreach($papers as $paper)
                            <a href="paper?ID={{$paper->ID}}">{{$paper->title}}</a> from {{$paper->abbreviation}} ({{$paper->year}})
                            <br />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
