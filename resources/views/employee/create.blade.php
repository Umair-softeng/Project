@extends('layouts/contentLayoutMaster')
@section('title', 'Employee Create')
@section('content')
    <section class="horizontal-wizard">
        <div class="bs-stepper horizontal-wizard-example linear">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                    <div class="bs-stepper-header" role="tablist">
                        <div class="step active" data-target="#employeeDetail" role="tab" id="employeeDetail-trigger">
                            <button type="button" class="step-trigger" aria-selected="true">
                                <span class="bs-stepper-box">1</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Employee Details</span>
                                    <span class="bs-stepper-subtitle">Employee Information</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right font-medium-2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                        <div class="step" data-target="#appointmentDetails" role="tab" id="appointmentDetails-trigger">
                            <button type="button" class="step-trigger" aria-selected="false" disabled="disabled">
                                <span class="bs-stepper-box">2</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Appointments</span>
                                    <span class="bs-stepper-subtitle">Appointments Details</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right font-medium-2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                        <div class="step" data-target="#designation" role="tab" id="designation-trigger">
                            <button type="button" class="step-trigger" aria-selected="false" disabled="disabled">
                                <span class="bs-stepper-box">3</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Designation</span>
                                    <span class="bs-stepper-subtitle">Designation Details</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right font-medium-2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                        <div class="step" data-target="#salary" role="tab" id="salary-trigger">
                            <button type="button" class="step-trigger" aria-selected="false" disabled="disabled">
                                <span class="bs-stepper-box">4</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Salary</span>
                                    <span class="bs-stepper-subtitle">Salary Details</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right font-medium-2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                        <div class="step" data-target="#family" role="tab" id="family-trigger">
                            <button type="button" class="step-trigger" aria-selected="false" disabled="disabled">
                                <span class="bs-stepper-box">5</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Family</span>
                                    <span class="bs-stepper-subtitle">Family Details</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right font-medium-2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                        <div class="step" data-target="#qualification" role="tab" id="qualification-trigger">
                            <button type="button" class="step-trigger" aria-selected="false" disabled="disabled">
                                <span class="bs-stepper-box">6</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Qualification</span>
                                    <span class="bs-stepper-subtitle">Qualification Details</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right font-medium-2"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                        <div class="step" data-target="#bank" role="tab" id="bank-trigger">
                            <button type="button" class="step-trigger" aria-selected="false" disabled="disabled">
                                <span class="bs-stepper-box">7</span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Bank</span>
                                    <span class="bs-stepper-subtitle">Bank Details</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bs-stepper-content">
                <div id="employeeDetail" class="content active dstepper-block" role="tabpanel" aria-labelledby="employeeDetail-trigger">
                    <form id="form1" novalidate="novalidate" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Property Name" value="{{old('name')}}">
                            </div>
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="fatherName">Father Name</label>
                                <input type="text" name="fatherName" id="fatherName" class="form-control" placeholder="Enter Father Name" aria-label="fatherName" value="{{old('fatherName')}}">
                            </div>
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="motherName">Mother Name</label>
                                <input type="text" name="motherName" id="motherName" class="form-control" placeholder="Enter Mother Name" aria-label="motherName" value="{{old('motherName')}}">
                            </div>
                            <div class="mb-1  col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="gender">Select Gender</label>
                                <select class="form-select select2" name="gender" id="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="dob">DOB</label>
                                <input type="text" name="dob" id="dob" class="form-control" placeholder="Enter Father Name" aria-label="dob" value="{{old('dob')}}">
                            </div>
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="dobInWords">DOB (In Words)</label>
                                <input type="text" name="dobInWords" id="dobInWords" class="form-control" placeholder="Enter DOB (In Words)" aria-label="dobInWords" value="{{old('dobInWords')}}">
                            </div>
                            <div class="mb-1  col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="religion">Select Religion</label>
                                <select class="form-select select2" name="religion" id="religion">
                                    <option value="Islam">Islam</option>
                                    <option value="Christianity">Christianity</option>
                                    <option value="Hinduism">Hinduism</option>
                                    <option value="Buddhism">Buddhism</option>
                                    <option value="Judaism">Judaism</option>
                                </select>
                            </div>
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="cnic">Cnic</label>
                                <input type="text" name="cnic" id="cnic" class="form-control cnic" placeholder="00000-0000000-0" aria-label="cnic" value="{{old('cnic')}}">
                            </div>
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="telephoneNo">Telephone No</label>
                                <input type="text" name="telephoneNo" id="telephoneNo" class="form-control telephoneNo" placeholder="000-0000000" aria-label="telephoneNo" value="{{old('telephoneNo')}}">
                            </div>
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="mobileNo">Mobile No</label>
                                <input type="text" name="mobileNo" id="mobileNo" class="form-control mobileNo" placeholder="0000-0000000" aria-label="mobileNo" value="{{old('mobileNo')}}">
                            </div>
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="emergencyContactNo">Emergency Contact No</label>
                                <input type="text" name="emergencyContactNo" id="emergencyContactNo" class="form-control emergencyContactNo" placeholder="0000-0000000" aria-label="emergencyContactNo" value="{{old('emergencyContactNo')}}">
                            </div>
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="emergencyContactName">Emergency Contact Name</label>
                                <input type="text" name="emergencyContactName" id="emergencyContactName" class="form-control emergencyContactName" placeholder="Enter Emergency Contact Name" aria-label="emergencyContactName" value="{{old('emergencyContactName')}}">
                            </div>
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control email" placeholder="Enter Email" aria-label="email" value="{{old('email')}}">
                            </div>
                            <div class="mb-1  col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="wardID">Select Ward</label>
                                <select class="form-select select2" name="wardID" id="wardID">
                                    @foreach($wards as $ward)
                                        <option value="{{$ward->wardID}}" {{old('wardID') == $ward->wardID ? "selected" : ""}}>{{$ward->wardName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="presentAddress">Present Address</label>
                                <textarea type="presentAddress" name="presentAddress" id="presentAddress" class="form-control presentAddress" placeholder="Enter Present Address" aria-label="presentAddress">{{old('presentAddress')}}</textarea>
                            </div>
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="permanentAddress">Permanent Address</label>
                                <textarea type="permanentAddress" name="permanentAddress" id="permanentAddress" class="form-control permanentAddress" placeholder="Enter Present Address" aria-label="permanentAddress">{{old('permanentAddress')}}</textarea>
                            </div>
                        </div>
                    </form>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-outline-secondary btn-prev waves-effect" disabled="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left align-middle me-sm-25 me-0"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button class="btn btn-primary btn-next waves-effect waves-float waves-light">
                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right align-middle ms-sm-25 ms-0"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        </button>
                    </div>
                </div>
                <div id="appointmentDetails" class="content" role="tabpanel" aria-labelledby="appointmentDetails-trigger">
                    <form id="form2" class="invoice-repeater" novalidate="novalidate" method="POST" enctype="multipart/form-data">
                        <div data-repeater-list="invoice">
                            <div data-repeater-item>
                                <div class="row d-flex align-items-end">
                                    <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="departmentName">Department Name</label>
                                            <input type="text" class="form-control" id="departmentName" aria-describedby="departmentName" placeholder="Enter Department Name" />
                                        </div>
                                    </div>

                                    <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="appointment">Appointment</label>
                                            <input type="text" class="form-control" id="appointment" aria-describedby="appointment" placeholder="Enter Appointment" />
                                        </div>
                                    </div>

                                    <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="fromDate">From Date</label>
                                            <input type="date" name="fromDate" id="fp-default" class="form-control" placeholder="YYYY-MM-DD" />
                                        </div>
                                    </div>

                                    <div class="mb-1 col-11 col-sm-11 col-md-11 col-lg-5 col-xl-5 col-xxl-5">
                                        <div class="mb-1">
                                            <label class="form-label" for="toDate">To Date</label>
                                            <input type="date" name="toDate" id="fp-default" class="form-control" placeholder="YYYY-MM-DD" />
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-1 mb-50">
                                        <div class="mb-1">
                                            <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                                <i class="fa-solid fa-xmark"></i>
                                                <span>Delete</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                    <i data-feather="plus" class="me-25"></i>
                                    <span>Add New</span>
                                </button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary btn-prev waves-effect waves-float waves-light">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left align-middle me-sm-25 me-0"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button class="btn btn-primary btn-next waves-effect waves-float waves-light" type="button">
                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right align-middle ms-sm-25 ms-0"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        </button>
                    </div>
                </div>
                <div id="designation" class="content" role="tabpanel" aria-labelledby="designation-trigger">
                    <form id="form3" novalidate="novalidate" method="POST" enctype="multipart/form-data">
                        <div class="row d-flex align-items-end">
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="joinDob">Join Date</label>
                                <input type="date" name="joinDob" id="fp-default" class="form-control flatpickr-basic flatpickr-input active" placeholder="YYYY-MM-DD" />
                            </div>
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="workingDepartment">Working Department</label>
                                <input type="text" name="workingDepartment" id="workingDepartment" class="form-control" placeholder="Enter Working Department" value="{{old('workingDepartment')}}">
                            </div>
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="currentDesignation">Current Designation</label>
                                <input type="text" name="currentDesignation" id="currentDesignation" class="form-control" placeholder="Enter Current Designation" value="{{old('currentDesignation')}}">
                            </div>
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="currentPosting">Current Posting</label>
                                <input type="text" name="currentPosting" id="currentPosting" class="form-control" placeholder="Enter Current Posting" value="{{old('currentPosting')}}">
                            </div>
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="grade">Grade</label>
                                <input type="text" name="grade" id="grade" class="form-control" placeholder="Enter Grade" value="{{old('grade')}}">
                            </div>
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="scale">Scale</label>
                                <input type="text" name="scale" id="scale" class="form-control" placeholder="Enter Scale" value="{{old('scale')}}">
                            </div>
                            <div class="mb-1  col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="gender">Select Job Status</label>
                                <select class="form-select select2" name="gender" id="gender">
                                    <option value="Active">Active</option>
                                    <option value="Terminated">Terminated</option>
                                    <option value="Resigned">Resigned</option>
                                    <option value="Leave">Leave</option>
                                    <option value="Expired">Expired</option>
                                    <option value="Dismissed">Dismissed</option>
                                    <option value="Absent">Absent</option>
                                </select>
                            </div>
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="local/domicile">Select Local/Domicile</label>
                                <select class="form-select select2" name="local/domicile" id="local/domicile">
                                    <option value="Local">Local</option>
                                    <option value="Domicile">Domicile</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary btn-prev waves-effect waves-float waves-light">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left align-middle me-sm-25 me-0"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button class="btn btn-primary btn-next waves-effect waves-float waves-light">
                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right align-middle ms-sm-25 ms-0"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        </button>
                    </div>
                </div>
                <div id="salary" class="content" role="tabpanel" aria-labelledby="salary-trigger">
                    <form id="form4" novalidate="novalidate" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="latLngMapValues" name="latLngMapValues">
                        <div class="row">
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="basicSalary">Basic Salary</label>
                                <input type="number" id="basicSalary" name="basicSalary" class="form-control" placeholder="Enter Basic Salary" value="{{old('basicSalary')}}">
                            </div>
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="allowance">Allowances</label>
                                <input type="number" id="allowance" name="allowance" class="form-control" placeholder="Enter Allowances" value="{{old('allowance')}}">
                            </div>
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="grossSalary">Gross Salary</label>
                                <input type="number" id="grossSalary" name="grossSalary" class="form-control" placeholder="Enter Gross Salary" value="{{old('grossSalary')}}">
                            </div>
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="deductions">Deductions</label>
                                <input type="number" id="deductions" name="deductions" class="form-control" placeholder="Enter Deductions" value="{{old('deductions')}}">
                            </div>
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="netSalary">Net Salary</label>
                                <input type="number" id="netSalary" name="netSalary" class="form-control" placeholder="Enter Net Salary" value="{{old('netSalary')}}">
                            </div>
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="otherPayments">Other Payments</label>
                                <input type="number" id="otherPayments" name="otherPayments" class="form-control" placeholder="Enter Other Payments" value="{{old('otherPayments')}}">
                            </div>
                        </div>
                    </form>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary btn-prev waves-effect waves-float waves-light">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left align-middle me-sm-25 me-0"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button class="btn btn-primary btn-next waves-effect waves-float waves-light">
                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right align-middle ms-sm-25 ms-0"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        </button>
                    </div>
                </div>
                <div id="family" class="content" role="tabpanel" aria-labelledby="family-trigger">
                    <form id="form2" class="invoice-repeater" novalidate="novalidate" method="POST" enctype="multipart/form-data">
                        <div data-repeater-list="invoice">
                            <div data-repeater-item>
                                <div class="row d-flex align-items-end">
                                    <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="familyName">Name</label>
                                            <input type="text" class="form-control" id="familyName" aria-describedby="familyName" placeholder="Enter Name" />
                                        </div>
                                    </div>

                                    <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="familyFatherName">Father Name</label>
                                            <input type="text" class="form-control" id="familyFatherName" aria-describedby="familyFatherName" placeholder="Enter Father Name" />
                                        </div>
                                    </div>

                                    <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="familyMotherName">Mother Name</label>
                                            <input type="text" class="form-control" id="familyMotherName" aria-describedby="familyMotherName" placeholder="Enter Mother Name" />
                                        </div>
                                    </div>

                                    <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="familyDob">DOB</label>
                                            <input type="date" class="form-control" id="familyDob" aria-describedby="familyDob" placeholder="Enter DOB" />
                                        </div>
                                    </div>

                                    <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="familyCnic">Cnic</label>
                                            <input type="date" class="form-control" id="familyCnic" aria-describedby="familyCnic" placeholder="Enter Cnic" />
                                        </div>
                                    </div>

                                    <div class="mb-1  col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                        <label class="form-label" for="relationship">Select Relationship</label>
                                        <select class="form-select select2" name="relationship" id="relationship">
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Brother">Brother</option>
                                            <option value="Sister">Sister</option>
                                            <option value="Uncle">Uncle</option>
                                            <option value="Cousin">Cousin</option>
                                        </select>
                                    </div>

                                    <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="remarks">Remarks</label>
                                            <textarea type="text" class="form-control" id="remarks" aria-describedby="remarks" placeholder="Enter Remarks" ></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-1 mb-50">
                                        <div class="mb-2">
                                            <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                                <i class="fa-solid fa-xmark"></i>
                                                <span>Delete</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                    <i data-feather="plus" class="me-25"></i>
                                    <span>Add New</span>
                                </button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary btn-prev waves-effect waves-float waves-light">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left align-middle me-sm-25 me-0"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button class="btn btn-primary btn-next waves-effect waves-float waves-light" type="button">
                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right align-middle ms-sm-25 ms-0"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        </button>
                    </div>
                </div>
                <div id="qualification" class="content" role="tabpanel" aria-labelledby="qualification-trigger">
                    <form id="form2" class="invoice-repeater" novalidate="novalidate" method="POST" enctype="multipart/form-data">
                        <div data-repeater-list="invoice">
                            <div data-repeater-item>
                                <div class="row d-flex align-items-end">
                                    <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="degree">Degree</label>
                                            <input type="text" class="form-control" id="degree" aria-describedby="degree" placeholder="Enter Degree" />
                                        </div>
                                    </div>

                                    <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="board">Board/Institute</label>
                                            <input type="text" class="form-control" id="board" aria-describedby="board" placeholder="Enter Board/Institute" />
                                        </div>
                                    </div>

                                    <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="year">Year Of Degree</label>
                                            <input type="date" class="form-control" id="year" aria-describedby="year" placeholder="Enter Father Name" />
                                        </div>
                                    </div>

                                    <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="totalMarks">Total Marks</label>
                                            <input type="number" class="form-control" id="totalMarks" aria-describedby="totalMarks" placeholder="Enter Total Marks" />
                                        </div>
                                    </div>

                                    <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                        <div class="mb-1">
                                            <label class="form-label" for="obtainMarks">Obtain Marks</label>
                                            <input type="number" class="form-control" id="obtainMarks" aria-describedby="obtainMarks" placeholder="Enter Obtain Marks" />
                                        </div>
                                    </div>

                                    <div class="mb-1 col-12 col-sm-12 col-md-10 col-lg-4 col-xl-4 col-xxl-4">
                                        <div class="mb-1">
                                            <label class="form-label" for="resultGrade">Result Grade</label>
                                            <input type="text" class="form-control" id="resultGrade" aria-describedby="resultGrade" placeholder="Enter Result Grade" />
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-2 mb-50">
                                        <div class="mb-2">
                                            <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                                <i class="fa-solid fa-xmark"></i>
                                                <span>Delete</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                    <i data-feather="plus" class="me-25"></i>
                                    <span>Add New</span>
                                </button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary btn-prev waves-effect waves-float waves-light">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left align-middle me-sm-25 me-0"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button class="btn btn-primary btn-next waves-effect waves-float waves-light" type="button">
                            <span class="align-middle d-sm-inline-block d-none">Next</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right align-middle ms-sm-25 ms-0"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                        </button>
                    </div>
                </div>
                <div id="bank" class="content" role="tabpanel" aria-labelledby="bank-trigger">
                    <form id="form1" novalidate="novalidate" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="ntnNo">Ntn No</label>
                                <input type="text" name="ntnNo" id="ntnNo" class="form-control" placeholder="Enter Property Name" value="{{old('ntnNo')}}">
                            </div>
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="otherTaxNo">Other Tax No</label>
                                <input type="text" name="otherTaxNo" id="otherTaxNo" class="form-control" placeholder="Enter Other Tax No" aria-label="otherTaxNo" value="{{old('otherTaxNo')}}">
                            </div>
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="bankName">Bank Name (Salary Account)</label>
                                <input type="text" name="bankName" id="bankName" class="form-control" placeholder="Enter Bank Name (Salary Account)" aria-label="bankName" value="{{old('bankName')}}">
                            </div>
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="bankBranch">Bank Branch</label>
                                <input type="text" name="bankBranch" id="bankBranch" class="form-control" placeholder="Enter Bank Branch" aria-label="bankBranch" value="{{old('bankBranch')}}">
                            </div>
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="branchCode">Branch Code</label>
                                <input type="number" name="branchCode" id="branchCode" class="form-control" placeholder="Enter Branch Code" aria-label="branchCode" value="{{old('branchCode')}}">
                            </div>
                            <div class="mb-1 col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                                <label class="form-label" for="accountNo">Account No</label>
                                <input type="number" name="accountNo" id="accountNo" class="form-control" placeholder="Enter Account No" aria-label="accountNo" value="{{old('accountNo')}}">
                            </div>
                        </div>
                    </form>
                    <div class="d-flex justify-content-between">
                        <button class="btn btn-primary btn-prev">
                            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </button>
                        <button class="btn btn-success btn-submit">Submit</button>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('page-script')
    <script>

        $(function () {
            'use strict';

            var cnic = $('.cnic'),
                telephoneNo = $('.telephoneNo'),
                mobileNo = $('.mobileNo'),
                emergencyContactNo = $('.emergencyContactNo');
            // Credit Card
            if (cnic.length) {
                cnic.each(function () {
                    new Cleave($(this), {
                        blocks: [5, 7, 1],
                        uppercase: true
                    });
                });
            }

            if (telephoneNo.length) {
                telephoneNo.each(function () {
                    new Cleave($(this), {
                        blocks: [3, 7],
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

            if (emergencyContactNo.length) {
                emergencyContactNo.each(function () {
                    new Cleave($(this), {
                        blocks: [4, 7],
                        uppercase: true
                    });
                });
            }

            var fromDate = $('.fromDate'),
                toDate = $('.toDate');

            // Default
            if (fromDate.length) {
                fromDate.flatpickr();
            }

            if (toDate.length) {
                toDate.flatpickr();
            }


            //Form Repeater
            $('.invoice-repeater, .repeater-default').repeater({
                show: function () {
                    $(this).slideDown();
                    // Feather Icons
                    if (feather) {
                        feather.replace({ width: 14, height: 14 });
                    }
                },
                hide: function (deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                }
            });

            var bsStepper = document.querySelectorAll('.bs-stepper'),
                select = $('.select2'),
                horizontalWizard = document.querySelector('.horizontal-wizard-example');

            // Adds crossed class
            if (typeof bsStepper !== undefined && bsStepper !== null) {
                for (var el = 0; el < bsStepper.length; ++el) {
                    bsStepper[el].addEventListener('show.bs-stepper', function (event) {
                        var index = event.detail.indexStep;
                        var numberOfSteps = $(event.target).find('.step').length - 1;
                        var line = $(event.target).find('.step');

                        // The first for loop is for increasing the steps,
                        // the second is for turning them off when going back
                        // and the third with the if statement because the last line
                        // can't seem to turn off when I press the first item. ¯\_(ツ)_/¯

                        for (var i = 0; i < index; i++) {
                            line[i].classList.add('crossed');

                            for (var j = index; j < numberOfSteps; j++) {
                                line[j].classList.remove('crossed');
                            }
                        }
                        if (event.detail.to == 0) {
                            for (var k = index; k < numberOfSteps; k++) {
                                line[k].classList.remove('crossed');
                            }
                            line[0].classList.remove('crossed');
                        }
                    });
                }
            }

            // select2
            select.each(function () {
                var $this = $(this);
                $this.wrap('<div class="position-relative"></div>');
                $this.select2({
                    placeholder: 'Select value',
                    dropdownParent: $this.parent()
                });
            });

            // Horizontal Wizard
            // --------------------------------------------------------------------
            if (typeof horizontalWizard !== undefined && horizontalWizard !== null) {
                var numberedStepper = new Stepper(horizontalWizard),
                    $form = $(horizontalWizard).find('form');
                    $form.each(function () {
                        var $this = $(this);
                        $this.validate({
                            rules: {
                                propertyName: {
                                    required: true
                                },
                                address: {
                                    required: true
                                },
                                wardID: {
                                    required: true
                                },
                                landTypeID: {
                                    required: true
                                },
                                totalArea: {
                                    required: true,
                                },
                                numberOfPlots: {
                                    required: true,
                                },
                            }
                        });
                    });

                $(horizontalWizard)
                    .find('.btn-next')
                    .each(function () {
                        $(this).on('click', function (e) {
                            var isValid = $(this).parent().siblings('form').valid();
                            if (isValid) {
                                numberedStepper.next();
                            } else {
                                e.preventDefault();
                            }
                        });
                    });

                $(horizontalWizard)
                    .find('.btn-prev')
                    .on('click', function () {
                        numberedStepper.previous();
                    });

                $(horizontalWizard)
                    .find('.btn-submit')
                    .on('click', function () {
                        var isValid = $(this).parent().siblings('form').valid();
                        if (isValid) {
                            $.ajax({
                                url: "{{route('employee.store')}}",
                                type: "POST",
                                data: $('#form1, #form2, #form3, #form4').serialize(),
                                success: function() {
                                    window.location = "{{route('employee.index')}}"

                                }
                            });
                        }
                    });
            }

        });
    </script>
@endsection


