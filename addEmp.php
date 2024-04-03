<?php
include 'Data.php';
include 'connection.php';
if (!empty($_SESSION["Id"])) {
    $id = $_SESSION["Id"];
    $query = "SELECT * FROM `logindetails` WHERE Id = '$id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: Login.php");
}
addEmp();
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
    <div>
        <?php include 'Containers/navbar.php' ?>
    </div>
    <h1 class="text-[38px] text-[White] font-bold text-center relative top-[50px] pt-[60px]">Add Employee</h1>
    <div class="w-[1000px] mx-auto flex justify-center text-[20px] bg-slate-400 relative top-[100px] py-[80px] rounded-3xl">
        <div class="flex flex-col text-[20px]">
            <form method="post">
                <div class="py-[20px]">
                    <label class="pr-[30px]">Name</label>
                    <input type="text" name="txtName" class="w-[500px] h-[40px] text-[18px] pl-[10px] border-[2px] border-[#cccaca]" required="">
                </div>

                <div class="py-[20px]">
                    <label class="pr-[20px]">Charge</label>
                    <input type="number" name="txtCharge" class="w-[500px] h-[40px] text-[18px] px-[10px] border-[2px] border-[#cccaca]" required="">
                </div>

                <div class="py-[20px]">
                    <button class="bg-green-500 w-[150px] h-[50px] rounded-full cursor-pointer" type="submit" name="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
    
</div>

</body>

</html>