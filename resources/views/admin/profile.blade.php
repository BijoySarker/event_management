@extends('admin.layout.master')
@section('main_content')
@include('admin.layout.nav')
@include('admin.layout.sidebar')

<!-- CropperJS CSS -->
<link href="https://unpkg.com/cropperjs@1.5.13/dist/cropper.min.css" rel="stylesheet" />

<style>
    .profile-photo-preview {
        max-width: 100%;
        height: auto;
        border: 1px solid #ddd;
        border-radius: 10px;
        margin-bottom: 10px;
    }

    .form-label {
        font-weight: 600;
    }

    .section-header h1 {
        font-size: 1.75rem;
        font-weight: 700;
    }

    .card {
        border-radius: 1rem;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }

    .btn-primary {
        padding: 10px 20px;
        font-size: 1rem;
    }
</style>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Profile</h1>
        </div>

        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card p-4">
                        <form id="profileForm" action="{{ route('admin_profile_submit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3 text-center">
                                        
                                        <img src="{{ asset('uploads/' . Auth::guard('admin')->user()->photo) }}" class="profile-photo-preview mb-3" width="200" alt="Profile Photo">

                                        <input type="file" class="form-control" name="photo" id="photoInput">
                                        <small class="form-text text-muted">Choose a new photo</small>
                                    </div>

                                    <div id="previewContainer" style="display: none;">
                                        <label class="form-label">Crop Image</label>
                                        <img id="imagePreview" class="img-fluid rounded" style="max-height: 300px;">
                                    </div>

                                    <input type="hidden" name="cropped_image" id="croppedImageInput">
                                </div>
                              
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label">Name *</label>
                                        <input type="text" class="form-control" name="name" value="{{ Auth::guard('admin')->user()->name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email *</label>
                                        <input type="email" class="form-control" name="email" value="{{ Auth::guard('admin')->user()->email }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">New Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" name="confirm_password">
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-1"></i> Update Profile
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- CropperJS -->
<script src="https://unpkg.com/cropperjs@1.5.13/dist/cropper.min.js"></script>
<script>
    let cropper;
    const photoInput = document.getElementById('photoInput');
    const imagePreview = document.getElementById('imagePreview');
    const previewContainer = document.getElementById('previewContainer');
    const croppedImageInput = document.getElementById('croppedImageInput');

    photoInput.addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function (event) {
            imagePreview.src = event.target.result;
            previewContainer.style.display = 'block';

            if (cropper) cropper.destroy();

            cropper = new Cropper(imagePreview, {
                aspectRatio: 1,
                viewMode: 1,
                dragMode: 'move',
                responsive: true,
                autoCropArea: 1
            });
        };
        reader.readAsDataURL(file);
    });

    document.getElementById('profileForm').addEventListener('submit', function (e) {
        if (cropper) {
            e.preventDefault();
            cropper.getCroppedCanvas().toBlob(function (blob) {
                const formData = new FormData(e.target);
                formData.append('cropped_image', blob, 'cropped.jpg');

                fetch(e.target.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                }).then(response => {
                    if (response.redirected) {
                        window.location.href = response.url;
                    } else {
                        location.reload();
                    }
                }).catch(error => {
                    alert('Upload failed!');
                    console.error(error);
                });
            });
        }
    });
</script>
@endsection
