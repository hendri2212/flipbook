<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>PDF</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  
  <!-- Flipbook StyleSheet -->
  <link href="lib/css/min.css" rel="stylesheet" type="text/css">
  <!-- Icons Stylesheet -->
  <link href="lib/css/themify-icons.min.css" rel="stylesheet" type="text/css">
  
  <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>

  <div id="flipbookContainer">
  </div>


  <!-- jQuery  -->
  <script src="lib/js/libs/jquery.min.js" type="text/javascript"></script>
  <!-- Flipbook main Js file -->
  <script src="lib/js/dflip.min.js" type="text/javascript"></script>
  <!-- Flipbook main Js file -->
  <script>
    jQuery(document).ready(function () {
      //uses source from online(make sure the file has CORS access enabled if used in cross-domain)
      // var pdf = 'https://mozilla.github.io/pdf.js/web/compressed.tracemonkey-pldi-09.pdf';
      var pdfFileName = "<?php echo trim(file_get_contents('uploaded_files.txt')); ?>"; // Read the file name
      // var pdf = './upload/documents/skripsi.pdf';
      var pdf = './upload/documents/' + pdfFileName; // Construct the full path to the PDF file
      var options = {
        height:2000,
        duration: 700,
        backgroundColor: "#2F2D2F"
      };
      var flipBook = $("#flipbookContainer").flipBook(pdf, options);
    });
  </script>

</body>
</html>