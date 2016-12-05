@extends('adminlayout')

@section('dashbreadcumb')
<div class="row"> 
  <div class="col-sm-12"> 
    <ol class="breadcrumb">
  <li><a href="">Home</a></li>
  <li><a href="#">Tutor Request Awaiting Approval</a></li>
</ol>
   </div>
</div>

@stop

@section('innercontent')
<section>
	<div class="row">
	        <h1> {{ $userdata->firstname }} Wants to Join Tutorago Tutors </h1>
       </div>
</section>
<hr>
<section class="profile-bar"> 
   <div class="row">
      <div class="col-sm-8"> 
         <div class="table-responsive">
          <table class="table table-bordered table-stripped">
             <tr> <td><strong> Email</strong> </td> <td>{{ $userdata->email }} </td></tr>
             <tr> <td><strong> Phone</strong> </td> <td> @if(isset($userdata->phone)) {{ $userdata->phone }} @endif </td></tr>
             <tr> <td><strong> Street</strong> </td> <td> @if(isset($userdata->street)) {{ $userdata->street }} @endif </td></tr>
             <tr> <td><strong> City</strong> </td> <td> @if(isset($userdata->city)){{ $userdata->city }} @endif </td></tr>
             <tr> <td><strong> State </strong></td> <td>@if(isset($userdata->state)) {{ $userdata->state }} @endif</td></tr>
            </table>
         </div>
       </div>
      <div class="col-sm-4"> 
          <div class="profile-image-1">
              @if (isset($userdata))
              @if (!empty($userdata->photo))
              <img class="img-full-b" src="/uploads/{{ $userdata->photo}}">
                @else
                <img src="/uploads/manpix.png">
              @endif
            
               @else
              <img src="/uploads/manpix.png">
              @endif
          </div>

      </div>

   </div>



 </section>
 <hr>
<section class="list-workingexp">
 <div class="row">
   <div class="col-sm-12">
       <div class="panel panel-dbluebar">
       <div class="panel-heading"> Working Experiences </div>
            <div class="panel-body">
            <div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
  <tr> <th> ID </th> <th> Organization </th> <th> Position</th> <th> Roles</th> <th> In Progress</th></tr>
</thead>

<tbody>
@if(!empty($workexperiences))
@foreach( $workexperiences as $workexperience)
<tr> <td> {{ $workexperience->id }} </td> <td> {{ $workexperience->organization }}</td> <td> {{ $workexperience->position }} </td> <td> {{ $workexperience->roles}}</td> <td> @if ($workexperience->ongoing ==1) Yes @endif </td> </tr>

@endforeach
  
  @endif
</tbody>

</table>
</div>


            </div>

       </div>

   </div>
 </div>

</section>

<section class="educations-list">
<div class="row">
<div class="col-sm-12">
<div class="panel panel-default">
<div class="panel-heading"> Educational Qualifications </div>

<div class="panel-body">

<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
  <tr> <th> ID </th> <th> Name of Institution </th> <th> Course of Study</th> <th> Degree</th> </tr>
</thead>

<tbody>
@if(!empty($educations))
@foreach( $educations as $education)
<tr> <td> {{ $education->id }} </td> <td> {{ $education->institution }}</td> <td> {{ $education->course }} </td> <td> {{ $education->degree }}</td>  </tr>

@endforeach
  
  @endif
</tbody>

</table>
</div>


</div>

</div>
</div>
</div>
</section>

<section>
  <div class="row">
<div class="col-sm-12">

 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title"> Guarantors </h4>
     </div>
     <div class="panel-body">

<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
  <tr>  <th> Name </th> <th> Email</th> <th> Phone</th> <th> Years Know</th> <th>Place of Work</th> </tr>
</thead>

<tbody>
@if(!empty($gurantors))
@foreach( $gurantors as $guarantor)
<tr> <td> {{ $guarantor->lastname }}, {{ $guarantor->firstname }} </td> <td> {{ $guarantor->email }}</td> <td> {{ $guarantor->phone }} </td> <td> {{ $guarantor->yearsknown}}</td> <td>  {{ $guarantor->placeofwork }} </td>  </tr>

@endforeach
  
  @endif
</tbody>

</table>
</div>

 </div>

</div>


  </div>
  </div>
  
</section>

<section class="teachingexperience"> 
		<div class="row">
		  <div class="col-sm-12">
		   <div class="panel panel-dbluebar">
		    <div class="panel-heading"> Teaching experience  </div>
		    <div class="panel-body">
		        <h3> @if ( isset($teachingexps)) {{ $teachingexps->teachinglevel }} @endif</h3>
		        <p class="well">  
                 @if ( isset($teachingexps))  {{ $teachingexps->levelexplanation }} @endif

		        </p>

            </div>
            </div>
		  </div>

		</div>

</section>


<section class="profile-video">
   <div class="row">
      <div class="col-sm-12">
           <div class="panel panel-greenbar">
               <div class="panel-heading">
                           Video
                </div>

                <div class="panel-body">
                    <div class="max-video-h">
                    <div class="embed-responsive embed-responsive-16by9">
					  <iframe class="embed-responsive-item" src="@if(isset($userdata->video)){{ $userdata->video }} @endif "></iframe>
					</div> 
					</div> 


                </div>


            </div>

        </div>
    </div>

</section>

<hr>
<section>
	<div class="row">
	    <div class="col-sm-12">
	    <div id="showmereportdataapp"> </div>
	     <form class="" method="POST" action="">
	        <div class="panel panel-bluebar">
	        <div class="panel-heading"> Decide if {{ $userdata->firstname }} should join Tutorago tutors </div>
	        
	         <div class="panel-body">
	           {{ csrf_field() }}
	         <input type="hidden" id="dareqid" value="{{ $tutorreq->id }}">
	          <div class="form-group">
	            <textarea class="form-control" id="feedback" rows="10" name="feedback"> {{ $tutorreq->feedback }}</textarea>

	          </div>
	          </div>
	           <div class="panel-footer">
                    <div class="row">
                     <div class="col-sm-4">
                     <div class="form-group">  
                    <button id="justcommentonreqtutor" class="btn btn-block btn-warning" type="button"> Just Comment </button>
                 </div>

                     </div>
                     <div class="col-sm-4"> </div>
                 <div class="col-sm-4"> 
                 <div class="form-group">  
                    <button id="approveatutorsjoinreq" @if ($tutorreq->status =='Approved') 'disabled'  @endif class="btn btn-block btn-success" type="button"> Approve </button>
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

