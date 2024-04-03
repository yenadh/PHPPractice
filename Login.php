<?php
include 'Data.php';
login();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="Js/main.js"></script>
    <title>Document</title>

</head>

<body class="h-auto bg-[Gray]">
    
    <h1 class="text-[38px] text-[White] font-bold text-center relative top-[50px] pt-[60px]">Welcome PHP Practice</h1>
    <div class="w-[700px] mx-auto flex justify-center text-[20px] bg-slate-400 relative top-[100px] py-[80px] rounded-3xl">
        <div class="flex flex-col text-[20px]">
            <form method="post">
                <div class="py-[20px]">
                    <label class="pr-[30px]">User Name</label>
                    <input type="text" name="txtuserName" class="w-[300px] h-[40px] text-[18px] pl-[10px] border-[2px] border-[#cccaca]" required="">
                </div>

                <div class="py-[20px]">
                    <label class="pr-[20px]">Password</label>
                    <input type="password" name="txtPassword" class="w-[300px] h-[40px] text-[18px] px-[10px] border-[2px] border-[#cccaca]" required="">
                </div>                
                <div class="py-[20px]">
                    <button class="bg-green-500 w-[150px] h-[50px] rounded-full cursor-pointer" type="submit" name="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
    
</div>

</body>

</html>