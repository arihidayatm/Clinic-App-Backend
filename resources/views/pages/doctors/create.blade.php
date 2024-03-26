@extends('layouts.app')

@section('title', 'Advanced Forms')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Advanced Forms</h1>
                <div class="section-header-breadcrumb d-flex justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="#"><i class="fas fa-tachometer-alt"></i>
                                    Home</a></li>
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-id-badge"></i>
                                    Doctors</a></li>
                            <li class="breadcrumb-item"
                                aria-current="page"><i class="fas fa-users"></i> Add Doctor</li>
                        </ol>
                    </nav>
               </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Doctors</h2>



                <div class="card">
                    <form action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Input Doctor</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text"
                                    class="form-control @error('name')
                                is-invalid
                            @enderror"
                                    name="doctor_name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Birtdate</label>
                                <input type="date" class="form-control" name="doctor_birtdate">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email"
                                    class="form-control @error('email')
                                is-invalid
                            @enderror"
                                    name="doctor_email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" class="form-control" name="doctor_phone">
                            </div>
                            <div class="form-group">
                                <label>SIP</label>
                                <input type="text" class="form-control" name="doctor_sip">
                            </div>
                            <div class="form-group">
                                <label>Spesialist</label>
                                <input type="text" class="form-control" name="doctor_specialist">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="doctor_address"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Upload File/Image</label>
                                <input type="file" class="form-control" name="doctor_photo">
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
