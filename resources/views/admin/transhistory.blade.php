@extends('adminlayout')

@section('pagetitle')
 All Transactions | Tutorago.com
@endsection

@section('dashbreadcumb')
<div class="row"> 
  <div class="col-sm-12"> 
    <ol class="breadcrumb">
  <li><a href="{{ '/admin/dashboard' }}">Home</a></li>
  <li><a href="#">All Transaction</a></li>
</ol>
   </div>
</div>

@endsection

@section('innercontent')

<section>
    <h1 class="topline-data"> <span>All Transaction</span> </h1>
  <div class="row">
        <div class="col-sm-6"> 
              <div class="box-show">
                  <p> Total </p>
                  <p> {{ TTools::displayNumber($countall) }} </p>
              </div>
        </div>

        <div class="col-sm-6"> 
        <div class="box-show">
                  <p> Cumulative </p>
                  <p> {{ TTools::displayNumber($cumulative) }} </p>
              </div>

        </div>

   </div>

</section>


<section class="all-trans">
<div class="panel panel-blackbar">
<div class="panel-heading"> 
<h4 class="panel-title"> All Transactions </h4>
</div>
<div class="table-responsive">
   <table class="table table-stripped table-bordered">
      <thead> <th> ID</th>
        <th> Date</th> <th>Credit</th> <th> Debit</th> <th> By</th>  <th> Details</th> 
      </thead>
<tbody>
   @if (isset($alltrans))
   @if (count($alltrans) >0)

   @foreach($alltrans as $payout)
     <tr>
     <td> {{ $payout->id }}</td>
     <td> {{ $payout->created_at }} </td>  <td> {{ $payout->credit }} </td> <td>{{ $payout->debit }}</td> 
     <td> {{ $payout->user->lastname }}  {{ $payout->user->firstname }}</td>
      <td> 
         {{ $payout->detail}}
      </td>

   </tr>
   @endforeach

@else
<tr> <td colspan="7"> No Transaction  found  </td></tr>
   @endif

   @else
   <tr> <td colspan="7">No Transaction found  </td></tr>

   @endif
  


</tbody>

   </table>
</div>

<div class="panel-footer">
   {{ $alltrans->links() }}
</div>

</div>
</section>


@endsection

