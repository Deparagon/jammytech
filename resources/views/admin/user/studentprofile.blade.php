@extends('adminlayout')


@section('pagetitle')
 {{ $userdata->firstname}}'s Profile | Admin Student Management
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
<h2 class="cent-h"> <span>{{ $userdata->firstname }}'s Detail </span> </h2>

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
               <option value="male" @if(isset($profiledata)) @if  ($profiledata->gender == 'male') selected @endif @endif> Male </option>
               <option value="female"@if(isset($profiledata)) @if ($profiledata->gender == 'female') selected @endif @endif> Female </option>
            </select>
       </div>

       <div class="row">
       <div class="col-sm-12">
       <div class="form-group">
            <label for="birthday">Birthday</label>
            <div class="row"> 
            <div class="col-sm-2">
             <div class="sel-box-birth">
            <select class="form-control" name="day" id="day">
               <option> Day</option>
              @for ($i = 01; $i < 32; $i++)
    <option value="{{ $i }}" @if ( $i == $day) selected @endif >{{ $i }} </option>
               @endfor
            </select>
             </div>
             </div>

                    <div class="col-sm-2">
                     <div class="sel-box-birth">
            <select class="form-control" name="month" id="month">
               <option> Month </option>
               <option value="01" @if ( $month == 01) selected @endif> January </option>
               <option value="02" @if ( $month == 02) selected @endif> February </option>
               <option value="03" @if ( $month == 03) selected @endif> March </option>
               <option value="04" @if ( $month == 04) selected @endif> April </option>
               <option value="05" @if ( $month == 05) selected @endif> May </option>
               <option value="06" @if ( $month == 06) selected @endif> June </option>
               <option value="07" @if ( $month == 07) selected @endif> July </option>
               <option value="08" @if ( $month == 08) selected @endif> August </option>
               <option value="09" @if ( $month == 09) selected @endif> September </option>
               <option value="10" @if ( $month == 10) selected @endif> October</option>
               <option value="11" @if ( $month == 11) selected @endif> November </option>
               <option value="12" @if ( $month == 12) selected @endif> December </option>
            </select>
             </div>
             </div>
                    
                    <div class="col-sm-2">
                     <div class="sel-box-birth">
            <select class="form-control" name="year" id="year">
              <option> Year </option>
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
         <label for="phone"> Phone</label>
         <input type="tel" value="@if(isset($profiledata)) {{ $profiledata->phone }} @endif " name="phone" id="phone" class="form-control">

     </div>
     </div>
      
      <div class="col-sm-6">
     <div class="form-group">
         <label for="street"> Street</label>
         <input type="text" value="@if(isset($profiledata)) {{ $profiledata->street }} @endif" name="street" id="street" class="form-control">

     </div>
     </div>
     </div>
     <div class="row">
     <div class="col-sm-6">
     <div class="form-group">
         <label for="city"> City</label>
         <input type="text" value="@if(isset($profiledata)) {{ $profiledata->city }} @endif" name="city" id="city" class="form-control">

     </div>
     </div>

     <div class="col-sm-6">
     <div class="form-group">
         <label for="state"> State</label>
         <input type="text" value="@if(isset($profiledata)) {{ $profiledata->state }} @endif" name="state" id="state" class="form-control">
     </div>
     </div>
     </div>

    <div class="form-group">
       <label for="bio"> Describe yourself</label>
         <textarea name="bio" id="bio" class="form-control">@if(isset($profiledata)) {{ $profiledata->bio }} @endif </textarea>
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

