<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Duka Shop | Forgot Password</title>
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
                    <h1>Forgot Password</h1>
                  </div>
                  <p>No worries. We'll email you instructions to reset your password.</p>
                </div>
              </div>
            </div>

            <!-- Forgot Password Form -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content w-100 p-4">

                  @if (session('status'))
                    <div class="alert alert-success mb-3">
                      {{ session('status') }}
                    </div>
                  @endif

                  <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email -->
                    <div class="form-group">
                      <label for="email" class="label-material">Email Address</label>
                      <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="input-material">

                      @error('email')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>

                    <!-- Submit -->
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary w-100">
                        Email Password Reset Link
                      </button>
                    </div>
                  </form>

                  <!-- Back to login -->
                  <p class="mt-3 mb-0 text-center">
                    <a href="{{ route('login') }}">Back to Login</a>
                  </p>

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
