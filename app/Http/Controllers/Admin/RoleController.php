<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\StoreRole;
use App\Role;
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
        $roles = Role::orderby('role_name')->get();
        return view('adminPanel.roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //validate data
        $validateData = $request->validated();

        $role = new Role();
        $role->role_name = $request->input('role_name');
        $role->save();

        //Add flash message to print the role has been created
        $request->session()->flash('status', 'Role Created');

        return redirect()->route('adminPanel.roles.show', ['role_name' => $role->role_name]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('adminPanel.roles.show', ['role' => Role::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('adminPanel.roles.edit', ['role' => Role::findOrFail($id)]);
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
        $role = Role::findOrFail($id);
        $validateData = $request->validated();

        $role->fill($validateData);
        $role->save();

        //Add flash message to print the role has been edited
        $request->session()->flash('status', 'Role Edited');

        return redirect()->route('adminPanel.roles.show', ['role_name' => $role->role_name]);
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