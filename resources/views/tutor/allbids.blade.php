@extends('userlayout')

@section('pagetitle')
  Ongoing Bids | Tutorago
@endsection

@section('dashbreadcumb')
<ol class="breadcrumb">
  <li><a href="{{ url('/user/dashboard') }}">Home</a></li>
  <li class="active">Ongoing Lesson bids</li>
</ol>

@stop

@section('innercontent')

<section>
  <div class="row">
<div class="col-sm-12">

 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title">  </h4>
     </div>
     <div class="panel-body">

<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
  <tr>  <th> Date </th> <th> My Application</th> <th> Starts In </th> <th>Reply</th></tr>
</thead>

<tbody>
@if(count($bidders) > 0)
@foreach( $bidders as $bid)
<tr> <td> {{ TTools::showDate($bid->created_at) }} </td> <td><p class="well well-lg"> @foreach ($bid->bidcussion as $k => $bidcomment) @if( $k == count($bid->bidcussion) -1 ) {{ $bidcomment->comment}}  @endif @endforeach  </p></td> <td> {{ $bid->lesson->lessonstartin }}</td>  <td> <a class="btn btn-md btn-success"  href="{{ url('/user/mybids/'.$bid->id) }}"> <i class="fa fa-check-square-o"> </i> </a> </td> </tr>

@endforeach
  @else
  <tr> <td colspan="4"> No Application yet, Apply to a lesson </td></tr>
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