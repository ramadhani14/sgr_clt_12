<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  @php
    $template = App\Models\Template::where('id','<>','~')->first();
  @endphp
  <title>{{$template->nama}}</title>
  <link href="{{ asset($template->logo_kecil) }}" rel="icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('layout/adminlte3/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('layout/adminlte3/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('layout/adminlte3/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{url('/')}}">{{ $template->nama }}</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login untuk melanjutkan</p>

      <form method="post" id="formLogin">
        @csrf
        <div class="input-group mb-3 form-group">
          <input type="text" class="form-control" id="username" name="username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3 form-group">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="{{ asset('layout/adminlte3/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Popper js -->
    <!-- <script src="{{asset('layout/vizew/js/bootstrap/popper.min.js')}}"></script> -->
    <!-- Bootstrap js -->
    <!-- <script src="{{asset('layout/vizew/js/bootstrap/bootstrap.min.js')}}"></script> -->
    <!-- All Plugins js -->
    <!-- <script src="{{asset('layout/vizew/js/plugins/plugins.js')}}"></script> -->
    <!-- Active js -->
    <!-- <script src="{{asset('layout/vizew/js/active.js')}}"></script> -->

    <!-- jquery-validation -->
    <script src="{{asset('layout/adminlte3/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('layout/adminlte3/plugins/jquery-validation/additional-methods.min.js')}}"></script>
    <!-- Loading Overlay -->
    <script src='https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js'></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Global -->
    <script src="{{ asset('js/global.js') }}"></script>
    <script>
    $(document).ready(function(){
    $(document).ready(function(){
        $(".username").on('input paste', function () {
          this.value=this.value.replace(/[^a-zA-Z0-9]/g,'');
        });
        $('#formLogin').validate({
            rules: {
            username: {
                required: true
            },
            password: {
                required: true
            },
            },
            messages: {
            username: {
                required: "Username tidak boleh kosong"
            },
            password: {
                required: "Password tidak boleh kosong"
            },
        
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            },

            submitHandler: function () {
              var formData = new FormData($('#formLogin')[0]);

              var url = "{{ url('userauth') }}";
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
              $.ajax({
                  url: url,
                  type: 'POST',
                  dataType: "JSON",
                  data: formData,
                  contentType: false,
                  processData: false,
                  beforeSend: function () {
                      // $.LoadingOverlay("show");
                      $.LoadingOverlay("show", {
                          image       : "{{asset('/image/global/loading.gif')}}"
                      });
                  },
                  success: function (response) {
                      if (response.status === true) {
                      Swal.fire({
                          title: response.message,
                          icon: 'success',
                          showConfirmButton: false
                          });
                              reload_url(1000,response.link);
                      }else{
                      Swal.fire({
                          title: response.message,
                          icon: 'error',
                          confirmButtonText: 'Ok',
                          showCloseButton: true,
                      });
                      }
                  },
                  error: function (xhr, status) {
                      alert('Error! Please Try Again');
                  },
                  complete: function () {
                      $.LoadingOverlay("hide");
                  }
              });   
            }
        });
    });  
    });
    </script>
</body>
</html>
