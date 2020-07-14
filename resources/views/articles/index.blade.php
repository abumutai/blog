@extends('admin.main')
@section('title')
    Articles
@endsection
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">My Articles</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <a href="{{route('articles.create')}}"  class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus"></i> New Article</a>
                <ol class="breadcrumb">
                
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">My articles</h3>
                   @if (session('success'))
                       <div class="alert alert-success">
                           {{session('success')}}
                       </div>
                   @endif
                   @if ($articles->count()>0)
                   <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Article Name</th>
                                <th>Article Category</th>
                                <th>Date of publishment</th>
                                <th>Number of Views</th>
                                <th>View</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                              <tr>
                                <td>{{$article->id}}</td>
                                <td>{{$article->title}}</td>
                                <td>{{$article->category}}</td>
                                <td>{{$article->created_at}}</td>
                                <td>0</td>
                                <td><a href="{{route('articles.show',$article->id)}}"><i class="fa fa-eye text-primary"></i></a> </td>
                                <td><a href="{{route('articles.edit',$article->id)}}"><i class="fa fa-pencil text-success"></i></a></td>
                                <td>
                                    <form action="{{route('articles.destroy',$article->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="border:0; background:none;" ><i class="fa fa-trash text-danger"> </i> </button>
                                    
                                    </form>
                                    
                                </td>
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
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <footer class="footer text-center"> 2020 &copy; Flash News </footer>
</div>
@endsection