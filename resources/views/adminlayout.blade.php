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
       <div class="col-sm-6"> 
         <div class="search-box-in">
                    <div class="input-group">

      <input type="search" class="form-control searchbox" id="frontpaysearchbar" placeholder="Search">
      <div class="input-group-addon"><i class="fa fa-search"> </i> </div>
      </div>
    </div>
          
       </div>
       <div class="col-sm-4"> 
<nav class="navbar navbar-default navbar-fixed-top topmostnavbar">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">     
          <ul class="nav navbar-nav navbar-right">
<li><a  href="{{ url('/user/dashboard') }}">{{ Auth::user()->firstname }}</a></li>
<li><a  href="{{ url('/logout') }}">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

        </div>

  </div>

@yield('dashbreadcumb')

<section class="main-page">
<div class="row">

 <div class="col-lg-9 col-md-9 col-md-push-3 col-lg-push-3 main-admin-content"> 
   @yield('innercontent')

  </div>



 <div class="col-lg-3 col-md-3 col-md-pull-9 col-lg-pull-9"> 
  <aside>
   <!-- OVERVIEW -->

   <div class="panel panel-dbluebar"> 
    <div class="panel-heading">
        <h4 class="panel-title"> <i class="fa fa-folder"> </i> Overview </h4>
    </div>
      <ul class="list-group">
       <li class="list-group-item"> <a href="{{ url('/admin/dashboard') }}"> <i class="fa fa-list-ol"> </i> Dashboard </a></li>
          
      </ul>  
   </div>

    <!-- MANAGE ACCOUNT -->
   <div class="panel panel-dbluebar"> 
    <div class="panel-heading">
        <h4 class="panel-title"><i class="fa fa-folder"> </i> Manage Requests </h4>
    </div>
      <ul class="list-group">
          <li class="list-group-item"> <a href="{{ url('/admin/courserequest') }}"> <i class="fa fa-check-square-o"> </i> Courses Requested </a></li>

       <li class="list-group-item"> <a href="{{ url('/admin/icanteachrequest') }}"> <i class="fa fa-th-large"> </i> Course Approval </a></li>

        <li class="list-group-item"> <a href="{{ url('/admin/tutorship') }}"> <i class="fa fa-th-large"> </i> Tutorship  </a></li>
          
      </ul> 

   </div>



    <!-- MANAGE ACCOUNT -->
   <div class="panel panel-dbluebar"> 
    <div class="panel-heading">
        <h4 class="panel-title"><i class="fa fa-folder"> </i> Bank Details </h4>
    </div>
      <ul class="list-group">
          <li class="list-group-item"> <a href="{{ url('/admin/bank') }}"> <i class="fa fa-check-square-o"> </i> Add & Update Bank  </a></li>          
      </ul> 

   </div>

   <div class="panel panel-dbluebar"> 
    <div class="panel-heading">
        <h4 class="panel-title"><i class="fa fa-folder"> </i> Lessons </h4>
    </div>
      <ul class="list-group">
          <li class="list-group-item"> <a href="{{ url('/admin/lessons') }}"> <i class="fa fa-check-square-o"> </i> Manage Lessons  </a></li>          
      </ul> 

   </div>

    <!-- MANAGE ACCOUNT -->
   <div class="panel panel-dbluebar"> 
    <div class="panel-heading">
        <h4 class="panel-title"><i class="fa fa-folder"> </i> Manage Users </h4>
    </div>
      <ul class="list-group">
      <li class="list-group-item"> <a href="{{ url('/admin/student') }}"> <i class="fa fa-th-list"> </i> Students  </a></li>
       <li class="list-group-item"> <a href="{{ url('/admin/tutor') }}"> <i class="fa fa-th-large"> </i> Tutors </a></li>
          
      </ul> 

   </div>


    <!-- MANAGE ACCOUNT -->
   <div class="panel panel-dbluebar"> 
    <div class="panel-heading">
        <h4 class="panel-title"><i class="fa fa-folder"> </i> Payouts </h4>
    </div>
      <ul class="list-group">
      <li class="list-group-item"> <a href="{{ url('/admin/payoutrequests') }}"> <i class="fa fa-th-money"> </i> Payout Requests  </a></li>
       <li class="list-group-item"> <a href="{{ url('/admin/payouts') }}"> <i class="fa fa-th-bank"> </i> Payouts </a></li>
          
      </ul> 

   </div>


    <!-- MANAGE ACCOUNT -->
   <div class="panel panel-dbluebar"> 
    <div class="panel-heading">
        <h4 class="panel-title"><i class="fa fa-folder"> </i> Manage Categories </h4>
    </div>
      <ul class="list-group">
      <li class="list-group-item"> <a href="{{ url('/admin/addcategory') }}"> <i class="fa fa-list-ol"> </i> Add Category </a></li>
       <li class="list-group-item"> <a href="{{ url('/admin/category') }}"> <i class="fa fa-list-ol"> </i> List Categories </a></li>
          
      </ul> 

   </div>


   <!-- SUBJECTS -->
   <div class="panel panel-dbluebar"> 
    <div class="panel-heading">
        <h4 class="panel-title"> <i class="fa fa-folder"> </i> Manage Courses </h4>
    </div>

      <ul class="list-group">
      <li class="list-group-item"> <a href="{{ url('/admin/addcourse') }}"> <i class="fa fa-list-ol"> </i> Add Subject/Course </a></li>
       <li class="list-group-item"> <a href="{{ url('/admin/courses') }}"> <i class="fa fa-list-ol"> </i> List Subjects/Courses </a></li>
          
      </ul>

   </div>

      <div class="panel panel-dbluebar"> 
    <div class="panel-heading">
        <h4 class="panel-title"> <i class="fa fa-folder"> </i> Blog  </h4>
    </div>
