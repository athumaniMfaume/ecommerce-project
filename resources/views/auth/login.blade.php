<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Duka Shop | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('admincss/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admincss/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admincss/css/font.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <link rel="stylesheet" href="{{ asset('admincss/css/style.default.css') }}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{ asset('admincss/css/custom.css') }}">
    <link rel="shortcut icon" href="{{ asset('admincss/img/favicon.ico') }}">
  </head>

  <body>
    <div class="login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow w-100">
          <div class="row">
            <!-- Info Panel -->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>Dashboard</h1>
                  </div>
                  <p>Welcome back. Please login to continue.</p>
                </div>
              </div>
            </div>

            <!-- Login Form -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content w-100 p-4">
                  @if (session('status'))
                    <div class="alert alert-success mb-3">
                      {{ session('status') }}
                    </div>
                  @endif

                  <!-- Login Form Start -->
                  <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="form-group">
                                              <label for="email" class="label-material">Email</label>
                      <input id="email" type="email" name="email" value="{{ old('email') }}"  class="input-material ">

                      @error('email')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                                              <label for="password" class="label-material">Password</label>
                      <input id="password" type="password" name="password"  class="input-material">

                      @error('password')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="form-group d-flex align-items-center justify-content-between">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" for="remember">
                          Remember me
                        </label>
                      </div>
                      @if (Route::has('password.request'))
                        <a class="forgot-pass" href="{{ route('password.request') }}">
                          Forgot Password?
                        </a>
                      @endif
                    </div>

                    <!-- Submit -->
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary w-100">
                        Login
                      </button>
                    </div>
                  </form>

                  <!-- Register -->
                  <p class="mt-3 mb-0">Don't have an account? <a href="{{ route('register') }}">Signup</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <div class="copyrights text-center">
        <p>{{ date('Y') }} &copy; Your company. Download From 
          <a target="_blank" href="https://templateshub.net">Templates Hub</a>.
        </p>
      </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
  </body>
</html>
