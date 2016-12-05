@extends('adminlayout')


@section('pagetitle')
 Lessons | Tutorago Lessons
@endsection

@section('dashbreadcumb')
<div class="row"> 
  <div class="col-sm-12"> 
    <ol class="breadcrumb">
  <li><a href="{{ '/admin/dashboard' }}">Home</a></li>
  <li><a href="#">Lessons</a></li>
</ol>
   </div>
</div>

@stop

@section('innercontent')
@if (count($errors))

@foreach($errors->all() as $error)
{{ TTools::naError($error) }} 

@endforeach

@endif

@if (session()->has('createdbank'))

    {{ TTools::naSuccess(session('createdbank')) }} 

   @endif

<section class="all-lesson-admin">
<div class="panel panel-blackbar">
<div class="panel-heading"> 
<h4 class="panel-title"> Lessons </h4>
</div>
<div class="table-responsive">
   <table class="table table-stripped table-bordered">
      <thead>
        <th> ID</th> <th> Date </th> <th>Student</th> <th> Course/Subject</th> <th> Payment Status</th>  <th> Lesson Status </th> <th>Manage</th> 
      </thead>
<tbody>
   @if(count($lessons) >0)
@foreach( $lessons as $lesson)
<tr> <td> {{ $lesson->lessonid }} </td> <td> {{ TTools::displayDate($lesson->createdat) }}</td> <td> {{ $lesson->lastname }} {{ $lesson->firstname }} </td> <td> {{ $lesson->coursename }}</td>  <td> {{ $lesson->paymentstatus}}</td> <td> {{ $lesson->destatus }}</td>  <td> <a href="{{ url('/admin/lessons/'.$lesson->lessonid) }}"> <i class="fa fa-send"> </i> </a></td> </tr>

@endforeach
@else

<tr> <td colspan="5"> No lesson found </td></tr>
  
  @endif
  


</tbody>

   </table>
</div>
</div>
</section>


@endsection

