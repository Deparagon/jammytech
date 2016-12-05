@extends('adminlayout')

@section('pagetitle')
 Edit Post | Admin Blog Category 
@endsection

@section('dashbreadcumb')
<div class="row"> 
  <div class="col-sm-12"> 
    <ol class="breadcrumb">
  <li><a href="">Home</a></li>
  <li><a href="#">Edit Blog Category</a></li>
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
    <form class="" id="" method="POST" action="">
       {{ csrf_field() }}
    <div class="panel panel-default">
            <div class="panel-heading"> 
                 <h4 class="panel-title"> Update Blog Post </h4>
            </div>

            <div class="panel-body">
              <div class="form-group">
                <label for="title"> Title  </label>
               <input type="text" value="{{ $post->title }}" name="title" id="title" class="form-control">
              </div>
             
             <div class="row">
             <div class="col-sm-6">
              <div class="form-group">
                <label for="slug"> Slug </label>
               <input type="text" value="{{ $post->slug }}" class="form-control" name="slug" id="slug">  
              </div>
              </div>
              <div class="col-sm-6">
              <div class="form-group">
                <label for="author"> Author Name </label>
               <input type="text" value="{{ $post->author }}" class="form-control" name="author" id="author">  
              </div>
              </div>
              </div>
        <div class="form-group">
                <label for="content"> Post Content </label>
               <textarea class="form-control" rows="12" name="content" id="content">{{ $post->content }}</textarea>
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

                      <option value="1" @if ($post->status ==1) selected @endif> Published</option>
                      <option value="0"  @if ($post->status ==0) selected @endif> Draft</option>
                </select>
              </div>
              </div>
              <div class="col-sm-6"> 
              <div class="form-group">
                <label for="status"> Category </label>
               <select name="blogcat_id" class="form-control" id="blogcat_id">
                      @foreach( $cats as $cat)
                      <option value="{{ $cat->id }}"  @if ($post->blogcat_id ==$cat->id) selected @endif> {{ $cat->name }}</option>
                    @endforeach
                </select>
              </div>

              </div>

            </div>

             <div class="panel-footer">
                 <button type="submit" class="btn btn-default btn-md"> <i class="fa fa-save">  </i> <br> Update </button>
             </div>

    </div>
    </form>

</section>

@endsection

@section('sectionfooter')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript" src="/js/tiny.js"></script>
@endsection