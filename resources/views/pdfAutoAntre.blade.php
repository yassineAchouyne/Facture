<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
    <style>
        .page {
            max-width: 800px;
            margin: 10px auto;
            padding: 10px;
            padding-top: 0;
            font-size: 16px;
            line-height: 24px;
        }

        @page {
            size: 21cm 29.7cm;
            margin: 0;
        }

        /* Font Definitions */
        @font-face {
            font-family: Wingdings;
            panose-1: 5 0 0 0 0 0 0 0 0 0;
        }

        @font-face {
            font-family: "Cambria Math";
            panose-1: 2 4 5 3 5 4 6 3 2 4;
        }

        @font-face {
            font-family: Calibri;
            panose-1: 2 15 5 2 2 2 4 3 2 4;
        }

        /* Style Definitions */
        p.MsoNormal,
        li.MsoNormal,
        div.MsoNormal {
            margin-top: 0cm;
            margin-right: 0cm;
            margin-bottom: 8.0pt;
            margin-left: 0cm;
            line-height: 107%;
            font-size: 11.0pt;
            font-family: "Calibri", sans-serif;
        }

        p.MsoFootnoteText,
        li.MsoFootnoteText,
        div.MsoFootnoteText {
            mso-style-link: "Note de bas de page Car";
            margin: 0cm;
            font-size: 10.0pt;
            font-family: "Calibri", sans-serif;
        }

        p.MsoHeader,
        li.MsoHeader,
        div.MsoHeader {
            mso-style-link: "En-t�te Car";
            margin: 0cm;
            font-size: 11.0pt;
            font-family: "Calibri", sans-serif;
        }

        p.MsoFooter,
        li.MsoFooter,
        div.MsoFooter {
            mso-style-link: "Pied de page Car";
            margin: 0cm;
            font-size: 11.0pt;
            font-family: "Calibri", sans-serif;
        }

        span.MsoFootnoteReference {
            vertical-align: super;
        }

        span.En-tteCar {
            mso-style-name: "En-t�te Car";
            mso-style-link: En-t�te;
        }

        span.PieddepageCar {
            mso-style-name: "Pied de page Car";
            mso-style-link: "Pied de page";
        }

        span.NotedebasdepageCar {
            mso-style-name: "Note de bas de page Car";
            mso-style-link: "Note de bas de page";
        }

        .MsoChpDefault {
            font-family: "Calibri", sans-serif;
        }

        /* Page Definitions */
        @page WordSection1 {
            size: 595.3pt 841.9pt;
            margin: 35.45pt 70.85pt 63.8pt 70.85pt;
        }

        div.WordSection1 {
            page: WordSection1;
        }

        /* List Definitions */
        ol {
            margin-bottom: 0cm;
        }

        ul {
            margin-bottom: 0cm;

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
            font-size: 15px;
            color: #fff;
            display: flex;
            margin-left: 48%;
            width: 100%;
        }
        .bgcolor1{
            background-color: #66c591;
        }
        .bgcolor{
            background-color: red;
        }
    </style>
</head>

