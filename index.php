<?php

error_reporting(1);

?>

<html lang="en">
    <head>
        <title>Pdf to Database</title>
    </head>

<body>
<header class="header">
    <h3>PDF to Database</h3>

    <p>Upload a PDF file and convert to database.</p>
</header>
<main class="main">
    <div class="upload-container">
        <form method="POST" action="PdfToDatabase.php" enctype="multipart/form-data">
            <input type="file" name="pdfFile" id="pdfFile" accept="application/pdf" required />

            <div style="margin-top: 16px">
                <button type="submit" name="btn-submit" class="submit-button">Submit</button>
            </div>
        </form>
    </div>
</main>
</body>

<style>
    .header {
        padding: 24px 8px;
        text-align: center;
        background-color: lightgrey;
    }

    .main {
        padding: 8px;
    }

    .upload-container {
        margin-top: 16px;
        text-align: center;
    }

    .submit-button {
        padding: 8px;
        background-color: #16b4f1;
        border-radius: 4px;
        border: 2px solid lightblue;
        width: 300px;
        color: white;
        font-weight: 600;
    }
</style>
</html>
