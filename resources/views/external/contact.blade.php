@extends('externallayout')
@section('metadescription')
 <meta name="description" content="Want to partner with us in order to get private home tutors or become a tutor?, please do not hesitate to contact us.">
@endsection

@section('pagetitle')
Contact us to get Private Home Tutors from your area | Tutorago.Com
@endsection


@section('externalcontent')

<section class="top-contactus">
	<div class="topbanner"></div>
</section>

<section class="">
 <div class="row contactus-line-bar">
   <div class="col-sm-8 col-sm-offset-1">
           <h2 class=""> Fill the form below or use any of the provided address to contact us </h2>


    </div>

 </div>
    <div class="container marketing">
      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row  featurette">
        <div class="col-md-5">
             <p class="lead"><strong>Office address </strong> </p>
<p>16, Alhaja Eleshin Street, <br>Off Ramat Crescent, <br>Ogudu-Ojota, Kosofe, Lagos State.</p>
<p>11, Obafemi Awolowo Way, <br>Beside BestSay Shopping Mall, <br> Igbona, Osogbo, Osun State.</p>
    <p class="lead"><strong>Mobile </strong> </p>
       <p> +234 816 708 2704</p>
   <p class="lead"><strong>Partnership </strong> </p>
      <p> Want to partner with us? Kindly contact us via: <br> info@tutorago.com <br> or call us via +2348167082704. <br> 
Thank you.</p>

        </div>
        <div class="col-md-7">
        
@if (count($errors))

@foreach($errors->all() as $error)
 <div class="alert alert-danger"> {{ $error }}  </div>

@endforeach

@endif
             <div class="contactform">
              <form class="" method="POST" action="">
@if (session()->has('contactsaved'))
   {{ TTools::naSuccess(session('contactsaved')) }} 

   @endif

                {{ csrf_field() }}
                 <div class="form-group">
                 <label for="fullname"> Fullname </label>
                  <input type="text" name="fullname" class="form-control">
                  </div>

                  <div class="form-group">
                 <label for="phone"> Phone </label>
                  <input type="text" name="phone" class="form-control">
                  </div>

              <div class="form-group">
                 <label for="email"> Email </label>
                  <input type="email" name="email" class="form-control">
                  </div>

              <div class="form-group">
                <label for="message"> Message </label>
                  <textarea class="form-control" name="message" row="10"></textarea>
              </div>


              <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <div class="form-group">
                  <button class="btn btn-primary btn-block" id="submitformcontact"> Send </button>
                 </div>

              </div>

        </div>



             </form>
             </div>

        </div>
      </div>


</div>

</section>

@stop
