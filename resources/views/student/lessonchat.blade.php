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
 {{ TTools::naError($error) }} 

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
<h4 class="lessongbu"> Budget </h4>
<p class="well"> {{TTools::displayPrice($lesson->budget)}} </p>
</div>
<div class="col-sm-6">
<h4 class="lessongbu"> Latest Tutor's Price </h4>
<p class="well"> @if(isset($latestreply)) {{TTools::displayPrice($latestreply->price)}} @else No price Yet @endif </p>
</div>
</div>
 <h3 class="dis-chats"> Conversation </h3>
@if (isset($bidchats))

@if (count($bidchats) > 0) 
   @foreach ($bidchats as $bidchat )

     <div class="row">
      <div class="col-sm-7">
    @if ( $bidchat->student_id == Auth::user()->id )

      <div class="row"> <div class="col-sm-2"> ME </div> <div class="col-sm-10"> <div class="blue-well example-twitter"> {{ $bidchat->comment }}  </div> </div> </div>

      @else
        <div class="row"> <div class="col-sm-2"> TUTOR  </div> <div class="col-sm-10"><div class="black-well"> <p class="well wellbox"> {{ $bidchat->comment }} </p> </div> </div> </div>
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
            <label for="price"> Suggest Price </label>
            <input type="number" value="@if (isset($latestreply)) @if($latestreply->price !=0) {{ $latestreply->price }} @endif @endif" name="price" class="form-control">
           </div>
           <div class="col-sm-2 col-sm-offset-4">
            <button class="btn btn-block btn-success" type="submit"> Send </button>
           </div>
         </div>


      </div>

   </div>
   </form>

    

 </div>

</div>

  </div>
  </div>
  
  <div class="accept-box">
             <h3 class="pay-acc"> Accept the Tutor Price and Proceeds to Payment</h3>
              <div class="row"> 
               <div class="col-sm-4"> </div>
<div class="col-sm-4">
  <form method="POST" action="{{ url('/user/payoptions')}}">
      {{ csrf_field() }}
  <input type="hidden"  name="lesson" value="{{ $lesson->id }}">
<button type="submit" @if (isset($latestreply)) @if ($latestreply->price ==0) disabled @endif @endif  class="btn btn-danger btn-lg btn-block" id="" type="submit"> Proceed </button>
</form>
 </div>
<div class="col-sm-2 pull pull-right"> <h4> @if(isset($latestreply)) {{TTools::displayPrice($latestreply->price)}} @else No price Yet @endif </h4></div>
               </div>

  </div>
  <br> <br>
</section>
@endsection