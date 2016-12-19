<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('metadescription')

    <meta name="author" content="Paragon Kingsley">
    <link rel="icon" href="/img/favicon/32.png">

    <title> @yield ('pagetitle')</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
      @yield('extracss')

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
    <link href="/css/carousel.css" rel="stylesheet">
     <link href="/css/zetta.menu.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
     @yield('specifictopjs')
  </head>
<!-- NAVBAR
================================================== -->
  <body>
   <nav class="navbar navbar-default navbar-fixed-top topmostnavbar">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/') }}"><img class="logo-top"  src="/img/logo/logo.png" alt="Tutorago"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
                       @if (Auth::guest())
            <li><a data-toggle="modal" data-target="#dologincallshortpage" href="#">Login</a></li>

            <li><a data-toggle="modal" data-target="#regformlocatesmallpage" href="#">Register</a></li>
            @else
<li><a  href="{{ url('/user/dashboard') }}">Dasboard</a></li>
<li><a  href="{{ url('/logout') }}">Logout</a></li>
@endif
   
            <li><a class="" href="{{ url('/') }}#becometutorbtn"> Become a Tutor</a></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    @yield('externalcontent')

   

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
              <li> <a href="{{ url('/') }}#aboutusbelow"> About Us </a> </li>
              <li><a href="{{ url('/faqs') }}">FAQ</a></li>
              <li> <a href="{{ url('/') }}#becometutorbtn"> Become A Tutor </a> </li>
              <li> <a href="{{ url('/blog') }}"> Blog </a> </li>
              <li> <a href="{{ url('/contact') }}"> Contact Us </a> </li>
              <li> <a href="{{ url('/') }}#becometutorbtn"> Tutoring Jobs </a> </li>
              <!-- <li> <a href="{{ url('/user/lesson') }}"> Request a Tutor </a> </li>-->
              </ul>

          </div>

        <div class="col-sm-3">
     <strong>ADDRESS</strong>
     <hr/>
<p>16 Alhaja Eleshin Street, <br>Off Ramat Crescent, <br>Ogudu-Ojota, Kosofe, Lagos State.</p>
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
 @include('bystatebysubject')

   <div class="row copyright-footer">
       <div class="col-sm-6 col-sm-offset-4">
        <p>&copy; 2016 Tutorago, Inc.  | <a href="{{ url('/privacy') }}">Privacy</a> | <a href="{{ url('/terms') }}">Terms</a></p>
       </div>
       </div>
      </footer>

    


<!-- LOGIN  -->
<div class="modal fade" id="dologincallshortpage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="midreg-bar modal-title" id="myModalLabel">WELCOME BACK</h4>
      </div>
      <div class="modal-body">
       <div id="reportajaxloginstate"> </div>
                  
                                   <form class="" id="ajaxlogintutorago" role="form" method="POST" action="">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="email" class="control-label">E-Mail Address</label>
                            
                                <input id="email" type="email" class="form-control" name="email">
                        </div>

                        <div class="form-group">
                            <label for="password" class="control-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password">
                            
                        </div>

                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        

                           <div class="col-sm-4 pull-right">
                                    <button type="submit" class="btn btn-lg btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>
                           </div>
                           </div>
                           </div>


                    </form>

      </div>
      <div class="modal-footer">

                           </div>
    
    </div>
  </div>
</div>  <!-- /LOGIN -->

<!-- REGISTRATION FORM -->

<div class="modal fade" id="regformlocatesmallpage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="midreg-bar modal-title" id="myModalLabel"> TUTORAGO REGISTRATION</h4>
        <h6>Sign Up to connect with private tutors and clients | Returning User? Please Login</h6>
      </div>
      <div class="modal-body">
            <div id="reportajaxregistrationstate"> </div>
     
                          <form id="tutorregistrationformele" class="" role="form" method="POST" action="">
                        {{ csrf_field() }}


                        <div class="row">
                         <div class="col-sm-6">
                        <div class="form-group">
                             <label for="email" class=" control-label">E-Mail Address</label>

                            
                                <input id="email" type="email" class="form-control" name="email" value="">


                           
                        </div>
                        </div>

                        <div class="col-sm-6">
                        <div class="form-group">
                            <label for="password" class="control-label">Password</label>

                            
                                <input id="password" type="password" class="form-control" name="password">

                               
                           
                        </div>
                        </div>
                        </div>

                        <div class="row">
                         <div class="col-sm-6">
                        <div class="form-group">
                            <label for="firstname" class="control-label">Firstname</label>

                            
                                <input id="firstname" type="text" class="form-control" name="firstname" value="">


                           
                        </div>
                        </div>

                        <div class="col-sm-6">
                        <div class="form-group">
                            <label for="lastname" class="control-label">Lastname</label>

                            
                                <input id="lastname" type="text" class="form-control" name="lastname" value="">

                               
                           
                        </div>
                        </div>
                        </div>


                           <div class="row">
                         
                                    <div class="col-sm-6">
                                    
                       
                        </div>


       <div class="col-sm-6 pull-right">
                            <div class="form-group">
                            <label for="referralemail" class=" control-label">Referral Email (Optional)</label>

                            
                                <input id="referralemail" type="email" class="form-control" name="referralemail" value="">
                        </div>
                        </div>
               


                        </div>
                          <br>
                        <div class="form-group">
                         <div class="row">
                            <div class="col-sm-4 col-sm-offset-4">
                                <button type="submit" class="btn btn-block btn-lg btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                                <h6>By registering means you agree with our <a href="{{ url('/terms') }}">Terms</a></h6>
                            </div>
                            </div>
                        </div>
                    </form> 



      </div>
 
    </div>
  </div>
</div>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/js/jquery-1.12.4.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/ie10-viewport-bug-workaround.js"></script>
     <script src="/js/zetta.menu.jquery.js"></script>
     
     <script src="/js/front.js"></script>
     <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-81275206-1', 'auto');
  ga('send', 'pageview');

</script>
    <!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?1NHJ4yihX57zB9p9D4Sua2U0ITpvyFCH";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zendesk Chat Script-->

      @yield('specificfooterjs')
  </body>
</html>
