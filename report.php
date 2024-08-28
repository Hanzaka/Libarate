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
                <a href="dashboard.php" class=" font-outfit text-[16px]"> Dashboard</a> / <label for="">Reports</label>
            </div>

            <!-- Contents Section 1 -->
            <div class="flex flex-col mt-6 gap-[30px]">
                <?php
                $resultSet = Database::search("SELECT 
                    c.id AS category_id,
                    c.category_name,
                    b.book_id AS book_id,
                    b.book_name,
                    p.name AS publisher_name,
                    a.author_name
                    FROM 
                        category c
                    LEFT JOIN 
                        book b ON c.id = b.category_id
                    LEFT JOIN 
                        publisher p ON b.publisher_id = p.id
                    LEFT JOIN 
                        author a ON b.author_id = a.id
                    ORDER BY 
                        c.id, b.id");

                    $currentCategoryId = null;
                    $currentCategoryName = null;
                    $bookCount = 0;

                while ($row = $resultSet->fetch_assoc()) {

                    if ($row['category_id'] !== $currentCategoryId) {

                        if ($currentCategoryId !== null) {
                            echo '</div></div></div>';
                        }

                        $currentCategoryId = $row['category_id'];
                        $currentCategoryName = $row['category_name'];


                        $bookCountQuery = Database::search("SELECT COUNT(*) as book_count FROM book WHERE category_id = '{$currentCategoryId}'");
                        $bookCount = $bookCountQuery->fetch_assoc()['book_count'];


                        $currentBookCount = 0;


                        ?>
                        <div class="bg-[#F1F1F1] w-[100%] h-auto rounded-[10px] mb-2">
                            <div class="py-[20px] px-[25px]">
                                <div class="font-bold thirdcolor text-[25px] flex">
                                    <?php echo htmlspecialchars($currentCategoryName); ?> &nbsp; -
                                    <?php echo $bookCount; ?>
                                </div>
                                <!-- Table Header -->
                                <div class="grid grid-cols-4 mb-[25px] mt-[10px]">
                                    <div
                                        class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit rounded-tl-[10px] rounded-bl-[10px] mb-[14px]">
                                        Book ID</div>
                                    <div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit mb-[14px]">Book Name</div>
                                    <div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit mb-[14px]">Author</div>
                                    <div
                                        class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit rounded-tr-[10px] rounded-br-[10px] mb-[14px]">
                                        Publisher
                                    </div>
                                </div>
                                <!-- Books Grid -->
                                <div class="grid grid-cols-4 gap-[10px]" id="content">
                                    <?php
                    }


                    if ($currentBookCount < 3) {

                        if ($row['book_id'] !== null) {
                            ?>
                                        <div
                                            class="p-4 bg-[#F7F7F7] rounded-tl-[10px] rounded-bl-[10px] mb-[8px] font-outfit text-[#3C3C3C]">
                                            <?php echo ($row["book_id"]); ?> </div>
                                        <div class="p-4 bg-[#F7F7F7] mb-[8px] font-outfit text-[#3C3C3C]">
                                            <?php echo ($row["book_name"]); ?></div>
                                        <div class="p-4 bg-[#F7F7F7] mb-[8px] font-outfit text-[#3C3C3C]">
                                            <?php echo ($row["author_name"]); ?></div>
                                        <div
                                            class="p-4 bg-[#F7F7F7] mb-[8px] rounded-tr-[10px] rounded-br-[10px] font-outfit text-[#3C3C3C]">
                                            <?php echo ($row["publisher_name"]); ?></div>
                                        <?php
                                        $currentBookCount++;
                        } else {
                            echo '<div class="col-span-4 text-center text-[#3C3C3C]">No books available in this category.</div>';
                        }
                    }
                }


                if ($currentCategoryId !== null) {
                    echo '</div></div></div>';
                }
                ?>

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