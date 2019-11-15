<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\User;
use App\MagicDoor\Models\Role;
use App\MagicDoor\Traits\HasRoles;

use App\Http\Requests\StoreUser;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    use HasRoles;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('list', \App\User::class);

        $users = User::orderby('name')->get();

        return view('adminPanel.users.index', ['users' => $users]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('show', \App\User::class);

        $user = User::findOrFail($id);

        return view('adminPanel.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', \App\User::class);

        $user = User::findOrFail($id);
        $roles = Role::orderby('name')
            ->get();

        return view('adminPanel.users.edit',
            ['user' => $user,
                'roles' => $roles,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StoreUser  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUser $request, $id)
    {
        $this->authorize('update', \App\User::class);

        $user = User::findOrFail($id);
        $validateData = $request->validated();

        $user->fill($validateData);
        $user->save();


        $user->syncRoles($request->input('roles'));
        $user->syncPermissions($request->input('permissions'));

        //Add flash message to print the menu has been edited
        $request->session()->flash('status', 'User Edited');
        return redirect()->route('users.show', ['user' => $user->id]);
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

    public function AuthRouteAPI(Request $request){
        return $request->user();
    }
}
