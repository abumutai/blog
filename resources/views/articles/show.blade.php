@extends('admin.main')
@section('title')
    Articles
@endsection
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                <h1 class="page-title ">{{$article->title}}</h1>
            </div>
            <div class="col-lg-6 col-sm-8 col-md-8 col-xs-12">
                <a href="{{route('articles.edit',$article->id)}}"  class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><span class="text-white"><i class="fa fa-pencil"></i> Edit</a></span>
                <ol class="breadcrumb">
                </ol>
            </div>
        </div>
        <div class="row">            
                <div class="col-md-12 white-box" >
                    <div class="single-post-big">
                        <div class="big-image">
                            <img src="/article_images/{{$article->photo}}" height="400px"  width="400px" alt="">
                        </div>
                        <div class="big-text">
                            <h4><a href="#">Category: {{$article->category}}</a></h4>
                            <p>{!!$article->content!!}</p>
                            <h4><span class="date">Posted on: {{$article->created_at}}</span>
                            </h4>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
       <footer class="footer text-center"> 2020 &copy; Flash News </footer>
</div>
@endsection

