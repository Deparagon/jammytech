@extends('userlayout')

@section('pagetitle')
  My Subjects | Tutorago
@endsection

@section('dashbreadcumb')
<ol class="breadcrumb">
  <li><a href="{{ url('/user/dashboard') }}">Home</a></li>
  <li class="active">Subjects/Courses I Can Teach</li>
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
<form id="" method="post" action="{{ url('user/icanteach') }}">

 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title"> I Can Teach </h4>
     </div>
     <div class="panel-body">

<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
  <tr>  <th> S/N</th> <th>Subject </th>  <th> Price (NGN)   </th> <th>Description</th> <th> Category</th> <th>Action</th></tr>
</thead>

<tbody>
@if(!empty($canteachs))
@foreach( $canteachs as $k => $canteach)
<tr> <td> {{ $k+1 }} </td> <td> {{ $canteach->coursename }} </td> <td> {{ $canteach->price }}  </td> <td> {{ $canteach->coursedescription}}</td> <td>  {{ $canteach->catname }}</td>  <td> <a  id="killthiscourseofdauser"  data-killcourseded="{{ $canteach->id }}" href="javascript:;"> <i class="fa fa-trash"> </i> </a></td></tr>

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
            <label for="orgainization">Select your Subject(s)</label>
            <select  name="course_id[]" id="course_id" multiple="" class="form-control">
            @if(!empty($courses))
            @foreach ($courses as $course)
            <option value="{{ $course->id }}"> {{ $course->name }} </option>
             @endforeach
             @endif
            </select>

       </div>
       </div>

       <div class="col-sm-6">
          <label for="price">State Your Hourly Price per Subject/Course (NGN)</label>
         <input type="number" pattern="[0-9]{1,9}" id="price" name="price" class="form-control">
       </div>

       </div>
        <p class="well"> <i class="fa fa-lightbulb-o fa-2x"> </i> You can add as many subject as you can, depending your knowledge of these subjects and readiness to teach. <br>
 You can add multiple subjects at a time (If all the subjects has same price per hour). Hold your control key on windows or command key on Mac to select multiple subjects.  If your subject is not listed above, Please  <a href=" {{ url('user/create-subjects') }}">create a new subject  </a> </p>
</form>

     </div>

     <div class="panel-footer">
         <div class="form-group">

                <div class="form-group">
            <div class="row">
             <div class="col-sm-10"> </div>
             <div class="col-sm-2">
            <button type="submit" class="btn btn-sm btn-default pull-right "> <i class="fa fa-save">  </i> <br> Save </button>
            </div>
            </div>
       </div>

         </div>
     </div>

 </div>

</div>

  </div>
</section>



@stop
