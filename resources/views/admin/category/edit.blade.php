@extends('adminlayout')


@section('pagetitle')
 Edit Category | Admin Category Management
@endsection

@section('dashbreadcumb')
<div class="row"> 
  <div class="col-sm-12"> 
    <ol class="breadcrumb">
  <li><a href="">Home</a></li>
  <li><a href="#">Edit Category</a></li>
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
                 <h4 class="panel-title"> Edit Category </h4>
            </div>

            <div class="panel-body">
              <div class="form-group">
                <label for="name"> Category Name</label>
               <input type="text" value="{{ $category->name }}" name="name" id="name" class="form-control">
              </div>
               
               <div class="row">
               <div class="col-sm-6">
               <div class="form-group">
                <label for="imageurl" class="btn btn-default btn-file"> Category Image
                     <input type="file" class="btn btn-success" name="imageurl" id="imageurl" >
      </label>
      </div>
      </div>
      <div class="col-sm-6">
         <img class="list-img-2" src="/uploads/{{ $category->imageurl }}">
      </div>
      </div>

              <div class="form-group">
                <label for="name"> Category Description</label>
               <textarea class="form-control" cols="10" name="description" id="description"> {{ $category->description }} </textarea> 
              </div>


            </div>

             <div class="panel-footer">
                 <button type="submit" class="btn btn-default btn-md"> Update </button>
             </div>

		</div>
		</form>

</section>

<section class="category-courses">
 
 <div class="row"> 
 <div class="col-sm-12">
       <div class="table-responsive">
           <table class="table table-striped table-bordered">
               <thead> <th> ID</th> <th> Name </th>  <th> Description </th> <th> Action</th></thead>
                  
               <tbody>
                 @if (!empty($courses))

                 @foreach ($courses as $course)

                 <tr> <td> {{ $course->id }} </td>  <td> {{ $course->name }} </td>  <td> {{ $course->description }}</td> <td> <i class="fa fa-trash">  </i> </td></tr>
                 @endforeach
                 @else

                 <tr> <td colspan="4"> This category has not course yet! </td></tr>

                 @endif
               </tbody>
           </table>

       </div>

 </div>

 </div>

</section>

@stop

