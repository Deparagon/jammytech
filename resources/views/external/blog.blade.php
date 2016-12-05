@extends('externallayout')

@section('metadescription')
 <meta name="description" content="blog">
@endsection

@section('pagetitle')
 Blog | Tutorago.com
@endsection


@section('externalcontent')

<section class="top-blog">
	<div class="topbanner"></div>
</section>

<section class="">
 <div class="row faq-line-bar">
   <div class="col-sm-4 col-sm-offset-4">
           <h2 class="">Blog & News </h2>

    </div>

 </div>
    <div class="container marketing">
      <!-- START THE FEATURETTES -->
      @if (isset($posts))

      @if(count ($posts) > 0)
      @foreach($posts as $post)

      <article class="blog-post-each">
        <div class="row">
        <div class="col-sm-4">
            <div class="post-image">
               <img class="front-blog-featured-img" src="{{ url('/uploads/'.$post->featuredimg) }}">
            </div>
        </div>
        <div class="col-sm-8">
        <div class="post-content">
        <h3 class="article-title"> <a href="{{ url('/blog/'.$post->slug.'.html') }}"> {{$post->title}} </a></h3>
      <p> <i class="fa fa-user"></i> <span> {{ $post->author }} </span>   <span class=""> <i class="fa fa-clock-o"></i> {{ TTools::displayDate($post->created_at) }} </span> </p>
           <p class="lead">
                  {!! substr($post->content,  0, 160) !!}... <a href="{{ url('/blog/'.$post->slug.'.html') }}">read more</a>

           </p>
        </div>
        </div>
        </div>
      </article>

     
@endforeach
@endif
@endif
    


      </div>
<hr>


</section>

@endsection