@extends('adminlayout')


@section('pagetitle')
 Add Bank | Add Bank Account
@endsection

@section('dashbreadcumb')
<div class="row"> 
  <div class="col-sm-12"> 
    <ol class="breadcrumb">
  <li><a href="{{ '/admin/dashboard' }}">Home</a></li>
  <li><a href="#">Bank Account</a></li>
</ol>
   </div>
</div>

@stop

@section('innercontent')
<section class="add-bank">
@if (count($errors))

@foreach($errors->all() as $error)
{{ TTools::naError($error) }} 

@endforeach

@endif

@if (session()->has('createdbank'))

    {{ TTools::naSuccess(session('createdbank')) }} 

   @endif


		<form class="" id="" method="POST" action="">
		   {{ csrf_field() }}
		<div class="panel panel-default">
            <div class="panel-heading"> 
                 <h4 class="panel-title"> Editing: {{ $bank->bank }} </h4>
            </div>

            <div class="panel-body">
     
              <div class="form-group">
                <label for="bank"> Bank Name</label>
                <input type="text" value="{{ $bank->bank }}" name="bank" id="bank" class="form-control">
              </div>

        <div class="form-group">
                <label for="address"> Bank Address</label>
               <input type="text" value="{{ $bank->address }}" name="address" id="address" class="form-control">
              </div>
                <div class="form-group">
                <label for="accountname"> Account Name</label>
               <input type="text" value="{{ $bank->accountname }}" name="accountname" id="accountname" class="form-control">
              </div>
              <div class="form-group">
                <label for="accountnumber"> Account Number </label>
               <input type="text" value="{{ $bank->accountnumber }}" class="form-control"  name="accountnumber" id="accountnumber"> 
              </div>


            </div>

             <div class="panel-footer">
                 <button type="submit" class="btn btn-default btn-md"> <i class="fa fa-save">  </i> <br> Update </button>
             </div>

		</div>
		</form>

</section>




@stop

