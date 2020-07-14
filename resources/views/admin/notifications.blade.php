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
                        <h4 class="page-title">Notifications</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <a href="{{route('articles.create')}}"  class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus"></i> New Article</a>
                        
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- ============================================================== -->
                <!-- chat-listing & recent comments -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- .col -->
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">All My Notifications</h3>
                            <div class="comment-center p-t-10">
                                @if (auth()->user()->Notifications->count()>0)
                                @foreach (auth()->user()->Notifications as $notification)
                                    
                                <div class="comment-body" style="{{$notification->read_at==NULL? 'background-color: rgb(229, 243, 247)':''}}">
                                    <div class="user-img"> <img src="/" alt=""> <i class="fa fa-bell img-circle"></i>
                                    </div>
                                    <div class="mail-contnet">
                                        <h5>{{$notification->data['title']}}</h5><span class="time">{{$notification->created_at}}</span>
                                        <br/><span class="mail-desc">{{$notification->data['info']}} </span> <a href="{{route('notification_update',$notification->id)}}" class="btn btn btn-rounded btn-success btn-outline m-r-5"><i class="fa fa-pencil m-r-5"></i>Mark Read</a><a href="{{route('notification_delete',$notification->id)}}" class="btn-rounded btn btn-danger btn-outline"><i class="fa fa-trash m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div class="alert alert-info">
                                    You have no notifications
                                </div>
                                @endif
                                
                            </div>
                        </div>
                    </div>

                    <!-- /.col -->
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2020 &copy; Flash News </footer>
        </div>

    </div>
  
@endsection