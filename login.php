<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="./output.css" rel="stylesheet">
    <link rel="icon" href="Logo.png" type="image">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

</head>


<body>

    <div class="mx-[165px] h-[100%]">
        <div class="text-[36px] font-black flex justify-center secondcolor mt-[80px]">
            Libarate
        </div>
        <div class="mt-[100px] flex flex-col items-center">
            <div>
                <label for="" class="font-outfit">Username</label>
                <div class="mt-[8px]">
                    <input id="username" type="text" placeholder="Enter your username"
                        class="h-[50px] w-[445px] offwhite rounded-[10px] font-outfit pl-[13px] thirdcolor focus:outline-none">
                </div>
            </div>

            <div class="mt-[38px]">
                <label for="" class="font-outfit">Password</label>
                <div class="mt-[8px]">
                    <input id="password" type="password" placeholder="Enter your password"
                        class="h-[50px] w-[445px] offwhite rounded-[10px]  pl-[13px] thirdcolor focus:outline-none">
                </div>
            </div>

            <div class="flex flex-col items-center">
                <button class="w-[350px] h-[56px] primarycolor font-black text-[20px] secondcolor rounded-[10px] mt-[120px] hover:bg-[#c0e52c]"
                 onclick="adminLogIn()">Login</button>
                <a href="#" class="thirdcolor text-[12px] font-normal mt-[28px] font-outfit">Forgot password ? Reset now</a>
            </div>
            
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>