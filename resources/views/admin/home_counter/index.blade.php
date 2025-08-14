@extends('admin.layout.master')

@section('main_content')
    @include('admin.layout.nav')
    @include('admin.layout.sidebar')

    <!-- Font Awesome CSS for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        .form-label {
            font-weight: 600;
        }

        .section-header h1 {
            font-size: 1.75rem;
            font-weight: 700;
        }

        .card {
            border-radius: 1rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .btn-primary {
            padding: 10px 20px;
            font-size: 1rem;
        }

        .icon-preview {
            font-size: 1.5rem;
            margin-top: 5px;
        }
    </style>

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Home Counter Setup</h1>
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
                            <form action="{{ route('admin_home_counter_update') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                @php
                                    $icons = [
                                        'fa fa-calendar' => 'Calendar',
                                        'fa fa-user' => 'User',
                                        'fa fa-users' => 'Members',
                                        'fa fa-briefcase' => 'Work',
                                        'fa fa-star' => 'Star'
                                    ];
                                @endphp

                                <div class="mb-4">
                                    <label class="form-label">Existing Background</label>
                                    <div>
                                        <img src="{{ asset('uploads/'.$home_counter->background) }}" alt="" class="w_200">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Change Background</label>
                                    <input type="file" name="background" class="form-control">
                                </div>

                                {{-- Item 1 --}}
                                <h5 class="mb-3">Item 1</h5>
                                <div class="row align-items-center">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Icon</label>
                                        <select name="item1_icon" class="form-control icon-select">
                                            <option value="">No Icon</option>
                                            @foreach($icons as $class => $label)
                                                <option value="{{ $class }}" {{ $home_counter->item1_icon == $class ? 'selected' : '' }}>
                                                    {{ $label }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="icon-preview mt-1">
                                            @if($home_counter->item1_icon)
                                                <i class="{{ $home_counter->item1_icon }}"></i>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Number</label>
                                        <input type="text" name="item1_number" class="form-control" value="{{ $home_counter->item1_number }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="item1_title" class="form-control" value="{{ $home_counter->item1_title }}">
                                    </div>
                                </div>

                                {{-- Item 2 --}}
                                <h5 class="mt-4 mb-3">Item 2</h5>
                                <div class="row align-items-center">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Icon</label>
                                        <select name="item2_icon" class="form-control icon-select">
                                            <option value="">No Icon</option>
                                            @foreach($icons as $class => $label)
                                                <option value="{{ $class }}" {{ $home_counter->item2_icon == $class ? 'selected' : '' }}>
                                                    {{ $label }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="icon-preview mt-1">
                                            @if($home_counter->item2_icon)
                                                <i class="{{ $home_counter->item2_icon }}"></i>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Number</label>
                                        <input type="text" name="item2_number" class="form-control" value="{{ $home_counter->item2_number }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="item2_title" class="form-control" value="{{ $home_counter->item2_title }}">
                                    </div>
                                </div>

                                {{-- Item 3 --}}
                                <h5 class="mt-4 mb-3">Item 3</h5>
                                <div class="row align-items-center">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Icon</label>
                                        <select name="item3_icon" class="form-control icon-select">
                                            <option value="">No Icon</option>
                                            @foreach($icons as $class => $label)
                                                <option value="{{ $class }}" {{ $home_counter->item3_icon == $class ? 'selected' : '' }}>
                                                    {{ $label }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="icon-preview mt-1">
                                            @if($home_counter->item3_icon)
                                                <i class="{{ $home_counter->item3_icon }}"></i>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Number</label>
                                        <input type="text" name="item3_number" class="form-control" value="{{ $home_counter->item3_number }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="item3_title" class="form-control" value="{{ $home_counter->item3_title }}">
                                    </div>
                                </div>

                                {{-- Item 4 --}}
                                <h5 class="mt-4 mb-3">Item 4</h5>
                                <div class="row align-items-center">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Icon</label>
                                        <select name="item4_icon" class="form-control icon-select">
                                            <option value="">No Icon</option>
                                            @foreach($icons as $class => $label)
                                                <option value="{{ $class }}" {{ $home_counter->item4_icon == $class ? 'selected' : '' }}>
                                                    {{ $label }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="icon-preview mt-1">
                                            @if($home_counter->item4_icon)
                                                <i class="{{ $home_counter->item4_icon }}"></i>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Number</label>
                                        <input type="text" name="item4_number" class="form-control" value="{{ $home_counter->item4_number }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="item4_title" class="form-control" value="{{ $home_counter->item4_title }}">
                                    </div>
                                </div>

                                {{-- Status --}}
                                <div class="mb-4">
                                    <label class="form-label">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="Show" {{ $home_counter->status == 'Show' ? 'selected' : '' }}>Show</option>
                                        <option value="Hide" {{ $home_counter->status == 'Hide' ? 'selected' : '' }}>Hide</option>
                                    </select>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Update Counter</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- jQuery for live icon preview -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function () {
            $('.icon-select').each(function () {
                const icon = $(this).val();
                const preview = $(this).siblings('.icon-preview');
                if (icon) {
                    preview.html('<i class="' + icon + '"></i>');
                } else {
                    preview.html('');
                }
            });

            $('.icon-select').on('change', function () {
                const selectedIcon = $(this).val();
                const preview = $(this).siblings('.icon-preview');
                if (selectedIcon) {
                    preview.html('<i class="' + selectedIcon + '"></i>');
                } else {
                    preview.html('');
                }
            });
        });
    </script>
@endsection
