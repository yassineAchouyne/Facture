@extends("layouts.index")

@section('haider')
<h2 class="text-primary">{{$client->prenom.' '.$client->nom}}</h2>
@endsection

@section('action')

<li class="dropdown no-arrow mt-4">
    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-ellipsis-v fa-md fa-fw text-gray-400"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="/clients/{{ $client->id_client}}/edit">Modifier</a>
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
                    <form action="/clients/{{$client->id_client}}" method="post">
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
            <span class="text-secondary  col">Adresse email :</span>
            <a href="mailto:{{$client->email}}" class="ml-5  col">{{$client->email}}</a>
        </div>
        <div class="m-2 border-bottom col-lg-6 pb-2 row">
            <span class="text-secondary  col">Numéro de téléphone :</span>
            <a href="tel:{{$client->tel}}" class="ml-5  col">{{$client->tel}}</a>
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
            <span class="text-secondary  col">Site Web :</span>
            <a href="{{$client->website}}" target="_blank" class="ml-5  col">{{$client->website}}</a>
        </div>

    </div>
</section>
@endsection