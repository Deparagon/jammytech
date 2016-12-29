<section class="states-and-location-tutors">
   <div class="container">

<div class="row">

<div class="col-sm-6">
 <h2> Tutors By Location </h2>
</div>

<div class="col-sm-6">
 <h2> Tutors By Subject </h2>
</div>
</div>

<div class="row">
<div class="col-sm-6">
<div class="row">
<div class="col-sm-4">
<ul class="listbar-state">
@if(isset($states))
 @foreach ($states as $k => $state)
  <li> <a href="{{ url('/tutors/'.strtolower($state).'-tutors') }}"> {{ $state }} Tutors </a> </li>
   @if ($k == 11 || $k == 23)
   </ul> </div>
   <div class="col-sm-4">
   <ul class="listbar-state">
   @endif

@endforeach
@endif
</ul>
</div>

 </div>
 </div>
<div class="col-sm-6"> 

<div class="row">
<div class="col-sm-4">
<ul class="listbar-state">
@if(isset($subjects))
 @foreach ($subjects as $k => $subject)
 <?php $name = str_replace(' ', '-', $subject->name); ?>
  <li> <a href="{{ url('/subjects/'.strtolower($name).'-tutors') }}"> {{ $subject->name }} Tutors </a> </li>
   @if ($k == 6 || $k == 13)
   </ul> </div>
   <div class="col-sm-4">
   <ul class="listbar-state">
   @endif

   <?php if($k > 21){
      break;
   } ?>

@endforeach
@endif
</ul>
</div>

 </div>


</div>
</div>
</div>
</section>