@extends('admin.main')
@section('title')
Users 
@endsection
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Users</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                 <a href="{{route('articles.create')}}"  class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus"></i> New Article</a>
                <ol class="breadcrumb">
                
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">Manage Users</h3>
                   @if (session('success'))
                       <div class="alert alert-success">
                           {{session('success')}}
                       </div>
                   @endif
                   @if ($profiles->count()>0)
                   <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Registration Date</th>
                                <th>Articles Written</th>
                                <th>View Profile</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profiles as $profile)
                              <tr>
                                <td>{{$profile->id}}</td>
                                <td><img src="{{$profile->photo==null ? '/image/noimage.png' : '/image/'.$profile->photo}}"
                                    class="thumb-lg img-circle" alt="img"></td>
                                <td>{{$profile->name}}</td>
                                <td>{{$profile->role}}</td>
                                <td>{{$profile->created_at}}</td>
                                <td>{{$profile->posts->count()}}</td>
                                <td><a href="{{route('view_profile',$profile->id)}}"><i class="fa fa-eye text-primary"></i></a> </td>
                                </td>
                                <td class="{{$profile->status=='active' ? 'btn btn-success' : 'btn btn-warning btn-small'}}">
                                    
                                    {{$profile->status}}
                                </td>
                            </tr>  
                            @endforeach
                            @else
                                    <div class="alert alert-primary">
                                        No users
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
@endsection