@extends('pages.main')
@section('title')

   Flash News
@endsection
@section('content')
        <section class="bg-text-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bg-text">
                            <h3>Flash News Blog</h3>
                            <p> Flash News is a Kenyan digital news and entertainment site which informs you of what is happening in and out of Kenya in politics, sports, social buzz, lifestyle, entertainment and many more. Stay tuned to be enlightened and enriched with information and knowledge. </p>
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