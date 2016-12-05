@extends('adminlayout')

@section('pagetitle')
 Blog Category | Admin Blog Category 
@endsection

@section('dashbreadcumb')
<div class="row"> 
  <div class="col-sm-12"> 
    <ol class="breadcrumb">
  <li><a href="">Home</a></li>
  <li><a href="#">Add Blog Category</a></li>
</ol>
   </div>
</div>

@endsection

@section('innercontent')
@if (count($errors))

@foreach($errors->all() as $error)
 <div class="alert alert-danger"> {{ $error }}  </div>

@endforeach

@endif

@if (session()->has('savedgood'))

   <div class="alert alert-success"> {{ session('savedgood') }} </div>

   @endif

<section class="list-course-categories">
{{ csrf_field() }}
<div class="panel panel-default">
<div class="panel-heading"> Blog Categories </div>
<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
  <tr> <th> ID </th> <th>Name</th> <th> Slug </th>  <th>Edit</th> </tr>
</thead>

<tbody>
@if(count($blogcats) > 0)
@foreach( $blogcats as $cat)
<tr> <td> {{ $cat->id }} </td> <td> {{ $cat->name }}</td> <td> {{ $cat->slug }} </td> <td>  <a href="{{ url('/admin/blogcat/edit/'.$cat->id) }}"><i class="fa fa-edit"> </i> </a> </td> </tr>

@endforeach
  @else

  <tr> <td colspan="4"> No blog category found! </td></tr>
  @endif
</tbody>

</table>
</div>
</div>
</section>

<section class="add-categories">
		<form class="" id="" method="POST" action="">
		   {{ csrf_field() }}
		<div class="panel panel-default">
            <div class="panel-heading"> 
                 <h4 class="panel-title"> @if (isset($dacat)) Update {{ $dacat->name }} @else Add Blog Category @endif </h4>
            </div>

            <div class="panel-body">
              <div class="form-group">
                <label for="name"> Category (e.g Maths Tutorial ) </label>
               <input type="text" value="@if (isset($dacat)){{ $dacat->name }} @endif" name="name" id="name" class="form-control">
              </div>

              <div class="form-group">
                <label for="slug"> Slug (e.g maths_tutorial)</label>
               <input type="text" value="@if (isset($dacat)){{ $dacat->slug }} @endif" class="form-control" name="slug" id="slug"> 
              </div>


            </div>

             <div class="panel-footer">
                 <button type="submit" class="btn btn-default btn-md"> <i class="fa fa-save">  </i> <br> @if (isset($dacat)) Update @else Add @endif  </button>
             </div>

		</div>
		</form>

</section>

@endsection

