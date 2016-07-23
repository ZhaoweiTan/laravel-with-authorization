@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                  <div class="panel-body">
                    <div class="container">
                        <p>按会议简称搜索 <a href="paper/allvenue">显示所有会议</a> </p>
                        <form name="input" action="paper/venue" method="get">
                          <input type="text" name="v" />
                          <input type="submit" value="Submit" />
                        </form>
                        <br />

                        <p>按关键词搜索 <b style="color:red">(new!)</b></p>
                        <form name="input" action="paper/keyword" method="get">
                          <input type="text" name="q" />
                          <input hidden name="o" value="year" />
                          <input type="submit" value="Submit" />
                        </form>

                    </div>
                  </div>
                </div>
            </div>
        </div>
</div>
@endsection
