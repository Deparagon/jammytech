@extends('userlayout')

@section('pagetitle')
  Lesson Application | Tutorago
@endsection
@section('dashbreadcumb')
<ol class="breadcrumb">
  <li><a href="{{ url('/user/dashboard') }}">Home</a></li>
  <li class="active">Lesson Application</li>
</ol>

@stop

@section('innercontent')

@if (count($errors))

@foreach($errors->all() as $error)
{{ TTools::naError($error) }}  

@endforeach

@endif

    @if (session()->has('biddone'))

    {{ TTools::naSuccess(session('biddone')) }}

@endif
<section>
  <div class="row">
<div class="col-sm-8">
 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title"> Course Details </h4>
     </div>
       <div class="table-responsive"> 
         <table class="table table-stripped table-bordered">
          <thead>
            <th>Course Info</th> <th> Detail</th>
          </thead>

           <tbody>
             <tr> <td>Name</td> <td> {{ $course->name }}</td></tr>
             <tr> <td>Description</td> <td> {{ $course->description }}</td></tr>
           </tbody>
           

         </table>


       </div>
</div>
 <!-- lesson details -->

  <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title"> Lesson Details </h4>
     </div>
       <div class="table-responsive"> 
         <table class="table table-stripped table-bordered">
          <thead>
            <th>Criteria</th> <th> Detail</th>
          </thead>

           <tbody>
             <tr> <td>Street </td> <td> {{ $lesson->lessonstreet }}</td></tr>
             <tr> <td>City</td> <td> {{ $lesson->lessoncity }}</td></tr>
<tr> <td>State</td> <td> {{ $lesson->lessonstate }}</td></tr>
<tr> <td>Lesson Starts </td> <td> {{ $lesson->lessonstartin }} From {{ TTools::showDate($lesson->created_at)}}</td> </tr>

<tr> <td>Duration</td> <td> {{ $lesson->duration }} Month(s)</td></tr>
<tr> <td>Hours per Day</td> <td> {{ $lesson->hoursperday }}</td></tr>
<tr> <td>Time of the day</td> <td> {{ $lesson->lessonstarttime }}</td></tr>
<tr> <td>Days </td> <td> {{ $days }}</td></tr>
<tr> <td>Students Level </td> <td> {{ $lesson->studentlevel }}</td></tr>
<tr> <td>Tutors Gender </td> <td> {{ $lesson->tutorgender }}</td></tr>
<tr> <td>Lesson Budget </td> <td> {{ TTools::showPrice($lesson->budget) }}</td></tr>
<tr> <td>Preferred Location </td> <td> @if ($lesson->lessonlocation =='tutorsaddress') Tutor Address @else Student Address @endif</td></tr>

           </tbody>
           

         </table>

       </div>

  
</div>



  </div>
  <div class="col-sm-4">
   <div class="panel panel-default">
    <div class="panel-heading"> Lesson Goal </div>
    <div class="panel-body">
<p class="well"> 
  {{ $lesson->lessongoal }}
</p>

    </div>
   </div>

   <form method="POST" action="">
   <div class="panel panel-default">
     <div class="panel-heading"> Apply Now  </div>
      <div class="panel-body">
          {{ csrf_field() }}
        <div class="form-group">
         <label for="comment"> Say Something </label>
          <textarea class="form-control" rows="5" name="comment"></textarea>
        </div>

         <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
        <div class="form-group">
            <label for="fee"> My fee </label>
           <input  type="text" class="form-control" placeholder="10000" name="price" value="">
          </div>
         <div class="row"> 
           <div class="col-sm-8 col-sm-offset-2">
            <button class="btn btn-block btn-success" @if ($ibid =='Yes') disabled @endif type="submit"> Apply </button>

           </div>
         </div>


      </div>

   </div>
   </form>

  </div>
  </div>
</section>
@stop