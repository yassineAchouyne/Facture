@extends('layouts.index')

@section('content')
<section>
  <div class="container py-5">

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="{{ asset('storage/avatars/'.$user->avatar) }}" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px; height: 150px;">
            <h5 class="my-3">{{$user->name}}</h5>
            <a href="/profile/{{$user->id}}/edit" type="button" class="btn btn-outline-primary ms-1">Modifier mes Informations</a>
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
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection