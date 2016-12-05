@extends('userlayout')

@section('pagetitle')
  My Credentials | Tutorago
@endsection

@section('dashbreadcumb')
<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
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
   <form class="" id="" method="POST" action="{{ url('/user/education') }}">

 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title"> Education Qualifications </h4>
     </div>
     <div class="panel-body">

<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
  <tr> <th> Name of Institution </th> <th> Course of Study</th> <th> Degree</th> <th>Action</th></tr>
</thead>

<tbody>
@if(!empty($educations))
@foreach( $educations as $education)
<tr> <td> {{ $education->institution }}</td> <td> {{ $education->course }} </td> <td> {{ $education->degree }}</td>  <td> <a  id="deleteeducationnewone"  data-edutionadb="{{ $education->id }}" href="javascript:;"> <i class="fa fa-trash"> </i> </a> </td> </tr>

@endforeach
  
  @endif
</tbody>

</table>
</div>
<hr>



         {{ csrf_field() }}
        <div class="row">
      <div class="col-sm-12">
       <div class="form-group">
            <label for="institution">Institution</label>
            <input type="text" class="form-control" name="institution" id="institution">

       </div>
       </div>
       </div>

      <div class="row">
      <div class="col-sm-6">
       <div class="form-group">
            <label for="course">Course of Study</label>
            <input type="text"  class="form-control" name="course" id="course">

       </div>
       </div>

     <div class="col-sm-6">
       <div class="form-group">
            <label for="degree">Degree</label>
            <select class="form-control" name="degree" id="gender">
               <option value="Bsc"> Bsc  </option>
               <option value="HND"> HND  </option>
               <option value="OND"> OND  </option>
               <option value="College of Education"> College of Education  </option>
               <option value="Diploma"> Diploma  </option>
               <option value="MSc"> MSc  </option>
               <option value="MBA"> MBA  </option>
               <option value="PHD"> PHD  </option>
               <option value="Others"> Others  </option>
            </select>
       </div>
       </div>
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
  </div>
  
</section>

<section>
  <div class="row">
<div class="col-sm-12">
<form id="" method="post" action="{{ url('user/workexperience') }}">

 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title"> Work Experience </h4>
     </div>
     <div class="panel-body">

<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
  <tr> <th> Organization </th> <th> Position</th> <th> Roles</th> <th> In Progress</th> <th>Action</th></tr>
</thead>

<tbody>
@if(!empty($workexperiences))
@foreach( $workexperiences as $workexperience)
<tr> <td> {{ $workexperience->organization }}</td> <td> {{ $workexperience->position }} </td> <td> {{ $workexperience->roles}}</td> <td> @if ($workexperience->ongoing ==1) Yes @endif </td> <td> <a  id="kireadygoworkexperiencnow"  data-killworkexperienc="{{ $workexperience->id }}" href="javascript:;"> <i class="fa fa-trash"> </i> </a></td></tr>

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
            <label for="organization">Organization</label>
            <input type="text" name="organization" class="form-control" id="organization">

       </div>
       </div>
       <div class="col-sm-6">
<div class="form-group">
            <label for="position">Position</label>
            <input type="text" name="position"  class="form-control" id="position">

       </div>
       </div>
       </div>

      <div class="row">
      <div class="col-sm-6">
              <div class="form-group">
            <label for="roles">Roles</label>
            <textarea class="form-control" name="roles" id="roles">   </textarea>
          
       </div>
       </div>

     <div class="col-sm-6">
            
            <div class="checkbox">
  <label>
    <input type="checkbox" name="ongoing" id="ongoing" value="1" checked>
    Currently working here
  </label>
</div>


       </div>
       </div>






     </div>

     <div class="panel-footer">
         <div class="form-group">

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

 </div>
</form>
</div>

  </div>
</section>

@stop