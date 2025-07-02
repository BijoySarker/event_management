@extends('admin.layout.master')

@section('main_content')
<section class="section py-5">
    <div class="container container-login">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header text-center">
                        <h4 class="mb-0">Reset Password</h4>
                    </div>
                    <div class="card-body">
                        {{-- Flash messages --}}
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        {{-- Form --}}
                        <form method="POST" action="{{ route('admin_reset_password_submit', [$token, $email]) }}" id="resetForm">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="email" value="{{ $email }}">

                            <div class="form-group mb-3">
                                <label for="password">New Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter new password" required autofocus>
                            </div>

                            <div class="form-group mb-4">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Retype password" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Reset Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.getElementById('resetForm').addEventListener('submit', function(e) {
        const password = document.getElementById('password').value;
        const confirm = document.getElementById('confirm_password').value;

        if (password !== confirm) {
            e.preventDefault();
            alert('Passwords do not match!');
        }
    });
</script>
@endpush
