<?php
include "connection.php";

?>
<!-- Header Row -->
<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit rounded-tl-[10px] rounded-bl-[10px] mb-[14px]">
    Book Name</div>
<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit mb-[14px]">User</div>
<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit mb-[14px]">Category</div>
<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit mb-[14px]">Author</div>
<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit mb-[14px]">Publishers</div>
<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit mb-[14px]">Brrow Date</div>
<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit rounded-tr-[10px] rounded-br-[10px] mb-[14px]">
    Action
</div>

<?php

$resultSet = Database::search("SELECT * FROM `borrow_request`");
$numOfRows = $resultSet->num_rows;

for ($x = 0; $x < $numOfRows; $x++) {
    $row = $resultSet->fetch_assoc();
    ?>
    <!-- Data Rows -->
    <div class="p-4 bg-[#F7F7F7] rounded-tl-[10px] rounded-bl-[10px] mb-[8px] font-outfit text-[#3C3C3C]">
        <?php echo ($row["book_name"]); ?>
    </div>
    <div class="p-4 bg-[#F7F7F7] mb-[8px] font-outfit text-[#3C3C3C]"><?php echo ($row["f_name"])." ".($row["l_name"]); ?></div>
    <div class="p-4 bg-[#F7F7F7] mb-[8px] font-outfit text-[#3C3C3C]"><?php echo ($row["category_name"]); ?></div>
    <div class="p-4 bg-[#F7F7F7] mb-[8px] font-outfit text-[#3C3C3C]"><?php echo ($row["author_name"]); ?></div>
    <div class="p-4 bg-[#F7F7F7] mb-[8px] font-outfit text-[#3C3C3C]"><?php echo ($row["publisher_name"]); ?></div>
    <div class="p-4 bg-[#F7F7F7] mb-[8px] font-outfit text-[#3C3C3C]"><?php echo ($row["borrow_date"]); ?></div>
    <div class="p-4 bg-[#F7F7F7] mb-[8px] rounded-tr-[10px] rounded-br-[10px] font-outfit text-[#3C3C3C]">
        <button
            onclick="acceptBorrowRequest('<?php echo addslashes($row['id']); ?>', '<?php echo addslashes($row['category_id']); ?>', '<?php echo addslashes($row['author_id']); ?>', '<?php echo addslashes($row['publisher_id']); ?>', '<?php echo addslashes($row['borrow_date']); ?>','<?php echo addslashes($row['user_id']); ?>');"
            class="w-[120px] px-[13px] text-center py-[5px] rounded-[10px] font-semibold text-[#398a00] bg-[#bdfd90] ">
            Accept
        </button>
    </div>
    <?php

}

?>