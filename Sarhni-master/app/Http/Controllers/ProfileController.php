<?php

namespace App\Http\Controllers;


use App\Traits\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    use ImageUpload;
    public function edit() {
        $user = Auth::user();
        return view('profile')->with(compact('user'));
    }

    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name'  => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,id,' . Auth::id(),
            'bio'   => 'nullable',
            'image' => 'file|mimes:png,jpg,jpeg|max:4096'
        ]);

        $user = Auth::user();
        $user->name =$request->name;
        $user->email =$request->email;
        $user->bio =$request->bio;
        if ($request->has('image')) {
            $user->image = $this->uploadImage($request->file('image'), 'user-profile', 60);
        }
        $user->save();
        return redirect()->route('profile.edit')->with('success','profile has been updated successfully');
    }
}
