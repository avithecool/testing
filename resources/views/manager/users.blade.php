@extends('layouts.adminapp')
@section('css')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/sweetalert2/6.3.8/sweetalert2.min.css">
    <style>
        input, th span {
            cursor: pointer;
        }
    </style>
@endsection


@section('content')
 <h2>Users</h2>

 <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <strong>@lang('Roles') :</strong> &nbsp;
                    <input type="radio" name="role" value="all" checked> @lang('All')&nbsp;
                    <input type="radio" name="role" value="admin"> @lang('Administrator')&nbsp;
                     <input type="radio" name="role" value="default"> @lang('User')&nbsp;<br>
                    <strong>@lang('Status') :</strong> &nbsp;
                    <input type="checkbox" name="new" @if(request()->new) checked @endif> @lang('New')&nbsp;
                    <input type="checkbox" name="valid"> @lang('Valid')&nbsp;
                    <input type="checkbox" name="confirmed"> @lang('Confirmed')
                    <div id="spinner" class="text-center"></div>
                </div>
                <div class="box-body table-responsive">
                    <table id="users" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>@sortablelink('name')</th>
                            <th>@sortablelink('email')</th>
                            <th>@lang('Role') </th>
                            <th>@lang('New')</th>
                            <th>@lang('Valid')</th>
                            <th>@lang('Confirmed')</th>
                            <th>@sortablelink('created_at')</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>@lang('Name')</th>
                            <th>@lang('Email')</th>
                            <th>@lang('Role')</th>
                            <th>@lang('New')</th>
                            <th>@lang('Valid')</th>
                            <th>@lang('Confirmed')</th>
                            <th>@lang('Creation')</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </tfoot>
                        <tbody id="pannel">
                        @foreach($data as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
            @if($user->type === 'admin')
                Administrator
            @else
                User
            @endif
        </td>
        <td>
            <input type="checkbox" name="seen" value="{{ $user->id }}" {{ is_null($user->ingoing) ?  'disabled' : 'checked'}}>
        </td>
        <td>
            <span {!! $user->valid ? ' class="fa fa-check"' : '' !!}></span>
        </td>
        <td>
            <span {!! $user->confirmed ? ' class="fa fa-check"' : '' !!}></span>
        </td>
        <td>{{ $user->created_at->formatLocalized('%c') }}</td>
        <td><a class="btn btn-warning btn-xs btn-block" href="{{ route('users.edit', [$user->id]) }}" role="button" title="@lang('Edit')"><span class="fa fa-edit"></span></a></td>
        <td>
        <form id="form{{$user->id}}" action="{{ url('manager/users' , $user->id ) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <a class="btn btn-danger btn-xs btn-block"  onclick="document.getElementById('form{{$user->id}}').submit()" >
    <span class="fa fa-remove"></span></a>
    </form>

    </td>

    </tr>
@endforeach


                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div id="pagination" class="box-footer">
                    {{ $data->links() }}
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
 @endsection

