@extends('externallayout')
@section('pagetitle')
{{ ucfirst($subject) }} Tutors | Tutorago
@endsection
@section('extracss')
<!-- <link href="/css/bg.css" rel="stylesheet"> -->
<link href="/css/vegas.min.css" rel="stylesheet">
<link href="/css/bootstrap-rating.css" rel="stylesheet">
@endsection
@section('specifictopjs')
 

@endsection
@section('externalcontent')

<div id="home_top" style="height:500px">
 <div class="row"> 
 <div class="col-sm-12"> 
  <h2 class="seark">  LOOKING FOR {{ strtoupper($subject) }} TUTORS </h2> 
   <p class="subtop"> Let's Get You a Private {{ ucfirst($subject) }} Tutor </p>    </div>
</div>
<div class="row">
<div class="col-sm-12">  
  <div class="container marketing"> 
          <div class="row">
          <div class="col-sm-8 col-sm-offset-2">  
           <form class="" id="searchformmid" method="GET" action="{{ url('/search') }}">

          <div class="input-group">

      <input type="search" name="searched" class="form-control main-search" id="frontpaysearchbar" placeholder="What do you want to learn?">
      <div id="formsearchsubmitfabtn" class="input-group-addon"><i class="fa fa-search"> </i></div>
    </div>
</form>

          </div>
          </div>
   </div>



</div>
 </div>
</div>

<section class="breadcrumb">
<ol class="breadcrumb">
  <li><a href="{{ url('/') }}">Home</a></li>
  <li class="active">{{ ucfirst($subject) }} Tutors</li>
</ol>
</section>
<div class="row">
           <div class="col-sm-6 col-sm-offset-3">
              <h3 class="help-sec"> {{ TTools::displayNumber($countsubject) }} {{ ucfirst($subject) }} Tutors </h3>
           </div>
</div>
 @if (count($subjecttutors) > 0)

<section class="display-tutors">
    <div class="container marketing">
     @foreach($subjecttutors as $tutor)
       <div class="row bar-tutor">
          <div class="col-sm-3">
            <div class="my-profile-img">
              <img class="profile-img img-circled" src="/uploads/{{ $tutor->photo }}">
            </div>
          </div>
           <div class="col-sm-6">
              <div class="row">
               <div class="col-sm-8">
              <h3 class="help-sec"> <a @if(Auth::user()) href="{{ url('/user/tutor/'.$tutor->id ) }}" @endif> {{ $tutor->lastname }}, {{ $tutor->firstname }} </a>       </h3>
              </div>
               <div class="col-sm-4">
                   <div class="rating-col">
                   <?php $ratecount = RateCounter::getOverallRating($tutor->id) ?>
                   @if($ratecount >0)
      <input type="hidden"  value="{{ $ratecount }}" disabled name="darating" class="rating starfa" data-filled="fa fa-star fa-2x" data-empty="fa fa-star-o fa-2x" id="darating">
      @else
          <span> No Reviews Yet</span>
          @endif
       </div>

               </div>

               </div>
               <p class="bio-desc ">   {{ str_limit($tutor->bio, 128) }} </p>
          </div>
          <div class="col-sm-3">
               <a   class="btn btn-success btn-block" @if(Auth::guest()) data-toggle="modal" data-target="#regformlocatesmallpage" role="button"  @endif @if(Auth::user()) href="{{ url('/user/tutor/'.$tutor->id) }}" @endif >  View {{ $tutor->lastname }}, {{ $tutor->firstname }}'s Profile  </a>
          </div> 
          </div>

        @endforeach
       
      <!-- Three columns of text below the carousel -->
      <div class="row">

        
            

      </div><!-- /.row -->


</div>
</section>
@else
<section class="become-tutor-bar">
 <div class="row">
   <div class="col-sm-8 col-sm-offset-2">
      <p class="tutor-b"> Be the first {{ ucfirst($subject) }} Tutor on Tutorago </p>
    </div>
 </div>
<div class="row" id="becometutorbtn">
    <div class="col-sm-4 col-sm-offset-4"> 
             <button data-toggle="modal" data-target="#regformlocatesmallpage" role="button" class="btn btn-lg btn-block btn-danger" > Become A Tutor </button>
    </div>

</div>

</section>
@endif
      <!-- /END Testimonie -->

@stop

@section('specificfooterjs')
 <script src="/js/vegas.min.js"></script>
<script src="/js/bg.js"></script>
<script src="/js/bootstrap-rating.min.js"></script>
<script src="/js/extrauser.js"></script>
@endsection