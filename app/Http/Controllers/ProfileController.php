<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user.profile');
    }

    public function update(Request $request)
    {
        $rules = [
            'name' => 'required|string|min:3|max:191',
            'email' => 'required|email|min:3|max:191',
            'password' => 'nullable|string|min:3|max:191',
            'image' => 'nullable|image|max:1999',
        ];

        $request->validate($rules);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('image')) {
            // get image file
            $image = $request->image;
            // get image extension
            $ext = $image->getClientOriginalExtension();
            // make a unique name
            $filename = uniqid() . '.' . $ext;
            // upload the image
            $image->storeAs('public/pics', $filename);
            // delete the previous image
            Storage::delete("public/pics/{$user->image}");
            $user->image = $filename;
        }

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        return redirect()
            ->route('profile.index')
            ->with('status', 'Your profile has been updated!');
    }
}
