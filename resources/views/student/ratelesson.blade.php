@extends('userlayout')

@section('pagetitle')
 @section('sectionheader')
<link href="/css/bootstrap-rating.css" rel="stylesheet">
 @endsection
  Lesson Complete | Tutorago
@endsection

@section('dashbreadcumb')
<ol class="breadcrumb">
  <li><a href="{{ url('/user/dashboard') }}">Home</a></li>
  <li class="active">Lesson Completed</li>
</ol>

@stop
 
@section('innercontent')

@if (count($errors))

@foreach($errors->all() as $error)
 {{ TTools::naError($error) }} 

@endforeach

@endif

@if (session()->has('ratingsuccess'))

   {{ TTools::naSuccess(session('ratingsuccess')) }} 

   @endif


<section>

     <div class="row">
      <div class="col-sm-12">
       <div class="panel panel-default">
       <div class="panel-heading">
       <h3> Hi {{ Auth::user()->firstname }}! We are Glad your lessons have ended successfully. </h3>
       </div>
       <div class="panel-body">
        <p class="well">
         Please rate your Tutor. 
        </p>
          <div class="rating-form">
           <form class="rating-f" method="POST" action="">
           {{ csrf_field() }}

              <div class="rate-box">
             <input type="hidden"  value="0" name="darating" class="rating starfa" data-filled="fa fa-star fa-3x" data-empty="fa fa-star-o fa-3x" id="darating">
           </div>
             <div class="form-group">
               <label> Comment</label>
                 <textarea name="ratecomment" class="form-control"> </textarea>

             </div>

             <div class="form-group">
               <button class="btn btn-lg btn-success" @if ($lesson->studentrate==1) disabled @endif   type="submit"> Rate </button>

             </div>

           </form>

          </div>

         </div>
         </div>
      </div>

     </div>


</section>



@endsection

@section('sectionfooter')
<script src="/js/bootstrap-rating.min.js"></script>
<script src="/js/extrauser.js"></script>
@endsection
