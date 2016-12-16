@extends('userlayout')

@section('pagetitle')
  Get a Lesson | Tutorago
@endsection

@section('dashbreadcumb')
<ol class="breadcrumb">
  <li><a href="{{ url('/user/dashboard') }}">Home</a></li>
  <li class="active">Tutor Credentials</li>
</ol>

@stop
 
@section('innercontent')

@if (count($errors))

@foreach($errors->all() as $error)
 {{ TTools::naError($error) }} 

@endforeach

@endif
<section>
  <div class="row">
<div class="col-sm-12">
@if ( (isset($completed)) && ($completed == 'Yes') )
   <form class="" id="" method="POST" action="">
  {{ csrf_field() }}
 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title"> Hi {{ Auth::user()->firstname }}! Final Step  </h4>
     </div>
     <div class="panel-body">
      {{ TTools::naInfo('You are now in the final step') }}
      @if(session()->has('budgetstate'))
         @if (session('budgetstate') =='KO') 
         <p class="budgetdisplay">We suggest that you increase your budget. </p>
         @if (session()->has('bestpricedtutor'))
          <p class="well"> The most basic price we obtained from our search indicates that the lowest price a tutor can use to teach this lesson anywhere in the country is {{ TTools::displayPrice(session('bestpricedtutor')) }} </p>
          @endif
         @else
      <p class="budgetdisplay well">Your budget is a little below what our tutors use to teach this subject </p>

      @endif
      @endif
      
       
<hr>

 </div>
  <div class="panel-footer"> 
         <div class="form-group">
            <div class="row">
             <div class="col-sm-4"> </div>
             <div class="col-sm-4">
            <button type="submit" class="btn btn-block btn-lg btn-success pull-right"> Submit Lesson Request <i class="fa fa-chevron-right">  </i></button>
            </div>
            </div>
       </div>
     
       
   </div>
</div>
</form>
@else
{{ TTools::naError('Lesson not yet created')}}

@endif

  </div>
  </div>
  
</section>



@stop
