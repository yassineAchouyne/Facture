@extends("layouts.index")

@section('haider')
<h2 class="text-primary">Facture F{{$facture->id_facture}}</h2>
@endsection

@section('action')

<li class="dropdown no-arrow mt-4 mr-3 ml-3">
    <a class="dropdown-toggle" href="#" role="button">
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
    </div>
    <div class="modal fade" id="popupdel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    Voulez-vous vraiment supprimer ce Fcture ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    <form action="/factures/{{$facture->id_facture}}" method="post">
                        @csrf
                        @method("DELETE")
                        <input class="btn btn-success" type="submit" value="Supprimer" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</li>

@endsection

@section('content')
<section class="m-1">
    <div class="m-2 row">
        <h5 class="pb-2">Informations</h5>
        <div class="m-2 border-bottom col-lg-6 pb-2 row">
            <span class="text-secondary col">Statut :</span>
            <span class="ml-5 col">{{$facture->statut}}</span>
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
            <a href="" class="ml-5 text-decoration-none  col">{{$client->prenom . ' ' . $client->nom }}</a>
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
                <td>TVA</td>
                <td>Total HT</td>
            </tr>
            <tr>
                <td>{{$facture->Description}}</td>
                <td>{{$facture->prixHT}} DH</td>
                <td>{{$facture->quantite}}</td>
                <td>{{$facture->tva}} %</td>
                <td>{{$facture->quantite*$facture->prixHT}} DH</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td class="fw-bold">Total :</td>
                <td class="fw-bold">{{ $facture->quantite* $facture->prixHT*(1+$facture->tva/100) }} DH</td>
            </tr>

        </table>
    </div>
</section>
@endsection