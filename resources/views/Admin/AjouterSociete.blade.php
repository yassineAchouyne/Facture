@extends("layouts.index")

@section('haider')
<h2 class="text-primary">Les information de la Socéité</h2>
@endsection

@section('content')
<form id="contactForme" class="p-1 m-auto client" action="/form" method="post" enctype="multipart/form-data">
    @csrf

    <!-- Name Societe input-->
    <div class="form-floating mb-3">
        <input class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{old('nom')}}" type="text" placeholder="Enter your nom..." data-sb-validations="required" />
        <label for="nom" class="@error('nom') text-danger  @enderror">Nom Sociéité </label>
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

    <!-- fax input-->
    <div class="form-floating mb-3">
        <input class="form-control @error('fax') is-invalid @enderror" id="phone" value="{{old('fax')}}" type="numbre" name="fax" placeholder="(123) 456-7890" />
        <label for="phone" class="@error('fax') text-danger  @enderror">FAX </label>
    </div>
    <!--RC input-->
    <div class="form-floating mb-3">
        <input class="form-control @error('RC') is-invalid @enderror" id="RC" value="{{old('RC')}}" name="RC" type="text" placeholder="RC" />
        <label for="ville" class="@error('RC') text-danger  @enderror">RC</label>
    </div>
    <!--IF input-->
    <div class="form-floating mb-3">
        <input class="form-control @error('IF') is-invalid @enderror" id="IF" value="{{old('IF')}}" name="IF" type="text" placeholder="RC" />
        <label for="ville" class="@error('IF') text-danger  @enderror">IF</label>
    </div>
    <!--patent input-->
    <div class="form-floating mb-3">
        <input class="form-control @error('patent') is-invalid @enderror" id="patent" value="{{old('patent')}}" name="patent" type="text" placeholder="RC" />
        <label for="ville" class="@error('patent') text-danger  @enderror">Patent</label>
    </div>
    <!--cnss input-->
    <div class="form-floating mb-3">
        <input class="form-control @error('cnss') is-invalid @enderror" id="cnss" value="{{old('cnss')}}" name="cnss" type="text" placeholder="RC" />
        <label for="ville" class="@error('cnss') text-danger  @enderror">CNSS</label>
    </div>
    <!--ICF input-->
    <div class="form-floating mb-3">
        <input class="form-control @error('ICF') is-invalid @enderror" id="ICF" value="{{old('ICF')}}" name="ICF" type="text" placeholder="RC" />
        <label for="ville" class="@error('ICF') text-danger  @enderror">ICF</label>
    </div>
    <!-- avatar input -->
    <div class="mb-3">
        <label for="logo" class="ml-3 @error('logo') text-danger  @enderror">Logo de Client </label>
        <input class="form-control @error('logo') is-invalid @enderror" id="logo" type="file" name="logo" />
    </div>
    <!-- Submit Button-->
    <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" type="submit">Enregistrer</button></div>
</form>

@endsection