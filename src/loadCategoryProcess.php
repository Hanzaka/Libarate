<!-- Header Row -->
<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit rounded-tl-[10px] rounded-bl-[10px] mb-[14px]">
    Category</div>

<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit rounded-tr-[10px] rounded-br-[10px] mb-[14px]">
    Count</div>

<?php
include "connection.php";

$resultSet = Database::search("SELECT * FROM `category`");
$numOfRows = $resultSet->num_rows;

$resultSetCount = Database::search("SELECT `c`.`id`, `c`.`category_name`, COUNT(b.id) AS `book_count`
FROM category c
LEFT JOIN book b ON `c`.`id` = `b`.`category_id`
GROUP BY `c`.`id`, `c`.`category_name`");


for ($x = 0; $x < $numOfRows; $x++) {
    $row = $resultSet->fetch_assoc();
    ?>
    <!-- Data Rows -->
    <div class="p-4 bg-[#F7F7F7] rounded-tl-[10px] rounded-bl-[10px] mb-[8px] font-outfit text-[#3C3C3C]">
        <?php echo ($row["category_name"]); ?>
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
