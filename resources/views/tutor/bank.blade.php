@extends('userlayout')

@section('pagetitle')
  My Bank Details| Tutorago
@endsection

@section('dashbreadcumb')
<ol class="breadcrumb">
  <li><a href="{{ url('/user/dashboard') }}">Home</a></li>
  <li class="active">Bank Details</li>
</ol>

@stop

@section('innercontent')
@if (count($errors))

@foreach($errors->all() as $error)
 <div class="alert alert-danger"> {{ $error }}  </div>

@endforeach

@endif

@if (session()->has('bankgood'))

   <div class="alert alert-success"> {{ session('bankgood') }} </div>

   @endif
<section>
  <div class="row">
<div class="col-sm-12">
   <form class="" id="" method="POST" action="">

 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title"> Bank Details </h4>
     </div>
     <div class="panel-body">




         {{ csrf_field() }}
        <div class="row">
      <div class="col-sm-6">
       <div class="form-group">
            <label for="bank">Bank Name</label>
            <input type="text" value="@if (isset ($bank->bank)) {{ $bank->bank }} @endif" name="bank" class="form-control" id="bank">

       </div>
       </div>
     <div class="col-sm-6">
       <div class="form-group">
            <label for="accountnumber">Account Number</label>
            <input type="text" value="@if (isset( $bank->accountnumber)) {{ $bank->accountnumber }} @endif" name="accountnumber" class="form-control" id="accountnumber">

       </div>
       </div>

       </div>

      <div class="row">
      <div class="col-sm-6">
       <div class="form-group">
            <label for="accountname">Account Name</label>
            <input type="text" value="@if (isset ($bank->accountname)) {{ $bank->accountname }} @endif" name="accountname" class="form-control" id="accountname">

       </div>
       </div>

     <div class="col-sm-6">
       <div class="form-group">
            <label for="address">Address</label>
             <input type="address" value="@if (isset ($bank->address)) {{ $bank->address }} @endif" name="address" class="form-control" id="address">

       </div>
       </div>
       </div>
      
 </div>
  <div class="panel-footer"> 
       <div class="form-group">
            <div class="row">
             <div class="col-sm-10"> </div>
             <div class="col-sm-2">
            <button type="submit" class="btn btn-sm btn-default pull-right "> <i class="fa fa-save">  </i> <br> Save</button>
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