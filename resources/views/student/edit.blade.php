@extends('layouts/contentLayoutMaster')

@section('title', 'Student Edit')

@section('content')
    <div class="card" xmlns="http://www.w3.org/1999/html">
        <div class="card-header row justify-content-between">
            <div class="col-auto">
                <h4 class="card-title">Edit Student Details</h4>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('student.update', $student->studentID)}}" class="row gy-1 pt-75 needs-validation" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4 ">
                        <label for="name" class="col-form-label {{ $errors->has('name') ? 'has-error' : '' }}">Name</label>
                        <input type="text"  name="name" id="name" class="form-control @if($errors->has('name')) is-invalid @endif" placeholder="Enter Quantity" value="{{ old('name', $student->name) }}"/>
                        @if($errors->has('name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </em>
                        @endif
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4 ">
                        <label for="fatherName" class="col-form-label {{ $errors->has('fatherName') ? 'has-error' : '' }}">Father Name</label>
                        <input type="text"  name="fatherName" id="fatherName" class="form-control @if($errors->has('fatherName')) is-invalid @endif" placeholder="Enter Father Name" value="{{ old('fatherName', $student->fatherName) }}"/>
                        @if($errors->has('fatherName'))
                            <em class="invalid-feedback">
                                {{ $errors->first('fatherName') }}
                            </em>
                        @endif
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4 ">
                        <label for="email" class="col-form-label {{ $errors->has('email') ? 'has-error' : '' }}">Email</label>
                        <input type="email"  name="email" id="email" class="form-control @if($errors->has('email')) is-invalid @endif" placeholder="Enter Email" value="{{ old('email', $student->email) }}"/>
                        @if($errors->has('email'))
                            <em class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </em>
                        @endif
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4 ">
                        <label for="cnic" class="col-form-label {{ $errors->has('cnic') ? 'has-error' : '' }}">Cnic</label>
                        <input type="text"  name="cnic" id="cnic" class="cnic form-control @if($errors->has('cnic')) is-invalid @endif" placeholder="Enter Cnic" value="{{ old('cnic', $student->cnic) }}"/>
                        @if($errors->has('cnic'))
                            <em class="invalid-feedback">
                                {{ $errors->first('cnic') }}
                            </em>
                        @endif
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4 ">
                        <label for="mobileNo" class="col-form-label {{ $errors->has('mobileNo') ? 'has-error' : '' }}">Mobile No</label>
                        <input type="text"  name="mobileNo" id="mobileNo" class="mobileNo form-control @if($errors->has('mobileNo')) is-invalid @endif" placeholder="Enter Mobile No" value="{{ old('mobileNo', $student->mobileNo) }}"/>
                        @if($errors->has('mobileNo'))
                            <em class="invalid-feedback">
                                {{ $errors->first('mobileNo') }}
                            </em>
                        @endif
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4 ">
                        <label for="qualification" class="col-form-label {{ $errors->has('qualification') ? 'has-error' : '' }}" >Qualification</label>
                        <select class="form-select select2 @if($errors->has('qualification')) is-invalid @endif" name="qualification" id="qualification">
                            <option value="Matric" {{$student->qualification == "Matric" ? "selected" : ""}}>Matric</option>
                            <option value="FSC/FA" {{$student->qualification == "FSC/FA" ? "selected" : ""}}>FSC/FA</option>
                            <option value="Bachelors" {{$student->qualification == "Bachelors" ? "selected" : ""}}>Bachelors</option>
                            <option value="Masters" {{$student->qualification == "Masters" ? "selected" : ""}}>Masters</option>
                            <option value="PHD" {{$student->qualification == "PHD" ? "selected" : ""}}>PHD</option>
                        </select>
                        @if($errors->has('qualification'))
                            <em class="invalid-feedback">
                                {{ $errors->first('qualification') }}
                            </em>
                        @endif
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4 ">
                        <label for="degree" class="col-form-label {{ $errors->has('degree') ? 'has-error' : '' }}">Degree</label>
                        <input type="degree"  name="degree" id="degree" class="form-control @if($errors->has('degree')) is-invalid @endif" placeholder="Enter Degree" value="{{ old('degree', $student->degree) }}"/>
                        @if($errors->has('degree'))
                            <em class="invalid-feedback">
                                {{ $errors->first('degree') }}
                            </em>
                        @endif
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4 ">
                        <label for="passingYear" class="col-form-label {{ $errors->has('passingYear') ? 'has-error' : '' }}">Passing Year</label>
                        <input type="passingYear"  name="passingYear" id="passingYear" class="form-control @if($errors->has('passingYear')) is-invalid @endif" placeholder="Enter Passing Year" value="{{ old('passingYear', $student->passingYear) }}"/>
                        @if($errors->has('passingYear'))
                            <em class="invalid-feedback">
                                {{ $errors->first('passingYear') }}
                            </em>
                        @endif
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4 ">
                        <label for="experience" class="col-form-label {{ $errors->has('experience') ? 'has-error' : '' }}">Experience</label>
                        <input type="experience"  name="experience" id="experience" class="form-control @if($errors->has('experience')) is-invalid @endif" placeholder="Enter Experience" value="{{ old('experience', $student->experience) }}"/>
                        @if($errors->has('experience'))
                            <em class="invalid-feedback">
                                {{ $errors->first('experience') }}
                            </em>
                        @endif
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4 ">
                        <label for="address" class="col-form-label {{ $errors->has('address') ? 'has-error' : '' }}">Address</label>
                        <textarea type="address"  name="address" id="address" class="form-control @if($errors->has('address')) is-invalid @endif" placeholder="Enter Address" />{{ old('address', $student->address) }}</textarea>
                        @if($errors->has('address'))
                            <em class="invalid-feedback">
                                {{ $errors->first('address') }}
                            </em>
                        @endif
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4 ">
                        <div class="demo-inline-spacing mt-2">
                            <label for="currentlyWorking">Currently Working</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="currentlyWorking" id="inlineRadio1" value="1" >
                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="currentlyWorking" id="inlineRadio2" value="0" checked="">
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                        </div>
                        @if($errors->has('currentlyWorking'))
                            <em class="invalid-feedback">
                                {{ $errors->first('currentlyWorking') }}
                            </em>
                        @endif
                    </div>
                    @can('student_create')
                        <div class="col-12 mt-1">
                            <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light" style="float: right">Update</button>
                        </div>
                    @endcan
                </div>
            </form>
        </div>
    </div>
@endsection
@section('page-script')
    <script>
        select = $('.select2');
        select.each(function () {
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

        var cnic = $('.cnic'),
            mobileNo = $('.mobileNo');
        // Credit Card
        if (cnic.length) {
            cnic.each(function () {
                new Cleave($(this), {
                    blocks: [5, 7, 1],
                    uppercase: true
                });
            });
        }

        if (mobileNo.length) {
            mobileNo.each(function () {
                new Cleave($(this), {
                    blocks: [4, 7],
                    uppercase: true
                });
            });
        }


    </script>
@endsection
