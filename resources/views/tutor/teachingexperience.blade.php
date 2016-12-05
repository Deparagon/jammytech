@extends('userlayout')

@section('pagetitle')
  Teaching Experience | Tutorago
@endsection

@section('dashbreadcumb')
<ol class="breadcrumb">
  <li><a href="{{ url('/user/dashboard') }}">Home</a></li>
  <li class="active">Tutor Teaching Experience</li>
</ol>

@stop

@section('innercontent')
<section>
  <div class="row">
<div class="col-sm-12">
   <form class="" id="" method="POST" action="{{ url('/user/teaching') }}">

 <div class="panel panel-default">
     <div class="panel-heading">  
          <h4 class="panel-title"> Teaching Experience  </h4>
     </div>
     <div class="panel-body">
<hr>
@if (count($errors))

@foreach($errors->all() as $error)
 <div class="alert alert-danger"> {{ $error }}  </div>

@endforeach

@endif

@if (session()->has('createdmsg'))

   <div class="alert alert-success"> {{ session('createdmsg') }} </div>

   @endif


         {{ csrf_field() }}
        <div class="row">
      <div class="col-sm-12">
       <div class="form-group">
            <label for="institution">Teaching Level</label>
<select class="form-control" name="teachinglevel" id="teachinglevel">

               <option value="Kindergarten" @if (isset($teaching)) @if ($teaching->teachinglevel !='') @if ($teaching->teachinglevel =='Kindergarten') selected @endif @endif @endif> Kindergarten  </option>
               <option value="Primary"  @if (isset($teaching)) @if ($teaching->teachinglevel !='') @if ($teaching->teachinglevel =='Primary') selected @endif @endif @endif>Primary </option>
               <option value="commonEntrance"  @if (isset($teaching)) @if ($teaching->teachinglevel !='') @if ($teaching->teachinglevel =='commonEntrance') selected @endif @endif @endif> Common Entrance </option>
               <option value="JuniorSSCE"  @if (isset($teaching)) @if ($teaching->teachinglevel !='') @if ($teaching->teachinglevel =='JuniorSSCE') selected @endif @endif @endif> Junior SSCE </option>
               <option value="Secondary"  @if (isset($teaching)) @if ($teaching->teachinglevel !='') @if ($teaching->teachinglevel =='Secondary') selected @endif @endif @endif> Secondary </option>
               <option value="SSCE"  @if (isset($teaching)) @if ($teaching->teachinglevel !='') @if ($teaching->teachinglevel =='SSCE') selected @endif @endif @endif> SSCE </option>
               <option value="Tertiary"  @if (isset($teaching)) @if ($teaching->teachinglevel !='') @if ($teaching->teachinglevel =='Tertiary') selected @endif @endif @endif> Tertiary </option>
               <option value="PostTertiary" @if (isset($teaching)) @if ($teaching->teachinglevel !='') @if ($teaching->teachinglevel =='PostTertiary') selected @endif @endif @endif> Post Tertiary  </option>
               <option value="Profesional"  @if (isset($teaching)) @if ($teaching->teachinglevel !='') @if ($teaching->teachinglevel =='Profesional') selected @endif @endif @endif> Professional Course </option>

            </select>
       </div>
       </div>
       </div>

      <div class="row">
      <div class="col-sm-12">
       <div class="form-group">
            <label for="levelexplanation">Describe your Teaching Level / Experience</label>
            <textarea rows="10" class="form-control" name="levelexplanation" id="levelexplanation"> @if (isset($teaching)) @if ($teaching->teachinglevel !='') {{ $teaching->levelexplanation }} @endif @endif</textarea>

       </div>
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
  </div>
  
</section>


@stop