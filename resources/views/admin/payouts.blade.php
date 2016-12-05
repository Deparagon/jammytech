@extends('adminlayout')

@section('pagetitle')
 Payout Requests | Tutorago.com
@endsection

@section('dashbreadcumb')
<div class="row"> 
  <div class="col-sm-12"> 
    <ol class="breadcrumb">
  <li><a href="{{ '/admin/dashboard' }}">Home</a></li>
  <li><a href="#">Payout Requests</a></li>
</ol>
   </div>
</div>

@endsection

@section('innercontent')

<section>
    <h1 class="topline-data"> <span>Payout Requests</span> </h1>
  <div class="row">
        <div class="col-sm-4"> 
              <div class="box-show">
                  <p> Requests </p>
                  <p> {{ TTools::displayNumber($allrequest) }} </p>
              </div>
        </div>

        <div class="col-sm-4"> 
        <div class="box-show">
                  <p> Paid </p>
                  <p> {{ TTools::displayNumber($paid) }} </p>
              </div>

        </div>

        <div class="col-sm-4"> 
              <div class="box-show">
                  <p> Cash Payouts </p>
                  <p> {{ TTools::displayPrice($cashpaid) }} </p>
              </div>

        </div>

   </div>

</section>
<section class="add-bank">
@if (count($errors))

@foreach($errors->all() as $error)
{{ TTools::naError($error) }} 

@endforeach

@endif

@if (session()->has('paidmark'))

    {{ TTools::naSuccess(session('paidmark')) }} 

   @endif

 @if (session()->has('paidnot'))

    {{ TTools::naSuccess(session('paidnot')) }} 

   @endif  

</section>

<section class="all-trans">
<div class="panel panel-blackbar">c
<div class="panel-heading"> 
<h4 class="panel-title"> payout Requests </h4>
</div>
<div class="table-responsive">
   <table class="table table-stripped table-bordered">
      <thead> <th> ID</th>
        <th> Date</th> <th>Amount</th> <th> Charge</th> <th> By</th>  <th>Account Details</th> <th>Status</th> 
      </thead>
<tbody>
   @if (isset($payouts))
   @if (count($payouts) >0)

   @foreach($payouts as $payout)
     <tr>
     <td> {{ $payout->id }}</td>
     <td> {{ $payout->created_at }} </td>  <td> {{ $payout->amount }} </td> <td>{{ $payout->charge }}</td> 
     <td> {{ $payout->user->lastname }}  {{ $payout->user->firstname }}</td>
      <td> 
<?php $bank = Bank::getUserBank($payout->user_id) ?>
          @if (TTools::obuObject($bank))
      <table class="table tabl-striped">

        <tr> <td> Bank</td> <td> {{ $bank->bank }}</td></tr>
        <tr> <td> Account Name</td> <td> {{ $bank->accountname }} </td></tr>
        <tr> <td> Account Number</td> <td> {{ $bank->accountnumber }} </td></tr>
        <tr> <td> Bank Address</td> <td> {{ $bank->address }} </td></tr>
      </table>
      @else
    <span> No bank details provided </span>
      @endif
      </td>

     <td> <span class="greenbar"> Paid </span> </td>
   </tr>
   @endforeach

@else
<tr> <td colspan="7"> No Payment  found  </td></tr>
   @endif

   @else
   <tr> <td colspan="7">No Payment found  </td></tr>

   @endif
  


</tbody>

   </table>
</div>
</div>
</section>


@endsection

