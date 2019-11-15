<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreMenu;
use App\MagicDoor\Models\Permission;
use App\Menu;
use App\MagicDoor\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class MenuController extends Controller
{
    protected $environments = ['admin-panel', 'customer-panel'];
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index()
    {
        $this->authorize('list', \App\Menu::class);

        $menus = Menu::getAllMenus();

        return view('adminPanel.menus.index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($parent_id = 0)
    {
        $this->authorize('create', \App\Menu::class);

        $menu = new Menu();
        $menu->parent_id = $parent_id;
        $menu->isActive = 1;

        $parents = Menu::orderby('order')
            ->orderby('name')
            ->get();
        $roles = Role::orderby('name')
            ->get();
        $permissions = Permission::orderby('name')
            ->get();
        return view('adminPanel.menus.create', [
            'parents' => $parents,
            'roles' => $roles,
            'permissions' => $permissions,
            'menu' => $menu,
            'environments' => $this->environments,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMenu  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenu $request)
    {
        $this->authorize('create', \App\Menu::class);

        //validate data
        $validateData = $request->validated();
        $newMenu = Menu::create($validateData);

        $request->session()->flash('status', 'New Menu Created');

        return redirect()->route('adminPanel.menus.show', ['menu' => $newMenu->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show($id)
    {
        $this->authorize('show', \App\Menu::class);

        $menu = Menu::getSingleMenu($id);

        return view('adminPanel.menus.show', ['menu' => $menu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', \App\Menu::class);

        $menu = Menu::getSingleMenu($id);
        $parents = Menu::orderby('order')
            ->orderby('name')
            ->get();
        $roles = Role::orderby('name')
            ->get();
        $permissions = Permission::orderby('name')
            ->get();
        return view('adminPanel.menus.edit', [
            'parents' => $parents,
            'roles' => $roles,
            'permissions' => $permissions,
            'menu' => $menu,
            'environments' => $this->environments,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreMenu  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMenu $request, $id)
    {
        $this->authorize('update', \App\Menu::class);

        $menu = Menu::findOrFail($id);
        $validateData = $request->validated();

        $menu->fill($validateData);
        $menu->save();

        //Add flash message to print the menu has been edited
        $request->session()->flash('status', 'Menu Edited');
        return redirect()->route('adminPanel.menus.show', ['menu' => $menu->id]);
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
