@extends('adminlayout')

@section('pagetitle')
 Add Category | Admin Category Management
@endsection

@section('dashbreadcumb')
<div class="row"> 
  <div class="col-sm-12"> 
    <ol class="breadcrumb">
  <li><a href="">Home</a></li>
  <li><a href="#">Add Category</a></li>
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
                 <h4 class="panel-title"> Add Category </h4>
            </div>

            <div class="panel-body">
              <div class="form-group">
                <label for="name"> Category Name</label>
               <input type="text" name="name" id="name" class="form-control">
              </div>

        <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
                <label for="imageurl" class="btn btn-default btn-file"> Category Image
                     <input type="file" name="imageurl" id="imageurl" class="btn btn-success">
    </label>
      </div>
      </div>
      <div class="col-sm-6">


      </div>
      </div>

              <div class="form-group">
                <label for="name"> Category Description</label>
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

