<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Styles -->
    <link href="{{ asset('plugins/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body>
<section class="vh-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">

        <div class="px-5 ms-xl-4">
          <i class="fas fa-biohazard fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
          <span class="h1 fw-bold mb-0">ANTHARAS V2</span>
        </div>
        <br><br>
        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
          <form style="width: 23rem;" method="POST" action="{{ route('usuario.login') }}" >
            {{ csrf_field() }}
            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Antharas Login</h3>

            <div class="form-outline mb-4">
              <input type="email" id="email" name="email" class="form-control form-control-lg" />
              <label class="form-label" for="email">Email de Registro</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="password" name="password" class="form-control form-control-lg" />
              <label class="form-label" for="password">Contraseña</label>
            </div>

            <div class="pt-1 mb-4">
              <button class="btn btn-info btn-lg btn-block" type="submit">Iniciar Sesion</button>
            </div>
            <p><span>Copyright &copy; ANTHARAS 2022</span></p>

          </form>

        </div>

      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img3.webp"
          alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>
    <!-- Scripts -->
    <script src="{{ asset('plugins/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('plugins/js/sb-admin-2.min.js') }}"></script>

</body>
</html>