@extends('admin.main')
@section('title')
    My Profile
@endsection
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Profile page</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <a href="{{route('articles.create')}}"  class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus"></i> New Article</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="white-box">
                    <div class="user-bg"> <img width="100%" alt="user" src="../d_assets/plugins/images/large/img1.jpg">
                        <div class="overlay-box">
                            <div class="user-content">
                                <a href="javascript:void(0)"><img src="{{$user->photo==null ? '/image/noimage.png' : '/image/'.$user->photo}}"
                                        class="thumb-lg img-circle" alt="img"></a>
                                <h4 class="text-white">{{$user->name}}</h4>
                                <h5 class="text-white">Editor</h5>
                             
                            </div>
                          
                        </div>
                    </div>
                    <div class="user-btm-box">
                        <div class="col-md-4 col-sm-12 text-center">
                            <div class="white-box analytics-info">
                                <ul class="list-inline two-part">
                                   <li class="box-title">TOTAL ARTICLES</li>
                                    <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success">{{$articles}}</span></li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xs-12">
                <div class="white-box">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success')}}
                    </div>
                    @endif
                    <form class="form-horizontal form-material" enctype="multipart/form-data" method="POST" action="/profile/{{auth()->user()->id}}">
                       @csrf
                        <div class="form-group">
                            <label class="col-md-12">Full Name</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Johnathan Doe" name="name" value="{{auth()->user()->name}}"
                                    class="form-control form-control-line @error('name') is-invalid @enderror">
                                    @error('name')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" 
                                    class="form-control form-control-line @error('email') is-invalid @enderror" name="email" value="{{auth()->user()->email}}"
                                    id="example-email"> 
                                    @error('email')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="photo" class="col-md-12">Profile Photo</label>
                            <div class="col-md-12">
                                <input type="file"
                                    class="form-control form-control-line @error('photo') is-invalid @enderror" name="photo"
                                    id="photo"> 
                                    @error('photo')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Password</label>
                            <div class="col-md-12">
                                <input type="password" autocomplete="off" value="" name="password" class="form-control form-control-line @error('name') is-invalid @enderror">
                                @error('password')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Phone No</label>
                            <div class="col-md-12">
                                <input type="text" name="phone" value="{{$user->phone}}" 
                                    class="form-control form-control-line @error('phone') is-invalid @enderror">
                                    @error('phone')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">About </label>
                            <div class="col-md-12">
                                <textarea rows="5" name="about" class="form-control form-control-line @error('about') is-invalid @enderror">{{$user->about}}</textarea>
                                @error('about')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success">Update Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <footer class="footer text-center"> 2020 &copy; Flash News </footer>
</div>
@endsection
