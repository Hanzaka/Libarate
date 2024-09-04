<?php
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Books</title>

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="./output.css" rel="stylesheet">
    <link rel="icon" href="Logo.png" type="image">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

</head>


<body onload="filterBooks();">

    <div class="mx-[165px] h-[100%]">
        <?php include "header.php"; ?>
        <div class="thirdcolor">
            <a href="dashboard.php" class=" font-outfit text-[16px]"> Dashboard</a> / <label>Total Books</label>
        </div>


        <div class="flex">
            <div class="mt-[24px] rounded-[10px]">
                <div>
                    <div class="thirdcolor">
                        Total Books
                    </div>
                    <div class="text-[32px] secondcolor font-bold mt-[-10px]">
                        <?php
                        $resultSet = Database::search("SELECT COUNT(*) AS book_count FROM `book`;");
                        if ($resultSet->num_rows > 0) {
                            $data = $resultSet->fetch_assoc();
                            $count = $data['book_count'];
                        } else {
                            $count = 0;
                        }
                        echo $count = $data['book_count'];
                        ?>
                    </div>
                </div>

                <div>
                    <!-- Book Registration-->
                    <div class="w-[1210px] h-[340px] bg-[#F7F7F7] rounded-[10px] mt-[32px]">
                        <div class="pt-[21px]">
                            <label class="font-outfit font-semibold secondcolor ml-[21px]">Add New Book</label>
                        </div>
                        <div class="mt-[10px] ml-[40px]">
                            <!-- Row 1 -->
                            <div class="flex gap-[97px]">
                                <div class="flex flex-col">
                                    <label for="" class="font-outfit text-[#3C3C3C]">Book ID</label>
                                    <div class="mt-[8px]">
                                        <input type="text" placeholder="Enter book ID" id="bookId"
                                            class="h-[50px] w-[312px] offwhite rounded-[10px]  pl-[13px] thirdcolor focus:outline-none">
                                    </div>
                                </div>

                                <div class="flex flex-col">
                                    <label for="" class="font-outfit text-[#3C3C3C]">Book Name</label>
                                    <div class="mt-[8px]">
                                        <input type="text" placeholder="Enter book name" id="bookName"
                                            class="h-[50px] w-[312px] offwhite rounded-[10px]  pl-[13px] thirdcolor focus:outline-none">
                                    </div>
                                </div>

                                <div class="dropdown flex flex-col">
                                    <label for="" class="font-outfit text-[#3C3C3C]">Category</label>
                                    <div class="mt-[8px]">
                                        <select id="category"
                                            class="h-[50px] w-[312px] offwhite pl-[13px] thirdcolor focus:outline-none rounded-[10px]">
                                            <option class="text-center shadow-none bg-[#F1F1F1]" value="0">Select
                                                Category
                                            </option>
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
                                        <select id="author"
                                            class="h-[50px] w-[312px] offwhite pl-[13px] thirdcolor focus:outline-none rounded-[10px]">
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
                                        <select id="publisher"
                                            class="h-[50px] w-[312px] offwhite pl-[13px] thirdcolor focus:outline-none rounded-[10px]">
                                            <option class="text-center shadow-none bg-[#F1F1F1]" value="0">Select
                                                Publisher
                                            </option>
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


                            </div>
                            <div class="flex flex-col ml-[410px]">
                                <button onclick="addBook();"
                                    class="w-[312px] h-[44px] primarycolor font-semibold text-[14px] secondcolor rounded-[10px] mt-[30px] hover:bg-[#c0e52c]">
                                    Add Book</button>
                            </div>

                            <div>

                            </div>

                        </div>

                    </div>
                </div>

                <!-- Sort Books -->
                <div>
                    <div class="w-[1210px] h-[235px] bg-[#F7F7F7] rounded-[10px] mt-[45px]">
                        <div class="pt-[21px]">
                            <label class="font-outfit font-semibold secondcolor ml-[21px]">Sort Book</label>
                        </div>
                        <div class="mt-[10px] ml-[40px]">
                            <!-- Row 1 -->
                            <div class="flex gap-[97px]">
                                <div class="flex flex-col">
                                    <label for="" class="font-outfit text-[#3C3C3C]">Book Name</label>
                                    <div class="mt-[8px]">
                                        <input type="text" placeholder="Enter book name" id="nameSort" onkeypress="filterBooks();"
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
                                    <button onclick="filterBooks();"
                                        class="ml-[150px] w-[160px] h-[40px] primarycolor font-semibold text-[14px] secondcolor rounded-[10px] mt-[30px] hover:bg-[#c0e52c]">
                                        Search</button>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="grid grid-cols-5 mb-[25px] mt-[20px]" id="content">

        </div>
    </div>

    </div>


    <script src="script.js"></script>
</body>

</html>