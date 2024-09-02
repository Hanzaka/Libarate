<?php
include "connection.php";

$bookId = isset($_GET['bookId']) ? $_GET['bookId'] : '';
$categoryId = isset($_GET['categoryId']) ? $_GET['categoryId'] : '';
$authorId = isset($_GET['authorId']) ? $_GET['authorId'] : '';
$publisherId = isset($_GET['publisherId']) ? $_GET['publisherId'] : '';
$brrowDate = isset($_GET['brrowDate']) ? $_GET['brrowDate'] : '';
$userId = isset($_GET['userId']) ? $_GET['userId'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brrowed Books</title>

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="./output.css" rel="stylesheet">
    <link rel="icon" href="Logo.png" type="image">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

</head>


<body onload="loadBrrowedBooks();">

    <div class="mx-[165px] h-[100%]">
        <div class="text-[36px] font-black secondcolor">
            Dashboard
        </div>
        <div class="thirdcolor">
            <a href="dashboard.php" class=" font-outfit text-[16px]"> Dashboard</a> / <label>Brrowed Books</label>
        </div>


        <div class="flex">
            <div class="mt-[24px] rounded-[10px]">
                <div class="flex justify-between">
                    <div>
                        <div class="thirdcolor">
                            Total Brrows
                        </div>
                        <div class="text-[32px] secondcolor font-bold mt-[-10px]">
                            <?php
                            $resultSet = Database::search("SELECT COUNT(*) AS brrow_count FROM `brrow`;");
                            if ($resultSet->num_rows > 0) {
                                $data = $resultSet->fetch_assoc();
                                $count = $data['brrow_count'];
                            } else {
                                $count = 0;
                            }
                            echo $count = $data['brrow_count'];
                            ?>
                        </div>
                    </div>

                    <a href="borrowRequest.php">
                        <button
                            class="w-[140px] h-[40px] px-[13px] text-center py-[5px] rounded-[10px] font-semibold text-[#00508a] bg-[#90d7fd] ">
                            Pre-Borrowed
                        </button>
                    </a>
                </div>

                <!-- Brrowed Books-->
                <div>
                    <!-- Brrowed Books -->
                    <div class="w-[1210px] h-[340px] bg-[#F7F7F7] rounded-[10px] mt-[32px]">
                        <div class="pt-[21px]">
                            <label class="font-outfit font-semibold secondcolor ml-[21px]">Borrow a Book</label>
                        </div>
                        <div class="mt-[10px] ml-[40px]">
                            <!-- Row 1 -->
                            <div class="flex gap-[97px]">
                                <div class="flex flex-col">
                                    <label for="bookId" class="font-outfit text-[#3C3C3C]">Book ID</label>
                                    <div class="mt-[8px]">
                                        <select
                                            class="h-[50px] w-[312px] offwhite rounded-[10px] pl-[13px] thirdcolor focus:outline-none"
                                            id="bookId">
                                            <option value="">Select Book ID</option>
                                            <?php
                                            $resultSet = Database::search("SELECT * FROM book");
                                            $numOfRows = $resultSet->num_rows;

                                            for ($x = 0; $x < $numOfRows; $x++) {
                                                $data = $resultSet->fetch_assoc();
                                                ?>
                                                <option value="<?php echo $data["id"]; ?>" <?php echo ($data["id"] == $bookId) ? 'selected' : ''; ?>>
                                                    <?php echo $data["book_id"] . " - " . $data["book_name"]; ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="flex flex-col">
                                    <label for="userId" class="font-outfit text-[#3C3C3C]">User ID</label>
                                    <div class="mt-[8px]">
                                        <select
                                            class="h-[50px] w-[312px] offwhite rounded-[10px] pl-[13px] thirdcolor focus:outline-none"
                                            id="userId">
                                            <option value="">Select User ID</option>
                                            <?php
                                            $resultSet = Database::search("SELECT * FROM user");
                                            $numOfRows = $resultSet->num_rows;

                                            for ($x = 0; $x < $numOfRows; $x++) {
                                                $data = $resultSet->fetch_assoc();
                                                ?>
                                                <option value="<?php echo $data["id"]; ?>" <?php echo ($data["id"] == $userId) ? 'selected' : ''; ?>>
                                                    <?php echo $data["user_id"] . " - " . $data["f_name"] . " " . $data["l_name"]; ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="flex flex-col">
                                    <label for="brrowedDate" class="font-outfit text-[#3C3C3C]">Borrowed Date</label>
                                    <div class="mt-[8px]">
                                        <input type="date" id="brrowedDate" value="<?php echo $brrowDate; ?>"
                                            class="h-[50px] w-[312px] offwhite rounded-[10px] pr-3 pl-[13px] thirdcolor focus:outline-none">
                                    </div>
                                </div>
                            </div>

                            <!-- Row 2 -->
                            <div class="flex gap-[97px] mt-[18px]">
                                <div class="flex flex-col">
                                    <label for="returnDate" class="font-outfit text-[#3C3C3C]">Return Date</label>
                                    <div class="mt-[8px]">
                                        <input type="date" id="returnDate"
                                            class="h-[50px] w-[312px] offwhite rounded-[10px] pr-3 pl-[13px] thirdcolor focus:outline-none">
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col ml-[410px]">
                                <button onclick="brrowBook();"
                                    class="w-[312px] h-[44px] primarycolor font-semibold text-[14px] secondcolor rounded-[10px] mt-[30px] hover:bg-[#c0e52c]">
                                    Borrow Book
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Brrowed Books-->

                <!-- Sort Books -->
                <div>
                    <div class="w-[1210px] h-[225px] bg-[#F7F7F7] rounded-[10px] mt-[45px]">
                        <div class="pt-[21px]">
                            <label class="font-outfit font-semibold secondcolor ml-[21px]">Sort Book</label>
                        </div>
                        <div class="mt-[10px] ml-[40px]">
                            <!-- Row 1 -->
                            <div class="flex gap-[97px]">
                                <div class="flex flex-col">
                                    <label for="" class="font-outfit text-[#3C3C3C]">Book ID</label>

                                    <div class="mt-[8px]">
                                        <input type="text" placeholder="Enter book ID"
                                            class="h-[40px] w-[312px] offwhite rounded-[10px]  pl-[13px] pr-[35px] thirdcolor focus:outline-none">
                                    </div>
                                </div>

                                <div class="flex flex-col">
                                    <label for="" class="font-outfit text-[#3C3C3C]">User ID</label>
                                    <div class="flex flex-row">

                                        <div class="mt-[8px]">
                                            <input type="text" placeholder="Enter user ID"
                                                class="h-[40px] w-[312px] offwhite rounded-[10px]  pl-[13px] pr-[34px] thirdcolor focus:outline-none">
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-col">
                                    <label for="" class="font-outfit text-[#3C3C3C]">Return Date</label>
                                    <div class="mt-[8px]">
                                        <input type="date"
                                            class="h-[40px] w-[312px] offwhite rounded-[10px]  pl-[13px] pr-3 thirdcolor focus:outline-none">
                                    </div>
                                </div>

                            </div>

                            <!-- Row 2 -->
                            <div class="flex gap-[97px] mt-[10px]">

                                <div class="flex flex-col">
                                    <a href="recivingToday.php">
                                        <button
                                            class="w-[312px] h-[44px] primarycolor font-semibold text-[14px] secondcolor rounded-[10px] mt-[15px] hover:bg-[#c0e52c]">
                                            Books Reciving Today
                                        </button>
                                    </a>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="grid grid-cols-7 mb-[25px] mt-[20px]" id="content">


        </div>

    </div>


    <script src="script.js"></script>
</body>

</html>