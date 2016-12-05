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
                  <p> Total </p>
                  <p> {{ TTools::displayNumber($allrequest) }} </p>
              </div>
        </div>

        <div class="col-sm-4"> 
        <div class="box-show">
                  <p> Pending </p>
                  <p> {{ TTools::displayNumber($pending) }} </p>
              </div>

        </div>

        <div class="col-sm-4"> 
              <div class="box-show">
                  <p> Paid </p>
                  <p> {{ TTools::displayNumber($paidrequest) }} </p>
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

    {{ TTools::naError(session('paidnot')) }} 

   @endif  

</section>

<section class="all-trans">
<div class="panel panel-blackbar">
<div class="panel-heading"> 
<h4 class="panel-title"> payout Requests </h4>
</div>
<div class="table-responsive">
   <table class="table table-stripped table-bordered">
      <thead> <th> ID</th>
        <th> Date</th> <th>Amount</th> <th> Charge</th> <th> By</th>  <th>Account Details</th> <th>Mark</th> 
      </thead>
<tbody>
   @if (isset($payrequests))
   @if (count($payrequests) >0)

   @foreach($payrequests as $payrequest)
     <tr>
     <td> {{ $payrequest->id }}</td>
     <td> {{ $payrequest->created_at }} </td>  <td> {{ $payrequest->amount }} </td> <td>{{ $payrequest->charge }}</td> 
     <td> {{ $payrequest->user->lastname }}  {{ $payrequest->user->firstname }}</td>
      <td> 
<?php $bank = Bank::getUserBank($payrequest->user_id) ?>
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

     <td> <a href="{{ url('/admin/payout/approve/'.$payrequest->id ) }}"  class="btn btn-xs btn-primary"> <i class="fa fa-check-square-o"> </i></a> </td>
   </tr>
   @endforeach

@else
<tr> <td colspan="7"> No Payment request found  </td></tr>
   @endif

   @else
   <tr> <td colspan="7">No Payment request found  </td></tr>

   @endif
  


</tbody>

   </table>
</div>
</div>
</section>


@endsection

