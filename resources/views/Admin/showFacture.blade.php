@extends("layouts.index")

@section('haider')
<h2 class="text-primary">Facture F{{$facture->nbr_facture}}</h2>
@endsection

@section('action')

<li class="dropdown no-arrow mt-4 mr-3 ml-3">
    <a class="dropdown-toggle" href="/send/{{$facture->id_facture}}" role="button">
        <i class="bi bi-envelope-fill fa-md fa-fw text-gray-400"></i>
    </a>
</li>

<li class="dropdown no-arrow mt-4 mr-3 ml-3">
    <a class="dropdown-toggle" href="/pdf/{{$facture->id_facture}}" role="button">
        <i class="bi bi-file-earmark-arrow-down-fill fa-md fa-fw text-gray-400"></i>
    </a>
</li>

<li class="dropdown no-arrow mt-4">
    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-ellipsis-v fa-md fa-fw text-gray-400"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="/factures/{{ $facture->id_facture}}/edit">Modifier</a>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#popupdel">Supprimer</a>
        @if($facture->statut!="payer")
        <a class="dropdown-item" href="/statut/{{$facture->id_facture}}">Facture est Payer</a>
        @endif
    </div>
    <!-- pupup supprimer -->
    <div class="modal fade" id="popupdel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    Voulez-vous vraiment supprimer ce Fcture ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    <form action="/factures/{{$facture->id_facture}}" method="post">
                        @csrf
                        @method("DELETE")
                        <input class="btn btn-success" type="submit" value="Supprimer" />
                    </form>
                </div>
            </div>
        </div>
</li>

@endsection

@section('content')
<section class="m-1">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="m-2 row">
        <h5 class="pb-2">Informations</h5>
        <div class="m-2 border-bottom col-lg-6 pb-2 row">
            <span class="text-secondary col">Statut :</span>
            @if($facture->statut=="payer")
            <span class="ml-5 col badge badge-success">{{$facture->statut}}</span>
            @else
            <span class="ml-5 col badge badge-danger">{{$facture->statut}}</span>
            @endif
        </div>
        <div class="m-2 border-bottom col-lg-6 pb-2 row">
            <span class="text-secondary  col">Créée le :</span>
            <span class="ml-5  col">{{$facture->created_at}}</span>
        </div>
        <div class="m-2 border-bottom col-lg-6 pb-2 row">
            <span class="text-secondary  col">Dernière modification le :</span>
            <span class="ml-5  col">{{$facture->updated_at}}</span>
        </div>
    </div>
    <div class="m-2 row">
        <h5 class="pb-2">Destinataire</h5>
        <div class="m-2 border-bottom col-lg-6 pb-2 row">
            <span class="text-secondary  col">Destinataire :</span>
            <a href="/clients/{{$client->id_client}}" class="ml-5 text-decoration-none  col">{{$client->prenom . ' ' . $client->nom }}</a>
        </div>
        <div class="m-2 border-bottom col-lg-6 pb-2 row">
            <span class="text-secondary  col">Adresse :</span>
            <span class="ml-5  col">{{$client->adresse . ' ' . $client->codePostal. ' ' . $client->ville}}</span>
        </div>
        <div class="m-2 border-bottom col-lg-6 pb-2 row">
            <span class="text-secondary  col">Pays :</span>
            <span class="ml-5  col">{{$client->pays}}</span>
        </div>
        <div class="m-2 border-bottom col-lg-6 pb-2 row">
            <span class="text-secondary  col">Numéro de téléphone :</span>
            <a href="tel:{{$client->tel}}" class="ml-5  col">{{$client->tel}}</a>
        </div>
        <div class="m-2 border-bottom col-lg-6 pb-2 row">
            <span class="text-secondary  col">Adresse email :</span>
            <a href="mailto:{{$client->email}}" class="ml-5  col">{{$client->email}}</a>
        </div>
        <div class="m-2 border-bottom col-lg-6 pb-2 row">
            <span class="text-secondary  col">mode de Payment :</span>
            <span class="ml-5  col">{{$facture->modePayment}}</span>
        </div>
    </div>
    <div class="m-2 row table-responsive">
        <h5 class="pb-2">Détail</h5>
        <table style="min-width: 500px;" class="table">
            <tr>
                <td>Description</td>
                <td>Prix unitaire HT</td>
                <td>Quantité</td>
                <td>Total HT</td>
            </tr>
            @php
            $qtt = json_decode($facture->quantite, true);
            $pr = json_decode($facture->prixHT, true);
            $desc = json_decode($facture->Description, true);
            @endphp

            @foreach($qtt as $i=>$q)
            <tr>
                <td>{{$desc[$i]}}</td>
                <td>{{$pr[$i]}} DH</td>
                <td>{{ $q }}</td>
                <td>{{$q * $pr[$i]}} DH</td>
            </tr>
            @endforeach
            <tr class="  ">
                <td></td>
                <td></td>
                <td class="bg-secondary fw-bold">Total :</td>
                <td class="bg-secondary fw-bold">{{ $function->totalHT($facture) }} DH</td>
            </tr>

        </table>
    </div>
</section>
@endsection