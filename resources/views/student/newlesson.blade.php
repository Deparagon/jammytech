@extends('userlayout')

@section('pagetitle')
  New Lesson | Tutorago
@endsection

@section('dashbreadcumb')
<ol class="breadcrumb">
  <li><a href="{{ url('/user/dashboard') }}">Home</a></li>
  <li class="active">Start New Lesson</li>
</ol>

@stop

@section('innercontent')
@if (count($errors))

@foreach($errors->all() as $error)
 {{ TTools::naError($error) }} 

@endforeach

@endif



<section class="lesson-stat">
<h2 class="top-start"> Start New Lesson </h2>
<p> <em>We have all the lesson you need, search our lesson database, or select from the list below </em></p>
<form class="" id="searchcourbaycategorylist" method="post" action="">
  {{ csrf_field() }}
<div class="row">
<div class="col-sm-12"> 
<div class="row">
<div class="panel panel-dbluebar">
<div class="panel-body">
<div class="col-sm-4">

<select class="form-control" name="category" id="category">
<option value="All"> All Category </option>
@if ($categories)
@foreach ($categories as $category)
<option value="{{ $category->id }}"> {{ $category->name }} </option>
@endforeach
@endif
</select>
 </div>

 <div class="col-sm-6">
  <input type="search" placeholder="search text" class="form-control" name="searchlesson">
 </div>

 <div class="col-sm-2">
  <button type="submit" id="searchcourselinkbtn" name="searchnow" class="btn btn-md btn-purplebar"> <i class="fa fa-search"> </i> </button>
 </div>
</div>
</div>
</div>
</div>
</div>
</form>
</section>
<section>
  <div class="row">
<div class="col-sm-12">
   <form class="" id="" method="POST" action="">
  {{ csrf_field() }}
 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title"> Available Lessons </h4>
     </div>
     <div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
  <tr><th>Image</th> <th> Name </th> <th> Description </th> <th> Category</th> <th> Start</th> </tr>
</thead>

<tbody id="returnsearchresultdatahere">
@if(!empty($allcourses))
@foreach( $allcourses as $lesson)
<tr> <td> <img class="list-img" src="/uploads/{{ $lesson->imageurl }}"> </td> <td> {{ $lesson->name }}</td> <td> {{ $lesson->description }} </td> <td> {{ $lesson->category->name}}</td> <td> <input class="form-control" type="radio" name="lessontostart" value="{{ $lesson->id }}"></td> </tr>

@endforeach
  
  @endif
</tbody>

</table>
</div>
<hr>
<div class="box-ready-address">
     <div class="row">
     <div class="col-sm-6">
     <div class="form-group">
         <label for="addresssearcher"> Your home Address</label>
         <input type="text" id="autocomplete" onFocus="geolocate()" name="fulladdress" class="form-control">

     </div>
     </div>
      
      <div class="col-sm-6">
     <div class="form-group">
         <label for="street"> Street</label>
         <input type="text" id="route"  value="@if(isset($profiledata)) @if (!empty($profiledata->street)) {{ $profiledata->street }} @endif @endif" name="lessonstreet"  class="form-control">

     </div>
     </div>
     </div>
     <div class="row">
     <div class="col-sm-6">
     <div class="form-group">
         <label for="city"> City</label>
         <input type="text" value="@if(isset($profiledata)) @if (!empty($profiledata->city)) {{ $profiledata->city }} @endif @endif" name="lessoncity" id="locality" class="form-control">


     </div>
     </div>

     <div class="col-sm-6">
     <div class="form-group">
         <label for="state"> State</label>
         <input type="text" value="@if(isset($profiledata))@if (!empty($profiledata->state)) {{ $profiledata->state }} @endif @endif" name="lessonstate" id="administrative_area_level_1" class="form-control">
     </div>
     </div>
     </div>
<hr>

     <div class="row">
     <div class="col-sm-4">
     <div class="form-group">
         <label for="lessonstartin"> Lesson starts </label>
         <select name="lessonstartin" id="lessonstartin" class="form-control">
                <option value="Immediately"> Immediately </option>
                <option value="onweek"> In one Week </option>
                <option value="twoweeks"> In two weeks </option>
                <option value="onemonth"> In One Month </option>
         </select>


     </div>
     </div>

          <div class="col-sm-4">
     <div class="form-group">
         <label for="tutorgender"> Preferred Tutor's Gender </label>
         <select name="tutorgender" id="tutorgender" class="form-control">
                <option value="Male"> Male </option>
                <option value="Female"> Female </option>
                <option value="Any"> Any Gender  </option>
         </select>


     </div>
     </div>

     <div class="col-sm-4">
     <div class="form-group">
         <label for="lessonstudentcount"> Students</label>
         <Select name="lessonstudentcount" id="lessonstudentcount" class="form-control">
             <option value="1"> One </option>
             <option value="2"> Two </option>
             <option value="3"> Three </option>
             <option value="4"> Four </option>
             <option value="5"> Five </option>
         </Select>
     </div>
     </div>
     </div>
<hr>
     <div class="row">
     <div class="col-sm-4">
     <div class="form-group">
         <label for="lessonlocation"> Where should lessons hold </label>
         <select name="lessonlocation" id="lessonlocation" class="form-control">
            <option value="tutorsaddress"> Tutors Address</option>
            <option value="mylocation"> My Location </option>
         </select>


     </div>
     </div>

     <div class="col-sm-4">
     <div class="form-group">
         <label for="phone">  Mobile phone (e.g 08023998899)  </label>
         <input type="text"  value="@if(isset($profiledata)) @if (!empty($profiledata->phone)) {{ $profiledata->phone }} @endif @endif"  name="lessonphone" id="lessonphone" class="form-control">
             
     </div>
     </div>

     <div class="col-sm-4">
     <div class="form-group">
         <label for="lessonemail"> Most active email Address</label>
         <input type="email"  value="{{ Auth::user()->email }}" name="lessonemail" id="lessonemail" class="form-control">
             
         <span> 100% secure, We respect your privacy.</span>
     </div>
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

  </div>
  </div>
  
</section>



@stop