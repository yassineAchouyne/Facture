<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients=Client::all() ;
        return view('admin.clients',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Admin.AjouterClient");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client=new Client();
        $client->prenom=$request->prenom;
        $client->nom=$request->nom;
        $client->email=$request->email;

        $client->adresse=$request->adresse;
        $client->codePostal=$request->codePostal;
        $client->ville=$request->ville;
        $client->pays=$request->pays;
        $client->website=$request->website;
        $client->tel=$request->tel;

        $client->id_user=Auth::user()->id;
        
        $client->save();
        return redirect('/clients');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view("admin.modifierClient",compact("client"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $clien= Client::find($client->id_client) ;
        $clien->prenom=$request->prenom;
        $clien->nom=$request->nom;
        $clien->email=$request->email;

        $clien->adresse=$request->adresse;
        $clien->codePostal=$request->codePostal;
        $clien->ville=$request->ville;
        $clien->pays=$request->pays;
        $clien->website=$request->website;
        $clien->tel=$request->tel;
        
        $clien->save();
        return redirect('/clients');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        Client::destroy($client->id_client);
        return redirect("/clients");
    }
}
