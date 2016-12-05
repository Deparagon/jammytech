@extends('adminlayout')

@section('pagetitle')
 List Posts | All Blog Posts
@endsection

@section('dashbreadcumb')
<div class="row"> 
  <div class="col-sm-12"> 
    <ol class="breadcrumb">
  <li><a href="">Home</a></li>
  <li><a href="#">Posts</a></li>
</ol>
   </div>
</div>

@stop

@section('innercontent')

<section class="list-course-categories">
<div class="panel panel-default">
<div class="panel-heading"> Posts <span class="pull-right"> <a href="{{ url('/admin/post/create') }}"> New Post</a> </span></div>
<div class="table-responsive">
<table class="table table-striped table-bordered">
<thead>
  <tr> <th> ID </th> <th>title</th> <th> Slug </th> <th> Category</th> <th> Edit </th> </tr>
</thead>

<tbody>
@if(count($allposts) > 0)
@foreach( $allposts as $post)
<tr> <td> {{ $post->id }} </td> <td> {{ $post->title }} </td> <td> {{ $post->slug }}</td> <td> {{ $post->blogcat->name }} </td>  <td>  <a href="{{ url('/admin/post/edit/'.$post->id) }}"><i class="fa fa-edit"> </i> </a> </td> </tr>

@endforeach
  
  @endif
</tbody>

</table>
</div>
<div class="panel-footer">
    {{ $allposts->links() }}
</div>
</div>
</section>

@stop

