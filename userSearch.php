<?php
include "connection.php";

$searchText = isset($_GET["searchtext"]) ? $_GET["searchtext"] : '';

if (!empty($searchText)) {
    $resultSet = Database::search("SELECT * FROM `user` WHERE `f_name` LIKE '$searchText%' OR `mobile` LIKE '$searchText%' ");
} else {
    $resultSet = Database::search("SELECT * FROM `user` ORDER BY `id` DESC");
}

$numOfRows = $resultSet->num_rows;

if ($numOfRows > 0) {
    ?>
    <!-- Header Row -->
    <div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit rounded-tl-[10px] rounded-bl-[10px] mb-[14px]">
        User ID</div>
    <div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit mb-[14px]">Full Name</div>
    <div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit mb-[14px]">Email</div>
    <div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit mb-[14px]">Mobile</div>
    <div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit rounded-tr-[10px] rounded-br-[10px] mb-[14px]">
        Action</div>

    <?php

    for ($x = 0; $x < $numOfRows; $x++) {
        $row = $resultSet->fetch_assoc();
        ?>
        <!-- Data Rows -->
        <div class="p-4 bg-[#F7F7F7] rounded-tl-[10px] rounded-bl-[10px] mb-[8px] font-outfit text-[#3C3C3C]">
            <?php echo ($row["user_id"]); ?>
        </div>
        <div class="p-4 bg-[#F7F7F7] mb-[8px] font-outfit text-[#3C3C3C]"><?php echo ($row["f_name"] . " " . $row["l_name"]); ?>
        </div>
        <div class="p-4 bg-[#F7F7F7] mb-[8px] font-outfit text-[#3C3C3C]"><?php echo ($row["email"]); ?></div>
        <div class="p-4 bg-[#F7F7F7] mb-[8px] font-outfit text-[#3C3C3C]"><?php echo ($row["mobile"]); ?></div>
        <div class="p-4 bg-[#F7F7F7] mb-[8px] rounded-tr-[10px] rounded-br-[10px] font-outfit text-[#3C3C3C]">
            <button class="px-[13px] py-[5px] rounded-[10px] font-semibold text-[#003e8a] bg-[#90c8fd]"
                onclick="editUser('<?php echo $row['user_id']; ?>', '<?php echo addslashes($row['f_name']); ?>', '<?php echo addslashes($row['l_name']); ?>', '<?php echo $row['email']; ?>', '<?php echo $row['mobile']; ?>')">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path
                        d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32l8.4-8.4Z" />
                    <path
                        d="M5.25 5.25a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3V13.5a.75.75 0 0 0-1.5 0v5.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5V8.25a1.5 1.5 0 0 1 1.5-1.5h5.25a.75.75 0 0 0 0-1.5H5.25Z" />
                </svg>

            </button>
            <!-- <button class="px-[13px] py-[5px] rounded-[10px] font-semibold text-[#8a0007] bg-[#fd9099]"
                onclick="deleteUser('<?php echo ($row['user_id']); ?>');">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd"
                        d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                        clip-rule="evenodd" />
                </svg>
            </button> -->

        </div>
        <?php
    }

?>
<?php
} else {
    ?>
    <!-- Header Row -->
    <div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit rounded-tl-[10px] rounded-bl-[10px] mb-[14px]">
        User ID</div>
    <div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit mb-[14px]">Full Name</div>
    <div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit mb-[14px]">Email</div>
    <div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit mb-[14px]">Mobile</div>
    <div class="p-4 bg-[#F1F1F1] text-[#3C3C3C] font-semibold font-outfit rounded-tr-[10px] rounded-br-[10px] mb-[14px]">
        Action</div>

    <?php
    $resultSet = Database::search("SELECT * FROM `user`");
    $numOfRows = $resultSet->num_rows;

    for ($x = 0; $x < $numOfRows; $x++) {
        $row = $resultSet->fetch_assoc();
        ?>
        <!-- Data Rows -->
        <div class="p-4 bg-[#F7F7F7] rounded-tl-[10px] rounded-bl-[10px] mb-[8px] font-outfit text-[#3C3C3C]">
            <?php echo ($row["user_id"]); ?>
        </div>
        <div class="p-4 bg-[#F7F7F7] mb-[8px] font-outfit text-[#3C3C3C]"><?php echo ($row["f_name"] . " " . $row["l_name"]); ?>
        </div>
        <div class="p-4 bg-[#F7F7F7] mb-[8px] font-outfit text-[#3C3C3C]"><?php echo ($row["email"]); ?></div>
        <div class="p-4 bg-[#F7F7F7] mb-[8px] font-outfit text-[#3C3C3C]"><?php echo ($row["mobile"]); ?></div>
        <div class="p-4 bg-[#F7F7F7] mb-[8px] rounded-tr-[10px] rounded-br-[10px] font-outfit text-[#3C3C3C]">

            <button class="px-[13px] py-[5px] rounded-[10px] font-semibold text-[#003e8a] bg-[#90c8fd]"
                onclick="editUser('<?php echo $row['user_id']; ?>', '<?php echo addslashes($row['f_name']); ?>', '<?php echo addslashes($row['l_name']); ?>', '<?php echo $row['email']; ?>', '<?php echo $row['mobile']; ?>')">
                EDIT
            </button>
        </div>

        <?php
    }
}
?>