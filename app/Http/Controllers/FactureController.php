<?php

namespace App\Http\Controllers;

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
        return view("admin.facture") ;
    }

    /**
     * Display the specified resource.
     */
    public function show(Facture $facture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facture $facture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facture $facture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facture $facture)
    {
        //
    }
}
