@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Users List</h1>
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
    <div class="content card">
            <div class="container mt-5">
                <table class="table table-bordered yajra-datatable"  >
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            {{-- <th>Phone</th> --}}
                            <th  >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
    </div>
</div>    
@endsection
@section('javascript')
<script type="text/javascript">
  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        bAutoWidth: false,
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.users.getdata') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'id', width: '10%', class: 'text-center'},
            // {data: 'name', name: 'name'},
            {data: 'email', name: 'email', width: '60%', class: 'text-center'},
            // {data: 'phone', name: 'phone'},
            {data: 'action', name: 'action', width:'30%',class:'text-center', orderable: false, searchable: false},
        ],
    });
    
  });
</script>
@endsection
