@extends('adminlayout')


@section('pagetitle')
 Edit Course | Admin Course Management
@endsection

@section('dashbreadcumb')
<div class="row"> 
  <div class="col-sm-12"> 
    <ol class="breadcrumb">
  <li><a href="">Home</a></li>
  <li><a href="#">Edit Course</a></li>
</ol>
   </div>
</div>

@stop

@section('innercontent')
<section class="edit-categories">
@if (count($errors))

@foreach($errors->all() as $error)
 <div class="alert alert-danger"> {{ $error }}  </div>

@endforeach

@endif

@if (session()->has('createdmsg'))

   <div class="alert alert-success"> {{ session('createdmsg') }} </div>

   @endif


		<form class="" id="" method="POST" action="" enctype="multipart/form-data">
		   {{ csrf_field() }}
		<div class="panel panel-default">
            <div class="panel-heading"> 
                 <h4 class="panel-title"> Edit Course </h4>
            </div>

            <div class="panel-body">

                  <div class="form-group">
                <label for="name"> Course Category</label>
               <select name="category_id" id="category_id" class="form-control">
                  @if (!empty($categories))
                 @foreach ($categories as $category)
                 <option value="{{ $category->id}}" @if ($category->id == $course->category_id) selected @endif >  {{ $category->name }} </option>
                 @endforeach
                 @endif


               </select>
              </div>     

               <!--  <div class="form-group">
                <label for="name"> Price</label>
               <input type="text" value="{{ $course->price }}" name="price" id="price" class="form-control">
              </div> -->

              <div class="form-group">
                <label for="name">  Name</label>
               <input type="text" value="{{ $course->name }}" name="name" id="name" class="form-control">
              </div>

              <div class="row">
              <div class="col-sm-6">  
               <div class="form-group">
                <label for="imageurl" class="btn btn-default btn-file"> Course Thumbnail
                     <input type="file" name="imageurl" id="imageurl" class="btn btn-success">
            </label>
            </div> </div>

            <div class="col-sm-6">  <img class="list-img-2" src="/uploads/{{ $course->imageurl }}"> </div>

              </div>

              <div class="form-group">
                <label for="name">  Description</label>
               <textarea class="form-control" cols="10" name="description" id="description"> {{ $course->description }} </textarea> 
              </div>


            </div>

             <div class="panel-footer">
                 <button type="submit" class="btn btn-default btn-md"> <i class="fa fa-save"> </i> <br/> Update </button>
             </div>

		</div>
		</form>

</section>



@stop

