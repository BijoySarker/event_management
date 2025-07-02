@extends('admin.layout.master')

@section('main_content')
<section class="section py-5">
    <div class="container container-login">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header text-center">
                        <h4 class="mb-0">Forgot Password</h4>
                    </div>
                    <div class="card-body">

                        {{-- Laravel validation errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Flash messages --}}
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Form --}}
                        <form method="POST" action="{{ route('admin_forget_password_submit') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required autofocus>
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary w-100 btn-lg">
                                    Send Password Reset Link
                                </button>
                            </div>

                            <div class="form-group text-center">
                                <a href="{{ route('admin_login') }}">← Back to login page</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
