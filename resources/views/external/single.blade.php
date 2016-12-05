@extends('externallayout')

@section('metadescription')
 <meta name="description" content="{{ $singlepost->title }}">
@endsection
@section('pagetitle')
 {{ $singlepost->title}} | Tutorago.com
@endsection


@section('externalcontent')

<section style="background:url({{ url('/uploads/'.$singlepost->featuredimg) }});background-repeat: no-repeat; background-size: cover;">
  <div class="topbanner"></div>
</section>

<section class="">
 <div class="row faq-line-bar">
   <div class="col-sm-4 col-sm-offset-4">
           <h2 class=""> {{ $singlepost->title }} </h2>

    </div>

 </div>
    <div class="container marketing">
     <div class="row">
     <div class="col-sm-12">
      <article class="full-article">
             <p class="article-meta pull-right"> <i class="fa fa-user"></i> <span> {{ $singlepost->author }} </span>   <span class=""> <i class="fa fa-clock-o"></i> {{ TTools::displayDate($singlepost->created_at) }} </span> </p>
           <p class="lead">
                  {!! $singlepost->content !!}

           </p>
        
      </article>
          @if (session()->has('successcomment'))

    {{ TTools::naSuccess(session('successcomment')) }}

@endif
      <hr>
          <h2 class="comments-head"> Thoughts on {{ $singlepost->title }} </h2>
      <hr>
      <div class="commentlist">
       @if (isset($comments))
       @if (count($comments) > 0)
       @foreach($comments as $comment)

        <div class="each-commentbox">
          <div class="row">
          <div class="col-sm-3">
                <p> {{ $comment->author }}</p>
          </div>
           <div class="col-sm-8">
            <p class="well"> {{ $comment->comment}} </p>

           </div>

          </div>

        </div>
        @endforeach
        @endif
        @endif


      </div>

       <div class="comment"> 
        <form class="" method="POST" action="">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="author">  Full name </label>
            <input type="text" name="author" class="form-control">
        </div>
        <div class="form-group">
          <label> Comment</label>
          <textarea name="comment" class="form-control" rows="8"> </textarea>
         </div>

         <div class="form-group">
            <button class="btn btn-success btn-lg" type="submit"> Comment </button>
         </div>
      
       </form>

     </div>

     </div>



      </div>
      </div>
<hr>


</section>

@endsection