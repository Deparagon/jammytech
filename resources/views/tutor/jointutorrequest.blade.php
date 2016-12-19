@extends('userlayout')

@section('pagetitle')
  Join Tutors | Tutorago
@endsection

@section('dashbreadcumb')
<ol class="breadcrumb">
  <li><a href="{{ url('/user/dashboard') }}">Home</a></li>
  <li class="active">My Request to Join Tutorago Tutors</li>
</ol>

@stop

@section('innercontent')

<section>
  <div class="row">
<div class="col-sm-12">

 <div class="panel panel-bluebar">
     <div class="panel-heading">  
          <h4 class="panel-title"> My Request to Join Tutorago Tutors </h4>
     </div>
     <div class="panel-body">

<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
  <tr> <th> Request Date </th> <th>Status </th>  <th> Feedback   </th> </tr>
</thead>

<tbody>
@if(!empty($myjoinrequest))

<tr> <td> {{ $myjoinrequest->created_at }} </td> <td> {{ $myjoinrequest->status }} </td> <td> {{ $myjoinrequest->feedback }}  </td> </tr>

  @endif
</tbody>

</table>
</div>
<hr>


     </div>

     <div class="panel-footer">

     </div>

 </div>
</div>

  </div>
</section>



@stop
