@extends('userlayout')

@section('pagetitle')
  My Guarantors | Tutorago
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
 <div class="alert alert-danger"> {{ $error }}  </div>

@endforeach

@endif

@if (session()->has('createdmsg'))

   <div class="alert alert-success"> {{ session('createdmsg') }} </div>

   @endif
<section>
  <div class="row">
<div class="col-sm-12">
   <form class="" id="" method="POST" action="{{ url('/user/myguarantor') }}">

 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title"> Guarantors </h4>
     </div>
     <div class="panel-body">

<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
  <tr>  <th> Name </th> <th> Email</th> <th> Phone</th> <th> Years Known</th> <th>Place of Work</th> <th>Action</th></tr>
</thead>

<tbody>
@if(!empty($myguarantors))
@foreach( $myguarantors as $guarantor)
<tr> <td> {{ $guarantor->lastname }}, {{ $guarantor->firstname }} </td> <td> {{ $guarantor->email }}</td> <td> {{ $guarantor->phone }} </td> <td> {{ $guarantor->yearsknown}}</td> <td>  {{ $guarantor->placeofwork }} </td> <td>  <!-- <a  id="killthisnegrunowfm"  data-ghasid="{{ $guarantor->id }}" href="javascript:;"> <i class="fa fa-trash"> </i> </a>  --></td> </tr>

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
            <label for="firstname">Firstname</label>
            <input type="text" name="firstname" value="{{ old('firstname') }}" class="form-control" id="firstname">

       </div>
       </div>
     <div class="col-sm-6">
       <div class="form-group">
            <label for="lastname">Lastname</label>
            <input type="text" name="lastname" value="{{ old('lastname') }}" class="form-control" id="lastname">

       </div>
       </div>

       </div>

      <div class="row">
      <div class="col-sm-6">
       <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" id="phone">

       </div>
       </div>

     <div class="col-sm-6">
       <div class="form-group">
            <label for="email">Email</label>
             <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email">

       </div>
       </div>
       </div>
      
      <div class="row">
      <div class="col-sm-6">
       <div class="form-group">
            <label for="yearsknown">Years Known </label>
            <input type="text" name="yearsknown" value="{{ old('yearsknown') }}" class="form-control" id="yearsknown">

       </div>
       </div>

     <div class="col-sm-6">
       <div class="form-group">
            <label for="placeofwork">Place Of Work</label>
             <input type="text" name="placeofwork" value="{{ old('placeofwork') }}" class="form-control" id="placeofwork">

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
