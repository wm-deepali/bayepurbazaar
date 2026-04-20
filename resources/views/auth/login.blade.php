@extends('layouts.admin-app')

@section('content')

<style>
body{
    background: linear-gradient(135deg, #eef4ff, #f8f5ff, #fff7f2);
    min-height:100vh;
}

.login-wrapper{
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:30px 15px;
}

.login-card{
    border:none;
    border-radius:24px;
    overflow:hidden;
    background: rgba(255,255,255,0.95);
    box-shadow:0 20px 60px rgba(0,0,0,0.08);
    backdrop-filter: blur(10px);
}

.login-left{
    background: linear-gradient(135deg, #e8f1ff, #f3e8ff, #fff1e6);
    padding:50px 35px;
    text-align:center;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
}

.login-left img{
    max-width:180px;
    margin-bottom:25px;
    border-radius:16px;
    background:white;
    padding:10px;
    box-shadow:0 10px 25px rgba(0,0,0,0.06);
}

.login-left h3{
    color:#1e3a8a;
    font-weight:700;
    margin-bottom:10px;
}

.login-left p{
    color:#64748b;
    font-size:15px;
}

.login-right{
    padding:50px;
}

.login-title{
    color:#1e3a8a;
    font-weight:700;
    margin-bottom:30px;
}

.form-control{
    border-radius:14px;
    height:50px;
    border:1px solid #dbeafe;
    background:#f8fbff;
}

.form-control:focus{
    box-shadow:none;
    border-color:#93c5fd;
    background:white;
}

.btn-login{
    background: linear-gradient(135deg, #93c5fd, #c4b5fd, #fdba74);
    border:none;
    border-radius:14px;
    padding:12px;
    color:#1e293b;
    font-weight:700;
    width:100%;
    transition:0.3s ease;
}

.btn-login:hover{
    transform:translateY(-2px);
    opacity:0.95;
}

.form-check-label{
    color:#64748b;
}

@media(max-width:768px){
    .login-left{
        display:none;
    }

    .login-right{
        padding:35px;
    }
}
</style>

<div class="container-fluid login-wrapper">
    <div class="row justify-content-center w-100">
        <div class="col-lg-9 col-md-10">

            <div class="card login-card">
                <div class="row g-0">

                    <!-- Left Branding Section -->
                    <div class="col-md-5 login-left d-flex flex-column justify-content-center">
                        <img src="{{ asset('images/bayepurbazaar-logo.jpeg') }}" alt="Bayepur Bazaar Logo">
                        <h3 class="fw-bold">BayepurBazaar.com</h3>
                        <p class="mb-0 opacity-75">
                            Apna Gaon, Apna Bazaar, Apna Vikas
                        </p>
                    </div>

                    <!-- Right Login Form -->
                    <div class="col-md-7 login-right">

                        <h3 class="login-title mb-4">Admin Login</h3>

                        <form method="POST" action="{{ route('login.post') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autofocus>

                                @error('email')
                                    <span class="invalid-feedback d-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password"
                                    required>

                                @error('password')
                                    <span class="invalid-feedback d-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>

                            <button type="submit" class="btn btn-login">
                                Login
                            </button>

                            @if (Route::has('password.request'))
                                <div class="mt-3 text-center">
                                    <a href="{{ route('password.request') }}" class="text-decoration-none text-primary">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            @endif

                        </form>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection