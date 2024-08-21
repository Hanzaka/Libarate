<!-- Header Row -->
<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit rounded-tl-[10px] rounded-bl-[10px] mb-[14px]">
    Publisher</div>

<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit rounded-tr-[10px] rounded-br-[10px] mb-[14px]">
    Book Count</div>


<?php
include "connection.php";

$resultSet = Database::search("SELECT * FROM `publisher`");
$numOfRows = $resultSet->num_rows;

$resultSetCount = Database::search("SELECT `p`.`id` AS `publisher_id`, `p`.`name` AS `publisher_name`, COUNT(b.id) AS `book_count`
FROM publisher p
LEFT JOIN book b ON `p`.`id` = `b`.`publisher_id`
GROUP BY `p`.`id`, `p`.`name`");


for ($x = 0; $x < $numOfRows; $x++) {
    $row = $resultSet->fetch_assoc();
    ?>
    <!-- Data Rows -->
    <div class="p-4 bg-[#F7F7F7] rounded-tl-[10px] rounded-bl-[10px] mb-[8px] font-outfit text-[#3C3C3C]">
        <?php echo ($row["name"]); ?>
    </div>
    <div class="p-4 bg-[#F7F7F7] mb-[8px] rounded-tr-[10px] rounded-br-[10px] font-outfit text-[#3C3C3C]">
        <?php
        if ($resultSetCount->num_rows > 0) {
            $rowCount = $resultSetCount->fetch_assoc();
            $count = $rowCount['book_count'];
        } else {
            $count = "Not Published Yet";
        }
        echo $count;
        ?>
    </div>
    <?php
}

?>