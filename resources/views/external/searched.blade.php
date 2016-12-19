@extends('externallayout')
@section('pagetitle')
Home | Tutorago
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
  <h2 class="seark">  WANT TO LEARN SOMETHING</h2> 
   <p class="subtop"> Let's Get You a Private Home Tutor from Your Area </p>    </div>
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



<section class="display-tutors">
    <div class="container marketing">
       <div class="row">
          <div class="col-sm-12">
              <h2 class="featurette-heading">Searching for: {{ $searched }}  We got {{ $countresult }} result(s) </h2>
               <p> If you did not get the result you were expecting, please try rephrasing your search or <a href="{{ url('/contact') }}"> contact us </a>
          </div>

       </div>

      <!-- Three columns of text below the carousel -->
      <div class="row">
      @if (!empty($resultset))
      @foreach ($resultset as $course)
        

        <div class="col-lg-3">
          <div class="tutor-box">
           <a href="{{ url('/subjects/'.$course->url) }}"><img class="" src="/uploads/{{ $course->imageurl }}"> </a>
          <p class="titlebox">{{ $course->name }} </p>
          </div>
        </div><!-- /.col-lg-3 -->
         @endforeach
         @endif
         
            

      </div><!-- /.row -->


</div>
</section>
      <!-- /END Testimonie -->

@endsection

@section('specificfooterjs')
 <script src="/js/vegas.min.js"></script>
<script src="/js/bg.js"></script>
@endsection
