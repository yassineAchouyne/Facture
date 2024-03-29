@extends("layouts.index")

@section('content')
<form id="contactForme" class="p-1 m-auto" action="/clients/{{$client->id_client}}" method="post">
    @csrf
    @method('PATCH')
    <h4 class="text-center">Informations</h4>
    <!-- Email address input-->
    <div class="form-floating mb-3">
        <input class="form-control @error('email') is-invalid @enderror" id="email" value="{{$client->email}}" name="email" required type="email" placeholder="name@example.com" data-sb-validations="required,email" />
        <label for="email">Adresse Email</label>
    </div>
    <!-- Prénom input-->
    <div class="form-floating mb-3">
        <input class="form-control @error('prenom') is-invalid @enderror"  value="{{$client->prenom}}" id="prenom" name="prenom" required type="text" placeholder="Enter your prenom..." data-sb-validations="required" />
        <label for="prenom">Prénom</label>
    </div>
    <!-- Name input-->
    <div class="form-floating mb-3">
        <input class="form-control" id="nom"  value="{{$client->nom}}" name="nom" required type="text" placeholder="Enter your nom..." data-sb-validations="required" />
        <label for="nom">Nom</label>
    </div>

    <h4 class="text-center mt-5">Coordonnées du client</h4>
    <!--Address input-->
    <div class="form-floating mb-3">
        <input class="form-control @error('adresse') is-invalid @enderror" id="adresse" name="adresse" value="{{$client->adresse}}"  type="text" placeholder="Adresse" data-sb-validations="required" />
        <label for="adresse">Adresse</label>
    </div>
    <!--Code Postal input-->
    <div class="form-floating mb-3">
        <input class="form-control @error('codePostal') is-invalid @enderror" id="codePostal" name="codePostal" value="{{$client->codePostal}}"  type="number" placeholder="code Postal" data-sb-validations="required" />
        <label for="codePostal">Code Postal</label>
    </div>
    <!--Ville input-->
    <div class="form-floating mb-3">
        <input class="form-control @error('ville') is-invalid @enderror" id="ville" name="ville" value="{{$client->ville}}"  type="text" placeholder="ville" data-sb-validations="required" />
        <label for="ville">Ville</label>
    </div>
    <!--Pays select-->
    <div class="mb-3">
    <label class="ml-3" for="pays">Pays</label>
    <select class="form-control selectpicker countrypicker" data-default="{{$client->pays}}" name="pays"  data-flag="true"></select>
    </div>
     <!--Site Internit input-->
     <div class="form-floating mb-3">
        <input class="form-control" id="site" name="website" type="url" value="{{$client->website}}"  placeholder="Site Internit" data-sb-validations="required" />
        <label for="ville">Site Internet</label>
    </div>
    
    <!-- Phone number input-->
    <div class="form-floating mb-3">
        <input class="form-control @error('tel') is-invalid @enderror" id="phone" type="numbre" name="tel" value="{{$client->tel}}"  placeholder="(123) 456-7890" data-sb-validations="required" />
        <label for="phone">Numéro de Téléphone</label>
    </div>

    <!-- Submit Button-->
    <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" type="submit">Modifier le client</button></div>
</form>

@endsection