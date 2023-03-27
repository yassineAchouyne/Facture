<!DOCTYPE html>
<html lang="fr" >
<head>
    <title>Factura.ma</title>
</head>
<body>
    <table>
        <tr>
            <td><b> Nom complet :</b></td>
            <td>{{$name}}</td>
        </tr>

        <tr>
            <td><b>Address Email :</b></td>
            <td><a href="mailto:{{$email}}">{{$email}}</a></td>
        </tr>

        <tr>
            <td><b> Numéro de Téléphone :</b></td>
            <td><a href="tel:{{$tel}}">{{$tel}}</a> </td>
        </tr>

        <tr>
            <td><b>Message :</b></td>
            <td>{{$msg}}</td>
        </tr>

        <tr>
            <td><b>présenté le :</b></td>
            <td>{{$date}}</td>
        </tr>

    </table>
</body>
</html>