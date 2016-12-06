@extends('adminlayout')

@section('pagetitle')
Dashboard | Tutorago Admin
@endsection
@section('dashbreadcumb')
<div class="row"> 
  <div class="col-sm-12"> 
    <ol class="breadcrumb">
  <li><a href="{{url('/admin/dashboard') }}">Home</a></li>
  <li><a href="#">Dashboard</a></li>q
</ol>
   </div>
</div>

@stop

@section('innercontent')
<section class="statisticsbars">
   <div class="row">
        <!-- subjects -->
      <div class="col-sm-4 top-stat">
          <div class="panel panel-dbluebar">
              <div class="panel-heading">
                 <h4 class="panel-title"> Course Request: Awaiting Approval</h4>
              </div>
              <div class="panel-body">

               <p class="top-stat-p"><a href="{{ url('/admin/courserequest') }}">{{ TTools::showNumber($courserequestcount) }} </a> </p>
              </div>
          
          </div>
       
       </div>  <!--/subjects -->
       
       
             <div class="col-sm-4 top-stat">
          <div class="panel panel-dbluebar">
              <div class="panel-heading">
                 <h4 class="panel-title"> Tutor Requests</h4>
              </div>
              <div class="panel-body">
               <p class="top-stat-p"> <a href="{{ url('/admin/tutorship') }}"> {{ TTools::showNumber($tutorshiprequest) }} </a> </p>
              </div>
          
          </div>
       
       </div>

       <div class="col-sm-4 top-stat">
          <div class="panel panel-dbluebar">
              <div class="panel-heading">
                 <h4 class="panel-title"> Pending Course(s)</h4>
              </div>
              <div class="panel-body">
             <p class="top-stat-p"><a href="{{ url('/admin/icanteachrequest') }}"> {{ TTools::showNumber( $pendingcourses ) }} </a></p>
              </div>
          
          </div>
       
       </div>
       

           
    </div>

</section>


<section class="show-side-list">
    <div class="row">
    <div class="col-sm-9"> 
     <div class="middle-big-list">
     <div class="panel panel-default">
       <div class="panel-heading"> 
          <h4 class="panel-title"> New Students</h4>
       </div>
        <div class="panel-body">
        <div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
  <tr> <th> ID </th>  <th> Firstname </th> <th>Lastname </th> <th> Email </th> <th> Date Joined</th>  <th>View</th></tr>
</thead>

<tbody> 
@if (isset($students))
@if(!empty($students))
@foreach( $students as $student)
<tr> <td> {{ $student->id }} </td><td> {{ $student->firstname }}</td>   <td> {{ $student->lastname }}</td> <td> {{ $student->email }} </td> <td> {{ $student->created_at }}</td> <td>  <a href="{{ url('/admin/student/'.$student->id) }}"><i class="fa fa-edit"> </i> </td> </tr>

@endforeach

@else

<tr> <td colspan="6"> No Student found</td></tr>

  
  @endif
  @else
  <tr> <td colspan="6"> No Student found</td></tr>

  @endif
</tbody>

</table>
</div>


        </div>

     </div> <!-- // students --> 

     <div class="panel panel-default">
       <div class="panel-heading"> 
          <h4 class="panel-title"> New Tutors </h4>
       </div>
        <div class="panel-body">

        <div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
  <tr> <th> ID </th>  <th> Firstname </th> <th>Lastname </th> <th> Email </th> <th> Date Joined</th>  <th>Action</th></tr>
</thead>

<tbody> 
@if(!empty($tutors))
@foreach( $tutors as $tutor)
<tr> <td> {{ $tutor->id }} </td><td> {{ $tutor->firstname }}</td>   <td> {{ $tutor->lastname }}</td> <td> {{ $tutor->email }} </td> <td> {{ $tutor->created_at }}</td> <td>  <a href="{{ url('/admin/tutor/'.$tutor->id) }}"><i class="fa fa-edit"> </i> </td></tr>

@endforeach

@else

<tr> <td colspan="6"> No tutor found</td></tr>
  
  @endif
</tbody>

</table>
</div>


        </div>

     </div>

     </div>





    </div>
    <div class="col-sm-3">
     <div class="all-left-stats">

          <div class="panel panel-dbluebar">
              <div class="panel-heading">
                 <h4 class="panel-title"> Admin Commission</h4>
              </div>
              <div class="panel-body">
             <p class="top-stat-p"> {{ TTools::showPrice( $admincommission ) }}</p>
              </div>
          
          </div>
       
      

     <div class="panel panel-redbar">
            <!--  -->
              <div class="panel-body">
               <p class="side-right-stat">{{ TTools::showNumber($countusers) }} Users</p>
              </div>
          
          </div>
           <!-- // users -->

                     <div class="panel panel-dbluebar">
       <!--  -->
              <div class="panel-body">
              <p class="side-right-stat">{{ TTools::showNumber($tutorcount) }} Tutors</p>
              </div>
          
          </div>
             <!-- // tutor -->

            <div class="panel panel-bluebar">
      
              <div class="panel-body">
             <p class="side-right-stat">{{ TTools::showNumber($coursecount) }} Courses</p>
              </div>
          
          </div>
           <!-- // course -->

           <div class="panel panel-orangebar">
              <div class="panel-body">
             <p class="side-right-stat"> {{ TTools::showNumber($categorycount) }} Categories</p>
              </div>
          
          </div> <!-- // category -->


             <div class="panel panel-dbluebar">
              <div class="panel-heading">
                 <h4 class="panel-title"> Completed Lesson</h4>
              </div>
              <div class="panel-body">
             <p class="top-stat-p"> {{ TTools::showNumber( $completedlesson ) }}</p>
              </div>
          
          </div>

             <div class="panel panel-dbluebar">
              <div class="panel-heading">
                 <h4 class="panel-title"> Ongoing Lessons</h4>
              </div>
              <div class="panel-body">
             <p class="top-stat-p"> {{ TTools::showNumber( $ongoinglesson ) }}</p>
              </div>
          
          </div>


             <div class="panel panel-dbluebar">
              <div class="panel-heading">
                 <h4 class="panel-title"> Biddable Lessons </h4>
              </div>
              <div class="panel-body">
             <p class="top-stat-p"> {{ TTools::showNumber( $biddablelesson ) }}</p>
              </div>
          
          </div>







      </div>
    </div>
  </div>
</section>


<hr>

<section class="dash-activities">

</section>
@stop

