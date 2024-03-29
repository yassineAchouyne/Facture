@extends("layouts.index")

@section('load')
onload="calcPrix()"
@endsection

@section('style')

<style>
    .buttonadd {
        position: relative;
    }

    .buttonadd>button {
        position: absolute;
        right: 0;
        z-index: 1;
        top: 60px;
    }

    hr {
        height: 2px;
        border-width: 0;
        color: gray;
        background-color: gray;

    }
</style>

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
            <option value="{{$client->id_client}}" @if($client->id_client == $facture->id_client ) selected @endif >{{$client->prenom}} {{$client->nom}}</option>
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

    <div id="dynamicadd">
        @php
        $qtt = json_decode($facture->quantite, true);
        $pr = json_decode($facture->prixHT, true);
        $desc = json_decode($facture->Description, true);
        @endphp

        @foreach($qtt as $i=>$q)
        @if($i==0)
        <div class="buttonadd">
            <button type="button" id="add" class="btn btn-success">+</button>
            <div class="row">
                <!-- Quantité input-->
                <div class="mb-3 col">
                    <label for="quantite">Quantité</label>
                    <input class="form-control" id="quantite" onkeyup="calcPrix()" value="{{$q}}" name="quantite[0]" required type="number" data-sb-validations="required" />
                    <div class="invalid-feedback" data-sb-feedback="quantite:required">Un nom est requis.</div>
                </div>

                <!-- prix input-->
                <div class="mb-3 col">
                    <label for="prixHT">Prix Unitaire (MAD)</label>
                    <input class="form-control" id="prixHT" name="prixHT[0]" value="{{$pr[$i]}}" onkeyup="calcPrix()" required type="number" data-sb-validations="required" />
                    <div class="invalid-feedback" data-sb-feedback="prixHT:required">Un nom est requis.</div>
                </div>

                <!-- Total HT input-->
                <div class="form-floatin mb-3 col">
                    <label for="totalHT">Prix HT (MAD) </label>
                    <input class="form-control" id="totalHT" disabled value="0" name="totalHT[0]" required type="number" />
                </div>
            </div>
            <!-- Description input-->
            <div class="form-floating mb-3">
                <textarea class="form-control" id="description" name="description[0]" type="text" placeholder="description" style="height: 3rem">{{$desc[$i]}}</textarea>
                <label for="message">description</label>
            </div>
        </div>
        @else
        <div style="border-top: 1px solid #4e73df;" id="row{{$i}}" class="buttonadd">
            <button type="button" id="{{$i}}" class="btn btn-danger remove_row">-</button>
            <div class="row">
                <div class="mb-3 col"><label for="quantite">Quantité</label><input class="form-control" id="quantite" onkeyup="calcPrix()" value="{{$q}}" name="quantite[{{$i}}]" required type="number" data-sb-validations="required" /></div>
                <div class="mb-3 col"><label for="prixHT">Prix Unitaire (MAD)</label><input class="form-control" id="prixHT" name="prixHT[{{$i}}]" value="{{$pr[$i]}}" onkeyup="calcPrix()" required type="number" data-sb-validations="required" /></div>
                <div class="mb-3 col"><label for="totalHT">Prix HT (MAD) </label><input class="form-control" id="totalHT" disabled value="" name="prixHT[{{$i}}]" required type="number" /></div>
            </div>
            <div class="form-floating mb-3"> <textarea class="form-control" id="description" name="description[{{$i}}]" type="text" placeholder="description" style="height: 3rem">{{$desc[$i]}}</textarea><label for="message">description</label></div>
        </div>
        @endif
        @endforeach
        <input type="hidden" value="{{$i}}" id="etatinitial" >

    </div>


    <!--Mode payment select-->
    <div class="mb-3">
        <label class="ml-3" for="modePayment">modes de paiement</label>
        <select style="height: 55px;" class="form-control"  name="modePayment">
            <option value="Espèces" @if($facture->modePayment == "Espèces") selected @endif>Espèces</option>
            <option value="Chèque" @if($facture->modePayment == "Chèque") selected @endif>Chèque</option>
            <option value="Carte bancaire" @if($facture->modePayment == "Carte bancaire") selected @endif>Carte bancaire</option>
            <option value="PayPal" @if($facture->modePayment == "PayPal") selected @endif>PayPal</option>
        </select>
    </div>

     <!-- note input-->
     <div class="form-floating mb-3">
        <textarea class="form-control" id="description" name="note" type="text" placeholder="Note" style="height: 3rem">{{$facture->note}}</textarea>
        <label for="message">Note</label>
    </div>

    <!-- Submit Button-->
    <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" type="submit">Modifier la facture</button></div>
</form>


@endsection

@section('script')
<script>
    function calcPrix() {
        var dynamicadd = document.getElementById('dynamicadd');
        var table = dynamicadd.getElementsByClassName('row')
        for (i = 0; i < table.length; i++) {
            var quantite = table[i].children[0].children[1].value;
            var prixHT = table[i].children[1].children[1].value;
            var totalHT = table[i].children[2].children[1];
            totalHT.value = quantite * prixHT;
        }
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var i = document.getElementById('etatinitial').value;
        $('#add').click(function() {
            // alert(i);
            i++;
            $('#dynamicadd').append('<div style="border-top: 1px solid #4e73df;"  id="row' + i + '" class="buttonadd"><button type="button" id="' + i + '" class="btn btn-danger remove_row">-</button><div class="row"><div class="mb-3 col"><label for="quantite">Quantité</label><input class="form-control" id="quantite" onkeyup="calcPrix()" value="0" name="quantite[' + i + ']" required type="number" data-sb-validations="required" /></div><div class="mb-3 col"><label for="prixHT">Prix Unitaire (MAD)</label><input class="form-control" id="prixHT" name="prixHT[' + i + '][" prixHT"]" value="0" onkeyup="calcPrix()" required type="number" data-sb-validations="required" /></div><div class="mb-3 col"><label for="totalHT">Prix HT (MAD) </label><input class="form-control" id="totalHT" disabled value="0" name="prixHT[' + i + ']" required type="number" /></div></div><div class="form-floating mb-3"> <textarea class="form-control" id="description" name="description[' + i + ']" type="text" placeholder="description" style="height: 3rem"></textarea><label for="message">description</label></div></div>');
        });
        $(document).on('click', '.remove_row', function() {
            var row_id = $(this).attr("id");
            $('#row' + row_id + '').remove();
        });
    });
</script>
@endsection