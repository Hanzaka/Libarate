<?php
include "connection.php";

$category = $_POST["categorySelect"];
$author = $_POST["authorSelect"];
$publisher = $_POST["publisherSelect"];
$nameSort = $_POST["nameSort"];
$userId = $_POST['userId'];

?>
<!-- Header Row -->
<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit rounded-tl-[10px] rounded-bl-[10px] mb-[14px]">
    Book Name</div>
<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit mb-[14px]">Category</div>
<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit mb-[14px]">Author</div>
<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit mb-[14px]">Publishers</div>
<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit rounded-tr-[10px] rounded-br-[10px] mb-[14px]">
    Borrow
</div>

<?php


$query = "SELECT * FROM `book_details`";

$conditions = [];

if (!empty($nameSort)) {
    $conditions[] = "`book_name` LIKE '$nameSort%'";
}

if ($category != 0) {
    $conditions[] = "`category_id`='$category'";
}

if ($author != 0) {
    $conditions[] = "`author_id`='$author'";
}

if ($publisher != 0) {
    $conditions[] = "`publisher_id`='$publisher'";
}

if (!empty($conditions)) {
    $query .= " WHERE " . implode(" AND ", $conditions);
}

$resultSet = Database::search($query);
$numOfRows = $resultSet->num_rows;

if ($numOfRows > 0) {
    for ($x = 0; $x < $numOfRows; $x++) {
        $row = $resultSet->fetch_assoc();
        ?>
        <!-- Data Rows -->
        <div class="p-4 bg-[#F7F7F7] rounded-tl-[10px] rounded-bl-[10px] mb-[8px] font-outfit text-[#3C3C3C]">
            <?php echo ($row["book_name"]); ?>
        </div>
        <div class="p-4 bg-[#F7F7F7] mb-[8px] font-outfit text-[#3C3C3C]"><?php echo ($row["category_name"]); ?></div>
        <div class="p-4 bg-[#F7F7F7] mb-[8px] font-outfit text-[#3C3C3C]"><?php echo ($row["author_name"]); ?></div>
        <div class="p-4 bg-[#F7F7F7] mb-[8px] font-outfit text-[#3C3C3C]"><?php echo ($row["publisher_name"]); ?></div>
        <div class="p-4 bg-[#F7F7F7] mb-[8px] rounded-tr-[10px] rounded-br-[10px] font-outfit text-[#3C3C3C]">
            <?php
            $resultSet2 = Database::search("SELECT * FROM `userborrowbook` WHERE `book_id`='".$row['id']."' AND `user_id`='$userId'");
            $numOfRows2 = $resultSet2->num_rows;

            if ($numOfRows2 > 0) {
                $row = $resultSet2->fetch_assoc();
                if ($row["status_id"] != 3) {
                    ?>
                    <button onClick="userBorrowRequest('<?php echo addslashes($row['id']); ?>', '<?php echo addslashes($row['category_id']); ?>', '<?php echo addslashes($row['author_id']); ?>', '<?php echo addslashes($row['publisher_id']); ?>', userId);"
                    class="w-[120px] px-[13px] text-center py-[5px] rounded-[10px] font-semibold text-[#00508a] bg-[#90d7fd] ">
                    Borrow
                    </button>

                    <?php
                } else {
                    ?>
                    <button onClick="cancelBorrow('<?php echo $userId; ?>');"
                        class="w-[120px] px-[13px] text-center py-[5px] rounded-[10px] font-semibold text-[#8a4e00] bg-[#fdd790] ">
                        Cancel
                    </button>
                    <?php
                }
            } else {
                ?>
                <button
                    onClick="userBorrowRequest('<?php echo addslashes($row['id']); ?>', '<?php echo addslashes($row['category_id']); ?>', '<?php echo addslashes($row['author_id']); ?>', '<?php echo addslashes($row['publisher_id']); ?>', '<?php echo $userId; ?>');"
                    class="w-[120px] px-[13px] text-center py-[5px] rounded-[10px] font-semibold text-[#00508a] bg-[#90d7fd] ">
                    Borrow
                </button>
                <?php
            }
            ?>
        </div>
        <?php
    }
} else {
    ?>

    <div class="font-outfit font-bold text-[#c6331c] flex text-center">No Result</div>

    <?php
}

?>