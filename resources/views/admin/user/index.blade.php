@extends('layouts/contentLayoutMaster')

@section('title', 'User Index')
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
                        <h4 class="card-title">User Search</h4>
                    </div>
                    <div class="card-body mt-2">
                        <form class="dt_adv_search" method="POST">
                            <div class="row g-1 mb-md-1">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                    <label class="form-label">User No:</label>
                                    <input type="text" class="form-control dt-input dt-full-name" data-column="0" placeholder="Search By User ID" data-column-index="0">
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                    <label class="form-label">Name:</label>
                                    <input type="text" class="form-control dt-input" data-column="1" placeholder="Search By User Name" data-column-index="1">
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4">
                                    <label class="form-label">Roles:</label>
                                    <input type="text" class="form-control dt-input" data-column="3" placeholder="Search By Roles" data-column-index="2">
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
                                            <th class="sorting sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 46px;" aria-label="Bill No: activate to sort column ascending" aria-sort="descending">#</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 70px;" aria-label="Contract: activate to sort column ascending">Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 73px;" aria-label="Payment Date: activate to sort column ascending">Email</th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 70px;" aria-label="Status: activate to sort column ascending">Roles</th>
                                            @can('user_create')
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
            if(msg === "User Added Successfully!!"){
                toastr.success(msg);
            }else if(msg === "User Deleted Successfully!!"){
                toastr.error(msg);
            }else if(msg === "User Updated Successfully!!"){
                toastr.info(msg);
            }
        }
        function filterColumn(i, val) {
            if (i == 6) {
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
                assetPath = '../../../app-assets/',
                invoiceAdd = 'app-invoice-add.html',
                invoiceEdit = 'app-invoice-edit.html';

            if ($('body').attr('data-framework') === 'laravel') {
                assetPath = $('body').attr('data-asset-path');
                invoiceAdd = assetPath + 'app/invoice/add';
                invoiceEdit = assetPath + 'app/invoice/edit';
            }

            // datatable
            if (dtInvoiceTable.length) {
                dtInvoiceTable.DataTable({
                    ajax: "{{route('user.index')}}", // JSON file to add data
                    autoWidth: false,
                    columns: [
                        // columns according to JSON
                        { data: 'userID' },
                        { data: 'name'},
                        { data: 'email'},
                        { data: 'roles'},
                            @can('user_create')
                        { data: 'Actions' }
                        @endcan
                    ],
                    columnDefs: [
                        {
                            // Bill ID
                            targets: 0,
                            width: '46px',
                            render: function (data, type, full, meta) {
                                var $invoiceId = full['userID'];
                                // Creates full output for row
                                var $rowOutput = '<a class="fw-bold" href="user/show/' + $invoiceId + '"> #' + $invoiceId + '</a>';
                                return $rowOutput;
                            }
                        },
                        {
                            // Status
                            targets: 3,
                            width: '98px',
                            render: function (data, type, full, meta) {
                                var $status = full['roles'];
                                var $badge_class = 'badge-light-success';
                                return '<span class="badge rounded-pill ' + $badge_class + '" text-capitalized> '+$status+' </span>';

                            }
                        },
                            @can('user_create')
                        {
                            // Actions
                            targets: -1,
                            width: '80px',
                            orderable: false,
                            render: function (data, type, full, meta) {
                                let userShowRoute = "user/show/" + full.userID;
                                let userDeleteShow = "user/" + full.userID;
                                let userEditRoute = "user/" + full.userID + "/edit";
                                return (
                                    '<div class="btn-group">' +
                                    '<a class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">' +
                                    feather.icons['more-vertical'].toSvg({class: 'font-small-4'}) +
                                    '</a>' +
                                    '<div class="dropdown-menu dropdown-menu-end">' +
                                    '<a href="' + userShowRoute + '" class="dropdown-item mb-1 btn btn-success suspend-user waves-effect">' + feather.icons['file-text'].toSvg({class: 'font-small-4 me-50'}) + 'Details</a>' +
                                    '<form method="post" action="'+userDeleteShow+'">' +
                                    '@csrf' +
                                    '@method('delete')' +
                                    '<button class="dropdown-item btn btn-danger suspend-user waves-effect" onclick="return deleteFunction();" type="submit" style="width:100%">' + feather.icons['trash-2'].toSvg({class: 'font-small-4 me-50'}) + 'Delete</button>' +
                                    '</form>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '<a class="item-edit" href="'+userEditRoute+'">' +
                                    feather.icons['edit'].toSvg({ class: 'font-small-4' }) +
                                    '</a>'
                                );
                            }
                        }
                        @endcan
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
                            @can('user_create')
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
                            text: 'Add User',
                            className: 'add-new btn btn-primary',
                            action: function (){
                                window.location = '{{route('user.create')}}'
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


