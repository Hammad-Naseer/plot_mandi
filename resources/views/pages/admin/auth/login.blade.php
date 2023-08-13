
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Plot Mandi') }}</title>
    <style>
        .left_side{
          display: flex !important;
    justify-content: center;
    align-items: center;
    height: 100vh;
        }
    </style>
</head>
<body>
    

<link rel="stylesheet" href="{{ asset(MyApp::ASSET_STYLE.'bootstrap.min.css') }}">
<section class="vh-100">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 text-black left_side">
  
          <div class="px-5 ms-xl-4">
            <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
            {{-- <span class="h1 fw-bold mb-0">Logo</span> --}}
          </div>
          <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-xl-n5">
              <form style="width: 23rem;" action="{{ route('login_form_admin') }}" method="post">
                <br><br>
                @csrf
                <div class="text-left">
                  <h1>Welcome to Plot Mandi Admin Panel</h1>
                    {{-- <img src="{{ asset(MyApp::SITE_LOGO) }}" alt="Logo" width="170px"> --}}
                </div>
                
              <h3 class="fw-normal mb-3 pb-3 mt-4" style="letter-spacing: 1px;">Log in</h3>
                @if(Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif
    
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
          
                <div class="form-outline mb-4">
                    <input type="email" name="email" required id="form2Example18" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example18">Email address</label>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
  
                <div class="form-outline mb-4">
                    <input type="password" name="password" required id="form2Example28" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example28">Password</label>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
  
              <div class="pt-1 mb-4">
                <button class="btn btn-success btn-lg btn-block" type="submit">Login</button>
              </div>
  
              <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
              {{-- <p>Don't have an account? <a href="#!" class="link-info">Register here</a></p> --}}
  
            </form>
  
          </div>
  
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block" style="    display: flex !important;
        justify-content: center;
        align-items: center;
        height: 100vh;">
          {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img3.webp"
            alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;"> --}}
            {{-- <img src="{{ asset(MyApp::ASSET_IMG.'admin_login_bg.png') }}" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;"> --}}
            <img src="{{ asset(MyApp::SITE_LOGO) }}" alt="Logo" class="w-90 vh-90" style="object-fit: cover; object-position: left;">  
        </div>
      </div>
    </div>
  </section>
</body>
</html>