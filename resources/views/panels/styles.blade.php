<link rel="stylesheet" href="{{ asset(mix('vendors/css/vendors.min.css')) }}" />
<link rel="stylesheet" href="{{asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css'))}}">
<link rel="stylesheet" href="{{asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css'))}}">
<link rel="stylesheet" href="{{asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css'))}}">
<link rel="stylesheet" href="{{asset(mix('vendors/css/pickers/flatpickr/flatpickr.min.css'))}}">
<link rel="stylesheet" href="{{asset(mix('vendors/css/forms/select/select2.min.css'))}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
<link rel="stylesheet" href="{{asset(mix('vendors/css/forms/wizard/bs-stepper.min.css'))}}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/sweetalert2.min.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/animate/animate.min.css')) }}">
<link rel="stylesheet" href="{{asset(mix('css/base/plugins/forms/form-validation.css'))}}">
<link rel="stylesheet" href="{{asset(mix('css/base/plugins/forms/form-wizard.css'))}}">
<link rel="stylesheet" href="{{asset(mix('css/base/pages/modal-create-app.css'))}}">
<link rel="stylesheet" href="{{asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css'))}}">
<link rel="stylesheet" href="{{asset(mix('css/base/plugins/forms/pickers/form-pickadate.css'))}}">
<link rel="stylesheet" href="{{asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css'))}}">

@yield('vendor-style')
<!-- END: Vendor CSS-->
<link rel="stylesheet" href="{{ asset(mix('css/core.css')) }}" />
<link rel="stylesheet" href="{{ asset(mix('css/base/themes/dark-layout.css')) }}" />
<link rel="stylesheet" href="{{ asset(mix('css/base/themes/bordered-layout.css')) }}" />
<link rel="stylesheet" href="{{ asset(mix('css/base/themes/semi-dark-layout.css')) }}" />

<!-- BEGIN: Theme CSS-->
@php $configData = Helper::applClasses(); @endphp

<!-- BEGIN: Page CSS-->
@if ($configData['mainLayoutType'] === 'horizontal')
    <link rel="stylesheet" href="{{ asset(mix('css/base/core/menu/menu-types/horizontal-menu.css')) }}" />
@else
    <link rel="stylesheet" href="{{ asset(mix('css/base/core/menu/menu-types/vertical-menu.css')) }}" />
@endif
{{-- Page Styles --}}
@yield('page-style')
<!-- laravel style -->
<link rel="stylesheet" href="{{ asset(mix('css/overrides.css')) }}" />
<link rel="stylesheet" href="{{asset(mix('css/base/plugins/extensions/ext-component-sweet-alerts.css'))}}">

<!-- BEGIN: Custom CSS-->

@if ($configData['direction'] === 'rtl' && isset($configData['direction']))
    <link rel="stylesheet" href="{{ asset(mix('css-rtl/custom-rtl.css')) }}" />
    <link rel="stylesheet" href="{{ asset(mix('css-rtl/style-rtl.css')) }}" />

@else
    {{-- user custom styles --}}
    <link rel="stylesheet" href="{{ asset(mix('css/style.css')) }}" />
@endif

