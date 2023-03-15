<?php

namespace App\Http\Controllers;

use App\Models\Form_jiridique;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FormJiridiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->societe) {
            $validated = $request->validate([
                'nom' => 'required',
                'adresse' => 'required',
                'codePostal' => 'required',
                'ville' => 'required',
                'RC' => 'required',
                'pays' => 'required',
                'IF' => 'required',
                'patent' => 'required',
                'cnss' => 'required',
                'ICF' => 'required',
                'fax' => 'required',
                'logo' => 'required',
            ]);
        } else {
            $validated = $request->validate([
                'adresse' => 'required',
                'codePostal' => 'required',
                'ville' => 'required',
                'pays' => 'required',
                'IF' => 'required',
                'taxe' => 'required',
                'cnie' => 'required',
                'ICF' => 'required',
            ]);
        }



        $form = new Form_jiridique();
        $user = User::find(Auth::user()->id);
        if ($request->societe) {
            $user->societe = $request->societe;
            $user->update();
            $form->nomSociete = $request->nom;
            $form->adresse = $request->adresse;
            $form->codePostal = $request->codePostal;
            $form->ville = $request->ville;
            $form->pays = $request->pays;
            $form->website = $request->website;
            $form->fax = $request->fax;
            $form->RC = $request->RC;
            $form->IF = $request->IF;
            $form->patent = $request->patent;
            $form->cnss = $request->cnss;
            $form->ICF = $request->ICF;

            if ($request->hasFile("logo")) {
                $img = $request->logo;
                $extention = $img->getClientOriginalExtension();

                $name = Str::slug("Logo-" . date("Y-m-d h:i:sa"), '-') . '.' . $extention;
                $img->storeAs('logo', $name, 'public');
                $form->logo = $name;
            }
        } else {
            $user->societe = $request->societe;
            $user->update();
            $form->adresse = $request->adresse;
            $form->codePostal = $request->codePostal;
            $form->ville = $request->ville;
            $form->pays = $request->pays;
            $form->website = $request->website;
            $form->taxe = $request->taxe;
            $form->IF = $request->IF;
            $form->cnie = $request->cnie;
            $form->ICF = $request->ICF;
        }
        $form->id = Auth::user()->id;

        $form->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Form_jiridique $form_jiridique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Form_jiridique $form_jiridique)
    {
        $societe = Form_jiridique::find(Auth::user()->id);
        return view("admin.ModifierForm", compact('societe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Form_jiridique $form_jiridique)
    {

        $validated = $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'codePostal' => 'required',
            'ville' => 'required',
            'RC' => 'required',
            'pays' => 'required',
            'IF' => 'required',
            'patent' => 'required',
            'cnss' => 'required',
            'ICF' => 'required',
            'fax' => 'required',
        ]);


        $form = Form_jiridique::find(Auth::user()->id);
        $form->nomSociete = $request->nom;
        $form->adresse = $request->adresse;
        $form->codePostal = $request->codePostal;
        $form->ville = $request->ville;
        $form->pays = $request->pays;
        $form->website = $request->website;
        $form->fax = $request->fax;
        $form->RC = $request->RC;
        $form->IF = $request->IF;
        $form->patent = $request->patent;
        $form->cnss = $request->cnss;
        $form->ICF = $request->ICF;

        if ($request->hasFile("logo")) {
            $img = $request->logo;
            $extention = $img->getClientOriginalExtension();

            $name = Str::slug("Logo-" . date("Y-m-d h:i:sa"), '-') . '.' . $extention;
            $img->storeAs('logo', $name, 'public');
            $form->logo = $name;
        }

        $form->update();
        return redirect('/profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Form_jiridique $form_jiridique)
    {
        //
    }
}
