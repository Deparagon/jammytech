@extends('userlayout')

@section('pagetitle')
  Payment Options | Tutorago
@endsection

@section('dashbreadcumb')
<ol class="breadcrumb">
  <li><a href="{{ url('/user/dashboard') }}">Home</a></li>
  <li class="active">Payment Options</li>
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
          <h4 class="panel-title"> {{ Auth::user()->firstname }}, Proceed to payment gateway </h4>
     </div>
     <div class="panel-body">
      <h3>Amount payable  <span class="pull-right"> {{ TTools::displayPrice($invoice->amount) }} </span></h3>
     <p class="well"> 
     After discussing with our Tutor, you have finally agreed on a price. You need to complete the payment to start the lesson. 

      </p>
      <div class="payment-optionlist">
        <div class="row">
         <div class="col-sm-4">

           <div class="radio">
            <label>
              <input type="radio" name="paymenttype" id="paystak" value="paystak" checked>
              Pay Stak 
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
                    Payment is processed by PayStack. <br>
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
                     Bank: {{ $bank->bank }}  <br>
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
 <div class="panel-heading"> What this payment covers </div>
 <div class="panel-body">

  <p class="well"> 
      The duration of the lesson being paid for. Once you complete payment, the lesson will be initiated by the system and your tutor will be informed.  
  </p>
 </div>



</div>



  </div>
  </div>
  
</section>



@stop