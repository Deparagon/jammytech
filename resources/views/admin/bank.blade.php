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
                 <h4 class="panel-title"> Add New Bank </h4>
            </div>

            <div class="panel-body">
     
              <div class="form-group">
                <label for="bank"> Bank Name</label>
                <input type="text" name="bank" id="bank" class="form-control">
              </div>

        <div class="form-group">
                <label for="address"> Bank Address</label>
               <input type="text" name="address" id="address" class="form-control">
              </div>
                <div class="form-group">
                <label for="accountname"> Account Name</label>
               <input type="text" name="accountname" id="accountname" class="form-control">
              </div>
              <div class="form-group">
                <label for="accountnumber"> Account Number </label>
               <input type="text" class="form-control"  name="accountnumber" id="accountnumber"> 
              </div>


            </div>

             <div class="panel-footer">
                 <button type="submit" class="btn btn-default btn-md"> <i class="fa fa-save">  </i> <br> Add </button>
             </div>

		</div>
		</form>

</section>

<section class="all-trans">
<div class="panel panel-blackbar">
<div class="panel-heading"> 
<h4 class="panel-title"> Banks </h4>
</div>
<div class="table-responsive">
   <table class="table table-stripped table-bordered">
      <thead>
        <th> ID</th> <th>Bank</th> <th> Address</th> <th> Account Name</th>  <th>Account Name</th> <th>Edit</th> <th>Trash</th>
      </thead>
<tbody>
   @if (isset($banks))
   @if (count($banks) >0)

   @foreach($banks as $bank)
     <tr>
     <td> {{ $bank->id }} </td>  <td> {{ $bank->bank }} </td> <td>{{ $bank->address }}</td> <td>{{ $bank->accountname }}</td> <td> {{ $bank->accountnumber }}</td>  <td> <a class="btn btn-xs btn-primary" href="{{ url('/admin/bank/edit/'.$bank->id) }}"> <i class="fa fa-edit"> </i></a> </td> <td> <a id="bankkillprow" data-klbank="{{ $bank->id }}" class="btn btn-xs btn-primary"> <i class="fa fa-trash"> </i></a> </td>
   </tr>
   @endforeach

@else
<tr> <td colspan="7"> No Bank found  </td></tr>
   @endif

   @else
   <tr> <td colspan="7">No Bank Found  </td></tr>

   @endif
  


</tbody>

   </table>
</div>
</div>
</section>


@stop

