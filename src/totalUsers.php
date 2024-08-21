<?php
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="./output.css" rel="stylesheet">
    <link rel="icon" href="Logo.png" type="image">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

</head>


<body onload="searchUser();">

    <div class="mx-[165px] h-[100%]">
        <?php include "header.php"; ?>
        <div class="thirdcolor">
            <a href="dashboard.php" class=" font-outfit text-[16px]"> Dashboard</a> / <label>Total Users</label>
        </div>


        <div class="flex">
            <div class="mt-[24px] rounded-[10px]">
                <div class="">
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
                </div>

                <div>
                    <!-- User Registration-->
                    <div class="w-[1210px] h-[355px] bg-[#F7F7F7] rounded-[10px] mt-[32px]">
                        <div class="pt-[21px]">
                            <label class="font-outfit font-semibold secondcolor ml-[21px]">Create New User
                                Account</label>
                        </div>
                        <div class="mt-[38px] ml-[40px]">
                            <!-- Row 1 -->
                            <div class="flex gap-[97px]">
                                <div class="flex flex-col">
                                    <label for="" class="font-outfit text-[#3C3C3C]">User ID</label>
                                    <div class="mt-[8px]">
                                        <input id="id" type="text" placeholder="Enter user ID"
                                            class="h-[50px] w-[312px] offwhite rounded-[10px]  pl-[13px] thirdcolor focus:outline-none">
                                    </div>
                                </div>

                                <div class="flex flex-col">
                                    <label for="" class="font-outfit text-[#3C3C3C]">First Name</label>
                                    <div class="mt-[8px]">
                                        <input id="fname" type="text" placeholder="Enter user first name"
                                            class="h-[50px] w-[312px] offwhite rounded-[10px]  pl-[13px] thirdcolor focus:outline-none">
                                    </div>
                                </div>

                                <div class="flex flex-col">
                                    <label for="" class="font-outfit text-[#3C3C3C]">Last Name</label>
                                    <div class="mt-[8px]">
                                        <input id="lname" type="text" placeholder="Enter user last name"
                                            class="h-[50px] w-[312px] offwhite rounded-[10px]  pl-[13px] thirdcolor focus:outline-none">
                                    </div>
                                </div>
                            </div>

                            <!-- Row 2 -->
                            <div class="flex gap-[97px] mt-[18px]">
                                <div class="flex flex-col">
                                    <label for="" class="font-outfit text-[#3C3C3C]">Email</label>
                                    <div class="mt-[8px]">
                                        <input id="email" type="email" placeholder="Enter user email"
                                            class="h-[50px] w-[312px] offwhite rounded-[10px]  pl-[13px] thirdcolor focus:outline-none">
                                    </div>
                                </div>

                                <div class="flex flex-col">
                                    <label for="" class="font-outfit text-[#3C3C3C]">Mobile</label>
                                    <div class="mt-[8px]">
                                        <input id="mobile" type="text" placeholder="Enter user mobile"
                                            class="h-[50px] w-[312px] offwhite rounded-[10px]  pl-[13px] thirdcolor focus:outline-none">
                                    </div>
                                </div>

                                <div class="flex flex-col">
                                    <label for="" class="font-outfit text-[#3C3C3C]">Password</label>
                                    <div class="mt-[8px]">
                                        <input id="password" type="password" placeholder="Enter user Password"
                                            class="h-[50px] w-[312px] offwhite rounded-[10px]  pl-[13px] thirdcolor focus:outline-none">
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col ml-[410px]">
                                <button id="createButton"
                                    class="w-[312px] h-[44px] primarycolor font-semibold text-[14px] secondcolor rounded-[10px] mt-[30px] hover:bg-[#c0e52c]"
                                    onclick="createUser()">
                                    Create User Account
                                </button> 
                            </div>
                           


                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!--Search Bar-->
        <div class="ml-[682px]">
            <div class="mt-[60px]">
                <div class="flex flex-row">
                    <svg class="w-[20px] ml-[490px] text-[#5C5C5C] mt-2 absolute " xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                    <input type="text" placeholder="Search" id="search" onkeyup="searchUser();"
                        class="h-[37px] w-[349px] offwhite rounded-[10px]  ml-[230px] pl-[13px] thirdcolor focus:outline-none">
                    
                </div>

            </div>
        </div>

        <!-- Table -->
        <div class="grid grid-cols-5 mb-[25px] mt-[20px]" id="content">

        </div>
    </div>


    <script src="script.js"></script>
</body>

</html>