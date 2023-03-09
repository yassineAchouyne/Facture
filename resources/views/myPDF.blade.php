<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!-- <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">  -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
    <style>
        .invoice .top-right {
            text-align: right;
            padding-right: 20px;
        }

        .invoice .table-row {
            margin-left: -15px;
            margin-right: -15px;
            margin-top: 25px;
        }

        .invoice .table-row .table>thead {
            border-top: 1px solid #ddd;
        }

        .invoice .table-row .table>thead>tr>th {
            border-bottom: none;
        }

        .invoice .table>tbody>tr>td {
            padding: 8px 20px;
        }

        

        .invoice-ribbon {
            width: 85px;
            height: 88px;
            overflow: hidden;
            position: absolute;
            top: -1px;
            right: 14px;
        }

        .ribbon-inner {
            text-align: center;
            -webkit-transform: rotate(45deg);
            -moz-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            -o-transform: rotate(45deg);
            position: relative;
            padding: 7px 0;
            left: -5px;
            top: 11px;
            width: 120px;
            background-color: #66c591;
            font-size: 15px;
            color: #fff;
        }

        .ribbon-inner:before,
        .ribbon-inner:after {
            content: "";
            position: absolute;
        }

        .ribbon-inner:before {
            left: 0;
        }

        .ribbon-inner:after {
            right: 0;
        }
        .img{
            width: 100%;
            display: flex;
            justify-content: center;
        }

    
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    <div class="container bootstrap snippets bootdeys">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default invoice" id="invoice">
                    <div class="panel-body">
                        <div class="invoice-ribbon">
                            <div class="ribbon-inner">PAID</div>
                        </div>

                        <div class="img">
                            <img class=" rounded-circle " src="{{ public_path('storage/logo/'.$client->logo) }}" width="150" height="150" />
                        </div>


                        <div class="mt-5 top-right">
                            <p> <b>Date :</b> {{$facture->dateEmission}} </p>
                        </div>
                        <div class="mt-1 d-flex justify-content-center">
                            <p class=" border-1 border-red-500 text-white bg-secondary px-5 py-2"> <b>Facture numéro </b> {{$facture->id_facture}} </p>
                        </div>

                        <div class="mt-1">
                            <p> <b>Client : </b> {{$client->prenom." ".$client->nom}} </p>
                        </div>

                        <div class="mt-1">
                            <p><b>Adresse : </b> {{$client->adresse . ' ' . $client->codePostal. ' ' . $client->ville}} </p>
                        </div>

                        <div class="row table-row">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:50%">Description</th>
                                        <th class="text-right" style="width:15%">Quantité</th>
                                        <th class="text-right" style="width:15%">Prix Unitaire</th>
                                        <th class="text-right" style="width:15%">Total prix</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$facture->Description}}</td>
                                        <td class="text-right">{{ $facture->quantite }}</td>
                                        <td class="text-right">{{ $facture->prixHT }} DH</td>
                                        <td class="text-right">{{ $facture->prixHT * $facture->quantite}} DH</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                        <div class="row">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td class="w-50"></td>
                                        <th class="top-right">Montant en DH :</th>
                                        <td class="top-left">{{ $facture->tva }} %</td>
                                        <th class="top-right">Total Net à payer :</th>
                                        <td class="top-left">{{ $facture->quantite * $facture->prixHT *(1+$facture->tva/100) }} DH</td>
                                    </tr>
                                </thead>
                            </table>
                            <div class="my-5 top-right">
                                <p> <b>Signature :</b></p>
                            </div>
                        </div>

                        <div class=" text-muted row">
                            <p class="col-5 row"> <b class="col-6"> Auto Entrepreneur : </b><span class="col">{{$user->name}}</span> </p>
                            <p class="col-4 row"> <b class="col-6"> Adresse : </b><span class="col">{{$user->adresse}}</span> </p>
                        </div>
                        <div class=" text-muted row">
                            <p class="col-5 row"> <b class="col-6"> Numéro de Téléphone : </b><span class="col">{{$user->tel}}</span> </p>
                            <p class="col-4 row"> <b class="col-6"> Email : </b><span class="col">{{$user->email}}</span> </p>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>