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
        @foreach($clients as $clien)
        <label>
            <input type="radio" name="client" id="search"  value="{{$clien->id_client}}" /> <span>{{$clien->prenom}}  {{$clien->nom}}</span>
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
        <form class="form-inline mr-auto w-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Rechercher sur numéro de facture " aria-label="Search" aria-describedby="basic-addon2">
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
    }

    .link:hover {
        color: #6c757d;
    }

    @import url(https://fonts.googleapis.com/css?family=Raleway);

    .list-choice {
        width: 300px;
        margin: 1em auto;
        position: relative;
        cursor: pointer;
    }

    .list-choice input[type="radio"] {
        position: absolute;
        display: none;
    }

    .list-choice-title {
        width: 100%;
        display: block;
        background: #D8D8D8;
        text-align: center;
        padding: 0.55em 1em;
        box-sizing: border-box;
        color: #FFF;
        text-shadow: 0 1px 0 #CACACA;
        border-radius: 0.2em;
    }

    .list-choice:hover .list-choice-title {
        border-radius: 0.2em 0.2em 0 0;
    }

    .list-choice-objects label:nth-last-of-type(1) span {
        border-radius: 0 0 0.2em 0.2em;
    }

    .list-choice input[type="radio"]+span {
        color: #FFF;
        background: #D8D8D8;
        padding: 0.55em 1em;
        display: block;
        text-align: center;
        box-sizing: border-box;
        cursor: pointer;
        /* width: 100%; */
    }

    .list-choice-objects {
        position: absolute;
        top: 0;
        padding-top: 2.8em;
        box-sizing: border-box;
        width: 100%;
        overflow: hidden;
        max-height: 0;
        transition: all 250ms ease;
    }

    .list-choice:hover .list-choice-objects input[type="radio"]+span {
        position: relative;
        top: 0;
        transition: all 250ms ease-in-out;
        width: 300px;
        z-index: 1;
    }

    .list-choice:hover input[type="radio"]+span:hover {
        background: #BBB;
    }

    .list-choice:hover input[type="radio"]:checked+span:hover {
        background: #4e73df;
    }

    .list-choice input[type="radio"]:checked+span {
        background: #4e73df;
        position: absolute;
        top: 0;
        left: 0;
        border-radius: 0.2em;
        width: 100%;
    }

    .list-choice:hover input[type="radio"]:checked+span {
        border-radius: 0;
    }

    .list-choice:hover .list-choice-objects label:nth-last-of-type(1) input[type="radio"]:checked+span {
        border-radius: 0 0 0.2em 0.2em;
    }

    .list-choice:hover .list-choice-objects {
        max-height: 540px;
    }
</style>
@endsection

@section('content')
<section class="row p-1">


    @foreach($factures as $facture)
    <div class="col-lg-4 col-sm-6 col-xl-3">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <div>
                    <a href="/factures/{{$facture->id_facture}}" class="link h6 m-0 font-weight-bold text-primary">
                        @if($facture->statut=="nonpayer")
                        F{{ $facture->nbr_facture }}
                        @else
                        F{{ $facture->nbr_facture }}</a> <span class="ml-3 text-success fs-6">Finalisée</span>
                    @endif
                    </a><br>
                    @php($client = DB::table('clients')->where('id_client',$facture->id_client)->first())
                    <a href="/clients/{{$client->id_client}}" class="link h6 mt-1 text-primary">
                        {{ $client->prenom }} {{ $client->nom }}
                    </a>
                </div>

                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="/factures/{{ $facture->id_facture}}/edit">Modifier</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#popupdel">Supprimer</a>
                        @if($facture->statut!="payer")
                        <a class="dropdown-item" href="/statut/{{$facture->id_facture}}">Facture est Payer</a>
                        @endif
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
        <div id="facture"></div>
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
    @endforeach
</section>
@endsection

@section('chart')
<script>
    $(document).ready(function() {

        fetch_facture_data();

        function fetch_facture_data(query = '') {
            // alert('ok')
            $.ajax({
                url: "/factures",
                method: 'GET',
                data: {
                    query: query
                },
                dataType: 'json',
                success: function(data) {
                    $('#facture').html(data.factures);
                    console.log(data.factures)
                }
            })
        }

        $(document).on('change', '#search', function() {
            var query = $(this).val();
            fetch_facture_data(query);
        });
    });
</script>
@endsection