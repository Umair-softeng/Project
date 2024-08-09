@extends('layouts/contentLayoutMaster')

@section('title', 'Role Create')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Add Role Details</h4>
        </div>
        <div class="card-body">
            <form action="{{route('role.store')}}" class="row gy-1 pt-75 needs-validation" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-2 form-group row {{ $errors->has('roleName') ? 'has-error' : '' }}">
                    <label for="roleName" class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2 col-form-label">Role Name:</label>
                    <div class="col-12 col-sm-6 col-md-8 col-lg-10 col-xl-10 col-xxl-10">
                        <input type="text" name="roleName" class="form-control @if($errors->has('roleName')) is-invalid @endif" value="{{ old('roleName') }}" required>
                        @if($errors->has('roleName'))
                            <em class="invalid-feedback">
                                {{ $errors->first('roleName') }}
                            </em>
                        @endif
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="description" class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2 col-form-label">Description: </label>
                    <div class="col-12 col-sm-6 col-md-8 col-lg-10 col-xl-10 col-xxl-10">
                        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <table class="table" @if($errors->has('privilegeID')) style="border:1px solid red;" @endif>
                            <thead>
                            <tr>
                                <th>Modules</th>
                                <th colspan="4">Privileges</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Administrator Access <i class="fa-solid fa-circle-info" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Allows a full access to the system" data-bs-original-title="Allows a full access to the system"></i></td>
                                <td colspan="4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" onchange="allCheckboxes()" type="checkbox" name="selectAll"/>
                                            &nbsp;&nbsp;Select All
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            @php
                                $moduleID = 0;
                            @endphp
                            @foreach($privileges as $privilege)
                                @php
                                    if ($moduleID != $privilege->moduleID) {
                                        if ($moduleID != 0) {
                                            echo '</tr>';
                                        }
                                        echo '<tr><td><label>' . $privilege->modules->moduleName . '</label></td>';
                                        $moduleID = $privilege->moduleID;

                                        }
                                @endphp
                                <td>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="privilegeID[]" value="{{ $privilege->privilegeID }}" @if($errors->has('privilegeID')) is-invalid @endif
                                                {{ (is_array(old('privilegeID')) && in_array($privilege->privilegeID, old('privilegeID'))) ? ' checked' : '' }}
                                            />
                                            &nbsp;&nbsp;{{ $privilege->privilegeName }}
                                        </label>
                                    </div>
                                </td>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                        @if($errors->has('privilegeID'))
                            <em class="text-danger">
                                {{ $errors->first('privilegeID') }}
                            </em>
                        @endif
                    </div>
                </div>
                @can('roles_create')
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light" style="float: right">Submit</button>
                    </div>
                @endcan
            </form>
        </div>
    </div>
@endsection
@section('page-script')
    <script>
        function allCheckboxes(){
            var ele=document.getElementsByName('privilegeID[]');
            if( $(ele).is(':checked') ){
                for(var i=0; i<ele.length; i++){
                    if(ele[i].type=='checkbox')
                        ele[i].checked=false;
                }
            }else {
                for(var i=0; i<ele.length; i++){
                    if(ele[i].type=='checkbox')
                        ele[i].checked=true;
                }
            }

        }
    </script>
@endsection


