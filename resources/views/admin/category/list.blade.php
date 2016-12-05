@extends('adminlayout')


@section('pagetitle')
 List Category | Admin Category Management
@endsection

@section('dashbreadcumb')
<div class="row"> 
  <div class="col-sm-12"> 
    <ol class="breadcrumb">
  <li><a href="">Home</a></li>
  <li><a href="#">Categories</a></li>
</ol>
   </div>
</div>

@stop

@section('innercontent')
<h2 class="cent-h"> Categories </h2>

<section class="list-course-categories">
{{ csrf_field() }}
<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
  <tr> <th> ID </th> <th>Image</th> <th> Name </th> <th> Description</th> <th colspan="2">Action</th></tr>
</thead>

<tbody>
@if(!empty($categories))
@foreach( $categories as $category)
<tr> <td> {{ $category->id }} </td> <td> <img class="list-img" src="/uploads/{{ $category->imageurl }}"></td> <td> {{ $category->name }}</td> <td> {{ $category->description }} </td> <td>  <a href="{{ url('/admin/category/'.$category->id) }}"><i class="fa fa-edit"> </i> </td> <td> <a  id="killcategorybtnwithajaxinadmin"  data-killcatid="{{ $category->id }}" href="javascript:;"> <i class="fa fa-trash"> </i> </a></td></tr>

@endforeach
  
  @endif
</tbody>

</table>
</div>

</section>

@stop

