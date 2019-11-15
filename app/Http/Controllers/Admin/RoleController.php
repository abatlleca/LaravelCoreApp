<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\StoreRole;
use App\MagicDoor\Models\Permission;
use App\MagicDoor\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
//        $this->middleware('isAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('list', \App\MagicDoor\Models\Role::class);

        $roles = Role::orderby('name')->get();
        return view('adminPanel.roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', \App\MagicDoor\Models\Role::class);

        return view('adminPanel.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRole  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRole $request)
    {
        $this->authorize('create', \App\MagicDoor\Models\Role::class);

        //validate data
        $validateData = $request->validated();

        $role = Role::create(['name' => $validateData['name']]);
        $role->save();

        //Add flash message to print the role has been created
        $request->session()->flash('status', 'Role Created');

        return redirect()->route('roles.show', ['id' => $role->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('show', \App\MagicDoor\Models\Role::class);

        return view('adminPanel.roles.show', ['role' => Role::findById($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', \App\MagicDoor\Models\Role::class);

        $permissions = Permission::orderby('name')->get();
        return view('adminPanel.roles.edit', ['role' => Role::findById($id), 'permissions' => $permissions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StoreRole  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRole $request, $id)
    {
        $this->authorize('update', \App\MagicDoor\Models\Role::class);

        $role = Role::findById($id);
        $validateData = $request->validated();

        $role->name($validateData['name']);
        $role->save();

        $role->syncPermissions($request->input('permissions'));

        //Add flash message to print the role has been edited
        $request->session()->flash('status', 'Role Edited');

        return redirect()->route('roles.show', ['id' => $role->id]);
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
