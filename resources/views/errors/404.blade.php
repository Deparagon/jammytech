@extends('externallayout')
@section('pagetitle')
404 | Tutorago
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
  <h2 class="seark">  WANT TO LEARN SOMETHING?</h2> 
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
              <h2 style="text-align: center; color: #990000; font-weight: bolder; font-size: 54px;"> 404  </h2>
               <p style="text-align: center; font-size: 24px;"> This page does not exist or have been deleted or missing from the basket, Please contact us if you feel this page should be replaced. <a href="{{ url('/contact') }}"> contact us </a>
          </div>

       </div>




</div>
</section>
      <!-- /END Testimonie -->

@endsection

@section('specificfooterjs')
 <script src="/js/vegas.min.js"></script>
<script src="/js/bg.js"></script>
@endsection
