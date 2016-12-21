@extends('adminlayout')


@section('pagetitle')
 {{ $course->name }} Lesson | Tutorago 
@endsection

@section('dashbreadcumb')
<div class="row"> 
  <div class="col-sm-12"> 
    <ol class="breadcrumb">
  <li><a href="{{ '/admin/dashboard' }}">Home</a></li>
  <li><a href="#"> {{ $course->name }} Lesson</a></li>
</ol>
   </div>
</div>

@endsection

@section('innercontent')
@if (count($errors))

@foreach($errors->all() as $error)
{{ TTools::naError($error) }} 

@endforeach

@endif

@if (session()->has('updatedfee'))

    {{ TTools::naSuccess(session('updatedfee')) }} 

   @endif

@if (session()->has('feeerror'))

    {{ TTools::naError(session('feeerror')) }} 

   @endif
   <section class="">
    <h2 class="top-view-adminlesson"> <span> {{ $course->name }} Lesson requested by {{ $student->firstname }} </span></h2>
   </section>
<section class="all-lesson-admin">
<div class="row">
<div class="col-sm-6"> 
   <h3> Student </h3>
   <div class="table-responsive">
    <table class="table table-stripped table-bordered">
    <thead>
      <th> Criteria </th> <th> Info</th>
    </thead>
    <tbody>
    <tr><td> Name </td> <td> {{ $student->lastname }} {{ $student->firstname }}</td> </tr>
     <tr><td>Phone </td> <td> {{ $student->phone }}</td> </tr>
    <tr><td> Email </td> <td> {{ $student->email }}</td> </tr>
   <tr> <td> Joined </td> <td> {{ TTools::displayDate($student->created_at) }}</td> </tr>
     </tbody>
    </table>

   </div>


   <h3> Course /Subject </h3>
   <div class="table-responsive">
    <table class="table table-stripped table-bordered">
    <thead>
      <th> Criteria </th> <th> Info</th>
    </thead>
    <tbody>
    <tr><td> Name </td> <td> {{ $course->name }} </td> </tr>
    <tr><td> Description </td> <td> {{ $course->description }}</td> </tr>
     </tbody>
    </table>

   </div>


   <h3> Payment </h3>
   <div class="table-responsive">
    <table class="table table-stripped table-bordered">
    <thead>
      <th> Criteria </th> <th> Info</th>
    </thead>
    <tbody>
    <tr><td> Payment Status </td> <td> {{ $lesson->paymentstatus }} </td> </tr>
    <tr><td> Lesson Status </td> <td> {{ $lesson->status }}</td> </tr>
     </tbody>
    </table>

   </div>

</div>

<div class="col-sm-6"> 
   <h3> Lesson</h3>
   <div class="table-responsive">
    <table class="table table-stripped table-bordered">
    <thead>
      <th> Criteria </th> <th> Info</th>
    </thead>
    <tbody>
    <tr> <td> Address </td> <td> {{ $lesson->lessonstreet }}, {{ $lesson->lessoncity }}, {{ $lesson->lessonstate }}</td> </tr>
    <tr> <td> Number of Student </td> <td> {{ $lesson->lessonstudentcount }}</td> </tr>
    
   <tr> <td> Location </td> <td> {{ $lesson->lessonlocation }}</td> </tr>
    
    <tr><td> Duration </td> <td> {{ $lesson->duration }}</td></tr>

   <tr> <td> Start Time </td> <td> {{ $lesson->lessonstarttime }}</td> </tr>

    <tr><td> Student Level </td> <td> {{ $lesson->studentlevel }}</td> </tr>
    <tr><td> Goal </td> <td> {{ $lesson->lessongoal }}</td></tr>
    <tr><td> Budget  </td> <td> {{ $lesson->budget }}</td></tr>
    <tr><td> Agreed Amount  </td> <td> {{ TTools::displayPrice($lesson->amount) }}</td></tr>

    <tr><td> Tutor Gender </td> <td> {{ $lesson->tutorgender }}</td></tr>
    <tr><td> Start </td> <td> {{ $lesson->start }}</td> </tr>
    <tr><td> Ends </td> <td> {{ $lesson->end }}</td> </tr>


     </tbody>
    </table>

   </div>

   <h3> Tutor </h3>
   <div class="table-responsive">
    <table class="table table-stripped table-bordered">
    <thead>
      <th> Criteria </th> <th> Info</th>
    </thead>
    <tbody>
    <tr><td> Name  </td> <td> @if (isset($tutor)) @if (isset($tutor->firstname)) <a target="_blank" href="{{ url('/user/tutor/'.$tutor->id) }}"> {{ $tutor->lastname }}, {{ $tutor->firstname }}</a> @else No tutor   @endif @else No tutor @endif </td> </tr>
  
     </tbody>
    </table>

   </div>


</div>

</div>
</section>
<hr>
<section>
  <div class="row">
  <div class="col-sm-6">
  <div class="panel panel-default">
  <div class="panel-body">
  <h3> Apply Processing Fee</h3>
  <hr>
  @if ($lesson->status =='Fresh')
  <form method="POST" action="{{ url('/admin/lesson/processingfee') }}">
  {{ csrf_field() }}
  <input type="hidden" value="{{ $lesson->id }}" name="lesson">
  <button type="submit" class="btn btn-lg btn-success"> Apply Processing Fee </button>
  </form>
  <br>
<p class="">  <cite> Apply payment to lesson when payment is made via bank account /non-automatted method </cite>. Once payment is applied, the lesson will become biddable. </p>
@else
<p class="well"> Lesson Processing fee has been paid </p>
@endif
</div>
</div>
  </div>

  <div class="col-sm-6">
    <div class="panel panel-default">
  <div class="panel-body">
    <h3> Apply Lesson Fee</h3>
    <hr>

  @if ($lesson->status =='Biddable')
  <form method="POST" action="{{ url('/admin/lesson/mainfee') }}">
   {{ csrf_field() }}
  <input type="hidden" value="{{ $lesson->id }}" name="lesson">
  <button type="submit" class="btn btn-lg btn-success"> Apply Lesson Fee </button>
  </form>
  <br>
<p class="">  <cite> Apply payment to lesson when payment was made via bank account /non-automatted method </cite> </p>
<p>Once payment is applied, lesson will start, tutor will be informed.</p>
<p> Ensure that the payment made via bank account is equal to  @if (isset($invoice)) @if (isset($invoice->amount)) {{ TTools::displayPrice($invoice->amount )}} @endif @endif </p>
@else
<p class="well"> You can only apply lesson fee when lesson is in biddable state And Awaiting Payment from student</p>
@endif

  </div>
  </div>
  </div>
  </div>
</section>

<section>
  <a class="btn btn-warning btn-sm" href="{{ url('/admin/lessons') }}"> Back To Lessons</a>
</section>
@endsection

