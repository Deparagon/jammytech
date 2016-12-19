@extends('userlayout')

@section('pagetitle')
 Tutors Bids on my Lesson | Tutorago
@endsection

@section('dashbreadcumb')
<ol class="breadcrumb">
  <li><a href="{{ url('/user/dashboard') }}">Home</a></li>
  <li class="active">Tutors Bids</li>
</ol>

@stop

@section('innercontent')

<section>
  <div class="row">
<div class="col-sm-12">

 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title"> Tutors Bids on my Lessons </h4>
     </div>
     <div class="panel-body">

<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
  <tr>  <th> Date </th> <th> Course/Subject</th> <th> Description </th> <th> Bidder </th> <th> Reply</th> </tr>
</thead>

<tbody>
@if(count($bidsonmylesson) >0)
@foreach( $bidsonmylesson as $bid)
<tr> <td> {{ TTools::showDate($bid->created_at) }} </td> <td> {{ $bid->name }} </td> <td> {{ $bid->description }}</td>  <td> <a href="{{ url('/user/tutor/'.$bid->tutor) }}"> {{ $bid->lastname }} {{ $bid->firstname}} </a> </td> <td> <a class="btn btn-md btn-success"  href="{{ url('/user/lessonchat/'.$bid->bidder) }}"> <i class="fa fa-check-square-o"> </i> </a> </td> </tr>

@endforeach
  @else 
  <tr> <td colspan="5"> No bids yet! Wait a little while </td></tr>
  @endif
</tbody>

</table>
</div>
<hr>



        

 </div>

</div>

  </div>
  </div>
  
</section>



@stop