@extends('adminlayout')

@section('pagetitle')
 {{ $userdata->firstname }}'s Profile | Admin Tutor Management
@endsection

@section('dashbreadcumb')
<div class="row"> 
  <div class="col-sm-12"> 
    <ol class="breadcrumb">
  <li><a href="">Home</a></li>
  <li><a href="#">{{ $userdata->firstname}}</a></li>
</ol>
   </div>
</div>

@stop

@section('innercontent')
<h2 class="cent-h"> <span> {{ $userdata->firstname }}'s Detail </span></h2>
@if (count($errors))

@foreach($errors->all() as $error)
{{ TTools::naError($error) }} 

@endforeach

@endif

@if (session()->has('updatedprof'))

   <div class="alert alert-success"> {{ session('updatedprof') }} </div>

   @endif
<section>
  <div class="row">
<div class="col-sm-12">
   <form class="" id="" method="POST" action="">

 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title"> Profile Details </h4>
     </div>
     <div class="panel-body">
         {{ csrf_field() }}
       <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" readonly value="{{ $userdata->firstname }}" class="form-control" id="firstname">

       </div>

       <div class="form-group">
            <label for="lastname">LastName</label>
            <input type="text" readonly value="{{ $userdata->lastname }}" class="form-control" id="lastname">

       </div>

       <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender">
               <option value="male" @if(isset($userdata)) @if  ($userdata->gender == 'male') selected @endif @endif> Male </option>
               <option value="female"@if(isset($userdata)) @if ($userdata->gender == 'female') selected @endif @endif> Female </option>
            </select>
       </div>



     <div class="row">
     <div class="col-sm-6">
     <div class="form-group">
         <label for="phone"> Phone</label>
         <input type="tel" value="@if(isset($userdata)) {{ $userdata->phone }} @endif " name="phone" id="phone" class="form-control">

     </div>
     </div>
      
      <div class="col-sm-6">
     <div class="form-group">
         <label for="street"> Street</label>
         <input type="text" value="@if(isset($userdata)) {{ $userdata->street }} @endif" name="street" id="street" class="form-control">

     </div>
     </div>
     </div>
     <div class="row">
     <div class="col-sm-6">
     <div class="form-group">
         <label for="city"> City</label>
         <input type="text" value="@if(isset($userdata)) {{ $userdata->city }} @endif" name="city" id="city" class="form-control">

     </div>
     </div>

     <div class="col-sm-6">
     <div class="form-group">
         <label for="state"> State</label>
         <input type="text" value="@if(isset($userdata)) {{ $userdata->state }} @endif" name="state" id="state" class="form-control">
     </div>
     </div>
     </div>

    <div class="form-group">
       <label for="bio"> Describe yourself</label>
         <textarea name="bio" id="bio" cols="10" rows="10" class="form-control">@if(isset($userdata)) {{ $userdata->bio }} @endif </textarea>
    </div>




 </div>
  <div class="panel-footer"> 
       <div class="form-group">
            <div class="row">
             <div class="col-sm-10"> </div>
             <div class="col-sm-2">
            <button type="submit" class="btn btn-sm btn-default pull-right "> <i class="fa fa-save">  </i> <br> Update</button>
            </div>
            </div>
       </div>
   </div>
</div>
</form>

  </div>
</section>

@stop

