@extends('userlayout')

@section('pagetitle')
 @section('sectionheader')
<link href="/css/bootstrap-rating.css" rel="stylesheet">
 @endsection
  Lesson Complete | Tutorago
@endsection

@section('dashbreadcumb')
<ol class="breadcrumb">
  <li><a href="{{ url('/user/dashboard') }}">Home</a></li>
  <li class="active">Lesson Completed</li>
</ol>

@stop
 
@section('innercontent')

@if (count($errors))

@foreach($errors->all() as $error)
 {{ TTools::naError($error) }} 

@endforeach

@endif

@if (session()->has('markedgreend'))

   {{ TTools::naSuccess(session('markedgreend')) }} 

   @endif
@if (session()->has('markedreject'))

   {{ TTools::naSuccess(session('markedreject')) }} 

   @endif

@if (session()->has('ratingsuccess'))

   {{ TTools::naSuccess(session('ratingsuccess')) }} 

   @endif

<section>
@if (! session()->has('markedgreend'))
  <div class="row">
<div class="col-sm-12">
 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title"> Hi {{ Auth::user()->firstname }} </h4>
     </div>
     <div class="panel-body">

     <p class="well"> 
        This lesson started on {{ TTools::displayDate($lesson->start) }} and have been marked as complete by {{ $tutor->firstname }}. Your tutor ({{ $tutor->firstname }}) has requested that you accept that the lesson is complete. You reserve the right to accept or reject.</p>

        <h3> {{ $tutor->firstname }} said..</h3>
        <p class="well"> @if(isset($lessoncomment)) {{ $lessoncomment->comment }} @endif </p>

       <div class="table-responsive">
         <table class="table table-striped table-bordered">
         <thead> <th> </th> <th></th></thead>
         <tbody>
           <tr> <td> Course </td> <td> {{ $course->name }} </td></tr>
          <tr> <td> Goal </td> <td> {{ $lesson->lessongoal }} </td></tr>
          <tr> <td> Expected Completion date </td> <td> {{ $lesson->end }} </td></tr>
         </tbody>
          


         </table>

         </div>


 </div>
  <div class="panel-footer">       
   </div>
</div>

<div class="panel panel-dbluebar">
 <div class="panel-heading"> Accept / Reject</div>
 <div class="panel-body">
  <div class="row">
   <div class="col-sm-6" id="acceptthecompletb"> 
<button  @if($lesson->studentcomplete ==1) disabled @endif  class="btn btn-block btn-lg btn-success"> Accept  </button>
 </div>
 
   <div class="col-sm-6" id="rejectcompletionoftheclass">
<button @if($lesson->studentcomplete ==1) disabled @endif  class="btn btn-block btn-lg btn-danger pull-right">  Reject  </button>
    </div>
      </div>
<br>
<hr>
<div id="iherebayrejectthethecompletion"> 
     <form method="POST" action="">
    {{ csrf_field() }}
    <div class="form-group">
        <label>Lesson Completion message</label>
        <textarea class="form-control" name="studentmessage"></textarea>
    </div>
<div class="row">
 <div class="col-sm-6">
  <button type="submit" name="rejectcompletion" value="yes" class="btn btn-lg btn-danger"> I Reject  </button>
</div>
</div>
       </form>
 </div>

<div id="iherebayacceepthecompletion">
     <form method="POST" action="">
    {{ csrf_field() }}
    <div class="form-group">
        <label>Lesson Completion message</label>
        <textarea class="form-control" name="studentmessage"></textarea>
    </div>
<div class="row">
 <div class="col-sm-6">
  <button type="submit" name="acceptcomplete" value="yes" class="btn btn-lg btn-success"> I Accept  </button>
  </div>
   </div>
       </form>

    </div>


 </div>




  
 </div>



</div>



  </div>
 
  @endif

  @if (session()->has('markedgreend'))

     <div class="row">
      <div class="col-sm-12">
       <div class="panel panel-default">
       <div class="panel-heading">
       <h3> Hi {{ Auth::user()->firstname }}! We are Glad your lesson have ended successfully. </h3>
       </div>
       <div class="panel-body">
        <p class="well">
         Please rate your Tutor. 
        </p>
          <div class="rating-form">
           <form class="rating-f" method="POST" action="{{ url('/user/ratelesson/'.$lesson->id)}}">
           {{ csrf_field() }}

              <div class="rate-box">
             <input type="hidden"  value="0" name="darating" class="rating starfa" data-filled="fa fa-star fa-3x" data-empty="fa fa-star-o fa-3x" id="darating">
           </div>
             <div class="form-group">
               <label> Comment</label>
                 <textarea name="ratecomment" class="form-control"> </textarea>

             </div>

             <div class="form-group">
               <button class="btn btn-lg btn-success"  type="submit"> Rate </button>

             </div>

           </form>

          </div>

         </div>
         </div>
      </div>

     </div>

  @endif
</section>



@endsection

@section('sectionfooter')
<script src="/js/bootstrap-rating.min.js"></script>
<script src="/js/extrauser.js"></script>
@endsection