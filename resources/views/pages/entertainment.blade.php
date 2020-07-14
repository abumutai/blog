@extends('pages.main')
@section('title')
    Lifestyle News
@endsection
@section('content')
<section class="blog-post-area">
    <div class="container">
        <div class="row">
            <div class="blog-post-area-style">
                <div style="text-align:center;">
                    <h1>Entertainment News</h1>
                </div>
                @foreach ($articles as $article)
                <a href="{{route('view',$article->id)}}">
                    <div class="col-md-4">
                        <div class="single-post">
                            <img src="/article_images/{{$article->photo}}" height="300px" alt="">
                            <h3><a href="{{route('view',$article->id)}}">{!!Str::limit($article->title,25)!!}</a></h3>
                            <h4><span>Posted By: <span class="author-name">{{$article->user->name}}</span></span>
                            </h4>
                            <p>{!!Str::limit($article->content,100)!!}</p>
                            <h4><span>{{$article->created_at->diffForHumans()}}</span></h4>
                        </div>
                    </div>
                </a>
                    @endforeach
                   
            </div>
        </div>
    </div>
@endsection
