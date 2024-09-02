<?php
include "connection.php";
session_start();

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
    $userName = $user["f_name"];
    $userName2 = $user["l_name"];
    $userId = $user["id"];
    
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>

        <link rel="icon" href="Logo.png" type="image">
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link href="./output.css" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body onload="UserfilterBooks();">

        <div class="mx-[165px] h-[100%]">

            <?php include "UserHeader.php"; ?>

            <div class="thirdcolor">
                <a href="#" class=" font-outfit text-[16px]"> Welcome</a>
                <a href="">
                    <label for=""><?php echo htmlspecialchars($userName); ?>
                        <?php echo htmlspecialchars($userName2); ?></label>
                </a>
            </div>

            <div class="flex">
                <div class="mt-[24px] rounded-[10px]">

                    <!-- Sort Books -->
                    <div>
                        <div class="w-[1210px] pt-4 h-[205px] bg-[#F7F7F7] rounded-[10px] mt-[45px]">

                            <div class="ml-[40px]">
                                <!-- Row 1 -->
                                <div class="flex gap-[97px]">
                                    <div class="flex flex-col">
                                        <label for="" class="font-outfit text-[#3C3C3C]">Book Name</label>
                                        <div class="mt-[8px]">
                                            <input type="text" placeholder="Enter book name" id="nameSort"
                                                onkeypress="UserfilterBooks();"
                                                class="h-[40px] w-[312px] offwhite rounded-[10px]  pl-[13px] pr-[35px] thirdcolor focus:outline-none">
                                        </div>
                                    </div>

                                    <div class="dropdown flex flex-col">
                                        <label for="" class="font-outfit text-[#3C3C3C]">Category</label>
                                        <div class="mt-[8px]">
                                            <select id="categorySelect"
                                                class="h-[40px] w-[312px] offwhite pl-[13px] thirdcolor focus:outline-none rounded-[10px]">
                                                <option class="text-center shadow-none bg-[#F1F1F1]" value="0">Select
                                                    Category</option>
                                                <?php
                                                $resultSet = Database::search("SELECT * FROM `category`");
                                                $numOfRows = $resultSet->num_rows;

                                                for ($x = 0; $x < $numOfRows; $x++) {
                                                    $data = $resultSet->fetch_assoc();
                                                    ?>
                                                    <option value="<?php echo ($data["id"]); ?>">
                                                        <?php echo ($data["category_name"]); ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <!-- Row 2 -->
                                <div class="flex gap-[97px] mt-[18px]">
                                    <div class="dropdown flex flex-col">
                                        <label for="" class="font-outfit text-[#3C3C3C]">Author</label>
                                        <div class="mt-[8px]">
                                            <select id="authorSelect"
                                                class="h-[40px] w-[312px] offwhite pl-[13px] thirdcolor focus:outline-none rounded-[10px]">
                                                <option class="text-center shadow-none bg-[#F1F1F1]" value="0">Select Author
                                                </option>
                                                <?php
                                                $resultSet = Database::search("SELECT * FROM `author`");
                                                $numOfRows = $resultSet->num_rows;

                                                for ($x = 0; $x < $numOfRows; $x++) {
                                                    $data = $resultSet->fetch_assoc();
                                                    ?>
                                                    <option value="<?php echo ($data["id"]); ?>">
                                                        <?php echo ($data["author_name"]); ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="dropdown flex flex-col">
                                        <label for="" class="font-outfit text-[#3C3C3C]">Publisher</label>
                                        <div class="mt-[8px]">
                                            <select id="publisherSelect"
                                                class="h-[40px] w-[312px] offwhite pl-[13px] thirdcolor focus:outline-none rounded-[10px]">
                                                <option class="text-center shadow-none bg-[#F1F1F1]" value="0">Select
                                                    Publisher</option>
                                                <?php
                                                $resultSet = Database::search("SELECT * FROM `publisher`");
                                                $numOfRows = $resultSet->num_rows;

                                                for ($x = 0; $x < $numOfRows; $x++) {
                                                    $data = $resultSet->fetch_assoc();
                                                    ?>
                                                    <option value="<?php echo ($data["id"]); ?>">
                                                        <?php echo ($data["name"]); ?>
                                                    </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="flex flex-col ">
                                    <button onclick="UserfilterBooks();"
                                        class="ml-[150px] w-[160px] h-[40px] primarycolor font-semibold text-[14px] secondcolor rounded-[10px] mt-[30px] hover:bg-[#c0e52c]">
                                        Search</button>
                                </div>


                                </div>
                            </div>

                            <!-- Table -->
                            <div class="grid grid-cols-5 mb-[25px] mt-[70px]" id="content">

                            </div>

                        </div>

                        <!-- Pass userId to JavaScript -->
                        <script>
                            var userId = <?php echo json_encode($userId); ?>;
                        </script>

                        <script src="script.js"></script>
    </body>

    </html>
    <?php
} else {
    header("Location: UserLogin.php");
}
?>