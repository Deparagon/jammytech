@extends('adminlayout')

@section('dashbreadcumb')
<div class="row"> 
  <div class="col-sm-12"> 
    <ol class="breadcrumb">
  <li><a href="">Home</a></li>
  <li><a href="#">Courses requested by Tutors </a></li>
</ol>
   </div>
</div>

@stop

@section('innercontent')
<h2 class="cent-h"> {{ TTools::showNumber($countedreq) }} Courses Requested by Tutors </h2>

    @if (session()->has('rdeleted'))

    {{ TTools::naSuccess(session('rdeleted')) }}

@endif


<section class="list-course-categories">
   <div id="proceseachrequestedcourd"></div>
<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
  <tr> <th> Tutor </th> <th>Course</th> <th> Description </th> <th> Status</th> <th>Category</th>  <th> Approve</th><th>Trash</th></tr>
</thead>

<tbody>
@if(count($crequests) >0)
@foreach( $crequests as $crequest)
<form id="approveordisapprovemen" method="POST" action="">
  {{ csrf_field() }}
<input type="hidden" name="idrequest" value="{{ $crequest->id }}">
<tr> <td> {{ $crequest->user->lastname }} {{ $crequest->user->firstname }} </td> <td> {{ $crequest->course }} </td> <td> {{ $crequest->description }}</td> <td> {{ $crequest->status }} </td> <td> 
<select class="form-control" name="category">
 @if (!empty($categories))
 @foreach ($categories as $category)
 <option value="{{ $category->id }}"> {{ $category->name }} </option> 
  @endforeach
    @endif
</select>
  </td> <td> <button class="btn btn-xs btn-success" type="submit"><i class="fa fa-check"> </i> </button></td>  <td> <a  id="traxrequestnow"  data-tracoursereq="{{ $crequest->id }}" href="{{ url('/admin/coursereqkill/'.$crequest->id) }}"> <i class="fa fa-trash"> </i> </a> </td></tr>
</form>
@endforeach
  
  @else
  <tr> <td colspan="7"> No course request at the moment </td></tr>
  @endif
</tbody>

</table>
</div>

</section>

@stop

