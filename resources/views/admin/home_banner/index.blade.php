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

        .w_200 {
            width: 200px;
            height: auto;
            border-radius: 8px;
        }

        .h_100 {
            height: 100px;
        }
    </style>

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Home Banner Information</h1>
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
                            <form id="profileForm" action="{{ route('admin_home_banner_update') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-4">
                                    <label class="form-label">Existing Background</label>
                                    <div>
                                        <img src="{{ asset('uploads/'.$home_banner->background) }}" alt="Home Banner" class="w_200 profile-photo-preview">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Change Background</label>
                                    <input type="file" name="background" class="form-control">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Heading</label>
                                    <input type="text" class="form-control" name="heading" value="{{ trim($home_banner->heading) }}">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Subheading</label>
                                    <input type="text" class="form-control" name="subheading" value="{{ trim($home_banner->subheading) }}">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Text</label>
                                    <textarea class="form-control h_100" name="text" rows="4">{{ trim($home_banner->text) }}</textarea>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label">Event Date</label>
                                        <input type="date" class="form-control" name="event_date"
                                               value="{{ $home_banner->event_date ? \Carbon\Carbon::parse($home_banner->event_date)->format('Y-m-d') : '' }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Event Time</label>
                                        <input type="time" class="form-control" name="event_time"
                                               value="{{ $home_banner->event_time ? \Carbon\Carbon::parse($home_banner->event_time)->format('H:i') : '' }}">
                                    </div>
                                </div>

                                <div class="mb-4 text-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-1"></i> Update
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
