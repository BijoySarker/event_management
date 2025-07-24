@extends('front.layout.master')

@section('main_content')

<div class="common-banner" style="background-image:url({{ asset('dist-front/images/banner.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
                    <h2>Login</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Login</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="Loginsection" class="pt_50 pb_50 gray Loginsection">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="login-register-bg">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12">

                            {{-- Login Form --}}
                            <form action="{{ route('login_submit') }}" class="registerd" method="post" autocomplete="on">
                                @csrf

                                <div class="form-group">
                                    <input
                                        class="form-control"
                                        name="email"
                                        placeholder="Email Address"
                                        type="email"
                                        autocomplete="username"
                                        required
                                        value="{{ old('email') }}">
                                </div>

                                <div class="form-group">
                                    <input
                                        class="form-control"
                                        name="password"
                                        placeholder="Password"
                                        type="password"
                                        autocomplete="current-password"
                                        required>
                                </div>

                                <div class="form-group">
                                    <button type="submit">LOGIN</button>
                                </div>

                                <div class="form-group bottom">
                                    <a href="{{ route('forget_password') }}">Forgot Password?</a><br>
                                    <a href="{{ route('registration') }}">Create New account</a>
                                </div>
                            </form>


                            {{-- SweetAlert2 CDN --}}
                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                            {{-- Success Message --}}
                            @if (session('success'))
                                <script>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success',
                                        text: "{{ session('success') }}",
                                        confirmButtonText: 'OK'
                                    });
                                </script>
                            @endif

                            {{-- Error Message --}}
                            @if (session('error'))
                                <script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: "{{ session('error') }}",
                                        confirmButtonText: 'OK'
                                    });
                                </script>
                            @endif

                            {{-- Validation Errors --}}
                            @if ($errors->any())
                                <script>
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Validation Error',
                                        html: `{!! implode('<br>', $errors->all()) !!}`,
                                        confirmButtonText: 'OK'
                                    });
                                </script>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
