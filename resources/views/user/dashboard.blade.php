@extends('userlayout')


@section('pagetitle')
  Dashboard | Tutorago
@endsection

@section('dashbreadcumb')
<ol class="breadcrumb">
  <li><a href="{{ url('/user/dashboard') }}">Home</a></li>
  <li class="active">Dashboard</li>
</ol>

@endsection



@section('innercontent')
     <section class="statisticsbars">
   <div class="row">
        <!-- subjects -->
      <div class="col-sm-3">
<div class="box-show show-1">
<h4>Lessons </h4>
              <p> {{ TTools::displayNumber($countlesson) }} </p>

</div>
       
       </div>  <!--/subjects -->
       
       
             <div class="col-sm-3">
             <div class="box-show show-1">
               <h4>Profile Status </h4>
              <p> @if (isset($profiledata))

                  @if ($profiledata->city !='' && $profiledata->phone != '' && $profiledata->bio !='')
                     Complete
                  @else
                  <a href="{{url('/user/profile') }}">Incomplete </a>
                  @endif


                  @else
                   <a href="{{url('/user/profile') }}">Incomplete </a>
                  @endif
               </p>

</div>

       
       </div>
       
       
             <div class="col-sm-3">
                <div class="box-show show-1">
              <h4> Joined </h4>
              <p> {{ TTools::displayDate($datejoin) }} </p>

</div>
       
       </div>
       
        <div class="col-sm-3">
          <div class="box-show show-1">
           <h4>Balance </h4>
              <p> {{ TTools::displayPrice( $mybalance )}} </p>

       </div>
       
       </div>
       
       
       
    </div>

</section>

@if (session()->has('sociallinkage'))
       {{ TTools::naSuccess(session('sociallinkage')) }}
   @endif


<section>
  <div class="row">
<div class="col-sm-12">
 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title"> TODO </h4>
     </div>
     <div class="panel-body">
        <div class="row">
         <div class="col-sm-6">
        @if(isset($lessonnotes))
        @if (count($lessonnotes) >0)
         <ul class="list-group">
        @foreach ($lessonnotes as $note)
          <li class="list-group-item"> <i class="fa fa-fighter-jet"> </i> <a href="{{ url('/user/acceptcomplete/'.$note->lessonid) }}"> {{ $note->firstname }} {{ $note->lastname }} has marked {{ $note->coursename }} lesson as complete </a></li>

          @endforeach
          </ul>
          <p class="well"> Click on the lesson to accept or reject  </p>
          @endif
          @endif
         
          </div>
          <div class="col-sm-6">
                  @if(isset($lessonattentions))
        @if (count($lessonattentions) >0)
         <ul class="list-group">
        @foreach ($lessonattentions as $note)
          <li class="list-group-item"> @if ($note->photo !='') <img  class="tiny-img" src="/uploads/{{ $note->photo }}"> @else <i class="fa fa-fighter-jet"> </i> @endif  <a href="{{ url('/user/lessoncomplete/'.$note->lessonid) }}"> {{ $note->firstname }} {{ $note->lastname }} said {{ $note->coursename }}  lesson is not yet complete. Please complete the lesson and proceed to mark as complete </a></li>

          @endforeach
          </ul>
    
          @endif
          @endif


           </div>
        </div>     

 <hr>
 <br>


       <div class="row">
         <div class="col-sm-6">
        @if(isset($myunratedlessons))
        @if (count($myunratedlessons) >0)
         <ul class="list-group">
        @foreach ($myunratedlessons as $note)
          <li class="list-group-item"> @if ($note->photo !='') <img class="tiny-img" src="/uploads/{{ $note->photo }}"> @else <i class="fa fa-fighter-jet"> </i> @endif <a href="{{ url('/user/ratelesson/'.$note->lessonid) }}"> {{ Auth::user()->firstname }} Please Rate {{ $note->coursename }} lesson you just completed with  {{ $note->firstname }} {{ $note->lastname }}  </a></li>

          @endforeach
          </ul>
          <p class="well"> Click on the link and tell us about your experience  </p>
          @endif
          @endif
         
          </div>
          <div class="col-sm-6">
                  @if(isset($myunratedclasses))
        @if (count($myunratedclasses) >0)
         <ul class="list-group">
        @foreach ($myunratedclasses as $note)
          <li class="list-group-item"> @if ($note->photo !='') <img  class="tiny-img"  src="/uploads/{{ $note->photo }}"> @else <i class="fa fa-fighter-jet"> </i> @endif  <a href="{{ url('/user/ratecompletedlesson/'.$note->lessonid) }}"> Please rate  {{ $note->coursename }} class you completed with {{ $note->firstname }} {{ $note->lastname }}     </a></li>

          @endforeach
          </ul>
    
          @endif
          @endif


           </div>
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
          <h4 class="panel-title"> Account Activities </h4>
     </div>
     <div class="panel-body">
       <div class="table-responsive">
        <table class="table table-stripped table-bordered">
          <thead> <th> Activity </th> <th> IP</th> <th>Date</th> </thead>
            <tbody>
            @if (isset($activities))
            @if (!empty($activities))
            @foreach ($activities as $activity)
              <tr> 
                 <td> {{$activity->event }} </td> <td>{{$activity->ip }} </td>  <td> {{ TTools::displayDate($activity->created_at) }} </td>
              </tr>
              @endforeach
              @endif
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
          <h4 class="panel-title"> Profile Strength </h4>
     </div>
     <div class="panel-body">
          <p> @if (isset($profiledata))

                  @if ($profiledata->city !='' && $profiledata->phone != '' && $profiledata->bio !='')
                     Your profile is complete, Always ensure that your profile is up to date.

                     @if ($profiledata->video =='' || $profiledata->photo == '')
                     <a href="{{url('/user/photo') }}">Add a photo </a>  and  <a href ="{{url('/user/video') }}">video </a>
                     @endif

                  @else
                  <a href="{{url('/user/profile') }}">Your profile is incomplete, Ensure that you update your profile. Add a photo  and video </a>
                  @endif


                  @else
                   <a href="{{url('/user/profile') }}">Incomplete </a>
                  @endif
               </p>


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
          <h4 class="panel-title"> Social Verification </h4>
     </div>
     <div class="panel-body">
              
              <div class="row">

                 <div class="col-sm-4">
                      <div class="img-facebookbox">
                        <a href="{{ url('/facebookredirect') }}"> <i class="fa fa-3x fa-facebook"></i> Verify Facebook Account </a>
                         <br>
                        <span class="verify-span"> @if(isset($facebook->status)) Verified  @else Unverified @endif </span>
                       </div>
                 </div>
                 <div class="col-sm-4">
                      <div class="img-googleplus">
                           <a href="{{ url('/googleredirect') }}"> <i class="fa fa-3x fa-google"></i> Verify Google Account </a>
                           <br>
                           
                      <span class="verify-span"> @if(isset($gplus->status)) Verified  @else Unverified @endif </span>
                      </div>
         
                 </div>
                 <div class="col-sm-4">
                     <div class="img-twitterbox">
                        <a href="{{ url('/twitterredirect') }}"> <i class="fa fa-3x fa-twitter"></i> Verify Twitter Account </a>
                          <br>
                         <span class="verify-span"> @if(isset($twitter->status)) Verified  @else Unverified @endif </span>
                      </div>

                 </div>

              </div>


     </div>

 </div>

</div>

  </div>
</section>

@endsection