@extends('adminlayout')


@section('pagetitle')
 Add Course | Admin Course Management
@endsection

@section('dashbreadcumb')
<div class="row"> 
  <div class="col-sm-12"> 
    <ol class="breadcrumb">
  <li><a href="{{ '/admin/dashboard' }}">Home</a></li>
  <li><a href="#">Add Course</a></li>
</ol>
   </div>
</div>

@stop

@section('innercontent')
<section class="add-categories">
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
                 <h4 class="panel-title"> Add Course / Subject </h4>
            </div>

            <div class="panel-body">
     
              <div class="form-group">
                <label for="category_id"> Category Name</label>
               <select  name="category_id" id="category_id" class="form-control">
                 <option value=""> Select </option>
                 @if (!empty($categories))
                 @foreach ($categories as $category)
                 <option value="{{ $category->id}}">  {{ $category->name }} </option>
                 @endforeach
                 @endif

               </select>
              </div>

        <div class="form-group">
                <label for="name"> Course /Subject Title</label>
               <input type="text" name="name" id="name" class="form-control">
              </div>
                <!-- <div class="form-group">
                <label for="name"> Price</label>
               <input type="text" name="price" id="price" class="form-control">
              </div> -->

      
               <div class="form-group">
                <label for="imageurl" class="btn btn-default btn-file"> Course Thumbnail
                     <input type="file" name="imageurl" id="imageurl" class="btn btn-success">
            </label>
            </div>
              <div class="form-group">
                <label for="name"> Course Description</label>
               <textarea class="form-control" cols="10" name="description" id="description"> </textarea> 
              </div>


            </div>

             <div class="panel-footer">
                 <button type="submit" class="btn btn-default btn-md"> <i class="fa fa-save">  </i> <br> Add </button>
             </div>

		</div>
		</form>

</section>

@stop

