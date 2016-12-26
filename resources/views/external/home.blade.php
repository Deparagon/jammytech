@extends('externallayout')

@section('metadescription')
 <meta name="description" content="Tutorago would help you find, access and book home tutoring lessons with qualified private home tutors in your area for any subject, exam or skill acquisition. Want to learn a new language, bead making, programming, or prepare for a professional exam(s) like TOEFL, SAT, GMAT, ACCA, SAT Writing e.t.c we've got you covered">
@endsection

@section('pagetitle')
Find Professional Private Home Tutors Near You | Welcome to Tutorago Nigeria
@endsection

@section('extracss')
<!-- <link href="/css/bg.css" rel="stylesheet"> -->
<link href="/css/vegas.min.css" rel="stylesheet">
@endsection
@section('specifictopjs')
 

@endsection
@section('externalcontent')

@if (session()->has('activatedbefore'))
   <div class="biginfo">{{ session('activatedbefore') }} </div>
   @endif

@if (session()->has('justactivated'))
  <div class="bigsuccess"> {{  session('justactivated') }} </div>
   @endif

<div id="home_top" style="height:500px">
 <div class="row"> 
 <div class="col-sm-12"> 
  <h2 class="seark"> FIND VETTED, AFFORDABLE, EXPERT TUTORS</h2> 
   <p class="subtop"> Get more attention, improve your grades via one-on-one tutor </p>    </div>
</div>
<div class="row">
<div class="col-sm-12">  
  <div class="container marketing"> 
          <div class="row">
          <div class="col-sm-8 col-sm-offset-2">  
           <form class="" id="searchformmid" method="GET" action="{{ url('/search') }}">

          <div class="input-group">

      <input type="search" name="searched" class="form-control main-search" id="frontpaysearchbar" placeholder="Type what you want to learn, then click the Search Button">
      <div id="formsearchsubmitfabtn" class="input-group-addon"><i class="fa fa-search"> </i></div>
    </div>
</form>

          </div>
          </div>
   </div>



</div>
 </div>
</div>

<section class="menubar-category"> 
<div class="container">
<div class="row">
<div class="col-sm-10 col-sm-offset-1">
  <nav class="zetta-menu1 zm-css">
    <input type="checkbox" id="zm-switchzetta-menu1" />
    <ul onclick="">
@foreach ($categories as $k => $category)
      <li> <a   @if(Auth::guest()) data-toggle="modal" data-target="#regformlocatesmallpage" role="button"  @endif @if(Auth::user()) href="{{ url('/user/newlesson/'.$category->id) }}" @endif  >{{ $category->name }}<span class="zm-caret"><i class="fa fa-angle-down"></i> </span> </a>
        <div style="width:300px;" class=" zm-right-align">
          <ul>
          @foreach($category->courses as $key => $course)
            <li><a  @if(Auth::guest()) data-toggle="modal" data-target="#regformlocatesmallpage" role="button"  @endif @if(Auth::user()) href="{{ url('/user/new-lesson/'.$course->id) }}" @endif > {{ $course->name }}</a>
            </li>

            @if ($key == 4)       
          </ul>
          <ul>
           @endif
            @endforeach
          </ul>
          </div>
      </li>
 @endforeach


      
    </ul>
  </nav>
  </div>
  </div>
  </div>
</section>

<section class="assuc-front">
  <div class="container marketing">
    <div class="row">
    <div class="col-sm-12">
     <p class="tutor-assuc">
        Tutorago Connects Professional Educators, Private Home Tutors with Students for One-on-One Personalized Tutoring Sessions on any Subject, Exam, Skill or Profession.

      </p>
      </div>
<hr class="fill">
    
    </div>
     <div class="row">
      <div class="col-sm-12"> <h3 class="how-itworks"> HOW IT WORKS</h3> </div>
     </div>

     <div class="row">
       <div class="col-sm-4"> 
         <div class="img-box-how">
            <img src="/img/how1.png" class="img-howit" alt="How it works image">
            <p class="how-p text-center"> Request for a vetted private home tutor by booking as per your need and schedule </p>
          </div>
         

       </div>
        <div class="col-sm-4">
 <div class="img-box-how"> <img src="/img/how2.png" class="img-howit" alt="How it works image"> 
