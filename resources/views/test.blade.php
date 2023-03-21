<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div id="widget">
        <input />
        <input />
    </div>
    <button id="btnSave">save</button>
    <div id="img-out" >

    </div>
    <script>
        $(function() {
            $("#btnSave").click(function() {
                html2canvas($("#widget"), {
                    onrendered: function(canvas) {
                        theCanvas = canvas;
                        document.body.appendChild(canvas);

                        // Convert and download as image 
                        Canvas2Image.saveAsPNG(canvas);
                        $("#img-out").append(canvas);
                        // Clean up 
                        //document.body.removeChild(canvas);
                    }
                });
            });
        });
    </script>
</body>

</html>