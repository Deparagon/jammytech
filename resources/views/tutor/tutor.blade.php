@extends('userlayout')


@section('pagetitle')
  {{ $datutor->firstname }} | Tutorago
@endsection

 @section('sectionheader')
<link href="/css/bootstrap-rating.css" rel="stylesheet">
 @endsection

@section('dashbreadcumb')
<ol class="breadcrumb">
  <li><a href="{{ url('/user/dashboard') }}">Home</a></li>
  <li class="active">I'm {{ $datutor->firstname }} </li>
</ol>

@endsection

@section('innercontent')
<section class="tutor-bar">
  <div class="row">
    <div class="col-sm-3"> 
    <div class="image-box"> 
    <img class="img-circle tutorimage" src="@if(isset($tutorprofile)) @if($tutorprofile->photo != '' ) /uploads/{{$tutorprofile->photo }} @endif @endif">

    </div> </div>
    <div class="col-sm-4">
          <h3 class="tutori"> I'm {{ $datutor->lastname }}, {{$datutor->firstname}}</h3>
     </div>

  </div>

</section>

<section class="tutor-info">
  
   <div class="row">
      <div class="col-sm-4">
         <div class="box-myinfo">
           <p class="t-info">Tutoragoing Since: {{ TTools::displayODate($datutor->created_at) }}</p>
          </div>

      </div>
        <div class="col-sm-4">
        <div class="box-myinfo">
          <p class="t-info"> Completed Classes:{{ TTools::displayNumber($completedcount) }} </p>
        </div>

      </div>
        <div class="col-sm-4">
        <div class="box-myinfo">
           <p class="t-info"> 
       Ongoing Classes: {{ TTools::displayNumber($ongoingcount) }}
           </p>
        </div>

      </div>

   </div>
</section>

<section class="tutor-bio">
 <div class="row">
    <div class="col-sm-6"> 
          <h3> Know Me</h3>
          <p class="well"> @if(isset($tutorprofile)) {{ $tutorprofile->bio }} @endif </p>
    </div>
  <div class="col-sm-6">
  <h3 class="w-me"> Watch Me</h3>
              <div class="video-box">
<div class="embed-responsive embed-responsive-4by3">
  <iframe width="408" height="229" class="embed-responsive-item" src="{{ $tutorprofile->video }}"></iframe>
</div>

            </div>

   </div>
  </div>
</section>


<section class="tutor-education-work">
<div class="row">
<div class="col-sm-6">
  <h3 class="top-work"> <span>My Qualifications </span> </h3>
  <div class="table-responsive">
 <table class="table table-striped table-bordered">
 <thead>
   <th> Institution </th> <th> Course</th> <th> Certificate </th>
 </thead>
<tbody>
  
  @if(count($educations) >0)
  @foreach($educations as $education)
  <tr> <td>{{ $education->institution }} </td> <td> {{ $education->course }}</td> <td>{{ $education->degree }} </td></tr>
  @endforeach

  @else
  <tr> <td colspan="3"> Preparing to update my qualifications, please come back and check </td></tr>
  @endif
  </tbody>
</table>
</div>
 </div>

<div class="col-sm-6">
  <h3 class="top-work">  <span> My Working Experience(s) </span> </h3>
  <div class="table-responsive">
 <table class="table table-striped table-bordered">
 <thead>
   <th> Organization </th> <th> Position</th> <th> Roles </th>
 </thead>
<tbody>
  @if(count($workingexps) >0)
  @foreach($workingexps as $workingexp)
  <tr> <td>{{ $workingexp->organization }} </td> <td> {{ $workingexp->position }}</td> <td>{{ $workingexp->roles }} </td></tr>
  @endforeach
  @else
  <tr> <td colspan="3"> Will be updated soon.  </td></tr>
  @endif
  </tbody>
</table>
</div>
 </div>

 </div>
</section>

<section class="tutor-icanteach">

<div class="row">
<div class="col-sm-12">
  <h3 class="icanteach-top"> <span>I can Teach </span> </h3>
 <ul class="list-group">

  @if(count($icanteachs) >0)
  @foreach($icanteachs as $canteach)
  <li class="list-group-item"> {{ $canteach->course->name }}</li>
  @endforeach
 @else
  <li class="list-group-item"> Preparing the list of my subjects </li>
  @endif
 </ul>
 </div>
</div>

<div class="row">
 <div class="col-sm-12">
 <h3 class="icanteach-top"> <span>Teaching Experience </span> </h3>
  <h3>  @if(isset($teachingexps->teachinglevel)) {{ $teachingexps->teachinglevel }} @endif </h3>
 <ul class="list-group">
  @if(isset($teachingexps->levelexplanation))
     <p class="well"> {{ $teachingexps->levelexplanation }} </p>
  
  @endif
 </ul>
 </div>
 </div>
</section>


<section class="tutor-rating-in">
 <h3 class="reviews-top"> <span> My Reviews & Ratings </span> </h3>
  
    @if ( count($tutorrattings) > 0)
    @foreach($tutorrattings as $rating)
    <div class="row boxed-paged-bar" >
    <div class="col-sm-6"> 
     <p class=""> @if($rating->photo != '') <img class="tiny-photo img-circle" src="{{ url('/uploads/'.$rating->photo ) }}"> @endif  </p>
      <h4> Reviewed by {{ $rating->firstname }} </h4>

     </div>
    <div class="col-sm-6">     
     <div class="rating-col">
      <input type="hidden"  value="{{ $rating->rate_by_student }}" disabled name="darating" class="rating starfa" data-filled="fa fa-star fa-2x" data-empty="fa fa-star-o fa-2x" id="darating">
       </div>
    <p>
         {{ $rating->name }} lesson completed with {{ $rating->firstname }} 
       </p>
       <p> {{ $rating->comment_by_student }} </p>


      </div>
        </div>


      @endforeach
      @endif


 
</section>
@endsection

@section('sectionfooter')
<script src="/js/bootstrap-rating.min.js"></script>
<script src="/js/extrauser.js"></script>
@endsection