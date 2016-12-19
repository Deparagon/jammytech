@extends('userlayout')

@section('pagetitle')
  Payment Status | Tutorago
@endsection

@section('dashbreadcumb')
<ol class="breadcrumb">
  <li><a href="{{ url('/user/dashboard') }}">Home</a></li>
  <li class="active">Payment Status</li>
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
 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title"> {{ Auth::user()->firstname }}, Thanks for getting this far </h4>
     </div>
     <div class="panel-body">
      <h3> Payment Status GateWay Response  </h3>
    
        @if ( isset($status))
         @if ($status == 'Pass')
             @if ($msg =='lessonfee')
           {{ TTools::naSuccess( ' Your payment is successful and your lesson has been initiated.  You can view your lessons ') }}
            @endif
            @if ($msg =='processingfee')
            {{ TTools::naSuccess( ' Your payment is successful. Your lesson is open for bidding by our tutors, You will be informed when a tutor bids on your lesson. Select the tutor of your choice from the bidders') }}
            @endif

          
            @else
            @if ($msg =='badstatus')
{{ TTools::naError(' This payment have been previously marked as paid.') }}
             @endif
 {{ TTools::naError(' You payment was not processed! Error occured during payment checks.') }}            
            @endif
            @else
{{ TTools::naError('You do not have permissions to view this page at this time.') }}
            @endif

      



 </div>
  <div class="panel-footer">       
   </div>
</div>

<div class="panel panel-blackbar">
 <div class="panel-heading"> Why Charge Processing Fee?</div>
 <div class="panel-body">

  <p class="well"> 
      We incur several costs in finding the best tutors closest to you which may slow down the process. The fee helps to reduce cost so that we can respond faster.
  </p>
 </div>



</div>




  </div>
  </div>
  
</section>



@stop
