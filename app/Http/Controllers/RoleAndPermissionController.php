<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionController extends Controller
{
    public function index()
    {
        $data = [
            'roles' => Role::all(),
        ];

        return  view('role.index', $data);
    }

    public function create()
    {
        return view('role.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'guard_name' => 'web',
        ];

        $role_created = Role::create($data);
        if($role_created){
            return back()->with('success' , 'Role has been created');
        } else{
            return back()->with('success' , 'Role has failed to create');
        }
    }

    public function edit(Role $role)
    {
        $data = [
            'role' => $role,
        ];
        return view('role.edit', $data);
    }

    public function update(Request $request, Role $role)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'guard_name' => 'web',
        ];

        $role_updated = Role::find($role->id)->update($data);
        if($role_updated){
            return back()->with('success' , 'Role has been updated');
        } else{
            return back()->with('success' , 'Role has failed to update');
        }
    }


    // Permission function

    public function permission_index()
    {
        $data = [
            'permissions' => Permission::paginate(15),
        ];

        return  view('permission.index', $data);
    }

    public function permission_create()
    {
        return view('permission.create');
    }

    public function permission_store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'guard_name' => 'web',
        ];

        $permission_created = Permission::create($data);
        if($permission_created){
            return back()->with('success' , 'Permission has been created');
        } else{
            return back()->with('success' , 'Permission has failed to create');
        }
    }

    public function permission_edit(Permission $permission)
    {
        $data = [
            'permission' => $permission,
        ];
        return view('permission.edit', $data);
    }

    public function permission_update(Request $request, Permission $permission)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'guard_name' => 'web',
        ];

        $permission_updated = Permission::find($permission->id)->update($data);
        if($permission_updated){
            return back()->with('success' , 'permission has been updated');
        } else{
            return back()->with('success' , 'permission has failed to update');
        }
    }

    public function assign_permissions_view(Role $role)
    {
        $role = Role::with('permissions')->where('id',$role->id)->first();

        $role_permissions = [];

        foreach ($role->permissions as $permission) {

            $role_permissions[] = $permission->id;
        }
        $data = [
            'role' => $role,
            'role_permissions' => $role_permissions ,
            'permissions' => Permission::all(),
        ];

        return  view('role.assign_permissions', $data);
    }

    public function assign_permissions(Request $request, Role $role)
    {
        $request->validate([
            'permissions' => 'required',
        ]);

        foreach ($request->permissions as $permission) {
            $permission = Permission::find($permission);
            $role->givePermissionTo($permission);
        }

        return back()->with('success' , 'Permissions Updated');
    }
}
