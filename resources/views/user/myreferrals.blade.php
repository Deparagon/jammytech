@extends('userlayout')

@section('pagetitle')
  My Referrals | Tutorago
@endsection

@section('dashbreadcumb')
<ol class="breadcrumb">
  <li><a href="{{ url('/user/dashboard') }}">Home</a></li>
  <li class="active">My Referrals</li>
</ol>

@stop

@section('innercontent')

@if (count($errors))

@foreach($errors->all() as $error)
 <div class="alert alert-danger"> {{ $error }}  </div>

@endforeach

@endif

@if (session()->has('createdmsg'))

   <div class="alert alert-success"> {{ session('createdmsg') }} </div>

   @endif

<section>
  <div class="row">
<div class="col-sm-12">
 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title"> My Referrals </h4>
     </div>
     <div class="panel-body">

<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
  <tr> <th> Name </th> <th> Date Join </th>  <th> Status   </th> <th>Commission</th>
</tr>
</thead>

<tbody>
@if(!empty($referrals))
@foreach( $referrals as $referral)
<tr> <td> {{ $referral->firstname }} </td> <td> {{ $referral->status }} </td> <td> {{ $referral->created_at }}  </td> <td> {{ $referral->commission}}</td> </tr>

@endforeach
  
  @endif
</tbody>

</table>
</div>
<hr>


</div>
  </div>
  </div>
  </div>
</section>



@stop