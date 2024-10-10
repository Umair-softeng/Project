@extends('layouts.contentLayoutMaster')

@section('title', 'Text Editor')
@section('page-style')
    <style>
        .toast-message{
            color: black;
            font-weight: bold;
            font-size: 15px;
            font-family: Montserrat;
        }
        .toast-message a, .toast-message label {
            color: black;
            font-weight: bold;
            font-family: Montserrat;
        }
        .toast-message a:hover {
            color: black;
            font-weight: bold;
            font-family: Montserrat;
            text-decoration: none
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper ">
        <div class="content-body">
            <section class="invoice-list-wrapper">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Text</h4>
                    </div>
                    <div class="card-body mt-2">
                        <form class="dt_adv_search" method="POST">
                            <div class="row g-1 mb-md-1">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                    <label class="form-label">No:</label>
                                    <input type="text" class="form-control dt-input dt-full-name" data-column="1" placeholder="Search By Text No" data-column-index="0">
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                    <label class="form-label">Text:</label>
                                    <input type="text" class="form-control dt-input" data-column="2" placeholder="Search By Text" data-column-index="1">
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                            <div class="card-datatable table-responsive">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <table class="invoice-list-table table dataTable no-footer dtr-column"
                                           id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="No: activate to sort column ascending" aria-sort="descending">#</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Text: activate to sort column ascending">Text</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending">Date</th>
                                            @can('text_create')
                                                <th class="cell-fit sorting_disabled" rowspan="1" colspan="1" style="width: 80px;"
                                                    aria-label="Actions">Actions
                                                </th>
                                            @endcan
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
@section('page-script')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/super-build/ckeditor.js"></script>
    <script>
        var msg = "{{ Session::get('message') }}";
        var exist = "{{ Session::has('message') }}";
        if (exist) {
            if(msg === "Text Added Successfully!!"){
                toastr.success(msg);
            }else if(msg === "Text Deleted Successfully!!"){
                toastr.error(msg);
            }else if(msg === "Text Updated Successfully!!"){
                toastr.info(msg);
            }
        }

        function filterColumn(i, val) {
            if (i == 5) {
                $('.invoice-list-table').dataTable().fnDraw();
            } else {
                $('.invoice-list-table').DataTable().column(i).search(val, false, true).draw();
            }
        }
        $('input.dt-input').on('keyup', function () {
            filterColumn($(this).attr('data-column'), $(this).val());
        });

        function deleteFunction(){
            return confirm('Are you sure you want to delete this?');
        }

        $(function () {
            'use strict';

            var dtInvoiceTable = $('.invoice-list-table'),
                assetPath = '../../../app-assets/';

            if ($('body').attr('data-framework') === 'laravel') {
                assetPath = $('body').attr('data-asset-path');
            }

            // datatable
            if (dtInvoiceTable.length) {
                dtInvoiceTable.DataTable({
                    ajax: "{{route('textEditor.index')}}", // JSON file to add data
                    autoWidth: false,
                    columns: [
                        // columns according to JSON
                        { data: 'textID' },
                        { data: 'text'},
                        { data: 'date'},
                        @can('text_create')
                            { data: 'actions' }
                        @endcan
                    ],
                    columnDefs: [
                        {
                            // Bill ID
                            targets: 0,
                            width: '46px',
                            render: function (data, type, full, meta) {
                                var $invoiceId = full['textID'];
                                // Creates full output for row
                                var $rowOutput = '<a  class="fw-bold" href="textEditor/show/' + $invoiceId + '"> #' + $invoiceId + '</a>';
                                return $rowOutput;
                            }
                        },

                    ],
                    dom:
                        '<"d-flex justify-content-between align-items-center header-actions mx-2 row mt-75"' +
                        '<"col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start" l>' +
                        '<"col-sm-12 col-lg-8 ps-xl-75 ps-0"<"dt-action-buttons d-flex align-items-center justify-content-center justify-content-lg-end flex-lg-nowrap flex-wrap"<"me-1"f>B>>' +
                        '>t' +
                        '<"d-flex justify-content-between mx-2 row mb-1"' +
                        '<"col-sm-12 col-md-6"i>' +
                        '<"col-sm-12 col-md-6"p>' +
                        '>',
                    language: {
                        sLengthMenu: 'Show _MENU_',
                        search: 'Search',
                        searchPlaceholder: 'Search',
                        paginate: {
                            // remove previous & next text from pagination
                            previous: '&nbsp;',
                            next: '&nbsp;'
                        }
                    },
                    buttons: [
                            @can('text_create')
                        {
                            extend: 'collection',
                            className: 'btn btn-outline-secondary dropdown-toggle me-2',
                            text: feather.icons['external-link'].toSvg({class: 'font-small-4 me-50'}) + 'Export',
                            buttons: [
                                {
                                    extend: 'print',
                                    text: feather.icons['printer'].toSvg({class: 'font-small-4 me-50'}) + 'Print',
                                    className: 'dropdown-item',
                                    exportOptions: {columns: [0, 1, 2, 3]}
                                },
                                {
                                    extend: 'csv',
                                    text: feather.icons['file-text'].toSvg({class: 'font-small-4 me-50'}) + 'Csv',
                                    className: 'dropdown-item',
                                    exportOptions: {columns: [0, 1, 2, 3]}
                                },
                                {
                                    extend: 'excel',
                                    text: feather.icons['file'].toSvg({class: 'font-small-4 me-50'}) + 'Excel',
                                    className: 'dropdown-item',
                                    exportOptions: {columns: [0, 1, 2, 3]}
                                },
                                {
                                    extend: 'pdf',
                                    text: feather.icons['clipboard'].toSvg({class: 'font-small-4 me-50'}) + 'Pdf',
                                    className: 'dropdown-item',
                                    exportOptions: {columns: [0, 1, 2, 3]},
                                    pageSize: 'LEGAL',
                                    orientation: 'landscape',
                                    pageMargins: [ 20, 20, 20, 20 ],
                                },
                                {
                                    extend: 'copy',
                                    text: feather.icons['copy'].toSvg({class: 'font-small-4 me-50'}) + 'Copy',
                                    className: 'dropdown-item',
                                    exportOptions: {columns: [0, 1, 2, 3]}
                                }
                            ],
                            init: function (api, node, config) {
                                $(node).removeClass('btn-secondary');
                                $(node).parent().removeClass('btn-group');
                                setTimeout(function () {
                                    $(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex mt-50');
                                }, 50);
                            }
                        },
                        {
                            text: 'Add Text',
                            className: 'add-new btn btn-primary',
                            action: function (){
                                window.location = '{{route('textEditor.create')}}'
                            },
                            init: function (api, node, config) {
                                $(node).removeClass('btn-secondary');
                            }
                        }
                        @endcan
                    ],

                    drawCallback: function () {
                        $(document).find('[data-bs-toggle="tooltip"]').tooltip();
                    }
                });
            }
        });
    </script>
@endsection


