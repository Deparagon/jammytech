@extends('externallayout')
@section('pagetitle')
{{ ucfirst($subject) }} Tutors | Tutorago
@endsection
@section('extracss')
<!-- <link href="/css/bg.css" rel="stylesheet"> -->
<link href="/css/vegas.min.css" rel="stylesheet">
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
       <div class="row">
          <div class="col-sm-4">
            <div class="my-profile-img">
              <img class="profile-img" src="/uploads/{{ $tutor->photo }}">
            </div>
          </div>
           <div class="col-sm-8">
              <h3 class="help-sec">{{ $tutor->lastname }}, {{ $tutor->firstname }}</h3>
               <p class="bio-desc well"> {{ $tutor->bio }} </p>
          </div>
        @endforeach
       </div>

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
@endsection