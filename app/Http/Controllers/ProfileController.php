<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view("admin.profile", compact("user"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        return view("admin.modifierUser", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if ($request->hasFile("avatar")) {
            $img = $request->avatar;
            $extention=$img->getClientOriginalExtension();

            $name = Str::slug("Avatar-".$id."-". date("Y-m-d h:i:sa"), '-').'.'.$extention;
            $img->storeAs('avatars', $name, 'public');
            $user->avatar = $name;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->tel = $request->tel;
        $user->adresse = $request->adresse;
        $user->update();
        return redirect("/profile");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
