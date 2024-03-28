@extends('layouts.app')

@section('title', 'Doctor Schedules')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Doctors Schedule</h1>
                <div class="section-header-button">
                    <a href="{{ route('doctor-schedules.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb d-flex justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="#"><i class="fas fa-tachometer-alt"></i>
                                    Home</a></li>
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-id-badge"></i>
                                    Doctors Schedule</a></li>
                            <li class="breadcrumb-item"
                                aria-current="page"><i class="fas fa-paper-plane"></i>
                                    All Doctors Schedule</li>
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
                <h2 class="section-title">Doctor Schedules</h2>
                <p class="section-lead">
                    You can manage all Doctor Schedules, such as editing, deleting and more.
                </p>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Doctor Schedules</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-right">
                                    <form method="GET" action="{{ route('doctor-schedules.index') }}">
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
                                            <th>Day</th>
                                            <th>Start Time</th>
                                            <th>End End</th>
                                            <th>Status</th>
                                            <th>Note</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($doctorSchedules as $schedule)
                                            <tr>
                                                <td>{{ $schedule->doctor->doctor_name }}
                                                </td>
                                                <td>
                                                    {{ $schedule->day }}
                                                </td>
                                                <td>
                                                    {{ $schedule->start_time }}
                                                </td>
                                                <td>
                                                    {{ $schedule->end_time }}
                                                </td>
                                                <td>
                                                    {{ $schedule->status }}
                                                </td>
                                                <td>
                                                    {{ $schedule->note }}
                                                </td>

                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('doctor-schedules.edit', $schedule->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>

                                                        <form action="{{ route('doctor-schedules.destroy', [$schedule->id]) }}" method="POST"
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
                                    {{ $doctorSchedules->withQueryString()->links() }}
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
