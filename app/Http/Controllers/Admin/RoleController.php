<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Gate;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('roles_read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($request->ajax()) {
            $query = Role::with('privileges.accessLevel')->get();
            $table = Datatables::of($query);

            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('roleName', function ($row) {
                return $row->roleName;
            });
            // $table->addColumn('description', function ($row) {
            //     return $row->description;
            // });
            $table->addColumn('privileges', function ($row) {
                $privileges = [];
                foreach ($row->privileges as $rolePrivileges) {
                    $privileges[] = sprintf('<span class="badge btn-gradient-info" style="color: black">%s %s</span>', ucwords(strtolower(strtr($rolePrivileges->privilegeCode,'_',' '))),$rolePrivileges->accessLevel->accessLevel);
                }
                return implode(' ', $privileges);
            });


            $table->rawColumns(['actions','privileges']);

            return $table->make(true);
        }
        $breadcrumbs = [
            ['name' => "List"]
        ];
        return view('admin.roles.index', compact('breadcrumbs'));
    }

    public function create()
    {
        abort_if(Gate::denies('roles_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $accessLevels = \App\Models\AccessLevel::all();
        $privileges = \App\Models\Privileges::with(['modules','accessLevel'])->get();
        $breadcrumbs = [
            ['link' => "admin/role", 'name' => "Index"], ['name' => "Create"]
        ];
        return view('admin.roles.create',compact('accessLevels','privileges', 'breadcrumbs'));
    }

    public function store(StoreRoleRequest $request)
    {
        DB::beginTransaction();
        try {
            $role = Role::create($request->all());
            $role->privileges()->attach($request->privilegeID);
            DB::commit();
            return redirect()->route('role.index')->with('message', 'Role Created Successfully!!');
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('error', 'An error occurred while adding role!');
        }

        return view('admin.roles.index');
    }

    public function show(Role $role)
    {
        abort_if(Gate::denies('roles_read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $role = Role::with('privileges.modules')->find($role->roleID);
        $breadcrumbs = [
            ['link' => "admin/role", 'name' => "Index"], ['name' => "Show"]

        ];
        return view('admin.roles.show', compact('role', 'breadcrumbs'));
    }

    public function edit(Role $role)
    {
        abort_if(Gate::denies('roles_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $accessLevels = \App\Models\AccessLevel::all();
        $privileges = \App\Models\Privileges::with(['modules','accessLevel'])->get();
        $rolePrivileges = \App\Models\RolePrivileges::where('roleID', $role->roleID)->get()->map(function ($item, $key) {
            return $item->privilegeID;
        })->toArray();
        $breadcrumbs = [
            ['link' => "admin/role", 'name' => "Index"], ['name' => "Edit"]

        ];
        return view('admin.roles.edit',compact('role','accessLevels','privileges','rolePrivileges', 'breadcrumbs'));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        DB::beginTransaction();
        try {
            $role->update($request->all());
            $role->privileges()->detach();
            $role->privileges()->attach($request->privilegeID);
            DB::commit();
            return redirect()->route('role.index')->with('message', 'Role Updated Successfully!!');
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('error', 'An error occurred while updating role!');
        }

        return redirect()->route('role.index');
    }

    public function destroy(Role $role, Request $request)
    {
        abort_if(Gate::denies('roles_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (count($role->users->toArray()) >= 1) {
            return redirect()->route('role.index')->with('message', 'Role cannot be deleted due to assigned User!!');
        } else {
            DB::beginTransaction();
            try {
                $role->privileges()->detach();
                $role->delete();
                DB::commit();
                return redirect()->route('role.index')->with('message', 'Role Deleted Successfully!!');
            } catch (\Exception $e) {
                DB::rollback();
                $request->session()->flash('error', 'An error occurred while deleting role!');
            }
        }
        return redirect()->route('role.index');
    }
}
