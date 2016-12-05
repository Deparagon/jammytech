@extends('userlayout')

@section('pagetitle')
   Bid Chat | Tutorago
@endsection

@section('dashbreadcumb')
<ol class="breadcrumb">
  <li><a href="{{ url('/user/dashboard') }}">Home</a></li>
  <li class="active">Ongoing Bid Chats</li>
</ol>

@stop

@section('innercontent')

@if (count($errors))

@foreach($errors->all() as $error)
 {{ Tools::naError($error) }} 

@endforeach

@endif

    @if (session()->has('goodchat'))

    {{ TTools::naSuccess(session('goodchat')) }}

@endif
    @if (session()->has('badchat'))

    {{ TTools::naError(session('badchat')) }} 

@endif
<section>
  <div class="row">
<div class="col-sm-12">

 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title">  {{ $course->name }} </h4>
     </div>
     <div class="panel-body">
       <h4 class="lesson-title"> Lesson Goal </h4>
        <p class="well"> {{ $lesson->lessongoal }} </p>
<hr>
<div class="row">
<div class="col-sm-6">
<h4 class="lessongbu"> Student Initial Budget </h4>
<p class="well"> {{ TTools::displayPrice($lesson->budget)}} </p>
</div>

<div class="col-sm-6">
<h4 class="lessongbu"> My Price Suggestion </h4>
<p class="well"> @if (isset($mylatestedreply)) {{TTools::displayPrice($mylatestedreply->price)}} @else  No Suggestion Yet @endif </p>
</div>
</div>

 <h3 class="dis-chats"> Conversation </h3>


@if (isset($bidchats))

@if (count($bidchats) > 0) 
   @foreach ($bidchats as $bidchat )
     <div class="row">
      <div class="col-sm-7">
    @if ( $bidchat->tutor_id == Auth::user()->id )

      <div class="row"> <div class="col-sm-2"> ME </div> <div class="col-sm-10"> <div class="blue-well example-twitter"> {{ $bidchat->comment }}  </div> </div> </div>

      @else
        <div class="row"> <div class="col-sm-2"> STUDENT  </div> <div class="col-sm-10"><div class="black-well"> <p class="well wellbox"> {{ $bidchat->comment }} </p> </div> </div> </div>
      @endif
      </div>
      <div class="col-sm-2 pull-right">
          <div class="price-bag"> {{ TTools::displayPrice($bidchat->price) }}   </div>
      </div>
      </div>
   @endforeach
@endif

@endif

   <form method="POST" action="">
   <div class="panel panel-default">
     <div class="panel-heading"> Reply  </div>
      <div class="panel-body">
          {{ csrf_field() }}
        <div class="form-group">
         <label for="comment"> Say Something </label>
          <textarea class="form-control" rows="5" name="comment"></textarea>
        </div>
            <div class="row"> 
           <div class="col-sm-6"> 
            <label for="price"> Suggest New Price? </label>
            <input type="number" value="@if (isset($mylatestedreply)) @if($mylatestedreply->price !=0) {{ $mylatestedreply->price }} @endif @endif" name="price" class="form-control">
           </div>
           <div class="col-sm-2 col-sm-offset-4">
            <button class="btn btn-block btn-success" type="submit"> <i class="fa fa-send"> </i>  Send </button>
           </div>
         </div>


      </div>

   </div>
   </form>

    

 </div>

</div>

  </div>
  </div>
  
</section>



@stop