<p class="how-p text-center"> Tutor shows up in person in the agreed location & time </p>
 </div>
         
         </div>
         <div class="col-sm-4"> 
          <div class="img-box-how"> <img src="/img/how3.png" class="img-howit" alt="How it works image"> 
         <p class="how-p text-center"> Student Learning goals are achieved. Tutor get paid by Us after student approval. </p>

          </div>
         </div>

     </div>


  </div>
</section>


<section class="display-tutors">
    <div class="container marketing">
     <div class="row">
      <div class="col-sm-12">
      <h3 class="how-itworks">REQUEST A SUBJECT FROM YOUR AREA.</h3>
      <hr>
      </div>
    </div>
      <!-- Three columns of text below the carousel -->
     
      @if (!empty($courses))
      @foreach ($courses as $key =>$course)   
      @if($key ==0 || $key ==4) 
      <div class="row padded-top-f">
      @endif

        <div class="col-lg-3">
         <a id="lessonstartsinglelinktostart" @if(Auth::guest()) data-toggle="modal" data-target="#regformlocatesmallpage" role="button"  @endif @if(Auth::user()) href="{{ url('/user/new-lesson/'.$course->id) }}" @endif >
          <div class="tutor-box">
           <img class="img-responsive" src="/uploads/{{ $course->imageurl }}">
          <p class="titlebox">{{ $course->name }}</p>
          </div>
          </a>
        </div><!-- /.col-lg-3 -->
           @if( $key ==3) 
      </div>
      @endif
         @endforeach
         @endif
         
          
      </div><!-- /.row -->


</div>
</section>

    <div class="container marketing" id="aboutusbelow">
      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row aboutbar featurette">
        <div class="col-md-6">
          <h2 class="featurette-heading">About Us.</h2>
          <p class="lead">It is said that Education is the best legacy. Would you give us a chance to make a change in the level of education of Nigeria?  We at Tutorago.com are working tirelessly to be one of the best home tutoring platforms in Nigeria. We love to make learning easy, affordable and more accessible.  
</p>


        </div>
        <div class="col-md-6">
          
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette trustbar">
        <div class="col-md-7 col-md-push-5">
          <h2 class="featurette-heading">Trust.</h2>
          <p class="lead">Your security is of utmost importance to us. One of our responsibilities towards ensuring a flawless educational platform is that we must verify and always run background checks on our tutors.
When you book a tutor with us, we make sure that our tutor delivers the necessary classes and lessons to you or your child without any delay.  
Hence you should be rest assured that you are with the right company. Both parties are safe.</p>
        </div>
        <!--<div class="col-md-5 col-md-pull-7">

        </div>-->
      </div>

         
</div><!-- /.container -->

<section id="becometutorbtn" class="become-tutor-bar">
 <div class="row">
   <div class="col-sm-8 col-sm-offset-2">
      <p class="tutor-b"> Have Experience Grooming Students on an Exam, Subject, Skill or Profession?</p>
    </div>
 </div>
<div class="row">
    <div class="col-sm-4 col-sm-offset-4">
             @if (Auth::guest())
             <button data-toggle="modal" data-target="#regformlocatesmallpage" role="button" class="btn btn-lg btn-block btn-danger" > Become A Tutor </button>
             @else
             <a href="{{ url('/user/dashboard')}}/#becomeatutortodaybyc" role="button" class="btn btn-lg btn-block btn-danger" > Become A Tutor </a>
             @endif

    </div>

</div>

</section>

<section class="testimony">
<div class="container marketing">
      <div class="row">
         <div class="col-sm-8 col-sm-offset-2"> 
            <h3 class="help-sec"> Need Helping Hand?</h3>
             <p class="helpline"> Call 081 670 827 04 | info@tutorago.com </p>
         </div>
      </div>

  </div>
</section>
      <!-- /END Testimonie -->


<!-- <section class="partners-line">
<div class="container marketing">
<div class="row">
  <div class="col-sm-1"> 
      <div class="partner-img"> 
           
      </div>
  </div>
</div>
</div>
</section> -->
@stop

@section('specificfooterjs')
 <script src="/js/vegas.min.js"></script>
<script src="/js/bg.js"></script>
@endsection
