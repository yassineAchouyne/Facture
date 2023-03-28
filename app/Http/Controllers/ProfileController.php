<?php

namespace App\Http\Controllers;

use App\Models\Form_jiridique;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        $societe = Form_jiridique::find(Auth::user()->id);
        return view("admin.profile", compact("user","societe"));
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
        if(auth()->user()->id != $id){
            abort(403);
        }
        $societe = Form_jiridique::find(Auth::user()->id);
        return view("admin.modifierUser", compact("user","societe"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(auth()->user()->id != $id){
            abort(403);
        }
        
        $user = User::find($id);
        $autoEntrep = Form_jiridique::find($id);

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

        $autoEntrep->codePostal = $request->codePostal;
        $autoEntrep->ville = $request->ville;
        $autoEntrep->pays = $request->pays;
        $autoEntrep->cnie = $request->cnie;
        $autoEntrep->ICE = $request->ICE;
        $autoEntrep->IF = $request->IF;
        $autoEntrep->taxe = $request->taxe;
        $autoEntrep->update();

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
