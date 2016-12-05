@extends('userlayout')

@section('pagetitle')
  Photo | Tutorago
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

    @if (session()->has('savedphoto'))

    {{ TTools::naSuccess(session('savedphoto')) }}

@endif
<section>
  <div class="row">
<div class="col-sm-12">

   <form class="" id="" method="POST" action="" enctype="multipart/form-data">

 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title"> Profile Photo </h4>
     </div>
     <div class="panel-body">
         {{ csrf_field() }}

         <div class="row">
           <div class="col-sm-4 pull-right">
            <div class="photo-box">
           

        @if ($profiledata->photo != '') 
        <img class="img-responsive" src="/uploads/{{ Auth::user()->photo }}">
          @endif
    
           
            </div>
           </div>

         </div>
       <div class="form-group">
            <label for="photo"> Upload Photo</label>
            <input type="file" name="profileimage" class="btn btn-success btn-md" id="photo">

       </div>

       



 </div>
  <div class="panel-footer"> 
       <div class="form-group">
            <div class="row">
             <div class="col-sm-10"> </div>
             <div class="col-sm-2">
            <button type="submit" class="btn btn-sm btn-default pull-right "> <i class="fa fa-save">  </i> <br> Upload</button>
            </div>
            </div>
       </div>
   </div>
</div>
</form>

  </div>
</section>



@stop