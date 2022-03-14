
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{!empty($setting->name)?@$setting->name : 'Yaazhi' }} | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/admin/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    {{-- <div class="card-header text-center">
      <a href="{{asset('assets/admin/index2.html')}}" class="h1"><b>Admin</b>LTE</a>
    </div> --}}
    <div class="card-body">
    @include('admin.layouts.errors')
      {{-- <p class="login-box-msg">Sign in to login to  your session</p> --}}

      <form class="needs-validation"  method="post" action="{{route('admin.login')}}"  novalidate>
        @csrf
        <div class="form-row">

          <div class="col-12 ">
            <label for="email">Email Address</label>
            <div class="input-group">

              <div class="input-group-append">
                <span class="input-group-text" id="inputGroupPrepend"><span class="fas fa-envelope"></span></span>
              </div>
              <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email Address" aria-describedby="inputGroupPrepend" required>
              <div class="invalid-feedback">
                Please Enter Valid Email Address.
              </div>
            </div>
          </div>
          <div class="col-12 mt-2">
            <label for="password">Password</label>
            <div class="input-group">
              <div class="input-group-append">
                <span class="input-group-text" id="inputGroupPrepend"><span class="fas fa-lock"></span></span>
              </div>
              <input type="password" class="form-control" name="password"  id="password" placeholder="Enter Password" aria-describedby="inputGroupPrepend" required>
              <div class="invalid-feedback">
                Password Required.
              </div>
            </div>
          </div>
        </div>

        <button class="btn btn-primary mt-2" type="submit">Login</button>
      </form>

      {{-- <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> --}}
      <!-- /.social-auth-links -->

      {{-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> --}}
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/admin/dist/js/adminlte.min.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
        $(document).ready(function() {
            toastr.options = {
        "closeButton": false,
        "debug": true,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        }
    });
</script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
</script>
@if (Session::has('admin-access'))
    <script>
        $(document).ready(function() {
        toastr.error('Admin Access Required') ;
        });
    </script>
@endif
@if (Session::has('wrong-credentials'))
    <script>
        $(document).ready(function() {
        toastr.error('Username or password provided is incorrect') ;
        });
    </script>
@endif

</body>
</html>
