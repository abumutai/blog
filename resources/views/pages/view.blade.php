@extends('pages.main')
@section('title')

    Ke-News
@endsection
@section('content')
        <section class="bg-text-area">
            <div class="container">
                <div class="row">            
                    <div class="col-md-9 panel">
                    <div class="single-post-big">
                        <br>
                        <h1>{{$article->title}}</h1>
                        <br>
                        <h5> <b>Posted on:  </b><span class="date">{{$article->created_at."  "   }}</span><span class="author"><b>By: </b>  <span class="author-name">{{$article->user->name}}</span></span></h5>
                        <div class="big-image">
                            <img src="/article_images/{{$article->photo}}" width="830px" height="500px" alt="">
                        </div>
                        <br>
                        <div class="big-text">
                        {!!$article->content!!}
                        </div>
                    </div>                        
                    </div>
                    <div class="col-md-3 m-5" style="margin-top:100px;padding-left:50px;">
                        <div class="blog-post-area-style single-post">
                            <h3>Related Posts</h3>
                            <div class="row">
                                <div class="col-12">
                                   @foreach ($related as $relate)
                                       <div>
                                           <img src="/article_images/{{$relate->photo}}" width="150px" height="100px" alt="">
                                       </div>
                                       <div>
                                           <h4>{{$relate->title}}</h4>
                                       </div>
                                   @endforeach
                                </div>
                            </div>
                        </div>
                        
                    </div>
             
                </div>
            </div>
        </section>
        <section class="blog-post-area">
            <div class="container">
                <div class="row">
                    <div class="blog-post-area-style">
                        <div style="text-align:center;">
                            <h1>Latest News</h1>
                        </div>
                        @foreach ($articles as $article)
                        <a href="{{route('view',$article->id)}}">
                            <div class="col-md-4">
                                <div class="single-post">
                                    <img src="/article_images/{{$article->photo}}" height="300px" alt="">
                                    <h3>{{Str::limit($article->title,20)}}</h3>
                                    <h4><span>Posted By: <span class="author-name">{{$article->user->name}}</span></span>
                                    </h4>
                                    <p >{!!Str::limit($article->content,100)!!}</p>
                                    <h4><span>{{$article->created_at->diffForHumans()}}</span></h4>
                                </div>
                            </div>
                        </a>
                            
                        @endforeach
                    </div>
                </div>
            </div>
@endsection