<body lang="FR" style="word-wrap: break-word" class="page">
<div class="invoice-ribbon">
                            @if($facture->statut=="payer")
                                <div class="ribbon-inner bgcolor1" >Payer</div>
                            @else
                                <div class="ribbon-inner bgcolor" >Non Payer</div>
                            @endif
                        </div>
    <div class="WordSection1">
        <div align="center" style="width: 100%;display: flex;justify-content: center;">
            <img width="126" height="137" id="Image 1" src="assets\img\logo.jpg" />
        </div>

        <p class="MsoNormal">&nbsp;</p>

        <p class="MsoNormal" align="right" style="text-align: right">
            Date : {{$facture->dateEmission}}.
        </p>

        <div align="center" style="margin-left: 6cm;">
            <table class="MsoNormalTable" border="1" cellspacing="0" cellpadding="0" style="background: #e7e6e6; border-collapse: collapse; border: none">
                <tr>
                    <td width="264" valign="top" style="
                width: 198.2pt;
                border: solid windowtext 1pt;
                padding: 0cm 5.4pt 0cm 5.4pt;
              ">
                        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal">
                            <b><span style="font-size: 14pt;margin-left: 30px; color: black">Facture numéro</span></b><span style="font-size: 14pt; color: black"> </span><span style="font-size: 12pt; color: black">000 001</span>
                        </p>
                    </td>
                </tr>
            </table>
        </div>

        <p class="MsoNormal">&nbsp;</p>

        <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
            <tr>
                <td width="94" valign="top" style="width: 70.65pt; padding: 0cm 5.4pt 0cm 5.4pt">
                    <p class="MsoNormal" align="right" style="margin-bottom: 0cm; text-align: right; line-height: normal">
                        Client&nbsp;:
                    </p>
                </td>
                <td width="406" valign="top" style="width: 304.75pt; padding: 0cm 5.4pt 0cm 5.4pt">
                    <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal">
                        {{$client->prenom}}
                        {{$client->nom}}
                    </p>
                </td>
            </tr>
            <tr>
                <td width="94" valign="top" style="width: 70.65pt; padding: 0cm 5.4pt 0cm 5.4pt">
                    <p class="MsoNormal" align="right" style="margin-bottom: 0cm; text-align: right; line-height: normal">
                        Adresse&nbsp;:
                    </p>
                </td>
                <td width="406" valign="top" style="width: 304.75pt; padding: 0cm 5.4pt 0cm 5.4pt">
                    <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal">
                        {{$client->ville}}
                        {{$client->codePostal}}
                        {{$client->pays}}
                    </p>
                </td>
            </tr>
        </table>

        <p class="MsoNormal">&nbsp;</p>

        <table class="MsoNormalTable" border="1" cellspacing="0" cellpadding="0" width="604" style="width: 453.1pt; border-collapse: collapse; border: none">
            <tr>
                <td width="206" valign="top" style="
              width: 154.55pt;
              border: solid #a5a5a5 1pt;
              border-right: none;
              background: #a5a5a5;
              padding: 0cm 5.4pt 0cm 5.4pt;
            ">
                    <p class="MsoNormal" align="center" style="
                margin-bottom: 0cm;
                text-align: center;
                line-height: normal;
              ">
                        <b><span style="color: white">Description</span></b>
                    </p>
                </td>
                <td width="130" valign="top" style="
              width: 97.45pt;
              border-top: solid #a5a5a5 1pt;
              border-left: none;
              border-bottom: solid #a5a5a5 1pt;
              border-right: none;
              background: #a5a5a5;
              padding: 0cm 5.4pt 0cm 5.4pt;
            ">
                    <p class="MsoNormal" align="center" style="
                margin-bottom: 0cm;
                text-align: center;
                line-height: normal;
              ">
                        <b><span style="color: white">Quantité</span></b>
                    </p>
                </td>
                <td width="130" valign="top" style="
              width: 97.45pt;
              border-top: solid #a5a5a5 1pt;
              border-left: none;
              border-bottom: solid #a5a5a5 1pt;
              border-right: none;
              background: #a5a5a5;
              padding: 0cm 5.4pt 0cm 5.4pt;
            ">
                    <p class="MsoNormal" align="center" style="
                margin-bottom: 0cm;
                text-align: center;
                line-height: normal;
              ">
                        <b><span style="color: white">Prix unitaire</span></b>
                    </p>
                </td>
                <td width="138" valign="top" style="
              width: 103.65pt;
              border: solid #a5a5a5 1pt;
              border-left: none;
              background: #a5a5a5;
              padding: 0cm 5.4pt 0cm 5.4pt;
            ">
                    <p class="MsoNormal" align="center" style="
                margin-bottom: 0cm;
                text-align: center;
                line-height: normal;
              ">
                        <b><span style="color: white">Total</span></b>
                    </p>
                </td>
            </tr>

            @php 
                $qtt = json_decode($facture->quantite, true);
                $pr = json_decode($facture->prixHT, true);
                $desc = json_decode($facture->Description, true);
             @endphp

            @foreach($qtt as $i=>$q)
            <tr>
                <td width="206" valign="top" style="
              width: 154.55pt;
              border: solid #c9c9c9 1pt;
              border-top: none;
              padding: 0cm 5.4pt 0cm 5.4pt;
            ">
                    <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal">
                        &nbsp;
                        {{$desc[$i]}}
                    </p>
                </td>
                <td width="130" valign="top" style="
              width: 97.45pt;
              border-top: none;
              border-left: none;
              border-bottom: solid #c9c9c9 1pt;
              border-right: solid #c9c9c9 1pt;
              padding: 0cm 5.4pt 0cm 5.4pt;
            ">
                    <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal">
                        &nbsp;
                        {{$q}}
                    </p>
                </td>
                <td width="130" valign="top" style="
              width: 97.45pt;
              border-top: none;
              border-left: none;
              border-bottom: solid #c9c9c9 1pt;
              border-right: solid #c9c9c9 1pt;
              padding: 0cm 5.4pt 0cm 5.4pt;
            ">
                    <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal">
                        &nbsp;
                        {{$pr[$i]}} DH
                    </p>
                </td>
                <td width="138" valign="top" style="
              width: 103.65pt;
              border-top: none;
              border-left: none;
              border-bottom: solid #c9c9c9 1pt;
              border-right: solid #c9c9c9 1pt;
              padding: 0cm 5.4pt 0cm 5.4pt;
            ">
                    <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal">
                    {{$q * $pr[$i]}} DH
                    </p>
                </td>
            </tr>
            @endforeach
        </table>

        <p class="MsoNormal">&nbsp;</p>

        <table class="MsoNormalTable" border="1" cellspacing="0" cellpadding="0" style="
          width: 100%;
          margin-left: 29.75pt;
          border-collapse: collapse;
          border: none;
        ">
            <tr style="height: 14.85pt">
                <td width="265" valign="top" style="
              width: 198.6pt;
              border: solid #dbdbdb 1pt;
              border-bottom: solid #c9c9c9 1.5pt;
              padding: 0cm 5.4pt 0cm 5.4pt;
              height: 14.85pt;
            ">
                    <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal">
                        <b>Montant DH</b>
                    </p>
                </td>
                <td width="129" valign="top" style="
              width: 96.85pt;
              border-top: solid #dbdbdb 1pt;
              border-left: none;
              border-bottom: solid #c9c9c9 1.5pt;
              border-right: solid #dbdbdb 1pt;
              padding: 0cm 5.4pt 0cm 5.4pt;
              height: 14.85pt;
            ">
                    <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal">
                        <b>Total Net payer</b>
                    </p>
                </td>
                <td width="171" valign="top" style="
              width: 128.15pt;
              border-top: solid #dbdbdb 1pt;
              border-left: none;
              border-bottom: solid #c9c9c9 1.5pt;
              border-right: solid #dbdbdb 1pt;
              padding: 0cm 5.4pt 0cm 5.4pt;
              height: 14.85pt;
            ">
                    <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal">
                        <b>{{$total}} DH</b>
                    </p>
                </td>
            </tr>
        </table>

        <p class="MsoNormal" style="margin-bottom: 0cm">
            <span style="display: none">&nbsp;</span>
        </p>

        <div align="center">
            <table class="MsoNormalTable" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
                <tr>
                    <td width="604" valign="top" style="width: 453.1pt; padding: 0cm 5.4pt 0cm 5.4pt">
                        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal">
                            &nbsp;
                        </p>
                        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal">
                            &nbsp;
                        </p>
                        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal">
                            ARRETE LA PRESENTE FACTURE A LA SOMME DE&nbsp;:
                        </p>
                    </td>
                </tr>
                <tr>
                    <td width="604" valign="top" style="width: 453.1pt; padding: 0cm 5.4pt 0cm 5.4pt">
                        <p class="MsoNormal" style="margin-bottom: 0cm; line-height: normal;">
                            # {{$int2str}}  #
                        </p>
                    </td>
                </tr>
            </table>
        </div>

        <p class="MsoNormal">&nbsp;</p>

        <p class="MsoNormal">&nbsp;</p>

        <p class="MsoNormal" align="right" style="text-align: right;margin-right: 4cm; ">
            Signature&nbsp;:
        </p>

        <p class="MsoNormal">&nbsp;</p>
    </div>

    <div>
        <hr>
        <div id="ftn1" style="text-align:center" >
        <div id="ftn1" style="text-align:center" >
            <p> <b> Auto Entrepreneur :</b>{{$user->name}} <b> Adresse :</b>{{$user->adresse}}</p>
            <p><b>MAIL</b>  {{$user->email}}</p>
            <p><b>Numéro de Téléphone</b> {{$user->tel}}</p>
        </div>
        </div>
    </div>
</body>

</html>