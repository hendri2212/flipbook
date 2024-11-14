<?php
// Set the target directory and file name
$targetDir = "documents/";
// $targetFile = $targetDir . "skripsi.pdf";
$uploadOk = 1;

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if file was uploaded
    if (isset($_FILES["fileToUpload"])) {

        // Get file details
        $fileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
        $tempFile = $_FILES["fileToUpload"]["tmp_name"];

        // Check if the uploaded file is a PDF
        if ($fileType != "pdf") {
            echo "Sorry, only PDF files are allowed.";
            $uploadOk = 0;
        }

        // Check for any upload errors
        if ($_FILES["fileToUpload"]["error"] !== UPLOAD_ERR_OK) {
            echo "Error uploading file. Error code: " . $_FILES["fileToUpload"]["error"];
            $uploadOk = 0;
        }

        // Proceed if no errors and it's a PDF
        if ($uploadOk) {
            // Create a unique file name with timestamp
            $newFileName = "skripsi_" . time() . ".pdf";
            $targetFile = $targetDir . $newFileName;

            // Move uploaded file and replace existing file (skripsi.pdf)
            if (move_uploaded_file($tempFile, $targetFile)) {
                // Save the new file name to a text file, overwriting the previous content
                file_put_contents("../uploaded_files.txt", $newFileName);
                ?>
                <script>
                    alert("The file has been uploaded and renamed to skripsi.pdf")
                    // Redirect or update the PDF viewer URL if necessary
                    // For example:
                    // window.location.href = "your_flipbook_page.php?pdf=" + "<?php //echo $newFileName; ?>";
                </script>
            <?php } else { ?>
                <script>
                    alert("Sorry, there was an error uploading your file");
                </script>
            <?php }
        }
    } else {
        echo "No file was uploaded.";
    }
}
?>

<!-- HTML form for file upload -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Upload PDF Document</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="card mx-auto mt-5" style="width: 30rem;">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label>Select PDF file to upload:</label>
                        <input type="file" name="fileToUpload" accept=".pdf" required class="form-control">
                    </div>
                    <input type="submit" value="Upload PDF" name="submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </body>
</html>