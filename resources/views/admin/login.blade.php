@extends('admin.layout.master')

@section('main_content')
<section class="section">
    <div class="container container-login">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="card card-primary border-box shadow">
                    <div class="card-header card-header-auth text-center">
                        <h4>Admin Panel Login</h4>
                    </div>
                    <div class="card-body card-body-auth">
                        <form method="POST" action="{{ route('admin_login_submit') }}" novalidate>
                            @csrf
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input 
                                    type="email" 
                                    id="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    placeholder="Enter your email"
                                    autocomplete="off" 
                                    autofocus 
                                    required
                                >
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input 
                                    type="password" 
                                    id="password" 
                                    class="form-control @error('password') is-invalid @enderror" 
                                    name="password" 
                                    placeholder="Enter your password"
                                    required
                                >
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg w_100_p btn-block">
                                    Login
                                </button>
                            </div>

                            <div class="form-group text-center">
                                <a href="{{ route('admin_forget_password') }}">
                                    Forgot Password?
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    @if($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Login Failed',
            html: `{!! implode('<br>', $errors->all()) !!}`,
            confirmButtonText: 'OK'
        });
    @endif

    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session("success") }}',
            confirmButtonText: 'Great'
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ session("error") }}',
            confirmButtonText: 'OK'
        });
    @endif
</script>
@endsection
