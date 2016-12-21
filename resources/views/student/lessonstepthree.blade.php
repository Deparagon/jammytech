@extends('userlayout')

@section('pagetitle')
  Lesson Step one | Tutorago
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
 {{ TTools::naError($error) }} 

@endforeach

@endif

<section>
  <div class="row">
<div class="col-sm-12">
@if ( (isset($firststepstatus)) && ($firststepstatus == 'success') )
   <form class="" id="" method="POST" action="">
  {{ csrf_field() }}
 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title"> Almost done </h4>
     </div>
     <div class="panel-body">
      {{ TTools::naInfo('Provide the information below, to complete your lesson request')}}

<hr>

<div class="box-ready-address">
     <div class="row">
     <div class="col-sm-6">
     <div class="form-group">
         <label for="lessondays">Please select lesson days</label>
         <div class="row">
          <div class="col-sm-4">
            Monday: <input type="checkbox" name="lessondays[]" value="monday"> 
          </div>

          <div class="col-sm-4">
            Tuesday: <input type="checkbox" name="lessondays[]" value="tuesday"> 
          </div>

          <div class="col-sm-4">
            Wednesday: <input type="checkbox" name="lessondays[]" value="wednesday"> 
          </div>

          
          </div>
          <div class="row"> <br>
<div class="col-sm-4">
            Thursday: <input type="checkbox" name="lessondays[]" value="thursday"> 
          </div>
          <div class="col-sm-4">
            Friday: <input type="checkbox" name="lessondays[]" value="friday"> 
          </div>
          <div class="col-sm-4">
            Saturday: <input type="checkbox" name="lessondays[]" value="saturday"> 
          </div>
            
         </div>
         <br>
         <div class="row">
        <div class="col-sm-4">
            Sunday: <input type="checkbox" name="lessondays[]" value="sunday"> 
   
           </div>
         </div>
         


     </div>
     </div>
      
      <div class="col-sm-6">
     <div class="form-group">
         <label for="duration"> Lesson Duration</label>
         <select id="duration"  name="duration"  class="form-control">
           <option value="1"> 1 Month </option>
           <option value="2"> 2 Months </option>
           <option value="3"> 3 Months </option>
           <option value="4"> 4 Months </option>
           <option value="5"> 5 Months </option>
           <option value="6"> 6 Months </option>
           <option value="7"> 7 Months </option>
           <option value="8"> 8 Months </option>
           <option value="9"> 9 Months </option>
           <option value="10"> 10 Months </option>
           <option value="11"> 11 Months </option>
           <option value="12"> 12 Months </option>
         </select>
      <span> 1 Month is a period of 4 weeks</span>
     </div>
     </div>
     </div>
     <div class="row">
     <div class="col-sm-6">
     <div class="form-group">
         <label for="city"> What time of the day should lesson start?</label>
         <select type="text" name="lessonstarttime" id="lessonstarttime" class="form-control">
         <option value="06:00 AM"> 6:00 AM </option>
         <option value="07:00 AM"> 7:00 AM </option>
         <option value="08:00 AM"> 8:00 AM </option>
         <option value="08:30 AM"> 8:30 AM </option>
         <option value="09:AM"> 9:00 AM </option>
         <option value="10:AM"> 10:00 AM </option>
         <option value="11:AM">11:00 AM </option>
         <option value="12:NOON"> 12 NOON </option>
         <option value="01:PM"> 1:00 PM </option>
 <option value="02:00 PM"> 2:00 PM </option>
  <option value="03:00 PM"> 3:00 PM </option>
    <option value="03:30 PM"> 3:30 PM </option>

   <option value="04:00 PM"> 4:00 PM </option>
   <option value="04:30 PM"> 4:30 PM </option>
    <option value="05:00 PM"> 5:00 PM</option>
     <option value="06:00 PM"> 6:00 PM </option>
     <option value="06:30 PM"> 6:30 PM </option>

      <option value="07:00 PM"> 7:00 PM </option>
       <option value="08:00 PM"> 8:00 PM </option>

         </select>


     </div>
     </div>

     <div class="col-sm-6">
     <div class="form-group">
         <label for="state"> Number of hours per day</label>
         <select id="hoursperday" name="hoursperday"  class="form-control">
         <option value="1"> 1 hour </option>
         <option value="2"> 2 hours </option>
         <option value="3"> 3 hours </option>
         <option value="4"> 4 hours </option>
         <option value="5"> 5 hours </option>
         <option value="6"> 6 hours </option>
         <option value="7"> 7 hours </option>
         <option value="8"> 8 hours </option>

         </select>
     </div>
     </div>
     </div>
<hr>

     <div class="row">
     <div class="col-sm-4">
     <div class="form-group">
         <label for="studentlevel"> Level of student </label>
         <select name="studentlevel" id="studentlevel" class="form-control">
            <option value="prenursery"> Pre-Nursery </option>
            <option value="nursery"> Nursery </option>
            <option value="primary"> Primary </option>
            <option value="secondary"> Secondary </option>
            <option value="ssce"> SSCE</option>
            <option value="university"> University </option>
            <option value="advanced"> Advanced </option>
         </select>


     </div>
     </div>

     <div class="col-sm-4">
     <div class="form-group">
         <label for="budget">What's your monthly budget for this lesson</label>
         <input type="number" value="{{ old('budget') }}"  name="budget" id="budget" class="form-control">
             
     </div>
     </div>
     </div>

     <div class="col-sm-8">
     <div class="form-group">
         <label for="phone">  What's your goal for this lesson </label>
         <textarea  name="lessongoal" id="lessongoal" class="form-control">{{ old('lessongoal') }}</textarea>
     </div>
     </div>
     

     

  


</div>

 </div>
  <div class="panel-footer"> 
         <div class="form-group">
            <div class="row">
             <div class="col-sm-10"> </div>
             <div class="col-sm-2">
            <button type="submit" class="btn btn-block btn-success pull-right">  Proceed <i class="fa fa-arrow-right">  </i></button>
            </div>
            </div>
       </div>
     
       
   </div>
</div>
</form>
@else
{{ TTools::naError('Please choose a subject in step one')}}

@endif

  </div>
  </div>
  
</section>



@stop
