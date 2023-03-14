@extends("layouts.index")

@section('style')

<style>
    .buttonadd{
        position: relative;
    }
    .buttonadd>button{
        position: absolute;
        right: 0;
        z-index: 1;
        bottom: 0;
    }
    hr{
        height:2px;border-width:0;color:gray;background-color:gray;
    }
</style>

@endsection

@section('haider')
<h2 class="text-primary">Nouvelle facture</h2>
@endsection

@section('content')
<form id="contactForme" class="p-1 m-auto" action="/factures" method="post">
    @csrf

    <!--Pays select-->
    <div class="mb-3">
        <label class="ml-3" for="client">Client</label>
        @if(count($clients) <= 0) <br><a class="btn btn-primary" href="/clients/create">Ajouter un client</a>
            @else
            <select style="height: 55px;" class="form-control" name="client">
                @foreach($clients as $client)
                <option value="{{$client->id_client}}" {{ $client->id_client == $idc ? 'selected' : '' }}>{{$client->prenom}} {{$client->nom}}</option>
                @endforeach
            </select>
            @endif
    </div>
    <!-- Date d'émission input-->
    <div class="form-floating mb-3">
        <input class="form-control" id="dateEmission" name="dateEmission" value="{{date('Y-m-d')}}" required type="date" placeholder="dateEmission" data-sb-validations="required" />
        <label for="dateEmission">Date d'émission</label>
        <div class="invalid-feedback" data-sb-feedback="dateEmission:required">Un nom est requis.</div>
    </div>
    <!-- Date de fin input-->
    <div class="form-floating mb-3">
        <input class="form-control" id="dateFin" name="dateFin" value="{{date('Y-m-d',strtotime('+30 day',strtotime(date('Y-m-d'))))}}" required type="date" placeholder="dateFin" data-sb-validations="required" />
        <label for="dateFin">Date fin paiement</label>
        <div class="invalid-feedback" data-sb-feedback="dateFin:required">Un nom est requis.</div>
    </div>

    <div class="mt-5"></div>

    <div id="dynamicadd">
        <div class="buttonadd">
            <button type="button" id="add" class="btn btn-success">+</button>
            <div class="row">

                <!-- Quantité input-->
                <div class="mb-3 col">
                    <label for="quantite">Quantité</label>
                    <input class="form-control" id="quantite" onkeyup="calcPrix()" value="0" name="quantite[0]['quantite']" required type="number" data-sb-validations="required" />
                    <div class="invalid-feedback" data-sb-feedback="quantite:required">Un nom est requis.</div>
                </div>

                <!-- prix input-->
                <div class="mb-3 col">
                    <label for="prixHT">Prix Unitaire (MAD)</label>
                    <input class="form-control" id="prixHT" name="prixHT[0][prixHT]" value="0" onkeyup="calcPrix()" required type="number" data-sb-validations="required" />
                    <div class="invalid-feedback" data-sb-feedback="prixHT:required">Un nom est requis.</div>
                </div>

                <!-- TVA input-->
                <div class="mb-3 col">
                    <label class="ml-3" onkeyup="calcPrix()" for="tva">TVA (%)</label>
                    <input class="form-control" id="tva" name="tva[0]['tva']" value="0" onkeyup="calcPrix()" required type="number" data-sb-validations="required" />
                </div>
            </div>
            <div class="row">
                <!-- Total HT input-->
                <div class="form-floating mb-3 col">
                    <input class="form-control" id="totalHT" disabled value="0" name="totalHT[0]['totalHT']" required type="number" />
                    <label for="totalHT">Prix HT (MAD) </label>
                </div>

                <!-- Total ttc input-->
                <div class="form-floating mb-3 col">
                    <input class="form-control" id="totalTTC" disabled value="0" name="totalTTC[0]['totalTTC']" required type="number" />
                    <label for="totalHT">Prix TTC (MAD)</label>
                </div>
            </div>
            <!-- Description input-->
            <div class="form-floating mb-3">
                <textarea class="form-control" id="description" name="description[0][description]" type="text" placeholder="description" style="height: 5rem"></textarea>
                <label for="message">description</label>
            </div>
        </div>
    </div>
    <!--Mode payment select-->
    <div class="mb-3">
        <label class="ml-3" for="modePayment">modes de paiement</label>
        <select style="height: 55px;" class="form-control" name="modePayment">
            <option value="Espèces">Espèces</option>
            <option value="Chèque">Chèque</option>
            <option value="Carte bancaire">Carte bancaire</option>
            <option value="PayPal">PayPal</option>
        </select>
    </div>

    <!-- Submit Button-->
    <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" type="submit">Créer la facture</button></div>
</form>


@endsection

@section('script')
<script>
    function calcPrix() {
        
        var totalHT = document.getElementById('totalHT');
        var totalTTC = document.getElementById('totalTTC');
        var tva = document.getElementById('tva').value;
        var prixHT = document.getElementById('prixHT').value;
        var quantite = document.getElementById('quantite').value;

        totalHT.value = parseInt(quantite) * parseInt(prixHT)
        totalTTC.value = parseInt(totalHT.value) * parseInt(tva) / 100 + parseInt(totalHT.value)
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var i = 0;
        $('#add').click(function() {
            //alert('ok');
            i++;
            $('#dynamicadd').append('<div id="row'+i+'" class="buttonadd" > <hr style="height:2px;border-width:0;color:gray;background-color:#4e73df"> <button type="button" id="'+i+'" class="btn btn-danger remove_row">-</button> <div class="row"><div class="mb-3 col"><label for="quantite">Quantité</label><input class="form-control" id="quantite" onkeyup="calcPrix()" value="0" name="quantite['+i+']["quantite"]" required type="number" data-sb-validations="required" /><div class="invalid-feedback" data-sb-feedback="quantite:required">Un nom est requis.</div></div><div class="mb-3 col"><label for="prixHT">Prix Unitaire (MAD)</label><input class="form-control" id="prixHT" name="prixHT['+i+']["prixHT"]" value="0" onkeyup="calcPrix()" required type="number" data-sb-validations="required" /><div class="invalid-feedback" data-sb-feedback="prixHT:required">Un nom est requis.</div></div><div class="mb-3 col"><label class="ml-3" onkeyup="calcPrix()" for="tva">TVA (%)</label><input class="form-control" id="tva" name="tva['+i+']["tva"]" value="0" onkeyup="calcPrix()" required type="number" data-sb-validations="required" /></div></div><div class="row"><div class="form-floating mb-3 col"><input class="form-control" id="totalHT" disabled value="0" name="prixHT['+i+']["prixHT"]" required type="number" /><label for="totalHT">Prix HT (MAD) </label></div><div class="form-floating mb-3 col"><input class="form-control" id="totalTTC" disabled value="0" name="totalTTC['+i+']["totalTTC"]" required type="number" /><label for="totalHT">Prix TTC (MAD)</label></div></div><div class="form-floating mb-3"><textarea class="form-control" id="description" name="description['+i+']["description"]" type="text" placeholder="description" style="height: 5rem"></textarea><label for="message">description</label></div></div>');
        });
        $(document).on('click', '.remove_row', function() {
            var row_id = $(this).attr("id");
            $('#row' + row_id + '').remove();
        });
    });
</script>
@endsection