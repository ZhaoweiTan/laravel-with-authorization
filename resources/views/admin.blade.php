@extends('layouts.app')

@section('extra-head-content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        .table-vcenter td {
            vertical-align: middle!important;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Newly registered users</div>

                    <div class="panel-body">
                        <table class="table table-bordered table-vcenter">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Register Date</th>
                                <th>Verify</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($new_users as $new_user)
                                <tr id="tr-for-{{ $new_user->id }}">
                                    <td>{{ $new_user->name }}</td>
                                    <td>{{ $new_user->email }}</td>
                                    <td>{{ $new_user->created_at }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="...">
                                            <button type="button" class="btn btn-default btn-ok" value="{{ $new_user->id }}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                                            <button type="button" class="btn btn-default btn-remove" value="{{ $new_user->id }}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-footer-content')
    <script type="text/javascript">
        $(document).ready(function() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $('.btn-ok').click(function() {
//                alert($(this).attr("value"));
                var target_row = $(this).parents('tr');
                $.post('/admin/verify_user',
                    {
                        _token: CSRF_TOKEN,
                        id: $(this).attr("value")
                    }, function(data, status){
                        target_row.css('display', 'none');
                    });
            });
            $('.btn-remove').click(function() {
//                alert($(this).attr("value"));
                var target_row = $(this).parents('tr');
                $.post('/admin/delete_user',
                    {
                        _token: CSRF_TOKEN,
                        id: $(this).attr("value")
                    }, function(data, status){
                        target_row.css('display', 'none');
                    });
            });
        });
    </script>
@endsection