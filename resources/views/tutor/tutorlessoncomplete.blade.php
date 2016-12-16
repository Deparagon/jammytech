@extends('userlayout')

@section('pagetitle')
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


<section>
  <div class="row">
<div class="col-sm-12">
 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title"> Hi {{ Auth::user()->firstname }} </h4>
     </div>
     <div class="panel-body">

     <p class="well"> 
        This lesson started on {{ TTools::displayDate($lesson->start) }}, you can mark as complete. We will wait for your student to accept, once your student accepts. We will contact you. 
      </p>

       <div class="table-responsive">
         <table class="table table-striped table-bordered">
         <thead> <th> </th> <th></th></thead>
         <tbody>
           <tr> <td> Course </td> <td> {{ $course->name }} </td></tr>
          <tr> <td> Goal </td> <td> {{ $lesson->lessongoal }} </td></tr>
          <tr> <td> Expected Completion Date </td> <td> {{ $lesson->end }} </td></tr>
         </tbody>
          


         </table>

          <ul class="comments-inner">
           @if(isset($lessoncomments))
           @if(count($lessoncomments) >0)
            <li class="base-list"> Comments </li>
            @foreach ($lessoncomments as $comment)
            <li> @if(Auth::user()->id == $comment->tutor_id) <span class="me-comment"> Me  </span> @else<span class="student-comment"> Student  </span>  @endif {{ $comment->comment }} </li>

            @endforeach
            @endif
            @endif

            
          </ul>

         </div>


 </div>
  <div class="panel-footer">       
   </div>
</div>

<div class="panel panel-dbluebar">
 <div class="panel-heading"> Mark as Complete </div>
 <div class="panel-body">
    <form method="POST" action="">
    {{ csrf_field() }}
    <div class="form-group">
        <label>Lesson Completion Message</label>
        <textarea class="form-control" name="tutormessage"></textarea>
    </div>

       <button type="submit" class="btn btn-lg btn-success"> I hereby mark this lesson as Complete  </button>

       </form>
  
 </div>



</div>



  </div>
  </div>
  
</section>



@stop
