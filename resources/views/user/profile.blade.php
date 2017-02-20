@extends('userlayout')

@section('pagetitle')
  Profile | Tutorago
@endsection

@section('dashbreadcumb')
<ol class="breadcrumb">
  <li><a href="{{ url('/user/dashboard') }}">Home</a></li>
  <li class="active">Profile</li>
</ol>

@stop

@section('innercontent')
@if (count($errors))

@foreach($errors->all() as $error)
 {{ TTools::naError($error) }} 

@endforeach

@endif

@if (session()->has('updatedprof'))
       {{ TTools::naSuccess(session('updatedprof')) }}
   @endif
<section>
  <div class="row">
<div class="col-sm-12">
   <form class="" id="" method="POST" action="">

 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title">My Profile Details </h4>
     </div>
     <div class="panel-body">
         {{ csrf_field() }}
       <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" readonly value="{{ $userdata->firstname }}" class="form-control" id="firstname">

       </div>

       <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" readonly value="{{ $userdata->lastname }}" class="form-control" id="lastname">

       </div>
      <div class="row">
      <div class="col-sm-6">
       <div class="form-group">
            <label for="gender">Gender <span class="req"> * </span> </label>
            <select class="form-control" name="gender" id="gender">
               <option value="male" @if(isset($userdata)) @if  ($userdata->gender == 'male') selected @endif @endif> Male </option>
               <option value="female"@if(isset($userdata)) @if ($userdata->gender == 'female') selected @endif @endif> Female </option>
            </select>
       </div>
       </div>
            <div class="col-sm-6">  
 <div class="form-group">
         <label for="phone">Phone Number <span class="req"> * </span></label>
         <input type="tel" value="@if(isset($userdata)) {{ $userdata->phone }} @endif " name="phone" id="phone" class="form-control">

     </div>

     </div>

       </div>

       <div class="row">
       <div class="col-sm-12">
       <div class="form-group">
            <label for="birthday">Birth Date  <span class="req"> * </span></label>
            <div class="row"> 
            <div class="col-sm-2">
             <div class="sel-box-birth">
            <select class="form-control" name="day" id="day">
               <option>Select Day</option>
              @for ($i = 01; $i < 32; $i++)
    <option value="{{ $i }}" @if ( $i == $day) selected @endif >{{ $i }} </option>
               @endfor
            </select>
             </div>
             </div>

                    <div class="col-sm-2">
                     <div class="sel-box-birth">
            <select class="form-control" name="month" id="month">
               <option>Select Month </option>
               <option value="01" @if ( $month == 01) selected @endif> January </option>
               <option value="02" @if ( $month == 02) selected @endif> February </option>
               <option value="03" @if ( $month == 03) selected @endif> March </option>
               <option value="04" @if ( $month == 04) selected @endif> April </option>
               <option value="05" @if ( $month == 05) selected @endif> May </option>
               <option value="06" @if ( $month == 06) selected @endif> June </option>
               <option value="07" @if ( $month == 07) selected @endif> July </option>
               <option value="8" @if ( $month == 8) selected @endif> August </option>
               <option value="9" @if ( $month == 9) selected @endif> September </option>
               <option value="10" @if ( $month == 10) selected @endif> October</option>
               <option value="11" @if ( $month == 11) selected @endif> November </option>
               <option value="12" @if ( $month == 12) selected @endif> December </option>
            </select>
             </div>
             </div>
                    
                    <div class="col-sm-2">
                     <div class="sel-box-birth">
            <select class="form-control" name="year" id="year">
              <option>Select Year </option>
                @for ($i = 1940; $i < 2017; $i++)
               <option value="{{ $i }}" @if ( $i == $year) selected @endif>{{ $i }} </option>
               @endfor
            </select>
             </div>
             </div>
             </div>
     </div>
     </div>



     </div>


     <div class="row">
     <div class="col-sm-6">
     <div class="form-group">
         <label for="addresssearcher"> Enter your Address here</label>
         <input type="text" id="autocomplete" onFocus="geolocate()" name="fulladdress" class="form-control" placeholder=" e.g 33, Isaac John Street, Yaba">

     </div>
     </div>
      
      <div class="col-sm-6">
     <div class="form-group">
         <label for="street"> Street  <span class="req"> * </span> </label>
         <input type="text" id="route"  value="@if(isset($userdata)) {{ $userdata->street }} @endif" name="street"  class="form-control" placeholder=" e.g 33, Isaac John Street">

     </div>
     </div>
     </div>
     <div class="row">
     <div class="col-sm-6">
     <div class="form-group">
         <label for="city"> Area/Location <span class="req"> * </span> </label>
         <input type="text" value="@if(isset($userdata)) {{ $userdata->city }} @endif" name="city" id="locality" class="form-control" placeholde="e.g Yaba">


     </div>
     </div>

     <div class="col-sm-6">
     <div class="form-group">
         <label for="state"> State  <span class="req"> * </span></label>
         <input type="text" value="@if(isset($userdata)) {{ $userdata->state }} @endif" name="state" id="administrative_area_level_1" class="form-control">
     </div>
     </div>
     </div>

    <div class="form-group">
       <label for="bio">Bio Introducing you to Prospective Clients <span class="req"> * </span> </label>
         <textarea name="bio" rows="10" id="bio" class="form-control">@if(isset($userdata)) {{ $userdata->bio }} @endif </textarea>
    </div>

  <span class="req"> * </span>  All asterisked fields are <span class="req"> required </span>. Do not submit without filling required fields


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
