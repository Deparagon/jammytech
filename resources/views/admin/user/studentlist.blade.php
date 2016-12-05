@extends('adminlayout')

@section('pagetitle')
 List of Students | Admin Tutor Management
@endsection

@section('dashbreadcumb')
<div class="row"> 
  <div class="col-sm-12"> 
    <ol class="breadcrumb">
  <li><a href="">Home</a></li>
  <li><a href="#">Students</a></li>
</ol>
   </div>
</div>

@stop

@section('innercontent')
<h2 class="cent-h"> <span>Students </span> </h2>

<section class="list-students">
{{ csrf_field() }}
<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
  <tr> <th> ID </th>  <th> Firstname </th> <th>Lastname </th> <th> Email </th> <th> Date Joined</th>  <th colspan="2">Action</th></tr>
</thead>

<tbody> 
@if(!empty($students))
@foreach( $students as $student)
<tr> <td> {{ $student->id }} </td><td> {{ $student->firstname }}</td>   <td> {{ $student->lastname }}</td> <td> {{ $student->email }} </td> <td> {{ $student->created_at }}</td> <td>  <a href="{{ url('/admin/student/'.$student->id) }}"><i class="fa fa-edit"> </i> </td> <td> <a  id="killdeletestudentfromdbandallacts"  data-killstudentdata="{{ $student->id }}" href="javascript:;"> <i class="fa fa-trash"> </i> </a></td></tr>

@endforeach

@else

<tr> <td colspan="6"> No Student found</td></tr>

  
  @endif
</tbody>

</table>
</div>

</section>

@stop

