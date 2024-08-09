<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('vendors/js/vendors.min.js')) }}"></script>
<!-- BEGIN Vendor JS-->
<!-- BEGIN: Page Vendor JS-->
<script src="{{asset(mix('vendors/js/ui/jquery.sticky.js'))}}"></script>

@yield('vendor-script')
<script src="{{asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/tables/datatable/pdfmake.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/tables/datatable/vfs_fonts.js'))}}"></script>
<script src="{{asset(mix('vendors/js/tables/datatable/buttons.html5.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/tables/datatable/buttons.print.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/forms/wizard/bs-stepper.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/forms/select/select2.full.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/forms/validation/jquery.validate.min.js'))}}"></script>
<script src="{{asset(mix('vendors/js/pickers/pickadate/picker.js'))}}"></script>
<script src="{{asset(mix('vendors/js/pickers/pickadate/picker.date.js'))}}"></script>
<script src="{{asset(mix('vendors/js/pickers/pickadate/picker.time.js'))}}"></script>
<script src="{{asset(mix('vendors/js/pickers/flatpickr/flatpickr.min.js'))}}"></script>
<script src="{{ asset(mix('vendors/js/charts/chart.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/cleave/cleave.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/cleave/addons/cleave-phone.us.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/repeater/jquery.repeater.min.js')) }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js" integrity="sha512-Ixzuzfxv1EqafeQlTCufWfaC6ful6WFqIz4G+dWvK0beHw0NVJwvCKSgafpy5gwNqKmgUfIBraVwkKI+Cz0SEQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- BEGIN: Theme JS-->
<script src="{{ asset(mix('js/core/app-menu.js')) }}"></script>
<script src="{{ asset(mix('js/core/app.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>

<!-- custome scripts file for user -->
<script src="{{ asset(mix('js/core/scripts.js')) }}"></script>

@if($configData['blankPage'] === false)
    <script src="{{ asset(mix('js/scripts/customizer.js')) }}"></script>
@endif
<!-- END: Theme JS-->
<!-- BEGIN: Page JS-->
<script src="{{asset(mix('js/scripts/forms/pickers/form-pickers.js'))}}"></script>
@yield('page-script')
<!-- END: Page JS-->
@section('vendor-script')

@endsection
