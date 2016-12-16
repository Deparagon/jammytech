<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Paragon Kingsley">
   <link rel="icon" href="/img/favicon/32.png">

    <title>@yield('pagetitle')</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="/css/zetta.menu.css" rel="stylesheet">
    <link href="/css/strapper.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    @yield('sectionheader')
  </head>
<!-- NAVBAR
================================================== -->
  <body>
  <div class="row dash-top-1">
     <div class="col-sm-2 top-logo">
     <h2 class="logo"> <img src="/img/logo/logo.png" alt="Tutorago">  </h2>
       </div>

       <div class="col-sm-6 col-sm-offset-1"> 
       <form method="POST" action="">
       <div class="search-box-in">
                    <div class="input-group">
        {{ csrf_field() }}
      <input type="search" class="form-control searchbox" id="frontpaysearchbaruser" placeholder="Search">
      <div class="input-group-addon"><i class="fa fa-search"> </i> </div>
    </div>
          </div>
          </form>
          <div id="mysearchresultdisplay"></div>
       </div>

       <div class="col-sm-3">  <!-- navbar-fixed-top --> 
        <div id="navbar" class="navbar-collapse collapse">     
          <ul class="nav navbar-nav navbar-right user-top">
           @if (isset($profiledata))
           @if (!empty($profiledata->photo))
          <li class="no-line"> <a  href="{{ url('/user/dashboard') }}"> <img class="img-circle" src="/uploads/{{ $profiledata->photo }}" width="50" height="50" > </a> </li>
          @else
          <li><a  href="{{ url('/user/dashboard') }}">{{ Auth::user()->firstname }}</a></li>

          @endif
         
         @else
      <li><a  href="{{ url('/user/dashboard') }}">{{ Auth::user()->firstname }}</a></li>

         
          @endif
<li><a  href="{{ url('/logout') }}">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>

        </div>

  
<section class="mega-menu-list">
<div class="container">
<div class="row">
<div class="col-sm-8 col-sm-offset-1">
  <nav class="zetta-menu1 zm-css">
    <input type="checkbox" id="zm-switchzetta-menu1" />
    <ul onclick="">
@foreach ($maincategories as $k => $category)
      <li> <a href="{{ url('/user/newlesson/'.$category->id) }}">{{ $category->name }}<span class="zm-caret"><i class="fa fa-angle-down"></i> </span> </a>
        <div style="width:300px;" class=" zm-right-align">
          <ul>
          @foreach($category->courses as $key => $course)
            <li><a href="{{ url('/user/new-lesson/'.$course->id) }}">{{ $course->name }}</a>
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

@yield('dashbreadcumb')

<section class="main-page">
<div class="row">
 <div class="col-lg-9 col-md-9 col-md-push-3 col-lg-push-3" id="becomeatutortodaybyc"> 
   @yield('innercontent')
   @if (!UserBouncer::isTutorWanabe())
<div class="show-box-become">
   <p class="apply-p"> Have some skills, Ready to teach and Make some money </p>
    {{ csrf_field() }}
   <div class="row"> <div class="col-sm-4 col-sm-offset-4"><button class="btn btn-lg btn-danger btn-block" id="applyfortutorbtnclick"> Join Our Tutors </button> </div> </div>
</div>
  <div id="showboxreturntutorrequest"> </div>
