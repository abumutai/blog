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
                <a href="{{route('articles.create')}}"  class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><i class="fa fa-plus"></i>New Article</a>
                <ol class="breadcrumb">
                
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">Create New article</h3>
                    <div class="card">
                       
                        <div class="card-body">
                            <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                                @csrf
        
                                <div class="form-group row">
                                    <label for="title" class="col-md-8 col-form-label text-md-right">Title</label>
        
                                    <div class="col-md-12">
                                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
        
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>
        
                                    <div class="col-md-12">
                                        <select name="category" id="category" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}">
                                        <option value="">Select</option>
                                        <option value="local" {{old('category')=='local'? 'selected':""}}>Local News</option>
                                        <option value="sports" {{old('category')=='sports'? 'selected':""}}>Sports</option>
                                        <option value="lifestyle" {{old('category')=='lifestyle'? 'selected':""}}>Lifestyle</option>
                                        <option value="entertainment" {{old('category')=='entertainment'? 'selected':""}}>Entertainment</option>
                                    </select>
                                        @error('category')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>
        
                                    <div class="col-md-12">
                                        <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" >
        
                                        @error('photo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="content" class="col-md-4 col-form-label text-md-right">Article Content</label>
        
                                    <div class="col-md-12">
                                        <textarea name="content" class="form-control" id="content" cols="30" rows="10"></textarea>
                                        
                                    </div>
                                </div>
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Create Article
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <footer class="footer text-center"> 2020 &copy; Flash News </footer>
</div>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'content',{
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    
</script>
@endsection