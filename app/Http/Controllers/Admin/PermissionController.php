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
        $role = Role::findOrFail ($request->input('role_id'));
        $validateData = $request->validated();
        $permission = Permission::create(['name' => $validateData['name']]);
        $role->syncPermissions($permission);

        //Add flash message to print the role has been created
        $request->session()->flash('status', 'Permission Created');

        return redirect()->route('adminPanel.permissions.show', ['id' => $permission->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        return view('adminPanel.permissions.edit', ['permission' => Permission::findOrFail($id)]);
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
        $permission = Permission::findOrFail ($id);
        $validateData = $request->validated();


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
