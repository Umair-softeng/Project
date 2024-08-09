<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Gate;

class UserController extends Controller
{
    public function index(Request $request)
    {

        abort_if(Gate::denies('user_read'), Response::HTTP_FORBIDDEN,'403 Forbidden');
        if ($request->ajax()) {
            $query = User::with(['roles'])->get();
            $table = Datatables::of($query);

            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('name', function ($row) {
                return $row->name;
            });
            $table->addColumn('email', function ($row) {
                return $row->email;
            });

            $table->editColumn('roles', function ($row) {
                foreach ($row->roles as $role) {
                    return $role->roleName;
                }
            });

            $table->rawColumns(['actions','roles']);

            return $table->make(true);
        }

        $breadcrumbs = [
            ['link' => "dashboard/analytics", 'name' => "Home"], ['name' => 'List']
        ];

        return view('admin.user.index', compact('breadcrumbs'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = \App\Models\Role::all()->sortBy('roleName');
        $breadcrumbs = [
            ['link' => "dashboard/analytics", 'name' => "Home"], ['link' => "admin/user", 'name' => "User"], ['name' => 'Details']
        ];
        return view('admin.user.create',compact('roles', 'breadcrumbs'));
    }

    public function store(StoreUserRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->merge([
                'password' => Hash::make($request->password)
            ]);
            $user = User::create($request->all());
            $user->roles()->attach($request->roleID);
            DB::commit();
            return redirect()->route('user.index')->with('message', 'User Added Successfully!!');
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('error', 'An error occurred while adding user!');
        }
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = Role::all()->sortBy('roleName');
        $breadcrumbs = [
            ['link' => "dashboard/analytics", 'name' => "Home"], ['link' => "admin/user", 'name' => "User"], ['name' => 'Details']
        ];
        return view('admin.user.show', compact('user', 'roles', 'breadcrumbs'));
    }


    public function edit(User $user)
    {
        abort_if(Gate::denies('user_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = \App\Models\Role::all()->sortBy('roleName');
        $userRoles = $user->roles->map(function ($item, $key) {
            return $item->roleID;
        })->toArray();
        $breadcrumbs = [
            ['link' => "dashboard/analytics", 'name' => "Home"], ['link' => "admin/user", 'name' => "User"], ['name' => 'Edit']
        ];
        return view('admin.user.edit',compact('user','roles','userRoles', 'breadcrumbs'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        DB::beginTransaction();
        try {
            $newPassword = $user->password;
            if (strlen(trim($request->password))) {
                $newPassword = Hash::make($request->password);
            }
            $request->merge([
                'password' => $newPassword
            ]);
            $user->update($request->all());
            $user->roles()->sync($request->roleID);
            DB::commit();
            return redirect()->route('user.index')->with('message', 'User Updated Successfully!!');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            $request->session()->flash('error', 'An error occurred while updating user!');
        }

        return redirect()->back();
    }

    public function destroy(User $user, Request $request)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        DB::beginTransaction();
        try {
            $user->roles()->detach();
            $user->delete();
            DB::commit();
            return redirect()->route('user.index')->with('message', 'User Deleted Successfully!!');

        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('error', 'An error occurred while deleting user!');
        }

        return redirect()->route('user.index');
    }
}
