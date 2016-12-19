@extends('adminlayout')

@section('pagetitle')
 TutorShip | Admin Student Management
@endsection

@section('dashbreadcumb')
<div class="row"> 
  <div class="col-sm-12"> 
    <ol class="breadcrumb">
  <li><a href="">Home</a></li>
  <li><a href="#">Tutors Request</a></li>
</ol>
   </div>
</div>

@stop

@section('innercontent')
<h2 class="cent-h"> Tutors Wanabes </h2>

    @if (session()->has('deletedreq'))

    {{ TTools::naSuccess(session('deletedreq')) }}

@endif


<section class="list-course-categories">
{{ csrf_field() }}
<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
  <tr> <th> ID </th> <th>Name</th> <th> Email </th> <th> Status</th> <th>Process</th> <th>Trash</th></tr>
</thead>

<tbody>
@if(!empty($trequests))
@foreach( $trequests as $trequest)
<tr> <td> {{ $trequest->id }} </td> <td> {{ $trequest->user->firstname }} </td> <td> {{ $trequest->user->email }}</td> <td> {{ $trequest->status }} </td> <td>  <a href="{{ url('/admin/tutorship/'.$trequest->id) }}"><i class="fa fa-edit"> </i> </td> <td> <a  id="trashtutorshiprequest"  data-trashreqtutor="" href="{{ url('/admin/killtrequest/'.$trequest->id) }}"> <i class="fa fa-trash"> </i> </a></td></tr>

@endforeach
  
  @endif
</tbody>

</table>
</div>

</section>

@stop

