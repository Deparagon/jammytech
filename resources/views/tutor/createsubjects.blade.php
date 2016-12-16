@extends('userlayout')

@section('pagetitle')
  Create Subjects | Tutorago
@endsection

@section('dashbreadcumb')
<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
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
<form id="" method="post" action="{{ url('user/courserequest') }}">

 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title"> Request For New Course/Subject </h4>
     </div>
     <div class="panel-body">

<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
  <tr> <th> ID </th> <th> Course /Subject</th>  <th> Description  </th> <th>Status</th> <th colspan="2">Action</th></tr>
</thead>

<tbody>
@if(!empty($courserequests))
@foreach( $courserequests as $courserequest)
<tr> <td> {{ $courserequest->id }} </td> <td> {{$courserequest->course }} </td> <td> {{ $courserequest->description }}  </td> <td> {{ $courserequest->status }} </td> <td> <a  id="dacourserequestedprkillid"  data-killcourserequestedpre="{{ $courserequest->id }}" href="javascript:;"> <i class="fa fa-trash"> </i> </a></td></tr>

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
            <label for="course">Course/Subject</label>
            <input type="text" name="course" id="course"  class="form-control">
       </div>
       <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" name="description" id="description"  class="form-control"> </textarea>
       </div>

       </div>

      <div class="col-sm-6">
               <h4 class="base-hr"> <span> The subjects i can teach are not listed </span> </h4>
               <p class="well"><i class="fa fa-lightbulb-o fa-2x"> </i>  You can create as many course requests as you can, Tutorago administrator will evaluate and approve within 24hrs. </p>
       </div>

       </div>
     </div>

     <div class="panel-footer">
         <div class="form-group">

                <div class="form-group">
            <div class="row">
             <div class="col-sm-10"> </div>
             <div class="col-sm-2">
            <button type="submit" class="btn btn-sm btn-default pull-right "> <i class="fa fa-save">  </i> <br> Send</button>
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