@endif
 <br>
  </div>


 <div class="col-lg-3 col-md-3 col-md-pull-9 col-lg-pull-9"> 
  <aside>
   <!-- OVERVIEW -->

   <div class="panel panel-danger"> 
    <div class="panel-heading">
        <h4 class="panel-title"> <i class="fa fa-folder"> </i> Overview </h4>
    </div>
      <ul class="list-group">

       <li class="list-group-item"> <a href="{{ url('/user/dashboard') }}"> <i class="fa fa-list-ol"> </i> &nbsp; &nbsp; Dashboard </a></li>
          @if (UserBouncer::isAdmin())
          <li class="list-group-item"> <a href="{{ url('/admin/dashboard') }}"> <i class="fa fa-list-ol"> </i> &nbsp; &nbsp; Admin BackOffice </a></li>
          @endif
      </ul>  

   </div>

 @if (UserBouncer::isTutorWanabe())
    <!-- MANAGE ACCOUNT -->
       <div class="panel panel-danger"> 
    <div class="panel-heading">
        <h4 class="panel-title"><i class="fa fa-folder"> </i>&nbsp; &nbsp; Tutor  </h4>
    </div>

          <ul class="list-group">
           <li class="separate"> Manage Classes </li>
       <li class="list-group-item"> <i class="fa fa-file-text"> </i> <a href="{{ url('/user/my-classes') }}"> &nbsp; &nbsp;My Classes </a></li>

      </ul>

           <ul class="list-group">
           <li class="separate"> Manage Subject </li>
       <li class="list-group-item"> <i class="fa fa-file-text"> </i> <a href="{{ url('/user/my-subjects') }}"> &nbsp; &nbsp;Subjects I Can Teach </a></li>
       <li class="list-group-item"> <i class="fa fa-file-text-o"> </i> <a href="{{ url('/user/create-subjects') }}"> &nbsp; &nbsp;Create New Subjects </a></li>
      </ul>

          <ul class="list-group">
               <li class="separate"> Requests </li>

       <li class="list-group-item"> <i class="fa fa-user-plus"> </i>&nbsp;  <a href="{{ url('/user/join-tutor-request') }}">  Join Tutor Request </a></li>
  </ul>


    <ul class="list-group">
               <li class="separate">  Lesson Bids </li>
 @if (UserBouncer::isTutor())
       <li class="list-group-item"> <i class="fa fa-hand-o-right"> </i>&nbsp;  <a href="{{ url('/user/biddablelessons') }}"> Apply to a Lesson </a></li>

    <li class="list-group-item"> <i class="fa fa-sticky-note-o"> </i>&nbsp;  <a href="{{ url('/user/my-bids') }}"> Ongoing Lesson Applications </a></li>
@endif
  </ul>

       <ul class="list-group">
                      <li class="separate"> Credentials </li>

       <li class="list-group-item"> <i class="fa fa-file-text-o"> </i> &nbsp;  <a href="{{ url('/user/credentials') }}"> Credentials </a></li>
       <li class="list-group-item"> <i class="fa fa-thumbs-up"> </i> &nbsp;  <a href="{{ url('/user/guarantors') }}"> Guarantor </a></li>
        <li class="list-group-item"> <i class="fa fa-slideshare"> </i> &nbsp;  <a href="{{ url('/user/teaching') }}"> Teaching Experience </a></li>
          
      </ul> 
      

   </div>

@endif



      <!-- LESSONS -->
   <div class="panel panel-danger"> 
    <div class="panel-heading">
        <h4 class="panel-title"> <i class="fa fa-folder"> </i>&nbsp; Student  </h4>
    </div>
    <ul class="list-group">
    <li class="separate"> Lessons </li>
       <li class="list-group-item"> <i class="fa fa-book"> </i>&nbsp;  <a href="{{ url('/user/lessons') }}"> &nbsp; &nbsp; My Lessons </a></li>
       <li class="list-group-item"> <i class="fa fa-photo"> </i>&nbsp;  <a href="{{ url('/user/new-lesson') }}"> &nbsp; &nbsp; Start New Lesson </a></li>

        <li class="list-group-item"> <i class="fa fa-bars"> </i>&nbsp;  <a href="{{ url('/user/bids-on-my-lesson') }}"> &nbsp; &nbsp; Tutors' Bids on My Lesson </a></li>
          
      </ul>  


   </div>

         <!-- MONEY -->
   <div class="panel panel-danger"> 
    <div class="panel-heading">
        <h4 class="panel-title"> <i class="fa fa-folder"> </i> Earnings & Bank </h4>
    </div>
     <ul class="list-group">
      <li class="list-group-item"> <i class="fa fa-money"> </i>  <a href="{{ url('/user/payout-request') }}"> &nbsp; &nbsp; Request Payment </a></li>

      <li class="list-group-item"> <i class="fa fa-photo"> </i>  <a href="{{ url('/user/bank') }}"> &nbsp; &nbsp; Add Bank Account </a></li>          
      </ul> 

   </div>

      <!-- PROFILE -->
   <div class="panel panel-danger"> 
    <div class="panel-heading">
        <h4 class="panel-title"> <i class="fa fa-folder"> </i> Account </h4>
    </div>
     <ul class="list-group">
       <li class="list-group-item"> <i class="fa fa-user"> </i>  <a href="{{ url('/user/profile') }}"> &nbsp; &nbsp; Profile </a></li>
        @if (UserBouncer::isTutorWanabe())
         <li class="list-group-item"> <i class="fa fa-user"> </i>  <a href="{{ url('/user/tutor/'.Auth::user()->id) }}"> &nbsp; &nbsp; View as Student  </a></li>
         @endif
       <li class="list-group-item"> <i class="fa fa-photo"> </i>  <a href="{{ url('/user/photo') }}"> &nbsp; &nbsp; Photo </a></li>
       <li class="list-group-item"> <i class="fa fa-film">  </i>  <a href="{{ url('/user/video') }}"> &nbsp; &nbsp; Video </a></li>
       <li class="list-group-item"><i class="fa fa-key"> </i> <a href="{{ url('/user/password') }}"> &nbsp; &nbsp; Password </a></li>
          
      </ul> 

   </div>

   <div class="panel panel-danger"> 
    <div class="panel-heading">
        <h4 class="panel-title"> <i class="fa fa-folder"> </i> Referral </h4>
    </div>
     <ul class="list-group">
       <li class="list-group-item"> <i class="fa fa-user"> </i>  <a href="{{ url('/user/referral') }}"> &nbsp; &nbsp; My Referral </a></li>
          
      </ul> 

   </div>

