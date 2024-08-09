@extends('layouts/contentLayoutMaster')

@section('title', 'User Profile')

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-profile.css')) }}">
@endsection

@section('content')
    <div id="user-profile">
        <!-- profile header -->
        <div class="row">
            <div class="col-12">
                <div class="card profile-header mb-2">
                    <!-- profile cover photo -->
                    <img class="card-img-top" src="{{asset('images/profile/user-uploads/timeline.jpg')}}" alt="User Profile Image" />
                    <!--/ profile cover photo -->

                    <div class="position-relative">
                        <!-- profile picture -->
                        <div class="profile-img-container d-flex align-items-center">
                            <div class="profile-img">
                                <img
                                    src="{{asset('images/portrait/small/avatar-s-11.jpg')}}"
                                    class="rounded img-fluid"
                                    alt="Card image"
                                />
                            </div>
                            <!-- profile title -->
                            <div class="profile-title ms-3">
                                <h2 class="text-white">{{$user->name}}</h2>
                                <p class="text-white">@foreach($user->roles as $userRole) {{$userRole->roleName}} @endforeach</p>
                            </div>
                        </div>
                    </div>
                    <div class="profile-header-nav">
                        <!-- navbar -->
                        <nav class="navbar navbar-expand-md navbar-light justify-content-end justify-content-md-between w-100">
                            <button
                                class="btn btn-icon navbar-toggler"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent"
                                aria-expanded="false"
                                aria-label="Toggle navigation"
                            >
                                <i data-feather="align-justify" class="font-medium-5"></i>
                            </button>

                            <!-- collapse  -->
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div class="profile-tabs d-flex justify-content-between flex-wrap mt-1 mt-md-0">
                                    <ul class="nav nav-pills mb-0">
                                        <li class="nav-item">
                                            <a class="nav-link fw-bold active" href="#">
                                                <span class="d-none d-md-block">About</span>
                                                <i data-feather="rss" class="d-block d-md-none"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- edit button -->
                                    <a class="btn btn-primary" href="{{route('user.edit', $user->userID)}}">
                                        <span class="fw-bold d-none d-md-block">Edit</span>
                                    </a>
                                </div>
                            </div>
                            <!--/ collapse  -->
                        </nav>
                        <!--/ navbar -->
                    </div>
                </div>
            </div>
        </div>
        <!--/ profile header -->

        <!-- profile info section -->
        <section id="profile-info">
            <div class="row">
                <!-- left profile info section -->
                <div class="col-lg-12 col-12 order-2 order-lg-1">
                    <!-- about -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-75">Name</h5>
                            <p class="card-text badge badge-glow bg-primary">
                                {{$user->name}}
                            </p>
                            <div class="">
                                <h5 class="mb-75">Roles:</h5>
                                <p class="card-text badge badge-glow bg-primary">@foreach($user->roles as $role) {{$role->roleName}} @endforeach</p>
                            </div>
                            <div class="mt-2">
                                <h5 class="mb-75">Lives:</h5>
                                <p class="card-text">Quetta, Baluchistan</p>
                            </div>
                            <div class="mt-2">
                                <h5 class="mb-75">Email:</h5>
                                <p class="card-text">{{$user->email}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/pages/page-profile.js')) }}"></script>
@endsection
