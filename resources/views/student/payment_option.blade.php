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
@if ( session()->has('createdlesson') && (session('createdlesson') == 'Yes') )
 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title"> {{ Auth::user()->firstname }}, this is Payment Step </h4>
     </div>
     <div class="panel-body">
      <h3>Processing fee  <span class="pull-right"> {{ TTools::displayPrice(1000) }} </span></h3>
     <p class="well"> 
     This helps to reduce the cost of finding the best tutors for you. It's 100% refundable, if we can't find any tutor, We will refund your money through your bank or any means you suggest.

      </p>
      <div class="payment-optionlist">
        <div class="row">
         <div class="col-sm-4">

           <div class="radio">
            <label>
              <input type="radio" name="paymenttype" id="paystak" value="paystak" checked>
              Pay Stack 
            </label>
          </div>
<div class="radio">
  <label>
    <input type="radio" name="paymenttype" id="bank" value="bank">
    Pay to Bank Account
  </label>
</div>

         </div>
         <div class="col-sm-8"> 
             <div id="showpaymentdetailbychoosen">
                 <div id="paystackdata">
                   <h3> Secure Online Payment <i class="fa fa-lock"> </i> </h3>
                 <p class="well"> 
                    Online Payment is processed by PayStack. <br>
                    PayStack is a secure and convinient way to payonline
                 </p>
                 <form method="POST" action="{{ url('/user/paystack') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                 {{ csrf_field() }}

            <input type="hidden" name="email" value="{{ Auth::user()->email }}"> 
            <input type="hidden" name="orderID" value="{{$invoice->id}}">
            <input type="hidden" name="amount" value="{{ ($invoice->amount * 100) }}">
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" name="reference" value="{{ $invoice->reference }}"> 
            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}">
              <button class="btn btn-success btn-lg" type="submit" value="Pay Now!">
              <i class="fa fa-plus-circle fa-lg"></i> Pay Now!
              </button>
  
</form>


                  
                   </div>
                   <div id="bankdata">
                   @if (isset($banks))
                    @foreach ($banks as $bank)
                     Bank: {{ $bank->bank }} <br>
                     Address: {{ $bank->address }} <br>
                     Account Name: {{ $bank->accountname }} <br>
                     Account Number: {{ $bank->accountnumber }} <br>
                      <hr>
                      @endforeach
                      @endif

                   </div>

              </div>

         </div>

        </div>

      </div>



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


@else
{{ TTools::naError('Lesson not yet created') }}

@endif

  </div>
  </div>
  
</section>



@stop