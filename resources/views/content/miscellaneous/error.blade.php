@php
$configData = Helper::applClasses();
@endphp
@extends('layouts/fullLayoutMaster')

@section('title', 'Error 404')

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-misc.css')) }}">
@endsection
@section('content')
<!-- Error page-->
<div class="misc-wrapper">
  <a class="brand-logo" href="#">

      <h2 class="brand-text ms-1 mt-1" style="color: #02502A;">Placement Cell</h2>
  </a>
  <div class="misc-inner p-2 p-sm-3">
      <div class="w-100 text-center">
          <h2 class="mb-1">Page Not Found 🕵🏻‍♀️</h2>
          <p class="mb-2">Oops! 😖 The requested URL was not found on this server.</p>
          <a class="btn mb-2 btn-sm-block" href="{{url('/')}}" style="background: #02502A; color: white">Back to home</a>
          @if($configData['theme'] === 'dark')
          <img class="img-fluid" src="{{asset('images/pages/error-dark.svg')}}" alt="Error page" />
          @else
          <img class="img-fluid" src="{{asset('images/pages/error.svg')}}" alt="Error page" />
          @endif
    </div>
  </div>
</div>
<!-- / Error page-->
@endsection
