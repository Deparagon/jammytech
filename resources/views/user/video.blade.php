@extends('userlayout')

@section('pagetitle')
  My Video | Tutorago
@endsection

@section('dashbreadcumb')
<ol class="breadcrumb">
  <li><a href="{{ url('/user/dashboard') }}">Home</a></li>
  <li class="active">Dashboard</li>
</ol>

@stop

@section('innercontent')
@if (count($errors))

@foreach($errors->all() as $error)
{{ TTools::naError($error) }}  

@endforeach

@endif

    @if (session()->has('savedvideo'))

    {{ TTools::naSuccess(session('savedvideo')) }}
@endif
<section>
  <div class="row">
<div class="col-sm-12">
   <form class="" id="" method="POST" action="">

 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title"> Profile Video </h4>
     </div>
     <div class="panel-body">
         {{ csrf_field() }}

         <div class="row">
           <div class="col-sm-10 col-sm-offset-1">
            <div class="video-box">
<div class="embed-responsive embed-responsive-4by3">
  <iframe width="816" height="459" class="embed-responsive-item" src="{{ Auth::user()->video }}"></iframe>
</div>

            </div>
           </div>

         </div> <br>
        <div class="row">
        <div class="col-sm-8">
       <div class="form-group">
            <label for="video"> YouTube Video URL</label>
            <input type="url" value="{{ Auth::user()->video }}" placeholder="https://youtube.com/embed/ee0Dl0dFFPg" name="video" class="form-control" id="video">

       </div>
       <p>Adding a video of yourself presenting what you can offer a prospective student is guaranteed to convince them and this would definitely boost your sales</p>
       <p class="note"> How to get video url: </p>
       <p> Make a video and upload to You-tube;</p>
       <p> Copy your video URL e.g https://youtube.com/embed/ee0Dl0dFFPg  into the box above and click Save. That's all.</P>
       </div>
       </div>

       



 </div>
  <div class="panel-footer"> 
       <div class="form-group">
            <div class="row">
             <div class="col-sm-10"> </div>
             <div class="col-sm-2">
            <button type="submit" class="btn btn-sm btn-default pull-right "> <i class="fa fa-save">  </i> <br> Save</button>
            </div>
            </div>
       </div>
   </div>
</div>
</form>

  </div>
</section>



@stop
