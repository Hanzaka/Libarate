<!-- Header Row -->
<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit rounded-tl-[10px] rounded-bl-[10px] mb-[14px]">
    Book Name</div>
<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit mb-[14px]">User Name</div>
<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit mb-[14px]">Fine</div>
<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit mb-[14px]">Brrowed Date</div>
<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit mb-[14px]">Return Date</div>
<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit mb-[14px]">Mark Returned</div>
<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit rounded-tr-[10px] rounded-br-[10px] mb-[14px]">
    Status</div>

<?php
include "connection.php";

$resultSet = Database::search("SELECT * FROM `brrow_view`");
$numOfRows = $resultSet->num_rows;

for ($x = 0; $x < $numOfRows; $x++) {
    $row = $resultSet->fetch_assoc();
    ?>
    <!-- Data Rows -->
    <div class="p-4 bg-[#F7F7F7] rounded-tl-[10px] rounded-bl-[10px] mb-[8px] font-outfit text-[#3C3C3C]">
        <?php echo ($row["book_name"]); ?>
    </div>
    <div class="p-4 bg-[#F7F7F7] mb-[8px] font-outfit text-[#3C3C3C]">
        <?php echo ($row["f_name"]) . " " . ($row["l_name"]); ?>
    </div>

    <?php
    $currentDate = date("Y-m-d");
    $returnDate = $row["return_date"];
    $statusId = $row["status_id"];

    if ($returnDate < $currentDate && $statusId == 1) {

        $overdueDays = (strtotime($currentDate) - strtotime($returnDate)) / 86400; // 86400 seconds in a day
        $fine = $overdueDays * 20;
        ?>
        <div class="p-4 bg-[#F7F7F7] mb-[8px] font-outfit font-bold text-[#df2b2bde]">Rs.<?php echo number_format($fine, 2); ?>
        </div>
        <?php

        Database::iud("UPDATE `brrow` SET `fine`='$fine' WHERE `id`='" . $row["id"] . "' ");
    } else {
        ?>
        <div class="p-4 bg-[#F7F7F7] mb-[8px] font-outfit text-[#3C3C3C]">No Fine</div>
        <?php

        Database::iud("UPDATE `brrow` SET `fine`='0' WHERE `id`='" . $row["id"] . "' ");
    }
    ?>
    <div class="p-4 bg-[#F7F7F7] mb-[8px] font-outfit text-[#3C3C3C]"><?php echo ($row["brrow_date"]); ?></div>
    <div class="p-4 bg-[#F7F7F7] mb-[8px] font-outfit text-[#3C3C3C]"><?php echo ($row["return_date"]); ?></div>
    <div class="p-4 bg-[#F7F7F7] mb-[8px] font-outfit text-[#3C3C3C]">
        <div>
            <button onclick="changeBrrowStatus(<?php echo ($row['id']); ?>);"
                class="w-[120px] px-[13px] py-[5px] rounded-[10px] font-semibold text-[#00508a] bg-[#90ccfd] ">
                RETURNED
            </button>
        </div>
    </div>
    <div class="p-4 bg-[#F7F7F7] mb-[8px] rounded-tr-[10px] rounded-br-[10px] font-outfit text-[#3C3C3C]">
        <?php
        if ($row["status_id"] == 1) {
            ?>
            <button class="w-[120px] px-[13px] text-center py-[5px] rounded-[10px] font-semibold text-[#8A4B00] bg-[#FDD890] ">
                READING
            </button>
            <?php
        } else {
            ?>
            <div>
                <button class="w-[120px] px-[13px] py-[5px] rounded-[10px] font-semibold text-[#038A00] bg-[#ADFD90] ">
                    RETURNED
                </button>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
}

?>