<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Duka Shop | Verify Email</title>
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
                    <h1>Email Verification</h1>
                  </div>
                  <p>Please check your email for a verification link before continuing.</p>
                </div>
              </div>
            </div>

            <!-- Verify Email Panel -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content w-100 p-4">
                  @if (session('status') === 'verification-link-sent')
                    <div class="alert alert-success mb-3">
                      A new verification link has been sent to your email address.
                    </div>
                  @endif

                  <p class="mb-3">Before proceeding, please check your email for a verification link. If you didn’t receive the email, click the button below to request another.</p>

                  <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary w-100">
                      Resend Verification Email
                    </button>
                  </form>

                  <form method="POST" action="{{ route('logout') }}" class="mt-3 text-center">
                    @csrf
                    <button type="submit" class="btn btn-link">Log Out</button>
                  </form>
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
