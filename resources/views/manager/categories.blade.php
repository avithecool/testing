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
<!--<div id="categoriescontent"></div>-->
<div>
   <a href="categories/create">Add New</a>
   <div class="table-responsive">
    <table class="table">
      <tr>
        <th>@sortablelink('id')</th>
        <th>Name</th>
        <th>Description</th>
     </tr>
    @foreach($cats as $cat)
    <tr>
      <th>{{$cat->id}}</th>
      <th>{{$cat->name}}</th>
      <th>{{$cat->description}}</th>
    </tr>

    @endforeach

    </table>
    {{@$cats->links()}}
</div>
</div>
 @endsection

