@extends("layouts.index")

@section('load')
    onload="calcPrix()"
@endsection

@section('content')
<form id="contactForme" class="p-1 m-auto" action="/factures/{{$facture->id_facture}}" method="post">
    @csrf
    @method('PATCH')

    <!--Pays select-->
    <div class="mb-3">
        <label class="ml-3" for="client">Client</label>
            <select style="height: 55px;" class="form-control" name="client">
                @foreach($clients as $client)
                <option value="{{$client->id_client}}" >{{$client->prenom}} {{$client->nom}}</option>
                @endforeach
            </select>
    </div>
    <!-- Date d'émission input-->
    <div class="form-floating mb-3">
        <input class="form-control" id="dateEmission" name="dateEmission" value="{{$facture->dateEmission}}" required type="date" placeholder="dateEmission" data-sb-validations="required" />
        <label for="dateEmission">Date d'émission</label>
        <div class="invalid-feedback" data-sb-feedback="dateEmission:required">Un nom est requis.</div>
    </div>
    <!-- Date de fin input-->
    <div class="form-floating mb-3">
        <input class="form-control" id="dateFin" name="dateFin" value="{{$facture->dateFin}}" required type="date" placeholder="dateFin" data-sb-validations="required" />
        <label for="dateFin">Date fin paiement</label>
        <div class="invalid-feedback" data-sb-feedback="dateFin:required">Un nom est requis.</div>
    </div>

    <div class="mt-5"></div>

    <div class="row">

        <!-- Quantité input-->
        <div class="mb-3 col">
            <label for="quantite">Quantité</label>
            <input class="form-control" id="quantite" onkeyup="calcPrix()" value="{{$facture->quantite}}" name="quantite" required type="number" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="quantite:required">Un nom est requis.</div>
        </div>

        <!-- prix input-->
        <div class="mb-3 col">
            <label for="prixHT">Prix Unitaire (MAD)</label>
            <input class="form-control" id="prixHT" name="prixHT" value="{{$facture->prixHT}}" onkeyup="calcPrix()" required type="number" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="prixHT:required">Un nom est requis.</div>
        </div>

        <!-- TVA input-->
        <div class="mb-3 col">
            <label class="ml-3" onkeyup="calcPrix()" for="tva">TVA (%)</label>
            <input class="form-control" id="tva" name="tva" value="{{$facture->tva}}" onkeyup="calcPrix()" required type="number" data-sb-validations="required" />
        </div>
    </div>
    <div class="row">
        <!-- Total HT input-->
        <div class="form-floating mb-3 col">
            <input class="form-control" id="totalHT" disabled value="0" name="prixHT" required type="number" />
            <label for="totalHT">Prix HT (MAD) </label>
        </div>

        <!-- Total ttc input-->
        <div class="form-floating mb-3 col">
            <input class="form-control" id="totalTTC" disabled value="0" name="totalTTC" required type="number" />
            <label for="totalHT">Prix TTC (MAD)</label>
        </div>
    </div>
    <!-- Description input-->
    <div class="form-floating mb-3">
        <textarea class="form-control" id="description" name="description"  type="text" placeholder="description" style="height: 10rem">{{$facture->Description}}</textarea>
        <label for="message">description</label>
    </div>
    <!--Mode payment select-->
    <div class="mb-3">
        <label class="ml-3" for="modePayment">modes de paiement</label>
        <select style="height: 55px;" class="form-control"  data-default="{{$facture->modePayment}}" name="modePayment">
            <option value="Espèces" >Espèces</option>
            <option value="Chèque" >Chèque</option>
            <option value="Carte bancaire" >Carte bancaire</option>
            <option value="PayPal" >PayPal</option>
        </select>
    </div>
    
    <!-- Submit Button-->
    <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" type="submit">Modifier la facture</button></div>
</form>


@endsection

@section('script')
<script>
    function calcPrix(){
    var totalHT = document.getElementById('totalHT');
    var totalTTC=document.getElementById('totalTTC');
    var tva=document.getElementById('tva').value;
    var prixHT=document.getElementById('prixHT').value;
    var quantite=document.getElementById('quantite').value;

    totalHT.value = parseInt(quantite) * parseInt(prixHT)
    totalTTC.value = parseInt(totalHT.value) * parseInt(tva)/100+parseInt(totalHT.value)
}
</script>
@endsection
