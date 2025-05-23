<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS-->
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
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Info Panel -->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>Register</h1>
                  </div>
                  <p>Join us and manage your tasks easily.</p>
                </div>
              </div>
            </div>

            <!-- Registration Form Panel -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form method="POST" action="{{ route('register') }}" class="text-left form-validate">
                    @csrf

                    <div class="form-group-material">
                                              <label for="name" class="label-material">Full Name</label>
                      <input id="name" type="text" name="name" required autofocus class="input-material" value="{{ old('name') }}">
                                            @error('name')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror

                    </div>

                    <div class="form-group-material">
                                              <label for="email" class="label-material">Email Address</label>
                      <input id="email" type="email" name="email" required class="input-material" value="{{ old('email') }}">
                                            @error('email')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>

                    <div class="form-group-material">
                                              <label for="password" class="label-material">Password</label>
                      <input id="password" type="password" name="password" required class="input-material">
                                            @error('password')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror

                    </div>

                    <div class="form-group-material">
                                              <label for="password_confirmation" class="label-material">Confirm Password</label>
                      <input id="password_confirmation" type="password" name="password_confirmation" required class="input-material">
                                                                  @error('password_confirmation')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror

                    </div>

                    <div class="form-group terms-conditions text-center">
                                              <label for="agree">I agree to the terms and policy</label>
                      <input id="agree" type="checkbox" required class="checkbox-template">

                    </div>

                    <div class="form-group text-center">
                      <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                  </form>
                  <small>Already have an account? </small><a href="{{ route('login') }}" class="signup">Login</a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="copyrights text-center">
        <p>2025 &copy; Your company. Design by <a target="_blank" href="https://templateshub.net">Templates Hub</a>.</p>
      </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
  </body>
</html>
