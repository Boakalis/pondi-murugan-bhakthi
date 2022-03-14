@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Post List Management </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blogs</li> --}}
              <a href="{{route('post.create')}}" class="text-light btn btn-primary float-right mb-3">Add New</a>

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <table class="table table-secondary table-hover">
                <thead>
                    <tr>
                        <th class="text-center col-1">S.No</th>
                        <th class="text-center col-3">Title</th>
                        <th class="text-center col-4">Description</th>
                        <th class="text-center col-2">Status</th>
                        <th class="text-center col-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @if (!empty($datas))
                            @foreach ($datas as $key => $data)
                            <tr>
                                <th  class="text-center"  scope="row">{{$key + 1}}</th>
                                <td  class="text-center"  >{{\Illuminate\Support\Str::limit($data->title,40,$end='..')   }}</td>
                                <td class="text-center" >
                                    <span class="">{!! \Illuminate\Support\Str::limit($data->description,40,$end='..')   !!}</span>

                                </td>
                                <td class="text-center" > <span class="badge badge-pill badge-{{$data->status == 'Active' ?'success':'danger'}}">{{$data->status}}</span>
                                </td>
                                <td class="text-center " ><a href="{{route('post.edit',$data->id)}}" class="btn btn-primary mx-1" ><i class="fas fa-edit"></i></a><a href="{{route('post.delete',$data->id)}}" class="btn btn-danger mx-1" ><i class="fas fa-trash"></i></a></td>
                            </tr>
                            @endforeach
                        @else

                        @endif

                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
@section('javascript')
    <script>
          @if(Session::has('post-added'))
            toastr.success('Post Added');
          @endif
          @if(Session::has('post-updated'))
            toastr.success('Post Updated');
          @endif
          @if(Session::has('post-deleted'))
            toastr.error('Post Deleted');
          @endif
    </script>
@endsection

