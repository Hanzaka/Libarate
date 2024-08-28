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
        <title>Dashboard</title>

        <link rel="icon" href="Logo.png" type="image">
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link href="./output.css" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

        <script src="https://cdn.tailwindcss.com"></script>

    </head>

    <body>

        <div class="mx-[165px] h-[100%]">

            <?php include "header.php"; ?>

            <div class="thirdcolor">
                <a href="#" class=" font-outfit text-[16px]"> Dashboard</a> / <label for="">Admin Dashboard</label>
            </div>

            <!-- Contents Section 1 -->
            <div class="flex gap-[30px]">
                <!-- Contents Users-->
                <div>
                    <div class="bg-[#F1F1F1] w-[383px] h-[199px] mt-[24px] rounded-[10px]">
                        <div class="py-[32px] px-[25px]">
                            <div class="thirdcolor">
                                Total Users
                            </div>
                            <div class="text-[32px] secondcolor font-bold mt-[-10px]">
                                <?php
                                $resultSet = Database::search("SELECT COUNT(*) AS user_count FROM `user`;");
                                if ($resultSet->num_rows > 0) {
                                    $data = $resultSet->fetch_assoc();
                                    $count = $data['user_count'];
                                } else {
                                    $count = 0;
                                }
                                echo $count = $data['user_count'];
                                ?>
                            </div>
                            <a href="totalUsers.php">
                                <button
                                    class="text-[#FFFFFF] bg-[#3C3C3C] w-[330px] h-[44px] rounded-[10px] mt-[31px] font-outfit text-[14px] hover:bg-[#2e2e2e]">
                                    View All Users</button>
                            </a>

                        </div>
                    </div>
                </div>

                <!-- Contents Books-->
                <div>
                    <div class="bg-[#F1F1F1] w-[383px] h-[199px] mt-[24px] rounded-[10px]">
                        <div class="py-[32px] px-[25px]">
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
                            <a href="totalBooks.php">
                                <button
                                    class="text-[#FFFFFF] bg-[#3C3C3C] w-[330px] h-[44px] rounded-[10px] mt-[31px] font-outfit text-[14px] hover:bg-[#2e2e2e]">
                                    View All Books</button>
                            </a>

                        </div>
                    </div>
                </div>

                <!-- Contents Book Categories-->
                <div>
                    <div class="bg-[#F1F1F1] w-[383px] h-[199px] mt-[24px] rounded-[10px]">
                        <div class="py-[32px] px-[25px]">
                            <div class="thirdcolor">
                                Book Categories
                            </div>
                            <div class="text-[32px] secondcolor font-bold mt-[-10px]">
                                <?php
                                $resultSet = Database::search("SELECT COUNT(*) AS category_count FROM `category`;");
                                if ($resultSet->num_rows > 0) {
                                    $data = $resultSet->fetch_assoc();
                                    $count = $data['category_count'];
                                } else {
                                    $count = 0;
                                }
                                echo $count = $data['category_count'];
                                ?>
                            </div>
                            <a href="category.php">
                                <button
                                    class="text-[#FFFFFF] bg-[#3C3C3C] w-[330px] h-[44px] rounded-[10px] mt-[31px] font-outfit text-[14px] hover:bg-[#2e2e2e]">
                                    View All Categories</button>
                            </a>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Contents Section 2 -->
            <div class="flex gap-[30px]">
                <!-- Contents Total Authors-->
                <div>
                    <div class="bg-[#F1F1F1] w-[383px] h-[199px] mt-[24px] rounded-[10px]">
                        <div class="py-[32px] px-[25px]">
                            <div class="thirdcolor">
                                Total Authors
                            </div>
                            <div class="text-[32px] secondcolor font-bold mt-[-10px]">
                                <?php
                                $resultSet = Database::search("SELECT COUNT(*) AS author_count FROM `author`;");
                                if ($resultSet->num_rows > 0) {
                                    $data = $resultSet->fetch_assoc();
                                    $count = $data['author_count'];
                                } else {
                                    $count = 0;
                                }
                                echo $count = $data['author_count'];
                                ?>
                            </div>
                            <a href="author.php">
                                <button
                                    class="text-[#FFFFFF] bg-[#3C3C3C] w-[330px] h-[44px] rounded-[10px] mt-[31px] font-outfit text-[14px] hover:bg-[#2e2e2e]">
                                    View All Authors</button>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contents Publishers-->
                <div>
                    <div class="bg-[#F1F1F1] w-[383px] h-[199px] mt-[24px] rounded-[10px]">
                        <div class="py-[32px] px-[25px]">
                            <div class="thirdcolor">
                                Publishers
                            </div>
                            <div class="text-[32px] secondcolor font-bold mt-[-10px]">
                                <?php
                                $resultSet = Database::search("SELECT COUNT(*) AS publisher_count FROM `publisher`;");
                                if ($resultSet->num_rows > 0) {
                                    $data = $resultSet->fetch_assoc();
                                    $count = $data['publisher_count'];
                                } else {
                                    $count = 0;
                                }
                                echo $count = $data['publisher_count'];
                                ?>
                            </div>
                            <a href="publisher.php">
                                <button
                                    class="text-[#FFFFFF] bg-[#3C3C3C] w-[330px] h-[44px] rounded-[10px] mt-[31px] font-outfit text-[14px] hover:bg-[#2e2e2e]">
                                    View All Publishers</button>
                            </a>

                        </div>
                    </div>
                </div>

                <!-- Contents Borrowed Books-->
                <div>
                    <div class="bg-[#F1F1F1] w-[383px] h-[199px] mt-[24px] rounded-[10px]">
                        <div class="py-[32px] px-[25px]">
                            <div class="thirdcolor">
                                Borrowed Books
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
                            <a href="brrowedBooks.php">
                                <button
                                    class="text-[#FFFFFF] bg-[#3C3C3C] w-[330px] h-[44px] rounded-[10px] mt-[31px] font-outfit text-[14px] hover:bg-[#2e2e2e]">
                                    View Borrowed Books</button>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Reports -->
            <div class=" gap-[30px] mt-10 ">
                <div class="flex justify-between bg-[#F1F1F1] w-[100%] rounded-[10px] mb-5 h-[70px]">
                    <div class="thirdcolor pl-6 mt-[25px]">
                        Reports
                    </div>
                    <a href="report.php">
                        <button
                            class="text-[#FFFFFF] bg-[#3C3C3C] mr-5 w-[200px] h-[40px] rounded-[10px] mt-[15px] font-outfit text-[14px] hover:bg-[#2e2e2e]">
                            View Report
                        </button>
                    </a>
                </div>
            </div>

        </div>

        <script src="script.js"></script>
    </body>

    </html>
    <?php
} else {
    header("Location: login.php");
}
?>