@extends("layouts.index")

@section('style')
<style>
    .email_link {
        text-decoration: none;
    }

    .email_link:hover {
        color: #6c757d;
    }
</style>
@endsection
@section('content')
<section class="row p-1">
    @foreach($clients as $client)
    <div class="col-lg-4 col-sm-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{$client->prenom}} {{$client->nom}}</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="/clients/{{$client->id_client}}/edit">Modifier</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#popupdel">Supprimer</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Créer une facture</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="pb-2">
                    <i class="bi bi-envelope text-primary mr-2 fs-sm-6"></i>
                    <a href="mailto:{{$client->email}}" class="fs-sm-6 email_link"">{{$client->email}}</a>
            </div>
            <div class=" pb-2">
                        <i class="bi bi-phone text-primary mr-2 fs-6"></i>
                        <a href="tel:{{$client->tel}}" class="fs-6 email_link">{{$client->tel}}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="popupdel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                
                <div class="modal-body">
                    Voulez-vous vraiment supprimer ce client ?
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
    @endforeach
</section>
@endsection