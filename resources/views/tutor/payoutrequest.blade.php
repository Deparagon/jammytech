@extends('userlayout')

@section('pagetitle')
  My Payout Request | Tutorago
@endsection

@section('dashbreadcumb')
<ol class="breadcrumb">
  <li><a href="{{ url('/user/dashboard') }}">Home</a></li>
  <li class="active"> Payout Request </li>
</ol>

@stop

@section('innercontent')
@if (count($errors))

@foreach($errors->all() as $error)
 <div class="alert alert-danger"> {{ $error }}  </div>

@endforeach

@endif

@if (session()->has('successwith'))

   <div class="alert alert-success"> {{ session('successwith') }} </div>

   @endif

@if (session()->has('witherror'))

   <div class="alert alert-danger"> {{ session('witherror') }} </div>

   @endif

<section>
  <div class="row">
<div class="col-sm-12">
   <form class="" id="" method="POST" action="">

 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title"> My Payments & Requests </h4>
     </div>
     <div class="panel-body">

<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
  <tr>  <th> Date </th> <th> Amount</th> <th> Charge</th> <th> Status </th> <th>Paid On </th> </tr>
</thead>

<tbody>
@if(!empty($payouts))
@foreach( $payouts as $payout)
<tr> <td> {{ $payout->created_at }} </td> <td> {{ $payout->amount }} </td> <td> {{ $payout->charge }}</td> <td> @if ($payout->wstatus ==1) <span class="greenbar"> Paid</span> @else <span class="redbar"> Unpaid</span> @endif </td>  <td>@if ($payout->paidon !='') {{ TTools::displayDate($payout->paidon) }} @endif </td></tr>

@endforeach
  
  @endif
</tbody>

</table>
</div>
<hr>



         {{ csrf_field() }}
        <div class="row">
      <div class="col-sm-6">
       <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" class="form-control" id="amount">

       </div>
       </div>

       </div>


      

 </div>
  <div class="panel-footer"> 
       <div class="form-group">
            <div class="row">
             <div class="col-sm-10"> </div>
             <div class="col-sm-2">
            <button type="submit" class="btn btn-sm btn-default pull-right "> <i class="fa fa-save">  </i> <br> Request</button>
            </div>
            </div>
       </div>
   </div>
</div>
</form>

  </div>
  </div>
  
</section>



@stop