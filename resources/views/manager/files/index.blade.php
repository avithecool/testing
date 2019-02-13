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
@component('manager.files.toolbar')

    @slot('title')
    <h2>Files Manager</h2>
    @endslot
    <div class="pull-right">
    <a href="files/create"><button class="btn">+ Add New</button></a>
    </div>


@endcomponent

@if(session('message'))
{{session('message')}}
@endif

 <div class="row">
        <div class="col-md-12">
            @isset($files)
            <div class="box-body table-responsive">
                    <table id="users" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>@sortablelink('title')</th>
                            <th>@sortablelink('description')</th>
                            <th>@lang('image') </th>
                            <th>@lang('state')</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                         <tbody id="pannel">
                        @forelse($files as $file)
    <tr>
        <td>{{ $file->id }}</td>
        <td>{{ $file->title }}</td>

        <td>{{ $file->description }}</td>
    <td><img src="{{ Storage::url('/app/'.$file->image )}}" /></td>

        <td>{{ $file->state }}</td>

          <td>
        <form id="form{{$file->id}}" action="{{ url('manager/files' , $file->id ) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <a class="btn btn-danger btn-xs btn-block"  onclick="document.getElementById('form{{$file->id}}').submit()" >
    <span class="fa fa-remove"></span></a>
    </form>

    </td>
<td>
<a href="files/{{$file->id}}/edit">
    Edit
    </a>
</td>
    </tr>
    @empty
      <tr>
          <td colspan="5">No Files</td>
      </tr>
@endforelse


                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div id="pagination" class="box-footer">
                    {{ $files->links() }}
                </div>
            </div>
            @endisset
            @unless (@$files!=null)
            <p>No files found.</p>
            @endunless
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
 @endsection

