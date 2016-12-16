@extends('userlayout')

@section('pagetitle')
  My Classes | Tutorago
@endsection

@section('dashbreadcumb')
<ol class="breadcrumb">
  <li><a href="{{ url('/user/dashboard') }}">Home</a></li>
  <li class="active">My Classes </li>
</ol>

@stop

@section('innercontent')

<section class="lesson-stat">
<div class="row"> 
<div class="col-sm-4">
<div class="panel panel-blackbar">
<div class="panel-body">
    <h4>Ongoing </h4>

    <p>{{ TTools::displayNumber($ongoingcount) }} </p>
</div>
</div>
 </div>

 <div class="col-sm-4">
<div class="panel panel-blackbar">
<div class="panel-body">
   <h4> Classes </h4>
     <p>{{ TTools::displayNumber($allclasses) }} </p>
</div>
</div>
 </div>

 <div class="col-sm-4">
<div class="panel panel-blackbar">
<div class="panel-body">
    <h4> Completed </h4>
     <p>{{ TTools::displayNumber($completedcount) }} </p>
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
          <h4 class="panel-title"> My Classes </h4>
     </div>
     <div class="panel-body">

<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
  <tr> <th> SN </th> <th> Student </th> <th> Course/Subject</th> <th>Start</th><th> End Date</th> <th colspan="2">Status</th></tr>
</thead>

<tbody>
@if(count($myclasses) >0)
@foreach( $myclasses as $k =>$myclass)
<tr> <td> {{ $k+1 }} </td> <td> {{ $myclass->firstname }} </td> <td> {{ $myclass->coursename }}</td>  <td> {{ $myclass->start }} </td> <td> {{ $myclass->end }}</td> <td> {{ $myclass->status }}</td> @if ($myclass->status =='Ongoing')<td> <a href="{{ url('/user/lessoncomplete/'.$myclass->lesson_id) }}" class="btn btn-success btn-block">  Lesson Complete  </a></td> @endif </tr> 

@endforeach
  
  @endif
</tbody>

</table>
</div>
<hr>


 </div>
  <div class="panel-footer"> 

   </div>
</div>
</form>

  </div>
  </div>
  
</section>



@stop
