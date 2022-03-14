@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Edit Post </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blogs</li> --}}
                      <a href="{{route('post.index')}}" class="text-light btn btn-danger float-right mb-3">Back</a>

                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="col-12">
                <div class="card card-primary">

                    <div class="card-body">
                        <form action="{{route('post.update',$data->id)}}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="form-group col-6">
                                    <label for="title"> Title</label>
                                    <input type="text" id="title" value="{{@$data->title}}" name="title" class=" form-control">
                                    @if($errors->has('title'))
                                        <small class="text-danger">{{$errors->first('title')}}</small>
                                    @endif
                                </div>
                                <div class="form-group col-6">
                                    <label>Select Blog Category</label>
                                    <select name="blog_id" class="form-control select2bs4 " >
                                        @if (isset($blogs) && !empty($blogs))
                                        @foreach ($blogs as $blog)
                                            <option value="{{$blog->id}}" {{$blog->id == $data->parent_id ? 'selected':''}} >{{$blog->title}}</option>
                                        @endforeach

                                    @endif

                                    </select>
                                    @if($errors->has('blog_id'))
                                        <small class="text-danger">{{$errors->first('blog_id')}}</small>
                                    @endif
                                </div>
                                <div class="form-group col-12">
                                    <label for="title"> Page Content</label>
                                    <textarea name="description" class="form-control tinymce-editor" placeholder="Please Enter Content">{{@$data->description}}</textarea>
                                    @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif

                                </div>

                                <div class="form-group col-6">
                                    <label for="inputStatus">Status</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" value="1" checked type="radio" {{@$data->status == 'Active' ? 'checked' : ''}} id="active" name="status">
                                        <label for="active" class="custom-control-label">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input custom-control-input-danger"  type="radio" value="0" id="inactive" name="status" {{@$data->status != 'Active' ? 'checked' : ''}} >
                                        <label for="inactive" class="custom-control-label">Inactive</label>
                                    </div>
                                    @if($errors->has('status'))
                                        <small class="text-danger">{{$errors->first('status')}}</small>
                                    @endif
                                </div>
                            </div>
                            <button class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>
@endsection
