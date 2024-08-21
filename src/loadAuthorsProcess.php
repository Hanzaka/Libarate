<!-- Header Row -->
<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit rounded-tl-[10px] rounded-bl-[10px] mb-[14px]">
    Authors</div>

<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit rounded-tr-[10px] rounded-br-[10px] mb-[14px]">
    Book Count</div>


<?php
include "connection.php";

$resultSet = Database::search("SELECT * FROM `author`");
$numOfRows = $resultSet->num_rows;

$resultSetCount = Database::search("SELECT `a`.`id`, `a`.`author_name`, COUNT(b.id) AS `book_count`
FROM author a
LEFT JOIN book b ON `a`.`id` = `b`.`author_id`
GROUP BY `a`.`id`, `a`.`author_name`");


for ($x = 0; $x < $numOfRows; $x++) {
    $row = $resultSet->fetch_assoc();
    ?>
    <!-- Data Rows -->
    <div class="p-4 bg-[#F7F7F7] rounded-tl-[10px] rounded-bl-[10px] mb-[8px] font-outfit text-[#3C3C3C]">
        <?php echo ($row["author_name"]); ?>
    </div>
    <div class="p-4 bg-[#F7F7F7] mb-[8px] rounded-tr-[10px] rounded-br-[10px] font-outfit text-[#3C3C3C]">
        <?php
        if ($resultSetCount->num_rows > 0) {
            $rowCount = $resultSetCount->fetch_assoc();
            $count = $rowCount['book_count'];
        } else {
            $count = "0";
        }
        echo $count;
        ?>
    </div>
    <?php
}

?>