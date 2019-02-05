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
                  <div class="form-group">
                    <label>Title</label>
                  <input value="{{old('title')}}" type="text" class="form-control required" required="required" name="title" id="title" aria-describedby="emailHelp" placeholder="Enter title">
                   </div>
                   <div class="form-group">
                        <label>Description</label>
                   <textarea name="description" class="form-control">{{old('description')}}</textarea>
                       </div>
                       <div class="form-group">
                            <label>Upload Image</label>
                       <input type="file"   class="form-control required" name="image" accept=".gif,.jpg,.jpeg,.png"    aria-describedby="emailHelp" placeholder="Upload Image" />
                           </div>

                           <div class="form-group">
                                <label>Upload Extension Zip</label>
                                <input type="file" class="form-control required" " accept=".zip"  name="filename" aria-describedby="emailHelp" placeholder="Upload File" />
                               </div>


                  <div class="form-group">
                        <label>Price</label>
                        <input type="text" value="{{old('price')}}" class="form-control required"   name="price" aria-describedby="emailHelp" placeholder="Enter Price">
                       </div>

                       <div class="form-group">
                        <label>version</label>
                        <input type="text" class="form-control required"  name="version" aria-describedby="emailHelp" placeholder="Version">
                       </div>

                   <div class="form-check">
                    <input type="checkbox" {{old('state')?' checked ':''}} value="1" class="form-check-input" id="state" name="state">
                    <label class="form-check-label" for="exampleCheck1">Enable me</label>
                  </div>

    <div class="pull-right">
        <button type="submit" class="btn btn-primary validate" value="Save">Save</button>
        </div>
              </form>

 @include('manager.components.errors')

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
 @endsection
