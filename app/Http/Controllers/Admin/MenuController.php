<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreMenu;
use App\Menu;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
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
        $menu = new Menu();
        $menu->parent_id = $parent_id;
        $menu->isActive = 1;

        $parents = Menu::orderby('order')
            ->orderby('name')
            ->get();
        $roles = Role::orderby('role_name')
            ->get();
        return view('adminPanel.menus.create', ['parents' => $parents, 'roles' => $roles, 'menu' => $menu]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMenu  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenu $request)
    {
        //validate data
        $validateData = $request->validated();
        $newMenu = Menu::create($validateData);

        $request->session()->flash('status', 'New Menu Created');

        return redirect()->route('adminPanel.menus.show', ['menu' => $newMenu->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $menu = Menu::getSingleMenu($id);
        $parents = Menu::orderby('order')
            ->orderby('name')
            ->get();
        $roles = Role::orderby('role_name')
            ->get();
        return view('adminPanel.menus.edit', ['menu' => $menu, 'parents' => $parents, 'roles' => $roles]);
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