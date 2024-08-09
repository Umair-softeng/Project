@extends('layouts/contentLayoutMaster')

@section('title', 'Student Show')

@section('content')
    <div class="content-wrapper mt-1">
        <div class="content-body">
            <section class="app-user-view-account">
                <div class="row">
                    <!-- User Sidebar -->
                    <div class="col-sm-12 col-xl-12 col-lg-12 col-md-12 order-1 order-md-0">
                        <!-- User Card -->
                        <div class="card">
                            <div class="card-body">
{{--                                <div class="user-avatar-section">--}}
{{--                                    <div class="row">--}}
{{--                                        @if($complaint->image_names !== null)--}}
{{--                                            <div class="col-md-3"></div>--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <a class="demo" href="{{ asset('storage/uploads/' . $complaint->image_names) }}" data-lightbox="gallery">--}}
{{--                                                    <img class="img-fluid rounded mt-3 mb-2" src="{{ asset('storage/uploads/' . $complaint->image_names) }}" alt="{{ $complaint->image_names }}" style="height: 200px; width: 100%">--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-3"></div>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                                <div class="info-container">
                                    <ul class="list-unstyled">
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Student ID:</span>
                                            <span style="font-weight: bold">{{$student->studentID}}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Name:</span>
                                            <span class="badge btn-primary">{{$student->name}}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Father Name:</span>
                                            <span >{{$student->fatherName}}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Cnic No:</span>
                                            <span class="badge btn-primary">{{$student->cnic}}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Email:</span>
                                            <span class="badge btn-primary">{{$student->email}}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Mobile No:</span>
                                            <span >{{$student->mobileNo}}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Qualification:</span>
                                            <span>{{$student->qualification}}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Degree:</span>
                                            <span>{{$student->degree}}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Passing Year:</span>
                                            <span>{{$student->passingYear}}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Experience:</span>
                                            <span>{{$student->experience}}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Currently Working:</span>
                                            <span>{{$student->CurrentlyWorking}}</span>
                                        </li>
                                    </ul>
                                    @can('student_create')
                                        <div class="d-flex justify-content-center pt-2">
                                            <form method="post" action="{{route('student.destroy',$student->studentID)}}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                        class="btn btn-primary suspend-user waves-effect">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <!-- /User Card -->
                    </div>
                    <!--/ User Sidebar -->
                </div>
            </section>
        </div>
    </div>
@endsection
@section('page-script')
    {{--    <script src = "{{asset(mix('js/scripts/components/components-bs-toast.js'))}}"></script>--}}
    <script>
        $('.select2').each(function () {
            var $this = $(this);
            $this.wrap('<div class="position-relative"></div>');
            $this.select2({
                // the following code is used to disable x-scrollbar when click in select input and
                // take 100% width in responsive also
                dropdownAutoWidth: true,
                width: '100%',
                dropdownParent: $this.parent()
            });
        });
    </script>
@endsection


