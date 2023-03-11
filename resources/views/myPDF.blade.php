<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!-- <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">  -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Document</title>
    <!-- <link rel="stylesheet" href='css/bootstrap.min.css'> -->
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

        .img {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .img>img {
            border-radius: 50%;
        }

        .facture {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .facture>p {
            border: 2px solid black;
            padding: 10px 30px;
            background-color: gray;
            color: white;
            margin: auto;
            width: 200px;
            text-align: center;
        }

        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #eceeef;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #eceeef;
        }

        .table tbody+tbody {
            border-top: 2px solid #eceeef;
        }

        .table .table {
            background-color: #fff;
        }

        .table-sm th,
        .table-sm td {
            padding: 0.3rem;
        }

        .table-bordered {
            border: 1px solid #eceeef;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #eceeef;
        }

        .table-bordered thead th,
        .table-bordered thead td {
            border-bottom-width: 2px;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.075);
        }

        .table-active,
        .table-active>th,
        .table-active>td {
            background-color: rgba(0, 0, 0, 0.075);
        }

        .table-hover .table-active:hover {
            background-color: rgba(0, 0, 0, 0.075);
        }

        .table-hover .table-active:hover>td,
        .table-hover .table-active:hover>th {
            background-color: rgba(0, 0, 0, 0.075);
        }

        .table-success,
        .table-success>th,
        .table-success>td {
            background-color: #dff0d8;
        }

        .table-hover .table-success:hover {
            background-color: #d0e9c6;
        }

        .table-hover .table-success:hover>td,
        .table-hover .table-success:hover>th {
            background-color: #d0e9c6;
        }

        .table-info,
        .table-info>th,
        .table-info>td {
            background-color: #d9edf7;
        }

        .table-hover .table-info:hover {
            background-color: #c4e3f3;
        }

        .table-hover .table-info:hover>td,
        .table-hover .table-info:hover>th {
            background-color: #c4e3f3;
        }

        .table-warning,
        .table-warning>th,
        .table-warning>td {
            background-color: #fcf8e3;
        }

        .table-hover .table-warning:hover {
            background-color: #faf2cc;
        }

        .table-hover .table-warning:hover>td,
        .table-hover .table-warning:hover>th {
            background-color: #faf2cc;
        }

        .table-danger,
        .table-danger>th,
        .table-danger>td {
            background-color: #f2dede;
        }

        .table-hover .table-danger:hover {
            background-color: #ebcccc;
        }

        .table-hover .table-danger:hover>td,
        .table-hover .table-danger:hover>th {
            background-color: #ebcccc;
        }

        .thead-inverse th {
            color: #fff;
            background-color: #292b2c;
        }

        .thead-default th {
            color: #464a4c;
            background-color: #eceeef;
        }

        .table-inverse {
            color: #fff;
            background-color: #292b2c;
        }

        .table-inverse th,
        .table-inverse td,
        .table-inverse thead th {
            border-color: #fff;
        }

        .table-inverse.table-bordered {
            border: 0;
        }

        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -ms-overflow-style: -ms-autohiding-scrollbar;
        }

        .table-responsive.table-bordered {
            border: 0;

        }

        @page {
            margin: 0;
            padding: 0;
        }
        .col-5 {
  flex: 0 0 auto;
  width: 41.66666667%;
}
.col-4 {
  flex: 0 0 auto;
  width: 33.33333333%;
}
.col-6 {
  flex: 0 0 auto;
  width: 50%;
}
.row {
  --bs-gutter-x: 1.5rem;
  --bs-gutter-y: 0;
  display: flex;
  flex-wrap: wrap;
  margin-top: calc(-1 * var(--bs-gutter-y));
  margin-right: calc(-0.5 * var(--bs-gutter-x));
  margin-left: calc(-0.5 * var(--bs-gutter-x));
}
.row > * {
  flex-shrink: 0;
  width: 100%;
  max-width: 100%;
  padding-right: calc(var(--bs-gutter-x) * 0.5);
  padding-left: calc(var(--bs-gutter-x) * 0.5);
  margin-top: var(--bs-gutter-y);
}

    </style>
</head>

<body>
    <div style="width: 80%; margin:auto;">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default invoice" id="invoice">
                    <div class="panel-body">
                        <div class="invoice-ribbon">
                            <div class="ribbon-inner">PAID</div>
                        </div>

                        <div class="img">
                            <img src='{{ asset("/storage/logo/".$client->logo) }}' width="150" height="150" />
                        </div>


                        <div class="mt-5 top-right">
                            <p> <b>Date :</b> {{$facture->dateEmission}} </p>
                        </div>
                        <div class="facture">
                            <p> <b>Facture numéro </b> {{$facture->id_facture}} </p>
                        </div>

                        <div class="mt-1">
                            <p> <b>Client : </b> {{$client->prenom." ".$client->nom}} </p>
                        </div>

                        <div class="mt-1">
                            <p><b>Adresse : </b> {{$client->adresse . " " . $client->codePostal. " " . $client->ville}} </p>
                        </div>

                        <div class="row table-row">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:50%">Description</th>
                                        <th class="text-right" style="width:15%;font-size: 10px;">Quantité</th>
                                        <th class="text-right" style="width:15%;font-size: 10px;">Prix Unitaire</th>
                                        <th class="text-right" style="width:15%; font-size: 10px;">Total prix</th>
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

                        <div>
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
    </div>

</body>

</html>