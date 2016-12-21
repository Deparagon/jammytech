@extends('adminlayout')

@section('pagetitle')
 I Can Teach | Admin I Can Teach Management
@endsection

@section('dashbreadcumb')
<div class="row"> 
  <div class="col-sm-12"> 
    <ol class="breadcrumb">
  <li><a href="">Home</a></li>
  <li><a href="#">These Tutors Can teach  </a></li>
</ol>
   </div>
</div>

@stop

@section('innercontent')
<h2 class="cent-h"> ({{ TTools::showNumber($countpending) }}) I Can Teach Request</h2>

<section class="list-course-categories">
   <div id="proceseachrequestedcourd"></div>
<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
  <tr> <th> Tutor </th> <th>Course</th> <th> Description </th>  <th> Approve</th><th>Trash</th></tr>
</thead>

<tbody>
@if(count($pendings) > 0)
@foreach( $pendings as $pending)
<form id="approveordisapprovemen" method="POST" action="">
  {{ csrf_field() }}
<tr> <td> {{ $pending->user->lastname }} {{ $pending->user->firstname }} ( @if($pending->user->tutor ==1) <span class="greenbar"> Approved Tutor </span> @else Unapproved Tutor @endif )</td> <td> {{ $pending->course->name }} </td> <td> {{ $pending->course->description }}</td> <td> <button id="approvethipendreqicanteach" data-icanteachidapp="{{ $pending->id }}" class="btn btn-xs btn-success" type="button"><i class="fa fa-check"> </i> </button></td>  <td> <a  id="trashicanteachrequestn"  data-tracouricanq="{{ $pending->id }}" href="javascript:;"> <i class="fa fa-trash"> </i> </a> </td></tr>
</form>
@endforeach
 @else
 <tr> <td colspan="5"> No "I can teach" request at the moment </td></tr> 
  @endif
</tbody>

</table>
</div>

</section>

@stop

