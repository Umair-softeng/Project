@php
    $configData = Helper::applClasses();
@endphp
@extends('layouts/fullLayoutMaster')

@section('title', 'Login Page')

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endsection

@section('content')
    <div class="auth-wrapper auth-cover">
        <div class="auth-inner row m-0">
            <!-- Brand logo-->
            <a class="brand-logo" href="{{route('student.index')}}">
                <h2 class="brand-text ms-1 mt-1" style="color: #0c5531">Job Placement Cell</h2>
            </a>
            <!-- /Brand logo-->

            <!-- Left Text-->
            <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                    <img class="img-fluid" src="{{asset('images/pages/login-v2-dark.svg')}}" alt="Login V2" />
                </div>
            </div>
            <!-- /Left Text-->

            <!-- Login-->
            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                    <h2 class="card-title fw-bold mb-1" style="color: #02502A">Welcome to Job Placement Cell! 👋</h2>
                    <p class="card-text mb-2" style="color: #02502A">Please sign-in to your account and start the adventure</p>
                    <form class="auth-login-form mt-2" action="{{route('login')}}" method="POST" autocomplete="off">
                        @csrf
                        <div class="mb-1">
                            <label class="form-label {{ $errors->has('email') ? 'has-error' : '' }}" for="email">Email</label>
                            <input class="form-control @if($errors->has('email')) is-invalid @endif" value="{{ old('email') }}" id="email" type="email" name="email" placeholder="0000-0000000-0" aria-describedby="email" autofocus="" tabindex="1" />
                            @if($errors->has('email'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </em>
                            @endif
                        </div>
                        <div class="mb-1">
                            <div class="input-group input-group-merge form-password-toggle {{ $errors->has('password') ? 'has-error' : '' }}">
                                <input class="form-control form-control-merge @if($errors->has('password')) is-invalid @endif" id="login-password" type="password" name="password" placeholder="············" aria-describedby="login-password" tabindex="2" />
                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                            </div>
                            @if($errors->has('password'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </em>
                            @endif
                        </div>
                        <button class="btn w-100" tabindex="4" style="background: #02502A; color: white">Sign in</button>
                    </form>
                    <p class="mt-2">
                        <span>New on our platform?</span>
                        <a href="{{route('user.create')}}">
                            <span style="color: #0c5531">&nbsp;<u>Create an account</u></span>
                        </a>
                    </p>
                </div>
            </div>
            <!-- /Login-->
        </div>
    </div>
@endsection

@section('vendor-script')
    <script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script>
@endsection

@section('page-script')
    <script src="{{asset(mix('js/scripts/pages/auth-login.js'))}}"></script>
@endsection
