<?php
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publisher</title>

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="./output.css" rel="stylesheet">
    <link rel="icon" href="Logo.png" type="image">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

</head>


<body onload="loadPublishers();">

    <div class="mx-[165px] h-[100%]">

        <?php include "header.php"; ?>
        <div class="thirdcolor">
            <a href="dashboard.php" class=" font-outfit text-[16px]"> Dashboard</a> / <label>Authors</label>
        </div>

        <div class="flex">
            <div class="mt-[24px] rounded-[10px]">
                <div class="">
                    <div class="thirdcolor">
                        Publishers
                    </div>
                    <div class="text-[32px] secondcolor font-bold mt-[-10px]">
                        <?php
                        $resultSet = Database::search("SELECT COUNT(*) AS publisher_count FROM `publisher`");
                        if ($resultSet->num_rows > 0) {
                            $data = $resultSet->fetch_assoc();
                            $count = $data['publisher_count'];
                        } else {
                            $count = 0;
                        }
                        echo $count = $data['publisher_count'];
                        ?>
                    </div>
                </div>

                <div>
                    <!-- Add Author-->
                    <div class="w-[1210px] h-[190px] bg-[#F7F7F7] rounded-[10px] mt-[32px]">
                        <div class="pt-[21px]">
                            <label class="font-outfit font-semibold secondcolor ml-[21px]">Add New Publisher</label>
                        </div>
                        <div class="mt-[38px] ml-[40px]">
                            <!-- Row 1 -->
                            <div class="flex gap-[97px]">
                                <div class="flex flex-col">
                                    <label for="" class="font-outfit text-[#3C3C3C]">Publisher</label>
                                    <div class="mt-[8px]">
                                        <input type="text" placeholder="Enter publisher name" id="publisher"
                                            class="h-[50px] w-[312px] offwhite rounded-[10px]  pl-[13px] thirdcolor focus:outline-none">
                                    </div>
                                </div>

                                <div class="flex flex-col ml-[410px]">
                                    <button onclick="addPublisher();"
                                        class="w-[312px] h-[44px] primarycolor font-semibold text-[14px] secondcolor rounded-[10px] mt-[30px] hover:bg-[#c0e52c]">
                                        Add Publisher</button>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>


        <!-- Table -->
        <div class="grid grid-cols-2 mb-[25px] mt-[30px]" id="content">

            
        </div>
    </div>

    </div>


    <script src="script.js"></script>
</body>

</html>