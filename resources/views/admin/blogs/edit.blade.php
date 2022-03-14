@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Edit {{@$data->title}}  </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blogs</li> --}}
                        <a href="{{route('blog.index')}}" class="text-light btn btn-danger float-right mb-3">Back</a>

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
                        <form action="{{route('blog.update',$data->id)}}" method="POST">
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
                                    <label>Select Blog <small class="text-danger">(Note: If blog had sub-category then please choose the option here)</small>  </label>
                                    <select name="parent_id" class="form-control select2bs4 " >
                                    <option selected="selected" value="" >NONE</option>
                                    @if (isset($blogs) && !empty($blogs))
                                        @foreach ($blogs as $blog)
                                            <option value="{{$blog->id}}" {{$blog->id == $data->parent_id ? 'selected':''}} >{{$blog->title}}</option>
                                        @endforeach

                                    @endif

                                    </select>
                                    @if($errors->has('parent_id'))
                                        <small class="text-danger">{{$errors->first('parent_id')}}</small>
                                    @endif
                                </div>
                                <div class="form-group col-6">
                                    <label for="inputStatus">Status</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" value="1" {{@$data->status == 'Active' ? 'checked' : ''}} type="radio" id="active" name="status">
                                        <label for="active" class="custom-control-label">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input custom-control-input-danger" type="radio" value="0" {{@$data->status != 'Active' ? 'checked' : ''}} id="inactive" name="status">
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
