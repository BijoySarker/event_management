@extends('front.layout.master')

@section('main_content')

    <div class="common-banner" style="background-image:url({{ asset('dist-front/images/banner.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="item">
                        <h2>Forget Password</h2>
                        <div class="breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Forget Password</li>
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
                                <form action="{{ route('forget_password_submit') }}" class="registerd" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input class="form-control" name="email" placeholder="Email Address" type="text" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit">
                                            SUBMIT
                                        </button>
                                    </div>
                                    <div class="form-group bottom">
                                        <a href="{{ route('login') }}">Back to login page</a>
                                    </div>
                                </form>

                                {{-- Display Validation Errors --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger mt-2">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#3085d6'
        });
        @endif

        @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
            confirmButtonColor: '#d33'
        });
        @endif
    </script>

@endsection
