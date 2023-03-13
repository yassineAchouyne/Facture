@extends("layouts.index")

@section('haider')
<h2 class="text-primary">Nouvelle client</h2>
@endsection

@section('content')
<!-- <style>
    .btnn{
        color: gray;
    }
    .btnn:hover {
        box-shadow: 1px 1px 5px gray;
        color: gray;
    }
</style> -->
<!-- <div class="p-1 m-auto row" id="contactForme">
    <div id="btnClient" class="col-5  rounded border btn btnn" onclick="ToggleForm('client',this)">
        <div class="d-flex justify-content-center"><i class=" bi bi-person-circle fa-2x"></i></div><br>
        <div class=" text-center ">
            <span class="h6">client sans société</span>
        </div>
    </div>
    <div class="col-2"></div>
    <div id="btnSociete" class="col-5  rounded border btn btnn" onclick="ToggleForm('societe',this)">
        <div class="d-flex justify-content-center"><i class=" bi bi-building fa-2x"></i></div><br>
        <div class=" text-center ">
            <span class="h6">client avec société</span>
        </div>
    </div>
</div> -->

<form id="contactForme" class="p-1 m-auto client" action="/clients" method="post" enctype="multipart/form-data">
    @csrf

    <!-- Email address input-->
    <div class="form-floating mb-3">
        <input class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" id="email" name="email" type="email" placeholder="name@example.com" />
        <label for="email" class="@error('email') text-danger  @enderror">Adresse Email </label>
    </div>
    <!-- Prénom input-->
    <div class="form-floating mb-3">
        <input class="form-control @error('prenom') is-invalid @enderror" value="{{old('prenom')}}" id="prenom" name="prenom" type="text" placeholder="Enter your prenom..." data-sb-validations="required" />
        <label for="prenom" class="@error('prenom') text-danger  @enderror">Prénom </label>
    </div>
    <!-- Name input-->
    <div class="form-floating mb-3">
        <input class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{old('nom')}}" type="text" placeholder="Enter your nom..." data-sb-validations="required" />
        <label for="nom" class="@error('nom') text-danger  @enderror">Nom </label>
    </div>

    <!--Address input-->
    <div class="form-floating mb-3">
        <input class="form-control @error('adresse') is-invalid @enderror" id="adresse" value="{{old('adresse')}}" name="adresse" type="text" placeholder="Adresse" />
        <label for="adresse" class="@error('adresse') text-danger  @enderror">Adresse </label>
    </div>
    <!--Code Postal input-->
    <div class="form-floating mb-3">
        <input class="form-control @error('codePostal') is-invalid @enderror" id="codePostal" value="{{old('codePostal')}}" name="codePostal" type="number" placeholder="code Postal" />
        <label for="codePostal" class="@error('codePostal') text-danger  @enderror">Code Postal </label>
    </div>
    <!--Ville input-->
    <div class="form-floating mb-3">
        <input class="form-control @error('ville') is-invalid @enderror" id="ville" value="{{old('ville')}}" name="ville" type="text" placeholder="ville" />
        <label for="ville" class="@error('ville') text-danger  @enderror">Ville</label>
    </div>
    <!--Pays select-->
    <div class="mb-3">
        <label class="ml-3" for="pays">Pays</label>
        <select style="height: 55px;" class="form-control selectpicker countrypicker" data-live-search="true" data-default="MA" name="pays" data-flag="true"></select>
    </div>
    <!--Site Internit input-->
    <div class="form-floating mb-3">
        <input class="form-control" id="site" name="website" type="url" placeholder="Site Internit" />
        <label for="ville">Site Internet</label>
    </div>

    <!-- Phone number input-->
    <div class="form-floating mb-3">
        <input class="form-control @error('tel') is-invalid @enderror" id="phone" value="{{old('tel')}}" type="numbre" name="tel" placeholder="(123) 456-7890" />
        <label for="phone" class="@error('tel') text-danger  @enderror">Numéro de Téléphone </label>
    </div>
    <!-- avatar input -->
    <div class="mb-3">
        <label for="logo" class="ml-3 @error('logo') text-danger  @enderror">Logo de Client </label>
        <input class="form-control @error('logo') is-invalid @enderror" id="logo" type="file" name="logo" />
    </div>
    <!-- Submit Button-->
    <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" type="submit">Créer le client</button></div>
</form>

@endsection

@section('script')
<script>
    var client = document.getElementsByClassName('client')[0];
    var societe = document.getElementsByClassName('societe')[0];
    var btnClient = document.getElementById('btnClient');
    var btnSociete = document.getElementById('btnSociete');
    // societe.style.display = "none"
    // client.style.display = "none"
    function ToggleForm(form, btn) {

        if (form == "client") {
            client.style.display = "block"
            societe.style.display = "none"
            btn.style.backgroundColor = "#4e73df"
            btnSociete.style.backgroundColor="#fff"
            btnSociete.style.color="gray"
            btn.style.color="#fff"
        } else {
            client.style.display = "none"
            societe.style.display = "block"
            btn.style.backgroundColor = "#4e73df"
            btnClient.style.backgroundColor="#fff"
            btnClient.style.color="gray"
            btn.style.color="#fff"
        }


    }
</script>
@endsection