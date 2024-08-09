@extends('layouts/contentLayoutMaster')

@section('title', 'User Edit')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit User Details</h4>
        </div>
        <div class="card-body">
            <form action="{{route('user.update', $user->userID)}}" class="row gy-1 pt-75 needs-validation" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name" class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2 col-form-label">User Name</label>
                    <div class="col-12 col-sm-6 col-md-8 col-lg-10 col-xl-10 col-xxl-10 mb-2">
                        <input type="text" name="name" class="form-control @if($errors->has('name')) is-invalid @endif" value="{{ old('name', $user->name) }}" placeholder="Enter User Name">
                        @if($errors->has('name'))
                            <em class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </em>
                        @endif
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email" class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2 col-form-label">Email</label>
                    <div class="col-12 col-sm-6 col-md-8 col-lg-10 col-xl-10 col-xxl-10 mb-2">
                        <input type="email" name="email" class="form-control @if($errors->has('email')) is-invalid @endif" value="{{ old('email', $user->email) }}" placeholder="Enter User Email">
                        @if($errors->has('email'))
                            <em class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </em>
                        @endif
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password" class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2 col-form-label">Password</label>
                    <div class="col-12 col-sm-6 col-md-8 col-lg-10 col-xl-10 col-xxl-10 mb-2">
                        <input type="password" name="password" class="form-control @if($errors->has('password') || $errors->has('confirmPassword')) is-invalid @endif" placeholder="Enter User Password" value="{{old('password', $user->password)}}">
                        @if($errors->has('password'))
                            <em class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </em>
                        @endif
                        @if($errors->has('confirmPassword'))
                            <em class="invalid-feedback">
                                {{ $errors->first('confirmPassword') }}
                            </em>
                        @endif
                    </div>
                </div>
                <div class="form-group row {{ $errors->has('roleID') ? 'has-error' : '' }}">
                    <label for="roles" class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 col-xxl-2 col-form-label">Roles</label>
                    <div class="col-12 col-sm-6 col-md-8 col-lg-10 col-xl-10 col-xxl-10 form-check">
                        @foreach ($roles as $role)
                            <label class="mt-2 px-1 form-check-label @if($errors->has('roleID')) is-invalid @endif">
                                <input class="form-check-input" type="checkbox" name="roleID[]" value="{{$role->roleID}}"
                                    {{ (is_array(old('roleID',$userRoles)) && in_array($role->roleID, old('roleID',$userRoles))) ? ' checked' : '' }}
                                > {{$role->roleName}}
                            </label>
                        @endforeach
                        @if($errors->has('roleID'))
                            <em class="invalid-feedback">
                                {{ $errors->first('roleID') }}
                            </em>
                        @endif
                    </div>
                </div>
                @can('user_update')
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light" style="float: right">Update</button>
                    </div>
                @endcan
            </form>
        </div>
    </div>
@endsection
@section('page-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js" integrity="sha512-jTgBq4+dMYh73dquskmUFEgMY5mptcbqSw2rmhOZZSJjZbD2wMt0H5nhqWtleVkyBEjmzid5nyERPSNBafG4GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $("#cnic").inputmask({"mask": "99999-9999999-9"});
    </script>
@endsection


