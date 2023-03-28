<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Facture;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $factures = DB::table("factures")->where("id_user", Auth::user()->id)->get();
        $clients = DB::table('clients')->where('id_user', Auth::user()->id)->get();
        return view("admin.facture", compact("factures", "clients"));
    }


    public function totalHT($f)
    {
        $qtt = json_decode($f->quantite, true);
        $pr = json_decode($f->prixHT, true);
        $total = 0;
        foreach ($qtt as $i => $q) {
            $total = $total + $q * $pr[$i];
        }
        return $total;
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = DB::table("clients")->where("id_user", Auth::user()->id)->get();
        $idc = 0;
        return view("admin.ajouterfacture", compact("clients", "idc"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $this->validate($request, [
            'client' => 'required',
            'dateEmission' => 'required',
            'dateFin' => 'required',
            'quantite' => 'required',
            'prixHT' => 'required',
        ]);

        $user = User::find(Auth::user()->id);
        $user->nbr_facture = $user->nbr_facture + 1;
        $user->update();

        $facture = new Facture();
        $facture->id_client = $request->client;
        $facture->dateEmission = $request->dateEmission;
        $facture->dateFin = $request->dateFin;
        $facture->quantite = json_encode($request->quantite, JSON_FORCE_OBJECT);
        $facture->prixHT = json_encode($request->prixHT, JSON_FORCE_OBJECT);
        $facture->Description = json_encode($request->description, JSON_FORCE_OBJECT);
        $facture->modePayment = $request->modePayment;
        $facture->id_user = Auth::user()->id;
        $facture->nbr_facture = $user->nbr_facture;
        $facture->note = $request->note;

        $facture->save();

        $latestId = DB::table('factures')->latest()->value('id_facture');
        return redirect("/pdf/$latestId");
    }

    /**
     * Display the specified resource.
     */
    public function show(Facture $facture)
    {
        if(auth()->user()->id != $facture->id_user){
            abort(403);
        }
        $client = Client::find($facture->id_client);
        $function = $this;
        return view("admin.showFacture", compact("facture", "client", "function"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facture $facture)
    {
        if(auth()->user()->id != $facture->id_user){
            abort(403);
        }
        $clients = DB::table("clients")->where("id_user", Auth::user()->id)->get();
        return view("admin.modifierFacture", compact("facture", "clients"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facture $facture)
    {
        if(auth()->user()->id != $facture->id_user){
            abort(403);
        }

        $factur = Facture::find($facture->id_facture);
        $factur->id_client = $request->client;
        $factur->dateEmission = $request->dateEmission;
        $factur->dateFin = $request->dateFin;
        $factur->quantite = json_encode($request->quantite, JSON_FORCE_OBJECT);
        $factur->prixHT = json_encode($request->prixHT, JSON_FORCE_OBJECT);
        $factur->Description = json_encode($request->description, JSON_FORCE_OBJECT);
        $factur->modePayment = $request->modePayment;
        $factur->note = $request->note;

        $factur->update();
        return redirect("/pdf/$facture->id_facture");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facture $facture)
    {
        if(auth()->user()->id != $facture->id_user){
            abort(403);
        }
        Facture::destroy($facture->id_facture);
        return redirect("/factures");
    }
}
