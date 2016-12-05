@extends('userlayout')

@section('pagetitle')
  Password | Tutorago
@endsection

@section('dashbreadcumb')
<ol class="breadcrumb">
  <li><a href="{{ url('/user/dashboard') }}">Home</a></li>
  <li class="active">Dashboard</li>
</ol>

@stop

@section('innercontent')
@if (count($errors))

@foreach($errors->all() as $error)
 {{ TTools::naError($error) }} 

@endforeach

@endif

    @if (session()->has('passwordupdated'))

    {{ TTools::naSuccess(session('passwordupdated')) }}

@endif

    @if (session()->has('errorupdate'))

    {{ TTools::naError(session('errorupdate')) }}

@endif

<section>
  <div class="row">
<div class="col-sm-12">
   <form class="" id="" method="POST" action="">

 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title"> Password </h4>
     </div>
     <div class="panel-body">
         {{ csrf_field() }}
       <div class="form-group">
            <label for="oldpassword">Old Password </label>
            <input type="password"  name ="oldpassword" value="" class="form-control" id="oldpassword">

       </div>

       <div class="form-group">
            <label for="newpassword">New Password</label>
            <input type="password" name="newpassword" class="form-control" id="newpassword">

       </div>
      

 </div>
  <div class="panel-footer"> 
       <div class="form-group">
            <div class="row">
             <div class="col-sm-10"> </div>
             <div class="col-sm-2">
            <button type="submit" class="btn btn-sm btn-default pull-right "> <i class="fa fa-save">  </i> <br> Change</button>
            </div>
            </div>
       </div>
   </div>
</div>
</form>

  </div>
</section>



@stop