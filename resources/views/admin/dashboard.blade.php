@extends('admin.main')
@section('title')
    Dashboard
@endsection
@section('content')
<!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="{{route('articles.create')}}"  class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus"></i> New Article</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Visit</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success">659</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Page Views</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple">869</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Articles Written</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash3"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info">{{$articles->count()}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @if (session('success'))
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        </div>
                    </div>
                </div>    
                @endif
                <div class="row">
                    <!-- .col -->
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box" >
                            <h3 class="box-title">New Notifications</h3>
                            <div class="comment-center p-t-10">
                                @if (auth()->user()->unReadNotifications->count()>0)
                                @foreach (auth()->user()->unReadNotifications as $notification)
                                    
                                <div class="comment-body" style="background-color: rgb(229, 243, 247)">
                                    <div class="user-img"> <i class="fa fa-bell img-circle"></i>
                                    </div>
                                    <div class="mail-contnet">
                                        <h5>{{$notification->data['title']}}</h5><span class="time">{{$notification->created_at}}</span>
                                        <br/><span class="mail-desc">{{$notification->data['info']}} </span> <a href="" class="btn btn btn-rounded btn-success btn-outline m-r-5"><i class="fa fa-pencil m-r-5"></i>Mark Read</a><a href="javacript:void(0)" class="btn-rounded btn btn-danger btn-outline"><i class="fa fa-trash m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                            
                                @endforeach
                                @else
                                <div class="alert alert-info">
                                    You have no new notifications
                                </div>
                                @endif
                               
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Recent Articles</h3>
                            @if ($articles->count()>0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>No of Views</th>
                                            <th>Date Published</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                        @foreach ($articles as $article)
                                        <tr>
                                        <td>{{$article->id}}</td>
                                        <td class="txt-oflo">{{$article->title}}</td>
                                        <td>{{$article->user->name}}</td>
                                        <td>0</td>
                                        <td class="txt-oflo">{{$article->created_at->diffForHumans()}}</td>
                                        <td><a href="{{route('articles.show',$article->id)}}"><i class="fa fa-eye text-primary"></i></a> </td>
                                        </tr>
                                        @endforeach
                                        @else
                                            <div class="alert alert-primary">
                                                No new articles
                                            </div>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center"> 2020 &copy; Flash News </footer>
        </div>

    </div>
  
@endsection