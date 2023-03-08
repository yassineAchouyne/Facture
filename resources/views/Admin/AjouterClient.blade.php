@extends("layouts.index")

@section('content')
<form id="contactForme" class="p-1 m-auto" action="/clients" method="post">
    @csrf
    
    <!-- Email address input-->
    <div class="form-floating mb-3">
        <input class="form-control" id="email" name="email" required type="email" placeholder="name@example.com" data-sb-validations="required,email" />
        <label for="email">Adresse Email</label>
        <div class="invalid-feedback" data-sb-feedback="email:required">Un email est requis.</div>
        <div class="invalid-feedback" data-sb-feedback="email:email">Email n’est pas valide.</div>
    </div>
    <!-- Prénom input-->
    <div class="form-floating mb-3">
        <input class="form-control" id="prenom" name="prenom" required type="text" placeholder="Enter your prenom..." data-sb-validations="required" />
        <label for="prenom">Prénom</label>
        <div class="invalid-feedback" data-sb-feedback="prenom:required">Un nom est requis.</div>
    </div>
    <!-- Name input-->
    <div class="form-floating mb-3">
        <input class="form-control" id="nom" name="nom" required type="text" placeholder="Enter your nom..." data-sb-validations="required" />
        <label for="nom">Nom</label>
        <div class="invalid-feedback" data-sb-feedback="nom:required">Un nom est requis.</div>
    </div>

    <!--Address input-->
    <div class="form-floating mb-3">
        <input class="form-control" id="adresse" name="adresse" type="text" placeholder="Adresse" data-sb-validations="required" />
        <label for="adresse">Adresse</label>
    </div>
    <!--Code Postal input-->
    <div class="form-floating mb-3">
        <input class="form-control" id="codePostal" name="codePostal" type="number" placeholder="code Postal" data-sb-validations="required" />
        <label for="adresse">Code Postal</label>
    </div>
    <!--Ville input-->
    <div class="form-floating mb-3">
        <input class="form-control" id="ville" name="ville" type="text" placeholder="ville" data-sb-validations="required" />
        <label for="ville">Ville</label>
    </div>
    <!--Pays select-->
    <div class="mb-3">
    <label class="ml-3" for="pays">Pays</label>
    <select style="height: 55px;" class="form-control selectpicker countrypicker" value="MA" name="pays"  data-flag="true"></select>
    </div>
     <!--Site Internit input-->
     <div class="form-floating mb-3">
        <input class="form-control" id="site" name="website" type="url" placeholder="Site Internit" data-sb-validations="required" />
        <label for="ville">Site Internet</label>
    </div>
    
    <!-- Phone number input-->
    <div class="form-floating mb-3">
        <input class="form-control" id="phone" type="numbre" name="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
        <label for="phone">Numéro de Téléphone</label>
        <div class="invalid-feedback" data-sb-feedback="phone:required">Un numéro de téléphone est requis.</div>
    </div>
    <!-- Submit Button-->
    <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" type="submit">Créer le client</button></div>
</form>

@endsection