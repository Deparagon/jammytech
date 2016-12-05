@extends('adminlayout')

@section('pagetitle')
 Create Post  | Blog Post Tutorago 
@endsection

@section('dashbreadcumb')
<div class="row"> 
  <div class="col-sm-12"> 
    <ol class="breadcrumb">
  <li><a href="">Home</a></li>
  <li><a href="#">Add New Blog </a></li>
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

@if (session()->has('createdpost'))

   <div class="alert alert-success"> {{ session('createdpost') }} </div>

   @endif
<section class="add-post">
    <form class="" id="" method="POST" action="" enctype="multipart/form-data">
       {{ csrf_field() }}
    <div class="panel panel-default">
            <div class="panel-heading"> 
                 <h4 class="panel-title"> Create New Blog Post  <span class="pull-right"> <a href="{{ url('/admin/posts') }}"> View Posts</a> </span></h4>
            </div>

            <div class="panel-body">
              <div class="form-group">
                <label for="title"> Title  </label>
               <input type="text" name="title" id="title" class="form-control">
              </div>
             
             <div class="row">
             <div class="col-sm-6">
              <div class="form-group">
                <label for="slug"> Slug </label>
               <input type="text" readonly class="form-control" name="slug" id="slug">  
              </div>
              </div>
              <div class="col-sm-6">
              <div class="form-group">
                <label for="author"> Author Name </label>
               <input type="text" class="form-control" name="author" id="author">  
              </div>
              </div>
              </div>
        <div class="form-group">
                <label for="content"> Post Content </label>
               <textarea class="form-control" rows="12" name="content" id="content">   </textarea>
              </div>

              <div class="form-group">
            <label for="featuredimg"> Featured Image</label>
            <input type="file" name="featuredimg" class="btn btn-success btn-md" id="featuredimg">

       </div>
               
               <div class="row">
               <div class="col-sm-6">
                <div class="form-group">
                <label for="status"> Status </label>
               <select name="status" class="form-control" id="status">
                      <option value="1"> Published</option>
                      <option value="0"> Draft</option>
                </select>
              </div>
              </div>
              <div class="col-sm-6"> 
              <div class="form-group">
                <label for="status"> Category </label>
               <select name="blogcat_id" class="form-control" id="blogcat_id">
                      @foreach( $cats as $cat)
                      <option value="{{ $cat->id }}"> {{ $cat->name }}</option>
                    @endforeach
                </select>
              </div>

              </div>

            </div>

             <div class="panel-footer">
                 <button type="submit" class="btn btn-default btn-md"> <i class="fa fa-save">  </i> <br> Add </button>
             </div>

    </div>
    </form>

</section>

@endsection

@section('sectionfooter')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript" src="/js/tiny.js"></script>
@endsection