</aside>
 </div>
</div>

</section>
<hr>
      <!-- FOOTER -->
      <footer>
      <hr class="featurette-divider">
      <div class="container">
       <div class="row">
        <div class="col-sm-3">
           <div class="footer-logo">
           <a href="{{ url('/') }}"><img src="/img/logo/footerlogo.png"> </a>

   </div>

          </div>

        <div class="col-sm-3">
        <strong> GENERAL </strong>
        <hr/>
              <ul class="bottom-link">
              <li> <a href="{{ url('/') }}"> Home </a> </li>
              <li> <a href="{{ url('/') }}#aboutusbelow"> About Us </a> </li>
              <li> <a href="{{ url('/') }}#becometutorbtn"> Become A Tutor </a> </li>
              <li> <a href="{{ url('/blog') }}"> Blog </a> </li>
              <li> <a href="{{ url('/faqs') }}"> FAQs </a> </li>
              <li> <a href="{{ url('/contact') }}"> Contact Us </a> </li>


              </ul>

          </div>

        <div class="col-sm-3">
     <strong>ADDRESS</strong>
     <hr/>
<p>16 Alhaja Eleshin Street, <br>Off Ramat Crescent, <br>Ogudu-Ojota, Kosofe Lagos State.</p>
<p>11, Obafemi Awolowo Way, <br>Beside BestSay Shopping Mall, <br>Igbona, Osogbo, Osun State. </p>


          </div>

        <div class="col-sm-3">
     <p><strong>CONTACTS</strong> </p>
                         <hr/>
<p>info@tutorago.com </p>
<p>+234 81 670 827 04 </p>
<p><a href="http://facebook.com/tutorago" target="_blank"> <i class="fa fa-1x fa-facebook"> </i> Facebook</a> </p>
<p><a href="http://instagram.com/tutorago" target="_blank"> <i class="fa fa-1x fa-empire"> </i> Instagram</a>
</p>
<p><a href="http://twitter.com/tutorago" target="_blank"> <i class="fa fa-1x fa-twitter"> </i> Twitter</a>
</p>
          </div>

       </div>
</div> <!-- /footer container -->
<hr>
   <div class="row copyright-footer">
       <div class="col-sm-6 col-sm-offset-4">
        <p>&copy; 2016 Tutorago, Inc. &middot; <a href="{{ url('/privacy') }}">Privacy</a> &middot; <a href="{{ url('/terms') }}">Terms</a></p>
       </div>
       </div>
      </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/js/jquery-1.12.4.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/ie10-viewport-bug-workaround.js"></script>
    <script src="/js/gaddress.js"></script>
    <script src="/js/zetta.menu.jquery.js"></script>
     <script src="/js/user.js"></script>
         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsup9NGCPA-SHDyfkJ_7-y4fyg8_9yy2U&libraries=places&callback=initAutocomplete"
        async defer></script>
     @yield('sectionfooter')
  </body>
</html>  
