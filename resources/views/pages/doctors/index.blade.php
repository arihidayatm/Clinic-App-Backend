@extends('layouts.app')

@section('title', 'Doctors')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Doctors Management</h1>
                <div class="section-header-button">
                    <a href="{{ route('doctors.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb d-flex justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="#"><i class="fas fa-tachometer-alt"></i>
                                    Home</a></li>
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-id-badge"></i>
                                    Doctors</a></li>
                            <li class="breadcrumb-item"
                                aria-current="page"><i class="fas fa-users"></i>
                                    All Doctor</li>
                        </ol>
                    </nav>
               </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Doctors Management</h2>
                <p class="section-lead">
                    You can manage all Doctors, such as editing, deleting and more.
                </p>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Posts</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-right">
                                    <form method="GET" action="{{ route('doctors.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="name">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr class="text-center">

                                            <th>Name</th>
                                            {{-- <th>Birthday</th> --}}
                                            <th>Email</th>
                                            <th>Phone</th>
                                            {{-- <th>Address</th> --}}
                                            <th>SIP</th>
                                            <th>Spesialist</th>
                                            <th>Photo</th>
                                            {{-- <th>Created At</th> --}}
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($doctors as $doctor)
                                            <tr>
                                                <td>{{ $doctor->doctor_name }}
                                                </td>
                                                {{-- <td>
                                                    {{ $doctor->doctor_birthday }}
                                                </td> --}}
                                                <td>
                                                    {{ $doctor->doctor_email }}
                                                </td>
                                                <td>
                                                    {{ $doctor->doctor_phone }}
                                                </td>
                                                {{-- <td>
                                                    {{ $doctor->doctor_address }}
                                                </td> --}}
                                                <td>
                                                    {{ $doctor->doctor_sip }}
                                                </td>
                                                <td>
                                                    {{ $doctor->doctor_specialist }}
                                                </td>
                                                <td>
                                                    @if ($doctor->doctor_photo)
                                                        <img src="{{ asset('storage/doctors/' . $doctor->doctor_photo) }}" class="card-img-top img-cover" width="100px" alt=""/>
                                                        @else
                                                        <img src="{{ asset('img/default.png') }}" class="card-img-top img-cover" width="100px" alt=""/>
                                                    @endif
                                                </td>
                                                {{-- <td>{{ $doctor->created_at }}</td> --}}
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('doctors.edit', $doctor->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>

                                                        <form action="{{ route('doctors.destroy', [$doctor->id]) }}" method="POST"
{{-- -                                                        <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" --}}
                                                            class="ml-2">
                                                            @method('DELETE')
                                                            @csrf
{{-- -                                                       <input type="hidden" name="_method" value="DELETE" />
-                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" /> --}}
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $doctors->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
