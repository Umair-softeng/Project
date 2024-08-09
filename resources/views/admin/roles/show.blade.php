@extends('layouts/contentLayoutMaster')

@section('title', 'Roles Details')

@section('content')
    <div class="content-wrapper ">
        <div class="content-body">
            <section class="app-user-view-account">
                <div class="row">
                    <!-- User Sidebar -->
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12  order-1 order-md-0">
                        <!-- User Card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="user-avatar-section">
                                    <div class="d-flex align-items-center flex-column">
                                        <a class="demo" href="{{asset('images/portrait/small/avatar-s-11.jpg')}}" data-lightbox="gallery">
                                            <img class="img-fluid rounded mt-3 mb-2" src="{{asset('images/portrait/small/avatar-s-11.jpg')}}" height="200" width="200" alt="User Image">
                                        </a>
                                        <div class="user-info text-center">
                                            <h4 class="badge bg-light-primary">{{$role->roleName}}</h4>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="fw-bolder border-bottom pb-50 mb-1">Details</h4>
                                <div class="info-container">
                                    <ul class="list-unstyled">
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Role ID:</span>
                                            <span style="font-weight: bold">{{$role->roleID}}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Role Name:</span>
                                            <span class="badge bg-light-success">{{$role->roleName}}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">Description:</span>
                                            <span class="badge bg-light-success">{{$role->description}}</span>
                                        </li>
                                        <li class="mb-75">
                                            <span class="fw-bolder me-25">User Roles And Privileges:</span>
                                            <table class="table table-bordered mt-1">
                                                <thead>
                                                <tr>
                                                    <th>Modules</th>
                                                    <th colspan="4" class="text-center">Privileges</th>
                                                </tr>
                                                </thead>
                                                @php
                                                    $moduleID = 0;
                                                @endphp
                                                @foreach ($role->privileges as $rolePrivileges)
                                                    @php
                                                        if ($moduleID != $rolePrivileges->moduleID) {
                                                            if ($moduleID != 0) {
                                                                echo '</tr>';
                                                            }
                                                            echo '<tr><td><label style="font-weight:bold">' . $rolePrivileges->modules->moduleName . '</label></td>';
                                                            $moduleID = $rolePrivileges->moduleID;
                                                        }
                                                    @endphp
                                                    <td>{{ $rolePrivileges->privilegeName }}</td>
                                                @endforeach
                                            </table>
                                        </li>
                                    </ul>
                                    @can('roles_create')
                                        <div class="d-flex justify-content-center pt-2">
                                            <a href="{{route('role.edit', $role->roleID)}}"
                                               class="btn btn-primary me-1 waves-effect waves-float waves-light">
                                                Edit
                                            </a>
                                            <form method="post" action="{{route('user.destroy',$role->roleID)}}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                        class="btn btn-outline-danger suspend-user waves-effect">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <!-- /User Card -->
                    </div>
                    <!--/ User Sidebar -->
                </div>
            </section>
        </div>
    </div>
@endsection


