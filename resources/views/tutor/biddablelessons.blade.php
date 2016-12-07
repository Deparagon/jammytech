@extends('userlayout')

@section('pagetitle')
 Lessons Awaiting Application | Tutorago
@endsection

@section('dashbreadcumb')
<ol class="breadcrumb">
  <li><a href="{{ url('/user/dashboard') }}">Home</a></li>
  <li class="active">Apply to a lesson</li>
</ol>

@stop

@section('innercontent')

<section>
  <div class="row">
<div class="col-sm-12">

 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title"> Lessons Awaiting your Application </h4>
     </div>
     <div class="panel-body">

<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
  <tr>  <th> Date </th> <th> Course/Subject</th> <th> Starts In </th> <th> City </th> <th> State</th> <th> Duration</th> <th>Apply</th></tr>
</thead>

<tbody>
@if(!empty($biddablelessons))
@foreach( $biddablelessons as $biddable)
<tr> <td> {{ TTools::showDate($biddable->created_at) }} </td> <td> {{ $biddable->course->name }} </td> <td> {{ $biddable->lessonstartin }}</td> <td> {{ $biddable->lessoncity }} </td> <td> {{ $biddable->lessonstate}}</td> <td>  {{ $biddable->duration }} Month(s) </td> <td> <a class="btn btn-md btn-success"  href="{{ url('/user/biddable/'.$biddable->id) }}"> <i class="fa fa-check-square-o"> </i> </a> </td> </tr>

@endforeach
  
  @else 
  <tr> <td colspan="7"> We are currently waiting for new lesson request from our students</td></tr>
  @endif
</tbody>

</table>
</div>
<hr>



        

 </div>

</div>

  </div>
  </div>
  
</section>



@stop