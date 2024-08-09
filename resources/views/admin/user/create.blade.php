@php
    $configData = Helper::applClasses();
@endphp
@extends('layouts/fullLayoutMaster')

@section('title', 'User Create')

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/authentication.css')) }}">
@endsection

@section('content')
    <div class="auth-wrapper auth-cover">
        <div class="auth-inner row m-0">
            <!-- Brand logo-->
            <a class="brand-logo" href="#">
                <svg viewBox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="28">
                    <defs>
                        <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                            <stop stop-color="#000000" offset="0%"></stop>
                            <stop stop-color="#FFFFFF" offset="100%"></stop>
                        </lineargradient>
                        <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                            <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                            <stop stop-color="#FFFFFF" offset="100%"></stop>
                        </lineargradient>
                    </defs>
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                            <g id="Group" transform="translate(400.000000, 178.000000)">
                                <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill: currentColor"></path>
                                <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                            </g>
                        </g>
                    </g>
                </svg>
                <h2 class="brand-text text-primary ms-1">Job Placement Cell</h2>
            </a>
            <!-- /Brand logo-->

            <!-- Left Text-->
            <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                    <img class="img-fluid" src="{{asset('images/pages/register-v2-dark.svg')}}" alt="Register V2" />
                </div>
            </div>
            <!-- /Left Text-->

            <!-- Register-->
            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                    <h2 class="card-title fw-bold mb-1">Welcome Job Placement Cell! 👋</h2>
                    <p class="card-text mb-2">Please create your account and start the adventure</p>
                    <form action="{{route('user.store')}}" class="row gy-1 pt-75 needs-validation" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label class="form-label {{ $errors->has('name') ? 'has-error' : '' }}" for="login-name">User Name</label>
                            <input class="form-control @if($errors->has('name')) is-invalid @endif" value="{{ old('name') }}" id="login-name" type="text" name="name" placeholder="Enter User Name" aria-describedby="login-name" autofocus="" tabindex="1" />
                            @if($errors->has('name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </em>
                            @endif
                        </div>
                        <div>
                            <label class="form-label {{ $errors->has('email') ? 'has-error' : '' }}" for="login-email">Email</label>
                            <input class="form-control @if($errors->has('email')) is-invalid @endif" value="{{ old('email') }}" id="login-email" type="text" name="email" placeholder="john@example.com" aria-describedby="login-email" autofocus="" tabindex="1" />
                            @if($errors->has('email'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </em>
                            @endif
                        </div>
                        <div>
                            <label class="form-label {{ $errors->has('password') ? 'has-error' : '' }}" for="login-email">Password</label>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input class="form-control form-control-merge @if($errors->has('password') || $errors->has('confirmPassword')) is-invalid @endif" value="{{old('password')}}" id="login-password" type="password" name="password" placeholder="············" aria-describedby="login-password" tabindex="2" />
                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                            </div>
                            @if($errors->has('password'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </em>
                            @endif
                        </div>
                        <div class="form-check">
                            @foreach ($roles as $role)
                                <label class="ms-1 me-2 form-check-label @if($errors->has('roleID')) is-invalid @endif">
                                    <input class="form-check-input" type="checkbox" name="roleID[]" value="{{$role->roleID}}"
                                        {{ (is_array(old('roleID')) && in_array($role->roleID, old('roleID'))) ? ' checked' : '' }}
                                    > {{$role->roleName}}
                                </label>
                            @endforeach
                            @if($errors->has('roleID'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('roleID') }}
                                </em>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mt-1">Sign In</button>
                    </form>
                    <p class="text-center mt-2">
                        <span>Already have account?</span>
                        <a href="{{route('login')}}"><span>&nbsp;Sign In</span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendor-script')
    <script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
@endsection

@section('page-script')
    <script src="{{asset('js/scripts/pages/auth-register.js')}}"></script>
@endsection

