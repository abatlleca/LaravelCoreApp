<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenu;
use App\Menu;
use App\Role;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::doesntHave('parent')->orderBy('order', 'ASC')->get();

        return view('menus.index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Menu::doesntHave('parent')->get();
        $roles = Role::all();
        return view('menus.create', ['parents' => $parents, 'roles' => $roles]);
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

        return redirect()->route('menus.show', ['menu' => $newMenu->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::findOrFail($id);

        return view('menus.show', ['menu' => $menu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parents = Menu::doesntHave('parent')->get();
        $roles = Role::all();
        return view('menus.edit', ['menu' => Menu::findOrFail($id), 'parents' => $parents, 'roles' => $roles]);
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
        return redirect()->route('menus.show', ['menu' => $menu->id]);
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
