<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>


</head>

<body>
<canvas id="pdfCanvas"></canvas>



    <script>
const url = '../pdf.pdf';
PDFJS.getDocument(url).then(function(pdf) {
  // Get the first page of the PDF
  pdf.getPage(1).then(function(page) {
    // Set the canvas dimensions to match the PDF page size
    var canvas = document.getElementById('pdfCanvas');
    canvas.width = page.view[2];
    canvas.height = page.view[3];
    
    // Render the PDF page on the canvas as an image
    var ctx = canvas.getContext('2d');
    var renderContext = {
      canvasContext: ctx,
      viewport: page.getViewport(1)
    };
    page.render(renderContext);
  });
});
var canvas = document.getElementById('pdfCanvas');
var dataUrl = canvas.toDataURL('image/png');



    </script>
</body>

</html>