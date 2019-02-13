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


@endcomponent
 <div class="row">
        <div class="col-md-12">
             <form name="files" action="/manager/files" method="post" enctype="multipart/form-data" class="form-validation">
             @csrf
             @method('patch')
                  <div class="form-group">
                    <label>Title</label>
                  <input value="{{old('title')?old('title'):$file->title}}" type="text" class="form-control required" required="required" name="title" id="title" aria-describedby="emailHelp" placeholder="Enter title">
                   </div>
                   <div class="form-group">
                        <label>Description</label>
                   <textarea name="description" class="form-control">{{old('description')?old('description'):$file->description}}</textarea>
                       </div>
                       <div class="form-group">
                            <label>Upload Image</label>
                              <input type="file"   class="form-control required" name="image" accept=".gif,.jpg,.jpeg,.png"    aria-describedby="emailHelp" placeholder="Upload Image" />
                               @if($file->image!='')
                       <img width="100px" src="{{ '/storage/'.$file->image}}"/>
                               @endif
                            </div>

                           <div class="form-group">
                                <label>Upload Extension Zip</label>
                                <input type="file" class="form-control required" " accept=".zip"  name="filename" aria-describedby="emailHelp" placeholder="Upload File" />
                                @if($file->filename!='')
                                 <a href="{{$file->filename}}">Check File </a>
                                 @endif

                            </div>


                  <div class="form-group">
                        <label>Price</label>
                        <input type="text" value="{{old('price')?old('price'):$file->price}}" class="form-control required"   name="price" aria-describedby="emailHelp" placeholder="Enter Price">
                       </div>

                       <div class="form-group">
                        <label>version</label>
                        <input type="text" class="form-control required" value="{{old('version')?old('version'):$file->version}}"  name="version" aria-describedby="emailHelp" placeholder="Version">
                       </div>

                   <div class="form-check">
                    <input type="checkbox" {{ old('state')?' checked ':$file->state?'checked':''}} value="1" class="form-check-input" id="state" name="state">
                    <label class="form-check-label" for="exampleCheck1">Enable me</label>
                  </div>

    <div class="pull-right">
        <button type="submit" class="btn btn-primary validate" value="Save">Save</button>
        </div>
              </form>

 @include('manager.components.errors')

 {{ Session::get("error_msg") }}
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
 @endsection
