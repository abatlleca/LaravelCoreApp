<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfile;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(){
        return view('profile.show', ['user' => auth()->user()]);
    }

    public function edit(){
        return view('profile.edit', ['user' => auth()->user()]);
    }

    public function update (StoreProfile $request){

        $user = User::findOrFail(auth()->user()->id);
        $validateData = $request->validated();

        $user->fill($validateData);
        $user->save();

        //Add flash message to print the menu has been edited
        $request->session()->flash('status', 'Profile Edited');
        return redirect()->route('profile.show', ['user' => $user->id]);
    }
}
