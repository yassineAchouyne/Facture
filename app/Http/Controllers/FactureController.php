<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Facture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $factures = DB::table("factures")->where("id_user", Auth::user()->id)->get();
        return view("admin.facture", compact("factures"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = DB::table("clients")->where("id_user", Auth::user()->id)->get();
        return view("admin.ajouterfacture", compact("clients"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $facture=new Facture();
        $facture->id_client = $request->client;
        $facture->dateEmission = $request->dateEmission;
        $facture->dateFin = $request->dateFin;
        $facture->quantite = $request->quantite;
        $facture->prixHT = $request->prixHT;
        $facture->tva = $request->tva;
        $facture->Description = $request->description;
        $facture->modePayment = $request->modePayment;
        $facture->id_user = Auth::user()->id ;

        $facture->save();
        return redirect("/factures") ;
    }

    /**
     * Display the specified resource.
     */
    public function show(Facture $facture)
    {
        $client= Client::find($facture->id_client) ;
        return view("admin.showFacture",compact("facture","client"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facture $facture)
    {
        $clients = DB::table("clients")->where("id_user", Auth::user()->id)->get();
        return view("admin.modifierFacture",compact("facture","clients"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facture $facture)
    {
        $factur=Facture::find($facture->id_facture);
        $factur->id_client = $request->client;
        $factur->dateEmission = $request->dateEmission;
        $factur->dateFin = $request->dateFin;
        $factur->quantite = $request->quantite;
        $factur->prixHT = $request->prixHT;
        $factur->tva = $request->tva;
        $factur->Description = $request->description;
        $factur->modePayment = $request->modePayment;

        $factur->save();
        return redirect("/factures") ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facture $facture)
    {
        Facture::destroy($facture->id_facture);
        return redirect("/factures");
    }
}
