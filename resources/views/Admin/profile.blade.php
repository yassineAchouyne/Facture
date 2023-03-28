@extends('layouts.index')

@section('content')
<section>
  <div class="container pt-5">

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-1">
          <div class="card-body text-center">
            <img src="{{ asset('storage/avatars/'.$user->avatar) }}" alt="avatar" class="rounded-circle img-fluid" style="width: 135px; height: 135px;">
            <h5 class="mt-3">{{$user->name}}</h5>
            <a href="/profile/{{$user->id}}/edit" type="button" class="btn btn-outline-primary ">Modifier mes Informations</a>
          </div>
        </div>
      </div>

      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Com Complet</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->name}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->email}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Numéro de Téléphone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->tel}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->adresse}}</p>
              </div>
            </div>

            @if(!$user->societe)
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Code Postal</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$societe->codePostal}}</p>
              </div>
            </div>

            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Ville</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$societe->ville}}</p>
              </div>
            </div>

            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Pays</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$societe->pays}}</p>
              </div>
            </div>

            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">CNIE</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$societe->cnie}}</p>
              </div>
            </div>

            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">ICE</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$societe->ICE}}</p>
              </div>
            </div>

            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">IF</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$societe->IF}}</p>
              </div>
            </div>

            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Taxe</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$societe->taxe}}</p>
              </div>
            </div>

            
            @endif

          </div>
        </div>
      </div>
    </div>
  </div>

  @if($user->societe)

  <div class="container">

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-1">
          <div class="card-body text-center">
            <img src="{{ asset('storage/logo/'.$societe->logo) }}" alt="avatar" class="rounded-circle img-fluid" style="width: 135px; height: 135px;">
            <h5 class="mt-3">{{$societe->nomSociete}}</h5>
            <a href="/form/{{$societe->id}}/edit" type="button" class="btn btn-outline-primary ">Modifier mes Société</a>
          </div>
        </div>
      </div>

      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nom Socéité</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$societe->nomSociete}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$societe->adresse}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Code Postal</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$societe->codePostal}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Fax</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$societe->fax}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Ville</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$societe->ville}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Pays</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$societe->pays}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Site Internit</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$societe->website}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">RC</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$societe->RC}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">IF</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$societe->IF}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Patent</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$societe->patent}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">CNSS</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$societe->cnss}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">ICE</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$societe->ICE}}</p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
</section>
@endsection