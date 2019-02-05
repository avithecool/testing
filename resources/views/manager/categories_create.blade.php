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
 <h2>Add Category</h2>
 <form method="post" name="catform" action="{{route('categories.store')}}">
 <div class="form-group">
    <label for="exampleInputEmail1">Category Name</label>
    <input type="text" class="form-control" name="name" aria-describedby="nameHelp" placeholder="Enter name">

  </div>
  <div class="form-group">
   <p>  <label for="exampleInputEmail1">Category Description</label></p>
    <textarea name="description"></textarea>
  </div>
  <p>State</p>
   <select name="state">
       <option value="1">Yes</option>
       <option value="0">No</option>
   </select>
  <button type="submit" class="btn btn-primary">Submit</button>
   @csrf
</form>

@include('manager.components.errors')
 @endsection