<ul class="list-group">
      <li class="list-group-item"> <a href="{{ url('/admin/blogcat') }}"> <i class="fa fa-list-ol"> </i> Blog Category </a></li>
      <li class="list-group-item"> <a href="{{ url('/admin/post/create') }}"> <i class="fa fa-list-ol"> </i> New Post </a> </li>

       <li class="list-group-item"> <a href="{{ url('/admin/posts') }}"> <i class="fa fa-list-ol"> </i> Posts </a></li>
          
      </ul>
   </div>



      <!-- PROFILE -->
   <div class="panel panel-dbluebar"> 
    <div class="panel-heading">
        <h4 class="panel-title"> <i class="fa fa-folder"> </i> Account </h4>
    </div>
     <ul class="list-group">
       <li class="list-group-item"> <i class="fa fa-user"> </i> <a href="{{ url('/user/profile') }}"> Admin Profile </a></li>
      </ul> 

   </div>

</aside>
 </div>


</div>
</section>
<br>
      <!-- FOOTER -->
      <footer>
      <hr class="featurette-divider">
      <div class="container">
       <div class="row">
        <div class="col-sm-3">
           LOGO


          </div>

        <div class="col-sm-3">
        <strong> GENERAL </strong>
        <hr/>

              <ul class="bottom-link">
              <li> <a href="{{ url('/') }}#aboutusbelow"> About Us </a> </li>
              <li><a href="{{ url('/faqs') }}">FAQ</a></li>
              <li> <a href="{{ url('/') }}#becometutorbtn"> Become A Tutor </a> </li>
              <li> <a href="{{ url('/blog') }}"> Blog </a> </li>
              <li> <a href="{{ url('/contact') }}"> Contact Us </a> </li>
              <li> <a href="{{ url('/') }}#becometutorbtn"> Tutoring Jobs </a> </li>
              <li> <a href="{{ url('/user/lesson') }}"> Request a Tutor </a> </li>

              </ul>

          </div>

        <div class="col-sm-3">
     <strong>ADDRESS</strong>
     <hr/>
<p>11, Obafemi Awolowo Way, <br>Beside BestSay Shopping Mall, <br>Igbona, Osogbo, Osun State. </p>

          </div>

        <div class="col-sm-3">
     <p><strong>CONTACTS</strong>
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
   <div class="row">
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
     <script src="/js/admin.js"></script>
     @yield('sectionfooter')
  </body>
</html>  