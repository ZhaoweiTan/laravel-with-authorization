@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (Session::has("message"))
                        {{ Session::get("message") }}
                    @endif
                    <form action="/excel" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="file" name="file">
                        <input type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
