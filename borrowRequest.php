<?php
include "connection.php";
session_start();

if (isset($_SESSION["admin"])) {

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Borrow Request</title>

        <link rel="icon" href="Logo.png" type="image">
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link href="./output.css" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body onload="borrowRequestsByUser();">

        <div class="mx-[165px] h-[100%]">

            <div class="text-[36px] font-black secondcolor">
                Dashboard
            </div>
            <div class="thirdcolor">
                <a href="brrowedBooks.php" class=" font-outfit text-[16px]"> Brrow Book</a> / <label>Borrowed Requests</label>
            </div>

            <!-- Table -->
            <div class="grid grid-cols-7 mb-[25px] mt-[30px]" id="content">

            </div>

            <script>
            </script>
            
        </div>
        <script src="script.js"></script>
    </body>

    </html>
    <?php
} else {
    header("Location: login.php");
}
?>