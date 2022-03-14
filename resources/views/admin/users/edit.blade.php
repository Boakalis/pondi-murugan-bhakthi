@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Edit User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="col-12">
          <div class="card card-primary">
            {{-- <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div> --}}
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-4">
                        <label for="inputName">Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter Name"  class="form-control" value="{{!empty(@$data->name)?@$data->name:''}}">
                    </div>
                    <div class="form-group col-4">
                        <label for="email">Email Address</label>
                        <input type="text" id="email" class="form-control" placeholder="Enter Email Address" name="email" value="{{!empty(@$data->email)?@$data->email:''}}">
                    </div>
                    <div class="form-group col-4">
                        <label for="mobile">Mobile Number</label>
                        <input type="text" id="phone" class="form-control" name="phone" placeholder="Enter Mobile Number"  value="{{!empty(@$data->phone)?@$data->phone:''}}">
                    </div>
                    <div class="form-group col-6">
                        <label for="Image">Image</label>
                        <input type="file" id="image" class="form-control" name="image" >
                        @if (!empty($data->image))
                            <span>Image</span>
                        @endif
                    </div>

                </div>


              <div class="form-group">
                <label for="inputStatus">Status</label>
                <select id="inputStatus" class="form-control custom-select">
                  <option disabled="">Select one</option>
                  <option>On Hold</option>
                  <option>Canceled</option>
                  <option selected="">Success</option>
                </select>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
    </section>
</div>        
@endsection