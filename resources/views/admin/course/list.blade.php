@extends('adminlayout')


@section('pagetitle')
 List Courses | Tutorago Course Management
@endsection

@section('dashbreadcumb')
<div class="row"> 
  <div class="col-sm-12"> 
    <ol class="breadcrumb">
  <li><a href="">Home</a></li>
  <li><a href="#">Course</a></li>
</ol>
   </div>
</div>

@stop

@section('innercontent')
<h2 class="cent-h"> Courses </h2>

<section class="list-course-categories">
{{ csrf_field() }}
<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
  <tr> <th> ID </th> <th> Image</th>  <th> Category </th> <th> Name </th> <th> Description</th> <th colspan="2">Action</th></tr>
</thead>

<tbody> 
@if(!empty($courses))
@foreach( $courses as $course)
<tr> <td> {{ $course->id }} </td> <td> <img class="list-img" src="/uploads/{{ $course->imageurl }}"></td> <td> {{ $course->category->name }}</td>   <td> {{ $course->name }}</td> <td> {{ $course->description }} </td> <td>  <a href="{{ url('/admin/course/'.$course->id) }}"><i class="fa fa-edit"> </i> </td> <td> <a  id="killcoursesbtnwithajaxinadmin"  data-killcatid="{{ $course->id }}" href="javascript:;"> <i class="fa fa-trash"> </i> </a></td></tr>

@endforeach
  
  @endif
</tbody>

</table>
</div>

</section>

@stop

