@extends('admin.layout.master')
@section('main_content')
    @include('admin.layout.nav')
    @include('admin.layout.sidebar')

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

        .h_200 {
            height: 200px;
        }
    </style>

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Home Welcome Information</h1>
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
                            <form id="profileForm" action="{{ route('admin_home_welcome_update') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-4">
                                    <label class="form-label">Existing Photo</label>
                                    <div>
                                        <img src="{{ asset('uploads/'.$home_welcome->photo) }}" alt="Welcome Photo" class="w_200 profile-photo-preview">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Change Photo</label>
                                    <input type="file" name="photo" class="form-control">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Heading *</label>
                                    <input type="text" class="form-control" name="heading" value="{{ trim($home_welcome->heading) }}">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Description *</label>
                                    <textarea class="form-control h_200" name="description" rows="6">{{ trim($home_welcome->description) }}</textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label">Button Text</label>
                                        <input type="text" class="form-control" name="button_text" value="{{ trim($home_welcome->button_text) }}">
                                    </div>

                                    <div class="col-md-5 mb-4">
                                        <label class="form-label">Button Link</label>
                                        <input type="text" class="form-control" name="button_link" value="{{ trim($home_welcome->button_link) }}">
                                    </div>

                                    <div class="col-md-3 mb-4">
                                        <label class="form-label">Status</label>
                                        <select class="form-select" name="status">
                                            <option value="Show" @if(strtolower($home_welcome->status) == 'show') selected @endif>Show</option>
                                            <option value="Hide" @if(strtolower($home_welcome->status) == 'hide') selected @endif>Hide</option>
                                        </select>
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
