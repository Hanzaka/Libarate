<?php
include "connection.php";

$category = $_POST["categorySelect"];
$author = $_POST["authorSelect"];
$publisher = $_POST["publisherSelect"];
$nameSort = $_POST["nameSort"];

?>
<!-- Header Row -->
<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit rounded-tl-[10px] rounded-bl-[10px] mb-[14px]">
    Book ID</div>
<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit mb-[14px]">Book Name</div>
<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit mb-[14px]">Category</div>
<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit mb-[14px]">Author</div>
<div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit rounded-tr-[10px] rounded-br-[10px] mb-[14px]">
    Publisher</div>

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
            <?php echo ($row["book_id"]); ?>
        </div>
        <div class="p-4 bg-[#F7F7F7] mb-[8px] font-outfit text-[#3C3C3C]"><?php echo ($row["book_name"]); ?></div>
        <div class="p-4 bg-[#F7F7F7] mb-[8px] font-outfit text-[#3C3C3C]"><?php echo ($row["category_name"]); ?></div>
        <div class="p-4 bg-[#F7F7F7] mb-[8px] font-outfit text-[#3C3C3C]"><?php echo ($row["author_name"]); ?></div>
        <div class="p-4 bg-[#F7F7F7] mb-[8px] rounded-tr-[10px] rounded-br-[10px] font-outfit text-[#3C3C3C]">
            <?php echo ($row["publisher_name"]); ?>
        </div>
        <?php
    }

} else {
    ?>
    
    <div class="font-outfit font-bold text-[#c6331c] flex text-center">No Result</div>

    <?php
}

?>