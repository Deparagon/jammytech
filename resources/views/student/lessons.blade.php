@extends('userlayout')


@section('pagetitle')
  Lessons | Tutorago
@endsection

@section('dashbreadcumb')
<ol class="breadcrumb">
  <li><a href="{{ url('/user/dashboard') }}">Home</a></li>
  <li class="active">My Lessons</li>
</ol>

@stop

@section('innercontent')

<section class="lesson-stat">
<div class="row"> 
<div class="col-sm-4">
<div class="panel panel-default">
<div class="panel-heading"> Ongoing </div>
<div class="panel-body">
    <p>{{ TTools::displayNumber($ongoingcount) }} </p>
</div>
</div>
 </div>
 <div class="col-sm-4">
<div class="panel panel-default">
<div class="panel-heading"> Completed</div>
<div class="panel-body">

     <p>{{ TTools::displayNumber($completedcount) }} </p>
</div>
</div>
 </div>

  <div class="col-sm-4">
<div class="panel panel-default">
<div class="panel-heading">Lessons</div>
<div class="panel-body">
     <p>{{ TTools::displayNumber($alllessoncount) }} </p>
</div>
</div>
 </div>
 
</div>
</section>
<section>
  <div class="row">
<div class="col-sm-12">
   <form class="" id="" method="POST" action="">

 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title"> Lesson History </h4>
     </div>
     <div class="panel-body">

<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
  <tr> <th> SN </th> <th> Course /Subject(s) </th> <th> Tutor</th> <th>Payment</th> <th> Start</th> <th> End Date</th> </tr>
</thead>

<tbody>
@if(count($mylessons) >0)
@foreach( $mylessons as $k =>$lesson)
<tr> <td> {{ $k+1 }} </td> <td> {{ $lesson->coursename }}</td> <td> <a href="{{ url('/user/tutor/'.$lesson->id_tutor) }}"> {{ DaUser::getUserNames($lesson->id_tutor) }} </a> </td> <td> {{ $lesson->paymentstatus}}</td> <td> {{ $lesson->start }} </td> <td> {{ $lesson->end }}</td> </tr>

@endforeach
@else

<tr> <td colspan="6"> No lesson found, <a href="{{ url('/user/newlesson') }}"> start a new lesson </a> </td></tr>
  
  @endif
</tbody>

</table>
</div>
<hr>


 </div>
  <div class="panel-footer"> 
                   {{ $mylessons->links() }}
   </div>
</div>
</form>

  </div>
  </div>
  
</section>



@stop