@extends("layouts.index")

@section('haider')
<form action="/search_facture" method="get" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input type="number" name="search" class="form-control bg-light border-0 small" placeholder="Rechercher sur numéro de facture" aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>
<div class="list-choice">
    <div class="list-choice-title">Rechercher par client</div>
    <div class="list-choice-objects"> 
        <label onclick="reload()" class=" w-100">
            <input type="radio" name="client" /> <span >Tous les clients</span>
        </label>
        @foreach($clients as $clien)
        <label class=" w-100">
            <input type="radio" name="client" class="search" onchange="fun(this)" value="{{$clien->id_client}}" /> <span>{{$clien->prenom}} {{$clien->nom}}</span>
        </label>
        @endforeach
    </div>
</div>
@endsection

@section('search')
<li class="nav-item dropdown no-arrow d-sm-none">
    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-search fa-fw"></i>
    </a>
    <!-- Dropdown - Messages -->
    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
        <form class="form-inline mr-auto w-100 navbar-search" action="/search_facture">
            <div class="input-group">
                <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Rechercher sur numéro de facture " aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</li>
@endsection

@section('style')
<style>
    .link {
        text-decoration: none;
        border: 0;
        background-color: transparent;
    }

    .link:hover {
        color: #6c757d;
    }


    .modal-pdf {
        width: 100%;
        height: 80vh;
    }

    .pdf {
        width: 100%;
        height: 100%;
        border: none;
    }

    .iframe {
        height: 245px;
        padding: 0 20px;
        overflow: hidden;
        width: 100%;
        border-radius: 10px;
        border: none;
    }
</style>
@endsection

@section('content')
<section class="row p-1">
    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @foreach($factures as $facture)

    @php($client = DB::table('clients')->where('id_client',$facture->id_client)->first())

    <div class="col-lg-4 col-sm-6 col-xl-3 carde ">
        <input type="hidden" value="{{$client->id_client}}">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="m-0 p-1 card-header  d-flex flex-row align-items-center justify-content-between">
                <div class="m-0 p-0">
                    <button data-toggle="modal" data-target="#view{{$facture->id_facture}}" class="link h6 m-0 font-weight-bold text-primary">
                        @if($facture->statut=="nonpayer")
                        F{{ $facture->nbr_facture }}
                        @else
                        F{{ $facture->nbr_facture }} <span class="ml-3 text-success fs-6">Finalisée</span>
                        @endif
                    </button>
                    <!-- <iframe data-toggle="modal" data-target="#view{{$facture->id_facture}}" id="my-iframe" src="{{ asset('storage/pdf/'.$facture->pdf)}}#toolbar=0&navpanes=0&view=fith" class="iframe" scrolling="no" frameborder="0" type='application/pdf' allowfullscreen>
                    </iframe> -->

                    <br>

                    <a href="/clients/{{$client->id_client}}" class="link h6 mt-1 text-primary d-flex justify-content-center w-100">
                        <span>{{ $client->prenom }} {{ $client->nom }}</span>
                    </a>
                </div>

                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="/factures/{{ $facture->id_facture}}/edit">Modifier</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#popupdel">Supprimer</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#send">Send</a>
                        @if($facture->statut!="payer")
                        <a class="dropdown-item" href="/statut/{{$facture->id_facture}}">Facture est Payer</a>
                        @endif
                    </div>
                </div>

                <!-- modal send facture -->

                <div class="modal fade" id="send" tabindex="-1" role="dialog" aria-labelledby="send" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-body">
                                <form id="contactForm" action="/send" method="post">
                                    @csrf
                                    <!-- Message input-->
                                    <div class="mb-3">
                                        <input type="hidden" name="id" value="{{$facture->id_facture}}">
                                        <label for="message">Message</label>
                                        <textarea class="form-control" id="message" name="message" type="text" placeholder="Enter your message here..." style="height: 10rem" required data-sb-validations="required"></textarea>
                                        <div class="invalid-feedback" data-sb-feedback="message:required">Un message est requis.</div>
                                    </div>
                                    <!-- Submit Button-->
                                    <div class="d-flex modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button class="btn btn-primary" id="submitButton" type="submit">Envoyer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="pb-2">
                    <i class="bi bi-cash text-secondary mr-2 fs-4"></i>
                    <span class="fs-4 text-secondary ">{{ auth()->user()->totalHT($facture) }} DH</span>
                </div>
                <div class=" pb-2">
                    <i class="bi bi-alarm-fill text-secondary mr-2 fs-6"></i>
                    <span class="fs-6 text-secondary">{{$facture->created_at}}</span>
                </div>
            </div>
        </div>
    </div>

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
    </div>

    <div class="modal fade modelpdf " id="view{{$facture->id_facture}}" tabindex="-1" role="dialog" aria-labelledby="view{{$facture->id_facture}}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-pdf m-0 p-0">
                <div class="modal-body p-1">
                    <iframe src="{{ asset('storage/pdf/'.$facture->pdf)}}#toolbar=0&navpanes=0&scrollbar=0" class="pdf" frameborder="0" type='application/pdf' allowfullscreen scrolling="0">
                    </iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    <a href="{{ asset('storage/pdf/'.$facture->pdf)}}" class="btn btn-primary" download>Download</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class=" d-flex justify-content-center">
        {{$factures->links("pagination")}}
    </div>
</section>
@endsection

@section('chart')
<script>
    //   document.querySelector('#my-iframe').scrolling = "no";

    var card = document.getElementsByClassName('carde');

    function reload() {
        for (let i = 0; i < card.length; i++) {
            card[i].style.display = "block"
        }
    }

    function fun(input) {
        var id = input.value;

        for (let i = 0; i < card.length; i++) {
            var input = card[i].getElementsByTagName('input')[0].value;
            if (id != input) {
                card[i].style.display = "none"
            } else {
                card[i].style.display = "block"
            }
        }

    }
</script>
@endsection