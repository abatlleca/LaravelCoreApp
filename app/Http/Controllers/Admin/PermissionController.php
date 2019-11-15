<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StorePermission;
use App\MagicDoor\Models\Permission;
use App\MagicDoor\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('list', \App\MagicDoor\Models\Permission::class);

        $permissions = Permission::orderby('name')->get();
        return view('adminPanel.permissions.index', ['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', \App\MagicDoor\Models\Permission::class);

        $roles = Role::orderby('name')->get();
        return view('adminPanel.permissions.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePermission $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermission $request)
    {
        $this->authorize('create', \App\MagicDoor\Models\Permission::class);

        $role = Role::findOrFail ($request->input('role_id'));
        $validateData = $request->validated();
        $permission = Permission::create(['name' => $validateData['name']]);
        $role->syncPermissions($permission);

        //Add flash message to print the role has been created
        $request->session()->flash('status', 'Permission Created');

        return redirect()->route('permissions.show', ['id' => $permission->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('show', \App\MagicDoor\Models\Permission::class);

        return view('adminPanel.permissions.show', ['permission' => Permission::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', \App\MagicDoor\Models\Permission::class);

        $roles = Role::orderBy('name')->get();
        return view('adminPanel.permissions.edit', [
            'permission' => Permission::findOrFail($id),
            'roles' => $roles,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePermission $request, $id)
    {
        $this->authorize('update', \App\MagicDoor\Models\Permission::class);

        $permission = Permission::findOrFail ($id);
        $validateData = $request->validated();

        $permission->name($validateData['name']);
        $permission->save();

        $permission->syncRoles($request->input('roles'));

        //Add flash message to print the role has been edited
        $request->session()->flash('status', 'Permission Edited');

        return redirect()->route('permissions.show', ['id' => $permission->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
