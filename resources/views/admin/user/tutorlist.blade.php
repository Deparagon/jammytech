@extends('adminlayout')

@section('pagetitle')
 List of Tutors | Admin Tutor Management
@endsection

@section('dashbreadcumb')
<div class="row"> 
  <div class="col-sm-12"> 
    <ol class="breadcrumb">
  <li><a href="">Home</a></li>
  <li><a href="#">Tutors</a></li>
</ol>
   </div>
</div>

@stop

@section('innercontent')

<section class="list-tutors">
 <h3 class="top-list-1">  <span> Tutors  </span> </h3>
{{ csrf_field() }}
<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
  <tr> <th> ID </th>  <th> Firstname </th> <th>Lastname </th> <th> Email </th> <th> Date Joined</th>  <th colspan="2">Action</th></tr>
</thead>

<tbody> 
@if(count($tutors) >0)
@foreach( $tutors as $tutor)
<tr> <td> {{ $tutor->id }} </td><td> {{ $tutor->firstname }}</td>   <td> {{ $tutor->lastname }}</td> <td> {{ $tutor->email }} </td> <td> {{ $tutor->created_at }}</td> <td>  <a href="{{ url('/admin/tutor/'.$student->id) }}"><i class="fa fa-edit"> </i> </td> <td> <a  id="killdeletestudentfromdbandallacts"  data-killstudentdata="{{ $tutor->id }}" href="javascript:;"> <i class="fa fa-trash"> </i> </a></td></tr>

@endforeach

@else

<tr> <td colspan="6"> No tutor found</td></tr>
  
  @endif
</tbody>

</table>
</div>

</section>

@stop

